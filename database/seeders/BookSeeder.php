<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            [
                'category_id' => 1,
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'publisher' => 'Gramedia',
                'year' => '2014',
                'isbn' => '12345678910',
                'stock' => 3,
                'status' => true,
                'description' => 'Raib adalah gadis remaja biasa yang bisa menghilang...',
                'cover_image' => 'covers/01JTM0ZX81N8HSXT4BDNJEBGT.jpg',
                'created_at' => Carbon::create('2025', '05', '07', '05', '38', '18'),
                'updated_at' => Carbon::create('2025', '05', '11', '16', '20', '23'),
            ],
            [
                'category_id' => 1,
                'title' => 'Bulan',
                'author' => 'Tere Liye',
                'publisher' => 'Gramedia',
                'year' => '2015',
                'isbn' => '12345678911',
                'stock' => 0,
                'status' => true,
                'description' => 'Petualangan Raib, Seli, dan Ali berlanjut setelah ...',
                'cover_image' => 'covers/01JTM22JT1JJENATKWP8R42SM.jpg',
                'created_at' => Carbon::create('2025', '05', '07', '05', '38', '54'),
                'updated_at' => Carbon::create('2025', '05', '11', '16', '21', '27'),
            ],
            [
                'category_id' => 1,
                'title' => 'Matahari',
                'author' => 'Tere Liye',
                'publisher' => 'Gramedia',
                'year' => '2016',
                'isbn' => '12345678912',
                'stock' => 3,
                'status' => false,
                'description' => 'Setelah peristiwa menegangkan di Klan Matahari, Ra...',
                'cover_image' => 'covers/01JTM2XBVJ6AT96YMZXJPMS2.jpg',
                'created_at' => Carbon::create('2025', '05', '07', '05', '39', '21'),
                'updated_at' => Carbon::create('2025', '05', '11', '16', '21', '48'),
            ],
            [
                'category_id' => 1,
                'title' => 'Bintang',
                'author' => 'Tere Liye',
                'publisher' => 'Gramedia',
                'year' => '2017',
                'isbn' => '12345678913',
                'stock' => 5,
                'status' => true,
                'description' => 'Bintang membawa Raib, Seli, dan Ali pada misi pali...',
                'cover_image' => 'covers/01JTSEXHXT9ZZX6CNJB6FZBGM3.jpg',
                'created_at' => Carbon::create('2025', '05', '09', '02', '45', '15'),
                'updated_at' => Carbon::create('2025', '05', '11', '16', '22', '29'),
            ],
        ]);
    }
}
