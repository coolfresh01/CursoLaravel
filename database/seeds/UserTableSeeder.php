<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
class UserTableSeeder extends Seeder {
    
    public function run() {
        
        $faker = Faker::create();
        
        for($i=0; $i <= 50; $i++) {
        
            $id = \DB::table('users')->insertGetId([
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'email'         => $faker->unique()->email,
            'password'      => \Hash::make('secret'),
            'type'          => $faker->randomElement(['user','editor','contributor','subscriber'])
            ]);
            
            \DB::table('user_profiles')->insert([
            'user_id'   => $id,
            'bio'       => $faker->paragraph(rand(2, 5)),
            'website'   => 'http://www.'.$faker->domainName,
            'twitter'   => 'http://www.twitter.com/'.$faker->userName,
            'birthday'  => $faker->dateTimeBetween('-45 years','-15 years')->format('Y-m-d')
            ]);
            
        }
        
        
    }
}
