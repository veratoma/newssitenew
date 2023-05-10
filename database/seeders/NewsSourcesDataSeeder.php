<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSourcesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news_sources_data')->insert($this->getData());
    }

    public function getData(){
        $data = [];
        for ($i=0; $i < 20; $i++) {
            $data[] = [
                'name' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }

        return $data;
    }
}
