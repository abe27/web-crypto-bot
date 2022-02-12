<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\NotTrading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class NotTradingSeeder extends Seeder
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
            if ($key->group == "Stablecoin") {
                $asset = Asset::where('symbol', $key->name)->first();
                $not_asset = NotTrading::where('asset_id', $asset->id)->first();
                if (!$not_asset) {
                    $not_asset = new NotTrading();
                    $not_asset->asset_id = $asset->id;
                    $not_asset->is_active = true;
                    $not_asset->save();
                }
            }
        }
    }
}
