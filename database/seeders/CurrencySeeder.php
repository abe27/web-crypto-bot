<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = Storage::get('public/mocks/Currency.json');
        $json = json_decode($filename);
        foreach ($json as $key) {
            $db = Currency::where('currency', $key->currency)->first();
            if ($db) {
                $db->currency = $key->currency;
                $db->description = $key->description;
                $db->flag_url = $key->flag_url;
                $db->save();
            } else {
                $db = new Currency();
                $db->currency = $key->currency;
                $db->description = $key->description;
                $db->flag_url = $key->flag_url;
                $db->save();
            }
        }
    }
}
