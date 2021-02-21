<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->get('key');
        $genres = Genre::all();
        $films = isset($data)
            ? Film::with('country', 'genre')->where('name','like', '%' . $data . '%')->paginate(4)
            : Film::with('country', 'genre')->paginate(4);

        return compact('films', 'genres');
    }

    public function filtered_films(Request $request)
    {
        return Film::with('country', 'genre')
            ->where('rating', '>=', $request->only('rating_start'))
            ->where('rating', '<=', $request->only('rating_end'))
            ->where('release', '>=', $request->only('year_start'))
            ->where('release', '<=', $request->only('year_end'))
            ->where('format', '=', $request->only('format'))
            ->whereHas('genre', function ($q) use ($request) {
                return $q->where('genre', '=', $request->only('genre'));
            })
            ->paginate(4);
    }

    public function show_film(Request $request)
    {
        return Film::with('country', 'genre')->find($request->only('id'));
    }

    public function home_films()
    {
       return Film::with('genre')->latest()->take(8)->get();
    }
}
