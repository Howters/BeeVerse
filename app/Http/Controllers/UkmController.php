<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Product;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->format('Y-m-d');
        $ukms = Ukm::paginate(10, ['*'], 'list_ukm');
        return view('adminPanel', compact('ukms'));
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

        Ukm::create([
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
    public function edit(Ukm $ukm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ukm $ukm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ukm $ukm)
    {
        //
    }
}
