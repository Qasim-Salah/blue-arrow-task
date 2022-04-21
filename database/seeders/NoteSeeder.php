<?php

namespace Database\Seeders;

use App\Models\Note as NoteModel;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{

    public function run()
    {
         NoteModel::factory(20)->create();
    }
}
