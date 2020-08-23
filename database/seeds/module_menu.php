<?php

use Illuminate\Database\Seeder;

class module_menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_menus')->insert([
            'id_module' => 2,
            'nama_menu' => 'Kehadiran',
            'kode_menu' => 'kehadiran',
            'url' => ''
        ]);
        DB::table('module_menus')->insert([
            'id_module' => 2,
            'nama_menu' => 'Anggota',
            'kode_menu' => 'anggota',
            'url' => '/anggota'
        ]);
        DB::table('module_menus')->insert([
            'id_module' => 5,
            'nama_menu' => 'Pola Kerja',
            'kode_menu' => 'pola_kerja',
            'url' => '/pola_kerja'
        ]);
        DB::table('module_menus')->insert([
            'id_module' => 5,
            'nama_menu' => 'Perizinan',
            'kode_menu' => 'perizinan',
            'url' => '/perizinan'
        ]);
        DB::table('module_menus')->insert([
            'id_module' => 5,
            'nama_menu' => 'Departemen',
            'kode_menu' => 'departemen',
            'url' => '/departemen'
        ]);
        DB::table('module_menus')->insert([
            'id_module' => 5,
            'nama_menu' => 'Jabatan',
            'kode_menu' => 'jabatan',
            'url' => '/jabatan'
        ]);

        DB::table('module_menus')->insert([
            'id_module' => 5,
            'nama_menu' => 'Jenis Gaji',
            'kode_menu' => 'jenis_gaji',
            'url' => '/jenis_gaji'
        ]);

        DB::table('module_menus')->insert([
            'id_module' => 5,
            'nama_menu' => 'Outlet',
            'kode_menu' => 'outlet',
            'url' => '/outlet'
        ]);

        DB::table('module_menus')->insert([
            'id_module' => 5,
            'nama_menu' => 'Cuti',
            'kode_menu' => 'cuti',
            'url' => '/cuti'
        ]);

        DB::table('module_menus')->insert([
            'id_module' => 7,
            'nama_menu' => 'Data Personalia',
            'kode_menu' => 'personalia',
            'url' => ''
        ]);

        DB::table('module_menus')->insert([
            'id_module' => 7,
            'nama_menu' => 'Jadwal Personalia',
            'kode_menu' => 'jadwal',
            'url' => '/jadwal'
        ]);
    }
}
