<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => date($format = 'y-m-d', $max = 2099),
            'user_id' => random_int(1, User::count()),
        ];
    }
    //  public function configure()
    //  {
    //     return $this->afterCreating(function(Order $order) {
    //         $product = Product::inRandomOrder()->take(rand(1,5))->pluck('id');
    //         $order->products()->attach($product);
    //     });
    //  }
}
