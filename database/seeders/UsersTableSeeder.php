<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'Автор не известен',
                'email'     => 'author_unknown@g.g',
                'password'  => Hash::make(Str::random(16)),
            ],
            [
                'name'      => 'Автор',
                'email'     => 'autor1@g.g',
                'password'  => Hash::make(123123),
            ],

        ];
        DB::table('users')->insert($data);
    }
}
