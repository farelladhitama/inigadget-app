<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OsTypeSeeder extends Seeder
{
    public function run(): void
    {
        $os = ['Android', 'iOS'];

        foreach ($os as $name) {
            DB::table('os_types')->updateOrInsert(
                ['name' => $name],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
