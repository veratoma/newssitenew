<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData(){
        $data = [];
        for ($i=0; $i < 100; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'author' => \fake()->userName(),
                'status' => 'draft',
                'description' => \fake()->text(100),
                'news_sources_data_id' => rand(1, 10),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }

        return $data;
    }
}
