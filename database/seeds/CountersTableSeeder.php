<?php

use Illuminate\Database\Seeder;
use App\Models\Counter;

class CountersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach(['Counter 1', 'Counter 2', 'Counter 3', 'Counter 4'] as $counter_name) {
    		Counter::firstOrCreate(['name' => $counter_name]);
    	}
    }
}
