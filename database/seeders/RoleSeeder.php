<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeysCostraints();
        Role::truncate();
        Schema::enableForeignKeysCostraints();

        $data = [
            ['name' => 'Admin'],
            ['name' => 'Asesi'],
            ['name' => 'Asesor'],
        ];

        foreach ($data as $value) {
            Role::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
