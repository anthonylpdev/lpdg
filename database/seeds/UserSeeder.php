<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'anthony',
            'email' => 'anthony.lopezpro@gmail.com',
            'password' => '$2y$10$Otl6XaM/FoFHP2YTIeduqO7wc24k9/BgBf7Ip791Qy5sN9EaNTNv2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        factory(App\User::class, 5)->create();
    }
}
