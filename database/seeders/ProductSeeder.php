<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Nonaktifkan constraint
        DB::table('products')->truncate();          // Hapus isi table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Aktifkan kembali constraint

        // Lanjutkan seeding...
        $faker = Faker::create();
        $brands = DB::table('brands')->pluck('id')->toArray();
        $osTypes = DB::table('os_types')->pluck('id')->toArray();

        foreach (range(1, 5) as $i) {
            $name = $faker->unique()->words(3, true);
            DB::table('products')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 1500000, 20000000),
                'stock' => $faker->numberBetween(5, 50),
                'image_url' => $faker->imageUrl(640, 640, 'technology', true, 'hp'),
                'brand_id' => $faker->randomElement($brands),
                'os_type_id' => $faker->randomElement($osTypes),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
