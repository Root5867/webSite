<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            ['ProName'=>'Dell7440','description'=>'hang dell chuan nhat','category_id'=>'1','unit_price'=>'4500000','promotion_price'=>'0','image'=>'dell.img','unit'=>'chiec','new'=>'1','created_at'=>date('Y-m-d H:i:s')],
        ]);
    }
}
