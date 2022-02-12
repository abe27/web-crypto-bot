<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = Storage::get('public/mocks/Asset.json');
        $json = json_decode($filename);
        foreach ($json as $key) {
            $category = Category::where('title', $key->group)->first();
            $asset = Asset::where('symbol', $key->name)->first();
            if (!$asset) {
                $this->command->info("Insert data => ".$key->name);
                $asset = new Asset();
                $asset->category_id = $category->id;
                $asset->symbol = $key->name;
                $asset->description = $key->description;
                $asset->image_url = $key->image_url;
                $asset->is_active = $key->is_active;
                $asset->save();
            }
            else {
                $this->command->warn("Update data => ".$key->name);
                $asset->category_id = $category->id;
                $asset->description = $key->description;
                $asset->is_active = $key->is_active;
                $asset->save();
            }
        }
    }
}
