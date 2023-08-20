<?php

namespace Database\Seeders;

use App\Models\Example;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamplePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('blog_example')->insert([
                'example_id' => rand(1, 2),
                'blog_id' => rand(1, 50)
            ]);
        }
    }
}
