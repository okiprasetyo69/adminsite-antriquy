<?php

use Illuminate\Database\Seeder;

class DashboardMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sys_menu')->insert([
            [
                'name' => 'Data Kehadiran Pegawai Bulanan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 1
            ],
            [
                'name' => 'Data Kehadiran Per Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 1
            ],
            [
                'name' => 'Data Kehadiran Staff Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 1
            ],
            [
                'name' => 'Data Kehadiran Crew',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 1
            ],
            [
                'name' => 'Data Log Aktivitas Harian',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 1
            ],
        ]);
    }
}
