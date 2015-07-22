<?php
class UserSeeder extends Seeder
{
    public function run()
    {
        // clear out database
        DB::table('users')->delete();

        //seed the table
        $c1 = User::create(array(
            'email' => 'abc@hotmail.com',
            'password' => Hash::make('123456'),
            'confirmcode' => str_random(30) . 'abc@hotmail.com',
            'confirmed' => 1,
            'attempts' => 0,
            'locked' => 0,
        ));
    }
}