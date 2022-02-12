<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $filename = Storage::get('public/mocks/OrderType.json');
        $json = json_decode($filename);
        foreach ($json as $key) {
            $db = OrderType::where('title', $key->title)->first();
            if (!$db) {
                $db = new OrderType();
                $db->title = $key->title;
                $db->description = $key->description;
                $db->is_active = $key->is_active;
                $db->save();
            } else {
                $db->description = $key->description;
                $db->is_active = $key->is_active;
                $db->save();
            }
        }
    }
}
