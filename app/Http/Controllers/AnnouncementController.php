<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Ukm;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $ukmId = $request->input('ukm_id');

        if ($ukmId) {
            $announcements = Announcement::where('ukm_id', $ukmId)->get();
        } else {
            $announcements = Announcement::all();
        }
        $user = auth()->user();
        $ukms = Ukm::all();
        return view('announcements', compact('announcements','ukms','user'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'Ukm' => ['required', 'integer', 'exists:ukms,id'], // Assuming 'Ukm' is the foreign key for UKM model
        //     'Title' => ['required', 'string', 'max:255'],
        //     'Image' => ['required', 'image'],
        //     'Link' => ['nullable', 'string', 'url', 'max:255'],
        //     'ShortDescription' => ['required', 'string', 'max:255'],
        //     'LongDescription' => ['required', 'string'],
        // ]);

        $ukm = Ukm::findOrFail($request->Ukm);
        $imageFileName = $request->file('Image')->getClientOriginalName();

        $imagePath = $request->file('Image')->storeAs('public/' . $ukm->short_name, $imageFileName);
        Announcement::create([
            'ukm_id' => $request->Ukm,
            'image' =>'storage/' . $ukm->short_name . '/' . $imageFileName,
            'links' => $request->Link,
            'title' => $request->Title,
            'short_description' => $request->ShortDescription,
            'long_description' => $request->LongDescription,
        ]);

        return redirect('/announcements');

    }

    public function detail($id)
    {
        $announcement = Announcement::where('id', $id)->first();
        $latest_announcements = Announcement::where('id', '!=', $id)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
        return view('announcementDetail', compact('announcement','latest_announcements'));
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
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
