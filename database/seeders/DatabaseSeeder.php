<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Kost;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            "name" => "Dikki AP",
            "username" => "dikki.ap",
            "phone_number" => "082369220645",
            "email" => "dikki@gmail.com",
            "password" => bcrypt(123),
            "roles" => 1
        ]);

        User::create([
            "name" => "Dimas AP",
            "username" => "dimas.ap",
            "phone_number" => "082273312252",
            "email" => "dimas.ap@gmail.com",
            "password" => bcrypt(123123),
            "roles" => 0
        ]);

        Category::create([
            "name" => "Semua Kategori"
        ]);

        Category::create([
            "name" => "Kost"
        ]);

        Category::create([
            "name" => "Apartemen"
        ]);

        Category::create([
            "name" => "Hotel"
        ]);

        Kost::create([
            "name" => "Kost Harian Surabaya",
            "price" => "1300",
            "period_time" => "Bulan",
            "rating" => 4,
            "districts" => "Sawahan",
            "city" => "Surabaya",
            "address" => "Simo Gunung Kramat Timur I A No.12, Putat Jaya, Kec. Sawahan, Kota SBY, Jawa Timur 60255",
            "url_location" => "https://goo.gl/maps/z2eLDuo6oVHs6yLC6",
            "phone_number" => "08123012658",
            "bathroom" => 1,
            "bed" => 1,
            "ac" => 0,
            "category_id" => 2
        ]);

        Kost::create([
            "name" => "The Lively Hotel",
            "price" => "145",
            "period_time" => "Hari",
            "rating" => 4,
            "districts" => "Batang Kuis",
            "city" => "Deli Serdang",
            "address" => "Jl. Sultan Serdang, Tumpatan Nibung, Kec. Batang Kuis, Kabupaten Deli Serdang, Sumatera Utara 20372",
            "url_location" => "https://goo.gl/maps/dtUpXpiHfBgX3Wv88",
            "phone_number" => "06180110789",
            "bathroom" => 1,
            "bed" => 1,
            "ac" => 1,
            "category_id" => 4
        ]);
    }
}
