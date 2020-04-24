<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['cateName'=>'Dell','description'=>'hang dell chuan nhat','image'=>'dell.img','created_at'=>date('Y-m-d H:i:s')],
            ['cateName'=>'Acer','description'=>'hang acer chuan nhat','image'=>'acer.img','created_at'=>date('Y-m-d H:i:s')],
            ['cateName'=>'Asus','description'=>'hang asus chuan nhat','image'=>'asus.img','created_at'=>date('Y-m-d H:i:s')],
        ]);
    }
}
