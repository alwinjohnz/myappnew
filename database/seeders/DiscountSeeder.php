<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert([
            'discount_type' => '1',//flat
            'discount_value' => '10',
        ]);
    }
}
