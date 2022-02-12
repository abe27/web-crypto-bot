<?php

namespace Database\Seeders;

use App\Models\Exchange;
use App\Models\ExchangeGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filname = Storage::get('public/mocks/Exchange.json');
        $json = json_decode($filname);
        foreach ($json as $key) {
            $exchange = Exchange::where('name', $key->name)->first();
            $group = ExchangeGroup::where('title', $key->group)->first();
            if (!$exchange) {
                $exchange = new Exchange();
                $exchange->group_id = $group->id;
                $exchange->name = $key->name;
                $exchange->description = $key->description;
                $exchange->currency = $key->currency;
                $exchange->image_url = $key->image_url;
                $exchange->is_active = $key->is_active;
                $exchange->save();
            } else {
                $exchange->group_id = $group->id;
                $exchange->name = $key->name;
                $exchange->description = $key->description;
                $exchange->currency = $key->currency;
                $exchange->image_url = $key->image_url;
                $exchange->is_active = $key->is_active;
                $exchange->save();
            }
        }
    }
}
