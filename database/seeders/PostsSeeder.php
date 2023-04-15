<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'created_at' => Carbon::now(),
            'title' => 'Nintendo Switch OlED',

            'body' => 'OLED Model includes a vibrant 7-inch OLED screen with a slimmer bezel.
            The large screens vivid colours and high contrast deliver a rich handheld and tabletop
            gaming experience.',

            'cost' => 319.00,

            'image_uri' => 'resources/images/switch_oled.jpg',
        ]);

        DB::table('posts')->insert([
            'created_at' => Carbon::now(),
            'title' => 'Steam Deck',

            'body' => 'We partnered with AMD to create Steam Decks custom APU, optimized for handheld gaming.
            It is a Zen 2 + RDNA 2 powerhouse, delivering more than enough performance to run the latest
            AAA games in a very efficient power envelope.',

            'cost' => 349.00,

            'image_uri' => 'resources/images/steam_deck.jpg',
        ]);

        DB::table('posts')->insert([
            'created_at' => Carbon::now(),
            'title' => 'AMD Ryzen™ 7 5800X3D Gaming Processor',

            'body' => 'The AMD Ryzen™ 7 5800X3D is the first desktop processor with stacked L3 cache,
            delivering unmatched 96MB of L3 cache paired with incredibly fast cores to create the world’s
            fastest gaming desktop processor.',

            'cost' => 300.00,

            'image_uri' => 'resources/images/5800x3D.jpg',
        ]);

        DB::table('posts')->insert([
            'created_at' => Carbon::now(),
            'title' => 'Nvidia RTX 3090',

            'body' => 'The GeForce RTX® 3090 Ti and 3090 are powered by Ampere—NVIDIA’s 2nd gen RTX architecture.',

            'cost' => 1399.00,

            'image_uri' => 'resources/images/rtx_3090.jpg',
        ]);
    }
}
