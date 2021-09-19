<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\State;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $articles = Article::factory(10)->create();
        $tags     = Tag::factory(20)->create();

        $tags_id  = $tags->pluck('id');

        $articles->each( function( $article ) use ($tags_id) {
           $article->tag()->attach( $tags_id->random(3));

           Comment::factory(3)->create([
               'article_id' => $article->id, 
           ]);

           State::factory(1)->create([
               'article_id' => $article->id,
           ]);
        });
    }
}
