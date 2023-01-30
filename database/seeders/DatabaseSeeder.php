<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Client;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        Employee::create([
            'nik' => '22101408001',
            'name' => 'Rafli Unpam',
            'email' => 'rafli.unpam@gmail.com',
            'tempat_lahir' => 'Tangerang',
            'tanggal_lahir' => '1999-08-14',
            'jenis_kelamin' => 'Pria',
            'alamat_ktp' => 'Kp. Parung Serab RT002/RW010 Kel. Sudimara Selatan Kec. Ciledug Kota Tangerang',
            'alamat_domisili' => 'Kp. Parung Serab RT002/RW010 Kel. Sudimara Selatan Kec. Ciledug Kota Tangerang',
            'agama' => 'Islam',
            'no_tlp' => '0895337323544',
            'jabatan' => 'CEO',
            'pendidikan' => 'Strata 3 (Doctoral)'
        ]);

        User::create([
            'employee_id' => '1',
            'nik' => '221014080001',
            'password' => bcrypt('12345'),
            'level_user' => 'admin'
        ]);

        // User::create([
        //     'name' => 'Sopian Bahrul',
        //     'nik' => '221010010002',
        //     'email' => 'manajersales@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'no_tlp' => '0895337323544',
        //     'level_user' => 'manajer_sales',
        //     'jabatan' => 'Manajer Sales'
        // ]);

        // User::create([
        //     'name' => 'Ahmad Mubaroq',
        //     'nik' => '221030100003',
        //     'email' => 'sales@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'no_tlp' => '0895337323544',
        //     'level_user' => 'tim_sales',
        //     'jabatan' => 'SVV'
        // ]);

        // User::create([
        //     'name' => 'Maulana Husen',
        //     'nik' => '221021080004',
        //     'email' => 'manajerproyek@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'no_tlp' => '0895337323544',
        //     'level_user' => 'manajer_proyek',
        //     'jabatan' => 'Manajer Proyek'
        // ]);

        // User::create([
        //     'name' => 'Sauqi Soleh',
        //     'nik' => '221025020005',
        //     'email' => 'proyek@gmail.com',
        //     'password' => bcrypt('12345'),
        //     'no_tlp' => '0895337323544',
        //     'level_user' => 'tim_proyek',
        //     'jabatan' => 'SVV'
        // ]);
        

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Category::create([
            'name' => 'Desain Web',
            'slug' => 'desain-web',
        ]);

        

        Post::factory(20)->create();

        Client::factory(5)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'category_id' => '1',
        //     'user_id' => '1',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi fugit necessitatibus tempore cumque. Ex inventore consectetur illo quod, nisi ipsum error officia odio sequi expedita necessitatibus excepturi molestiae voluptatem nostrum sint iure qui facere laboriosam voluptatibus reprehenderit.',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi fugit necessitatibus tempore cumque. Ex inventore consectetur illo quod, nisi ipsum error officia odio sequi expedita necessitatibus excepturi molestiae voluptatem nostrum sint iure qui facere laboriosam voluptatibus reprehenderit. Aliquam asperiores, dolor fugit voluptatum commodi in porro, ratione quas unde vitae aliquid</p><p>nisi inventore modi qui laudantium voluptatibus incidunt, consequatur non dolores consectetur vero alias! Perferendis quidem culpa hic nulla, vel fugiat sit accusamus cupiditate ipsum minima aliquam? Laboriosam officia consectetur facilis ipsa nulla eius molestiae ducimus similique, et beatae nobis aliquam assumenda aperiam, quos debitis cum voluptatem delectus libero omnis. Commodi nesciunt maxime cum quaerat veritatis vero natus beatae eius at! Debitis vel illum doloremque. Dignissimos aut dicta enim necessitatibus? Hic voluptatum in, dolorum facere illum odio maxime excepturi fugit iure dolorem at quo sunt minima necessitatibus quia similique aperiam eius, magnam, magni sit? Culpa tempore officia impedit itaque fuga enim?</p>'
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'category_id' => '2',
        //     'user_id' => '1',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi fugit necessitatibus tempore cumque. Ex inventore consectetur illo quod, nisi ipsum error officia odio sequi expedita necessitatibus excepturi molestiae voluptatem nostrum sint iure qui facere laboriosam voluptatibus reprehenderit.',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi fugit necessitatibus tempore cumque. Ex inventore consectetur illo quod, nisi ipsum error officia odio sequi expedita necessitatibus excepturi molestiae voluptatem nostrum sint iure qui facere laboriosam voluptatibus reprehenderit. Aliquam asperiores, dolor fugit voluptatum commodi in porro, ratione quas unde vitae aliquid</p><p>nisi inventore modi qui laudantium voluptatibus incidunt, consequatur non dolores consectetur vero alias! Perferendis quidem culpa hic nulla, vel fugiat sit accusamus cupiditate ipsum minima aliquam? Laboriosam officia consectetur facilis ipsa nulla eius molestiae ducimus similique, et beatae nobis aliquam assumenda aperiam, quos debitis cum voluptatem delectus libero omnis. Commodi nesciunt maxime cum quaerat veritatis vero natus beatae eius at! Debitis vel illum doloremque. Dignissimos aut dicta enim necessitatibus? Hic voluptatum in, dolorum facere illum odio maxime excepturi fugit iure dolorem at quo sunt minima necessitatibus quia similique aperiam eius, magnam, magni sit? Culpa tempore officia impedit itaque fuga enim?</p>'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'category_id' => '3',
        //     'user_id' => '1',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi fugit necessitatibus tempore cumque. Ex inventore consectetur illo quod, nisi ipsum error officia odio sequi expedita necessitatibus excepturi molestiae voluptatem nostrum sint iure qui facere laboriosam voluptatibus reprehenderit.',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi fugit necessitatibus tempore cumque. Ex inventore consectetur illo quod, nisi ipsum error officia odio sequi expedita necessitatibus excepturi molestiae voluptatem nostrum sint iure qui facere laboriosam voluptatibus reprehenderit. Aliquam asperiores, dolor fugit voluptatum commodi in porro, ratione quas unde vitae aliquid</p><p>nisi inventore modi qui laudantium voluptatibus incidunt, consequatur non dolores consectetur vero alias! Perferendis quidem culpa hic nulla, vel fugiat sit accusamus cupiditate ipsum minima aliquam? Laboriosam officia consectetur facilis ipsa nulla eius molestiae ducimus similique, et beatae nobis aliquam assumenda aperiam, quos debitis cum voluptatem delectus libero omnis. Commodi nesciunt maxime cum quaerat veritatis vero natus beatae eius at! Debitis vel illum doloremque. Dignissimos aut dicta enim necessitatibus? Hic voluptatum in, dolorum facere illum odio maxime excepturi fugit iure dolorem at quo sunt minima necessitatibus quia similique aperiam eius, magnam, magni sit? Culpa tempore officia impedit itaque fuga enim?</p>'
        // ]);
        
    }
}
