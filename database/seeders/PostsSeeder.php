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
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => 'Nintendo Switch OlED',

            'body' => 'OLED Model includes a vibrant 7-inch OLED screen with a slimmer bezel.
            The large screens vivid colours and high contrast deliver a rich handheld and tabletop
            gaming experience.',

            'cost' => 319.00,

            'image_uri' => '/images/switch_oled.jpg',
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => 'Steam Deck',

            'body' => 'We partnered with AMD to create Steam Decks custom APU, optimized for handheld gaming.
            It is a Zen 2 + RDNA 2 powerhouse',

            'cost' => 349.00,

            'image_uri' => '/images/steam_deck.jpg',
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => 'AMD Ryzen™ 7 5800X3D Gaming Processor',

            'body' => 'The AMD Ryzen™ 7 5800X3D is the first desktop processor with stacked L3 cache,
            delivering unmatched 96MB of L3 cache.',

            'cost' => 300.00,

            'image_uri' => '/images/5800x3D.jpg',
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => 'Nvidia RTX 3090',

            'body' => 'The GeForce RTX® 3090 Ti and 3090 are powered by Ampere—NVIDIA’s 2nd gen RTX architecture.',

            'cost' => 1399.00,

            'image_uri' => '/images/rtx_3090.jpg',
        ]);
    }
}
