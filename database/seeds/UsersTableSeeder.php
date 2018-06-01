<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'laravel-xin',
            'email'=>'844577216@qq.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
