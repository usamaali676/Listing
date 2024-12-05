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
        $count = 100;

        // Retrieve all the businesses in ascending order by ID
        Business::orderBy('id')->chunk(100, function ($businesses) use (&$count) {
            // Loop through each business
            foreach ($businesses as $business) {
                // Update the specific column
                $business->update([
                    'lp_id' => $count,  // replace 'your_column_name' with the actual column name
                ]);

                // Increment the counter
                $count++;
            }
        });
    }
}
