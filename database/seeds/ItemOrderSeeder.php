<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ItemOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = App\Item::all();

        App\Order::all()->each(function ($order) use ($items) {
            $order->items()->attach(
                $items->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'quantity' => 1,
                    'comment' => 'Aenean semper, mi non efficitur semper, risus tortor tincidunt nisl.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );
        });
    }
}
