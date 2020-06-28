<?php

use Illuminate\Database\Seeder;

class OrderUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        App\Order::all()->each(function ($order) use ($users) {
            $order->user()->associate($users->random());
            $order->save();
        });
    }
}
