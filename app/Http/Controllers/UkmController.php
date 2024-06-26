<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->format('Y-m-d');
        $ukms = Ukm::paginate(10, ['*'], 'list_ukm');
        $tags = Tag::all();
        return view('adminPanel', compact('ukms','tags'));
    }

    public function homepage(Request $request)
    {
        $searchQuery = $request->input('search');
        $sort = $request->input('sort', 'asc');
        $tagId = $request->input('tag_id');

        $tags = Tag::all();
        $ukms = Ukm::query();

        if ($tagId) {
            $ukms->whereHas('tags', function ($query) use ($tagId) {
            $query->where('tags.id', $tagId);
        });
        }


        if ($searchQuery) {
            $ukms->where(function ($query) use ($searchQuery) {
                $query->where('short_name', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('long_name', 'LIKE', "%{$searchQuery}%");
            });
        }

        $ukms->orderBy('short_name', $sort);

        $ukms = $ukms->paginate(9, ['*'], 'list_ukm');

        return view('homepage', compact('ukms','tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'Logo' => ['required', 'image'],
        //     'Banner' => ['required', 'image'],
        //     'ShortName' => ['required', 'string', 'max:255'],
        //     'LongName' => ['required', 'string', 'max:255'],
        //     'ShortDescription' => ['required', 'string', 'max:255'],
        //     'AboutUs' => ['required', 'string'],
        //     'Vision' => ['required', 'string'],
        //     'Mission' => ['required', 'string'],
        //     'Email' => ['required', 'string', 'email', 'max:255'],
        //     'Phone' => ['required', 'string', 'max:20'],
        //     'Address' => ['required', 'string', 'max:255'],
        //     'Instagram' => ['nullable', 'string', 'max:255'],
        //     'LinkedIn' => ['nullable', 'string', 'max:255'],
        //     'Youtube' => ['nullable', 'string', 'max:255']
        // ]);

        $shortName = $request->ShortName;
        $logoFileName = $request->file('Logo')->getClientOriginalName();
        $bannerFileName = $request->file('Banner')->getClientOriginalName();

        $logoPath = $request->file('Logo')->storeAs('public/logo' . $shortName, $logoFileName);
        $bannerPath = $request->file('Banner')->storeAs('public/banner' . $shortName, $bannerFileName);

        $ukm = Ukm::create([
            'logo' =>'storage/logo' . $shortName . '/' . $logoFileName,
            'banner' => 'storage/banner' . $shortName . '/' . $bannerFileName,
            'short_name' => $request->ShortName,
            'long_name' => $request->LongName,
            'short_description' => $request->ShortDescription,
            'about_us' => $request->AboutUs,
            'vision' => $request->Vision,
            'mission' => $request->Mission,
            'email' => $request->Email,
            'phone' => $request->Phone,
            'address' => $request->Address,
            'instagram' => $request->Instagram,
            'linkedin' => $request->LinkedIn,
            'youtube' => $request->Youtube
        ]);

        if ($request->has('tags')) {
            foreach ($request->tags as $tag_id) {
                DB::table('tags_ukms')->insert([
                    'ukm_id' => $ukm->id,
                    'tag_id' => $tag_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }


        return redirect('/admin-panel');
    }

    public function detail($name)
    {
        $ukm = Ukm::where('short_name', $name)->firstOrFail();
        $announcements = Announcement::where('ukm_id',$ukm->id)->get();
        $products = Product::where('ukm_id',$ukm->id)->get();
        return view('detail', compact('ukm','announcements','products'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ukm $ukm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ukm = Ukm::where('id', $id)->first();
        $tags = Tag::all();
        return view('adminPanelEdit', compact('ukm','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ukm = Ukm::findOrFail($id);


        // Handle logo upload
        if ($request->hasFile('Logo')) {
            // Delete the old logo if exists
            if ($ukm->logo) {
                Storage::delete(str_replace('storage/', 'public/', $ukm->logo));
            }

            $shortName = $request->ShortName;
            $logoFileName = $request->file('Logo')->getClientOriginalName();
            $logoPath = $request->file('Logo')->storeAs('public/logo/' . $shortName, $logoFileName);
            $ukm->logo = 'storage/logo/' . $shortName . '/' . $logoFileName;
        }

        // Handle banner upload
        if ($request->hasFile('Banner')) {
            // Delete the old banner if exists
            if ($ukm->banner) {
                Storage::delete(str_replace('storage/', 'public/', $ukm->banner));
            }

            $shortName = $request->ShortName;
            $bannerFileName = $request->file('Banner')->getClientOriginalName();
            $bannerPath = $request->file('Banner')->storeAs('public/banner/' . $shortName, $bannerFileName);
            $ukm->banner = 'storage/banner/' . $shortName . '/' . $bannerFileName;
        }

        // Update other fields
        $ukm->short_name = $request->input('ShortName');
        $ukm->long_name = $request->input('LongName');
        $ukm->short_description = $request->input('ShortDescription');
        $ukm->about_us = $request->input('AboutUs');
        $ukm->vision = $request->input('Vision');
        $ukm->mission = $request->input('Mission');
        $ukm->email = $request->input('Email');
        $ukm->phone = $request->input('Phone');
        $ukm->address = $request->input('Address');
        $ukm->instagram = $request->input('Instagram');
        $ukm->linkedin = $request->input('LinkedIn');
        $ukm->youtube = $request->input('Youtube');

        $ukm->save();

        // Update tags
        if ($request->has('tags')) {
            $ukm->tags()->sync($request->tags);
        } else {
            $ukm->tags()->sync([]);
        }

        return redirect('/admin-panel')->with('success', 'UKM updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Ukm = Ukm::where('id', $id)->first();
        $Ukm::destroy($id);
        return redirect('/admin-panel');
    }
}
