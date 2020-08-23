<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('set_perusahaans')->insert([
            'id' => 1,
            'nama' => 'admin',
        ]);

        DB::table('users')->insert([
            'id_pegawai' => 1,
            'name' => 'Admin Dev',
            'email' => 'admin.payroll.dev@gmail.com',
            'id_perusahaan' => 1,
            'password' => bcrypt('bigio.id!'),
        ]);

        // DB::table('users')->insert([
        //     'id_pegawai' => 2,
        //     'name' => 'OM 1',
        //     'email' => 'om1@gmail.com',
        //     'id_perusahaan' => 1,
        //     'password' => bcrypt('bigio.id!'),
        // ]);

        // DB::table('users')->insert([
        //     'id_pegawai' => 3,
        //     'name' => 'SPV 1',
        //     'email' => 'spv1@gmail.com',
        //     'id_perusahaan' => 1,
        //     'password' => bcrypt('bigio.id!'),
        // ]);

        // DB::table('users')->insert([
        //     'id_pegawai' => 4,
        //     'name' => 'HR 1',
        //     'email' => 'hr1@gmail.com',
        //     'id_perusahaan' => 1,
        //     'password' => bcrypt('bigio.id!'),
        // ]);

        // DB::table('users')->insert([
        //     'id_pegawai' => 5,
        //     'name' => 'CREW 1',
        //     'email' => 'crew1@gmail.com',
        //     'id_perusahaan' => 1,
        //     'password' => bcrypt('bigio.id!'),
        // ]);

        // DB::table('users')->insert([
        //     'id_pegawai' => 6,
        //     'name' => 'FINANCE 1',
        //     'email' => 'finance1@gmail.com',
        //     'id_perusahaan' => 1,
        //     'password' => bcrypt('bigio.id!'),
        // ]);

        // DB::table('users')->insert([
        //     'id_pegawai' => 7,
        //     'name' => 'GM 1',
        //     'email' => 'gm1@gmail.com',
        //     'id_perusahaan' => 1,
        //     'password' => bcrypt('bigio.id!'),
        // ]);
    }
}
