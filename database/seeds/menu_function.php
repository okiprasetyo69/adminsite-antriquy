<?php

use Illuminate\Database\Seeder;

class menu_function extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('menu_functions')->insert([
            'id_parent' => 1,//dashboard
            'type_parent' => 'modul',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 1,
            'type_parent' => 'modul',
            'nama_fungsi' => 'read',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 1,
            'type_parent' => 'modul',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 1,
            'type_parent' => 'modul',
            'nama_fungsi' => 'delete',
        ]);


        DB::table('menu_functions')->insert([
            'id_parent' => 6,//kasbon
            'type_parent' => 'modul',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'modul',
            'nama_fungsi' => 'read',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'modul',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'modul',
            'nama_fungsi' => 'delete',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'modul',
            'nama_fungsi' => 'status',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 1,//kehadiran kehadiran
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 1,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 1,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 1,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 1,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);



        DB::table('menu_functions')->insert([
            'id_parent' => 2,//kehadiran kehadiran
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 2,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 2,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 2,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 2,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 3,//penggajian
            'type_parent' => 'modul',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'modul',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'modul',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'modul',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'modul',
            'nama_fungsi' => 'delete',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 4,//perizinan
            'type_parent' => 'modul',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'modul',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'modul',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'modul',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'modul',
            'nama_fungsi' => 'delete',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 3,//pola kerja
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 3,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 4,//perizinan
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 4,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 5,//departemen
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 5,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 5,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 5,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 5,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);


        DB::table('menu_functions')->insert([
            'id_parent' => 6,//jabatan
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 6,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);


        DB::table('menu_functions')->insert([
            'id_parent' => 7,//jenis gaji
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 7,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 7,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 7,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 7,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);


        DB::table('menu_functions')->insert([
            'id_parent' => 8,//outlet
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 8,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 8,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 8,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 8,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);


        DB::table('menu_functions')->insert([
            'id_parent' => 9,//personalia
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 9,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 9,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 9,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 9,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 10,//jadwal
            'type_parent' => 'menu',
            'nama_fungsi' => 'create',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 10,
            'type_parent' => 'menu',
            'nama_fungsi' => 'read',
        ]);

        DB::table('menu_functions')->insert([
            'id_parent' => 10,
            'type_parent' => 'menu',
            'nama_fungsi' => 'status',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 10,
            'type_parent' => 'menu',
            'nama_fungsi' => 'update',
        ]);
        DB::table('menu_functions')->insert([
            'id_parent' => 10,
            'type_parent' => 'menu',
            'nama_fungsi' => 'delete',
        ]);

    }
}
