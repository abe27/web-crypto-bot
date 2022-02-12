<?php

namespace Database\Seeders;

use App\Models\TimeFrame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TimeFrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = Storage::get('public/mocks/TimeFrame.json');
        $json = json_decode($filename);
        foreach ($json as $key) {
            $timeFrame = TimeFrame::where('name', $key->name)->first();
            if (!$timeFrame) {
                $timeFrame = new TimeFrame();
                $timeFrame->seq = $key->id;
                $timeFrame->name = $key->name;
                $timeFrame->value = $key->value;
                $timeFrame->is_active = $key->is_active;
                $timeFrame->save();
            } else {
                $timeFrame->seq = $key->id;
                $timeFrame->value = $key->value;
                $timeFrame->is_active = $key->is_active;
                $timeFrame->save();
            }
        }
    }
}
