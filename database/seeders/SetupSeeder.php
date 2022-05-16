<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@admin.com')->exists()) {
            Artisan::call('adminetic:dummy');
        }
        Artisan::call('make:permission Category --all');
        Artisan::call('make:permission Company --all');

        // Adding Access Token
        $user = User::where('email', 'admin@admin.com')->first();
        if (!is_null($user)) {
            $user->update([
                'access_token' => "gDhzjK1rTW9Xn4WEzVvwzoxLdtBd71"
            ]);
        }
    }
}
