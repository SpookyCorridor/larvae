<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Tag; 

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Tag::truncate(); 

        factory(Tag::class, 40)->create(); 
        // $this->call(UserTableSeeder::class);
        
        Model::reguard();
    }
}
