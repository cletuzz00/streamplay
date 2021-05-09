<?php

namespace Database\Seeders;

use App\Models\SubscriptionType;
use Illuminate\Database\Seeder;

class subSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subs = [
            ['type' => 'hourly'],
            ['type' => 'daily'],
            ['type' => 'weekly'],
            ['type' => 'monthly'],
            ['type' => 'yearly'],

        ];
        foreach ($subs as $sub) {
            SubscriptionType::query()->create($sub);
        }
    }
}
