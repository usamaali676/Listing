<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;

class LPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business = Business::all();
        $sr = 100;
        foreach ($business as $item) {
            $item->update([
                'lp_id' => $sr++,
            ]);
        }
    }
}
