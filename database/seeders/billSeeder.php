<?php

namespace Database\Seeders;

use App\Models\BillingType;
use Illuminate\Database\Seeder;

class billSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bills = [
            ['type' => 'metered'],
            ['type' => 'reccuring'],
        ];
        foreach ($bills as $bill) {
            BillingType::query()->create($bill);
        }
    }
}
