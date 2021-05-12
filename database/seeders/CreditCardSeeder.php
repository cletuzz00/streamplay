<?php

namespace Database\Seeders;

use App\Models\CreditCard;
use Illuminate\Database\Seeder;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = [
            ['name' => 'john doe', 'number' => '1234567890', 'expiry' => '12/25', 'cvv' => 783],
            ['name' => 'jane doe', 'number' => '0987654321', 'expiry' => '04/25', 'cvv' => 123],
        ];
        foreach ($cards as $card) {
            CreditCard::query()->create($card);
        }
    }
}
