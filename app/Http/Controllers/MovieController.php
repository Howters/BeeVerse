<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {
        $today = now()->format('Y-m-d');
        $nowMovies = Movie::where('ReleaseDate', '<', $today)->paginate(10, ['*'], 'list_ukm');
        $upcomingMovies = Movie::where('ReleaseDate', '>=', $today)->paginate(10, ['*'], 'upcoming_page');
        return view('adminPanel', compact('upcomingMovies', 'nowMovies'));
    }

    // public function index2()
    // {
    //     $movies = Movie::paginate(10);
    //     $today = now()->format('Y-m-d');
    //     $upcomingMovies = [];
    //     $nowMovies = [];

    //     foreach ($movies as $movie) {
    //         $releaseDate = $movie->ReleaseDate;
    //         if (strtotime($releaseDate) >= strtotime($today . ' + 10 days')) {
    //             $upcomingMovies[] = $movie;
    //         } else {
    //             $nowMovies[] = $movie;
    //         }
    //     }
    //     return view('homepage')->with([
    //         'upcomingMovies' => Movie::paginate(10),
    //         'nowMovies' => Movie::paginate(10),
    //         'movies'
    //     ]);
    //     // return view('homepage', compact('upcomingMovies', 'nowMovies', 'movies'));
    // }
    public function index2(Request $request)
    {
        $query = $request->input('search');
        $sort = $request->input('sort', 'asc');

        $ukms = Ukm::query();

        if ($query) {
            $ukms->where('short_name', 'LIKE', "%{$query}%")
                ->orWhere('long_name', 'LIKE', "%{$query}%");
        }

        $ukms->orderBy('short_name', $sort);

        $ukms = $ukms->paginate(9, ['*'], 'list_ukm');

        return view('homepage', compact('ukms'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'Cover' => ['required', 'image'],
            'GenreName' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:255'],
            'Director' => ['required', 'string', 'max:255'],
            'Description' => ['required', 'string', 'max:255'],
            'Duration' => ['required', 'integer', 'min:1'],
            'Rating' => ['required', 'integer', 'min:1', 'max:5'],
            'ReleaseDate' => ['required']
        ]);

        $filename = $request->file('Cover')->getClientOriginalName();
        $request->file('Cover')->storeAs('/public' . '/' . $request->Title . '/' . $filename);

        Movie::create([
            'Cover' => $filename,
            'GenreName' => $request->GenreName,
            'Title' => $request->Title,
            'Director' => $request->Director,
            'Description' => $request->Description,
            'Duration' => $request->Duration,
            'Rating' => $request->Rating,
            'ReleaseDate' => $request->ReleaseDate
        ]);

        return redirect('/admin-panel');
    }

    public function detail($id)
    {
        $movie = Movie::where('MovieID', $id)->first();
        return view('detail', compact('movie'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $today = now()->format('Y-m-d');
        $movie1 = Movie::where('MovieID', $id)->first();
        $nowMovies = Movie::where('ReleaseDate', '<', $today)->paginate(10, ['*'], 'list_ukm');
        $upcomingMovies = Movie::where('ReleaseDate', '>=', $today)->paginate(10, ['*'], 'upcoming_page');
        return view('adminPanelEdit', compact('movie1', 'nowMovies', 'upcomingMovies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::where('MovieID', $id)->first();

        $request->validate([
            'Cover' => ['required', 'image'],
            'GenreName' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:255'],
            'Director' => ['required', 'string', 'max:255'],
            'Description' => ['required', 'string', 'max:255'],
            'Duration' => ['required', 'integer', 'min:1'],
            'Rating' => ['required', 'integer', 'min:1', 'max:5'],
            'ReleaseDate' => ['required']
        ]);

        $filename = $request->file('Cover')->getClientOriginalName();
        $request->file('Cover')->storeAs('/public' . '/' . $request->Title . '/' . $filename);

        $movie->update([
            'Cover' => $filename,
            'GenreName' => $request->GenreName,
            'Title' => $request->Title,
            'Director' => $request->Director,
            'Description' => $request->Description,
            'Duration' => $request->Duration,
            'Rating' => $request->Rating,
            'ReleaseDate' => $request->ReleaseDate
        ]);

        return redirect('admin-panel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::where('MovieID', $id)->first();
        $movie::destroy($id);
        return redirect('/admin-panel');
    }
}
