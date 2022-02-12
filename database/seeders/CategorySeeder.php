<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = Storage::get('public/mocks/Category.json');
        $json = json_decode($filename);
        foreach ($json as $key) {
            $category = Category::where('title', $key->title)->first();
            if (!$category) {
                $category = new Category();
                $category->title = $key->title;
                $category->description = $key->description;
                $category->is_active = $key->is_active;
                $category->save();
            } else {
                $category->title = $key->title;
                $category->description = $key->description;
                $category->is_active = $key->is_active;
                $category->save();
            }
        }
    }
}
