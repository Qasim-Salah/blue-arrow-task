<?php

namespace Database\Seeders;

use App\Models\User as UserModel;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
         UserModel::factory(20)->create();
    }
}
