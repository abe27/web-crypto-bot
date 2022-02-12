<?php

namespace Database\Seeders;

use App\Models\ExchangeGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExchangeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = Storage::get('public/mocks/ExchangeGroup.json');
        $json = json_decode($filename);
        foreach ($json as $key) {
            $exchangeGroup = ExchangeGroup::where('title', $key->title)->first();
            if (!$exchangeGroup) {
                $exchangeGroup = new ExchangeGroup();
                $exchangeGroup->title = $key->title;
                $exchangeGroup->description = $key->description;
                $exchangeGroup->is_active = $key->is_active;
                $exchangeGroup->save();
            } else {
                $exchangeGroup->title = $key->title;
                $exchangeGroup->description = $key->description;
                $exchangeGroup->is_active = $key->is_active;
                $exchangeGroup->save();
            }
        }
    }
}
