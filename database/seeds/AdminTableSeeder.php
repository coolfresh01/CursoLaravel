<?php

use Illuminate\Database\Seeder;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTableSeeder
 *
 * @author Carlos Mejia
 */
class AdminTableSeeder extends Seeder {
    
    public function run() {
        
        //DB::table('users')->delete();
        
        \DB::table('users')->insert([
            'first_name'  => 'Carlos',
            'last_name'  => 'Mejia',
            'email' =>  'carlos.mejia@datacenter.com.co',
            'password' => \Hash::make('123456'),
            'type' => 'admin'
            ]);
        
        /*\DB::table('user_profiles')->insert([
            'user_id'   => $id,
            'bio'       => $faker->paragraph(rand(2, 5)),
            'website'   => 'http://www.'.$faker->domainName,
            'twitter'   => 'http://www.twitter.com/'.$faker->userName,
            'birthday'  => $faker->dateTimeBetween('-45 years','-15 years')->format('Y-m-d')
            ]);*/
        
    }
}
