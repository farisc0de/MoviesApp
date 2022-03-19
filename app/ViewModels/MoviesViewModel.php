<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $nowPlaying;
    public $genres;

    public function __construct($popularMovies, $nowPlaying, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlaying = $nowPlaying;
        $this->genres = $genres;
    }

    public function popularMovies()
    {
        return $this->movieFormat($this->popularMovies);
    }

    public function nowPlaying()
    {
        return $this->movieFormat($this->nowPlaying);
    }

    public function genres()
    {
        return \collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function movieFormat($movies)
    {

        return \collect($movies)->map(function ($movie) {
            $genresFormat = \collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(", ");

            return \collect($movie)->merge(
                [
                    "poster_path" => "https://image.tmdb.org/t/p/w500/{$movie['poster_path']}",
                    "vote_average" => $movie["vote_average"] * 10,
                    "release_date" => Carbon::parse($movie['release_date'])->format('M d, Y'),
                    "genres" => $genresFormat,
                ],
            )->only([
                "poster_path", "id", "genre_ids", "genres", "title", "vote_average", "overview", "release_date"]);
        });

    }

}
