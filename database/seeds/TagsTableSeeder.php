<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Videogames', 'Comics', 'Music', 'Books', 'Movies', 'Tv Series'];

        foreach ($tags as $tag) {
            Tag::create([
                "name" => $tag,
                "slug" => Str::slug($tag)
            ]);
        }
    }
}
