<?php

namespace Database\Seeders;

use App\Models\ApiExchange;
use App\Models\Exchange;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ApiExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = Storage::get('public/mocks/TokenApi.json');
        $json = json_decode($filename);
        foreach ($json as $key) {
            $user = User::where('email', $key->user_id)->first();
            $exchange = Exchange::where('name', $key->exchange_id)->first();
            $db = ApiExchange::where('user_id', $user->id)
                ->where('exchange_id', $exchange->id)
                ->first();

            if ($db) {
                $this->command->info('update data');
                $db->api_key = $key->key;
                $db->api_secret = $key->secret;
                $db->expire_date = $key->expire_date;
                $db->is_active = $key->is_active;
                $db->save();
            } else {
                $this->command->info('insert data');
                $db = new ApiExchange();
                $db->user_id = $user->id;
                $db->exchange_id = $exchange->id;
                $db->api_key = $key->key;
                $db->api_secret = $key->secret;
                $db->expire_date = $key->expire_date;
                $db->is_active = $key->is_active;
                $db->save();
            }
        }
    }
}
