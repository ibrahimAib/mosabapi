<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customersData = [
            [
                'name' => 'جدي',
                'phone' => '0505236139',
            ],
            [
                'name' => 'جده',
                'phone' => '0555236139',
            ],
            [
                'name' => 'تركي',
                'phone' => '0501211945',
            ],
            [
                'name' => 'نسيبة',
                'phone' => '0552285255',
            ],
            [
                'name' => 'سارة',
                'phone' => '0555422868',
            ],
            [
                'name' => 'آسية',
                'phone' => '0555422856',
            ],
            [
                'name' => 'أفنان',
                'phone' => '0500507704',
            ],
            [
                'name' => 'منيرة',
                'phone' => '0530533356',
            ],
            [
                'name' => 'رزان',
                'phone' => '0536501670',
            ],
            [
                'name' => 'إبراهيم',
                'phone' => '0533301365',
            ],
            [
                'name' => 'إيلاف',
                'phone' => '0502800893',
            ],
            [
                'name' => 'سما',
                'phone' => '0559644119',
            ],
            [
                'name' => 'ناصر',
                'phone' => '0558480889',
            ],
        ];

        foreach ($customersData as $data) {
            Customer::factory()->withData($data)->create();
        }
    }
}
