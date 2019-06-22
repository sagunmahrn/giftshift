<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin001'),
            'status'=>1,
            'user_type'=>'admin'
        ]);
    }
}
