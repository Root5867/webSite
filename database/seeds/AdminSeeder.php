<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
        	['username'=>'admin','password'=>'123456','fullname'=>'Bui van cong','email'=>'congthanh5867@gmail.com','mobile'=>'031239949','role'=>1,'created_at'=>date('Y-m-d H:i:s')],
        ]);
    }
}
