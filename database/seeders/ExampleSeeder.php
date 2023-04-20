<?php

namespace Database\Seeders;

use App\Models\Example;
use Illuminate\Database\Seeder;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Example::create([
            'name' => 'Example 1',
            'image' => 'example1.jpg',
            'detail' => 'Example 1 Detail',
            
        ]);
    }
}
