<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	['username'=>'congthanh','password'=>'123456','fullname'=>'congthanh','email'=>'congthanh1166@gmail.com','mobile'=>'031239949','created_at'=>date('Y-m-d H:i:s')],
        ]);
    }
}
