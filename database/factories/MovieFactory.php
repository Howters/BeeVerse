<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;


class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        $randomReleaseDate = Carbon::create(
            rand(2023, 2024),
            rand(1, 12),
            rand(1, 28),
            rand(0, 23),
            rand(0, 59),
            rand(0, 59)
        );
        return [
            'Cover' => 'HarryPotterCover.jpg',
            'GenreName' => 'Magic',
            // 'Title' => 'Harry Potter and the Philosopher\'s Stone',
            'Title' => 'Harry Potter',
            'Director' => 'Chris Columbus',
            'Description' => 'Harry Potter, an eleven-year-old orphan, discovers that he is a wizard and is invited to study at Hogwarts. Even as he escapes a dreary life and enters a world of magic, he finds trouble awaiting him.',
            'Duration' => 210,
            'Rating' => 5,
            'ReleaseDate' => $randomReleaseDate,
        ];
    }
}
