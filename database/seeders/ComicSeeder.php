<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   

        Comic::truncate();
        
        $comics = config('comics');

        foreach ($comics as $comic) {
            $comic = new Comic();
            
            $comic->title = $comic['title'];
            $comic->description = $comic['description'];
            $comic->thumb = $comic['thumb'];
            $comic->price = $comic['price'];
            $comic->series = $comic['series'];
            $comic->type = $comic['type'];
            $comic->sale_date = $comic['sale_date'];

            $comic->save();
        }
    }
}
