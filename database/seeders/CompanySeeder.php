<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'category_id' => 1,
                'title' => "ABC Company",
                'description' => "",
                'status' => 1,
            ],
            [
                'category_id' => 2,
                'title' => "XYZ Company",
                'description' => "",
                'status' => 1,
            ],
        ];

        DB::table('companies')->insert($companies);
    }
}
