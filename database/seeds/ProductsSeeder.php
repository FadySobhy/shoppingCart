<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'          => 'T-shirt',
                'price'         => 30.99,
                'weight'        => 0.2,
                'shipping_id'   => 1,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'Blouse',
                'price'         => 10.99,
                'weight'        => 0.3,
                'shipping_id'   => 2,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'Pants',
                'price'         => 64.99,
                'weight'        => 0.9,
                'shipping_id'   => 2,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'Sweatpants',
                'price'         => 84.99,
                'weight'        => 1.1,
                'shipping_id'   => 3,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'Jacket',
                'price'         => 199.99,
                'weight'        => 2.2,
                'shipping_id'   => 1,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
            [
                'name'          => 'Shoes',
                'price'         => 79.99,
                'weight'        => 1.3,
                'shipping_id'   => 3,
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
