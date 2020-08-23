<?php

use Illuminate\Database\Seeder;

class SysMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sys_menu')->insert([
            /*[
                'name' => 'Dashboard',
                'icon' => '../../img/custom/dashboard.png',
                'icon_active' => '../../img/custom/dashboard.png',
                'position' => 1,
                'parent_id' => 0
            ],
            [
                'name' => 'Kehadiran',
                'icon' => '../../img/custom/kehadiran.png',
                'icon_active' => '../img/custom/active/kehadiran.png',
                'position' => 2,
                'parent_id' => 0
            ],
            [
                'name' => 'Penggajian',
                'icon' => '../../img/custom/penggajian.png',
                'icon_active' => '../img/custom/active/penggajian.png',
                'position' => 3,
                'parent_id' => 0
            ],
            [
                'name' => 'Perizinan',
                'icon' => '../../img/custom/perizinan.png',
                'icon_active' => '../img/custom/active/perizinan.png',
                'position' => 4,
                'parent_id' => 0
            ],
            [
                'name' => 'Pengaturan',
                'icon' => '../../img/custom/pengaturan.png',
                'icon_active' => '../img/custom/active/pengaturan.png',
                'position' => 5,
                'parent_id' => 0
            ],
            [
                'name' => 'Kasbon',
                'icon' => '../../img/custom/kasbon.png',
                'icon_active' => '../img/custom/active/kasbon.png',
                'position' => 6,
                'parent_id' => 0
            ],
            [
                'name' => 'Personalia',
                'icon' => '../../img/custom/personalia.png',
                'icon_active' => '../img/custom/active/personalia.png',
                'position' => 7,
                'parent_id' => 0
            ],
            [
                'name' => 'Jadwal',
                'icon' => '../../img/custom/jadwal.png',
                'icon_active' => '../img/custom/active/jadwal.png',
                'position' => 8,
                'parent_id' => 0
            ],
            [
                'name' => 'Potongan',
                'icon' => '../../img/custom/personalia.png',
                'icon_active' => '../img/custom/active/personalia.png',
                'position' => 9,
                'parent_id' => 0
            ],
            [
                'name' => 'Perusahaan',
                'icon' => '../../img/custom/personalia.png',
                'icon_active' => '../img/custom/active/personalia.png',
                'position' => 10,
                'parent_id' => 0
            ],
            [
                'name' => 'Lembur',
                'icon' => '../../img/custom/personalia.png',
                'icon_active' => '../img/custom/active/personalia.png',
                'position' => 11,
                'parent_id' => 0
            ],
            [
                'name' => 'Approval Cuti GM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Cuti HR',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Cuti OM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Cuti SPV',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Cuti Crew',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Cuti Finance',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Izin GM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Izin HR',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Izin OM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Izin SPV',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Izin Crew',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Approval Izin Finance',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Kehadiran',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 2
            ],
            [
                'name' => 'Anggota',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 2
            ],
            [
                'name' => 'Pola Kerja',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Perizinan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Departemen',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Jabatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Public Holiday',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Kebijakan Absensi',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Data Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Jadwal Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 1,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Mengubah Komponen Gaji Pegawai',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 3
            ],
            [
                'name' => 'Approval Perubahan Gaji Pegawai',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 3
            ],

            
            //Pengaturan Pola Kerja
            [
                'name' => 'Melihat Daftar Pola Kerja',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Pola Kerja',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Pola Kerja',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Pola Kerja',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Pola Kerja',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],


            //Pengaturan Perizinan
            [
                'name' => 'Melihat Daftar Aturan Perizinan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Aturan Perizinan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Aturan Perizinan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Aturan Perizinan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Aturan Perizinan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Komponen Potongan Gaji di Perizinan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            //Pengaturan Departemen
            [
                'name' => 'Melihat Daftar Departemen',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Departemen',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Departemen',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Departemen',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Departemen',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            //Pengaturan Jabatan
            [
                'name' => 'Melihat Daftar Jabatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Jabatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Jabatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Jabatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Jabatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            //Pengaturan Jenis Gaji
            [
                'name' => 'Melihat Daftar Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Komponen Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            [
                'name' => 'Hapus Komponen Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            [
                'name' => 'Edit Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Jenis Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            //Pengaturan Jabatan
            [
                'name' => 'Melihat Daftar Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Outlet',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            //Pengaturan Jabatan
            [
                'name' => 'Melihat Daftar Aturan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Aturan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Aturan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Aturan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Aturan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],

            //Pengaturan Jabatan
            [
                'name' => 'Melihat Daftar Public Holiday',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat Detail Public Holiday',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Public Holiday',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Public Holiday',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Public Holiday',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Melihat BPJS Ketenagakerjaan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Melihat BPJS Kesehatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Edit BPJS Ketenagakerjaan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Edit BPJS Kesehatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Hapus BPJS Ketenagakerjaan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Hapus BPJS Kesehatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Add BPJS Ketenagakerjaan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Add BPJS Kesehatan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'name' => 'Melihat Kelola Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Melihat Riwayat Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Detail Riwayat Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Add Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Detail Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Edit Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Hapus Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Melihat Bayar Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],

            //Penjadwalan
            [
                'name' => 'Melihat Seluruh Daftar Penjadwalan',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Melihat Daftar Penjadwalan Disetujui',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Melihat Detail Jadwal',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Tambah Jadwal',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Edit Jadwal',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Hapus Jadwal',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Kirim Jadwal',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Approval Jadwal',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ], */

            //Perizinan
            // [
            //     'name' => 'Tambah Pengajuan Izin',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Izin GM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Izin HR',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Izin OM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Izin SPV',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Izin Crew',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Izin',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Izin GM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Izin HR',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Izin OM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Izin SPV',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Izin Crew',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Detail Pengajuan Izin',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Hapus Pengajuan Izin',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],

            
            /*[
                'name' => 'Tambah Pengajuan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Tambah Pengajuan Cuti GM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Tambah Pengajuan Cuti HR',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Tambah Pengajuan Cuti OM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Tambah Pengajuan Cuti SPV',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Tambah Pengajuan Cuti Crew',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Melihat Daftar Pengajuan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Melihat Daftar Pengajuan Cuti GM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Melihat Daftar Pengajuan Cuti HR',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Melihat Daftar Pengajuan Cuti OM',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Melihat Daftar Pengajuan Cuti SPV',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Melihat Daftar Pengajuan Cuti Crew',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Melihat Detail Pengajuan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Hapus Pengajuan Cuti',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 4
            ],
            [
                'name' => 'Tolak Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Setujui Kasbon',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 6
            ],
            [
                'name' => 'Melihat Kehadiran',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 20
            ],
            [
                'name' => 'Unggah Data Kehadiran',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 20
            ],
            [
                'name' => 'Edit Data Kehadiran',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 20
            ],
            [
                'name' => 'Detail Kehadiran',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 20
            ],
            [
                'name' => 'Kirim Data Kehadiran',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 20
            ],
            [
                'name' => 'Detail Approval Absensi',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 2
            ],
            [
                'name' => 'Detail Laporan Kehadiran',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 2
            ],

            //data personalia
            [
                'name' => 'Melihat Daftar Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Lihat Detail Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Unduh Data Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Unggah Data Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Tambah Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Aktifasi Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Edit Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Hapus Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Lihat Penggajian Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Edit Penggajian Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Approval Penggajian Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Lihat Pengalaman Kerja Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Edit Pengalaman Kerja Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Lihat Riwayat Kasbon Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Edit Riwayat Kasbon Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Lihat Riwayat Perizinan Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            ],
            [
                'name' => 'Edit Riwayat Perizinan Personalia',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 7
            // [
            //     'name' => 'Melihat Daftar Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Lihat Detail Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Unduh Data Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Unggah Data Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Tambah Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Aktifasi Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Edit Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Hapus Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Lihat Penggajian Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Edit Penggajian Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Approval Penggajian Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Lihat Pengalaman Kerja Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Edit Pengalaman Kerja Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Lihat Riwayat Kasbon Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Edit Riwayat Kasbon Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Lihat Riwayat Perizinan Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Edit Riwayat Perizinan Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 7
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Cuti',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Cuti GM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Cuti HR',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Cuti OM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Cuti SPV',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tambah Pengajuan Cuti Crew',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Cuti',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Cuti GM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Cuti HR',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Cuti OM',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Cuti SPV',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Daftar Pengajuan Cuti Crew',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Melihat Detail Pengajuan Cuti',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Hapus Pengajuan Cuti',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 4
            // ],
            // [
            //     'name' => 'Tolak Kasbon',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 6
            // ],
            // [
            //     'name' => 'Setujui Kasbon',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 6
            // ],
            // [
            //     'name' => 'Melihat Kehadiran',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 20
            // ],
            // [
            //     'name' => 'Unggah Data Kehadiran',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 20
            // ],
            // [
            //     'name' => 'Edit Data Kehadiran',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 20
            // ],
            // [
            //     'name' => 'Detail Kehadiran',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 20
            // ],
            // [
            //     'name' => 'Kirim Data Kehadiran',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 20
            // ],
            // [
            //     'name' => 'Detail Approval Absensi',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 2
            // ],
            // [
            //     'name' => 'Detail Laporan Kehadiran',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 2
            // ],


            //NEW MODULES#1
            // [
            //     'name' => 'Audit Trail',
            //     'icon' => '../../img/custom/audit_trail.svg',
            //     'icon_active' => '../../img/custom/active/audit_trail.svg',
            //     'position' => 12,
            //     'parent_id' => 0
            // ],

            //modul penggajian
            // [
            //     'name' => 'Lihat Daftar Penggajian',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Lihat Daftar Pengeluaran Outlet',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Edit Penggajian',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Hapus Penggajian',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Registrasi Penggajian',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Lihat Detail Penggajian',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Unduh Slip Gaji Satu Outlet',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Unduh Slip Gaji per-personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Kirim Data Penggajian',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            // [
            //     'name' => 'Approval Penggajian Personalia',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 3
            // ],
            [
                'name' => 'Melihat Daftar Kebijakan Absensi',
            [
                'name' => 'Melihat Daftar Log Aktivitas',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
                'parent_id' => 175
            ],
            [
                'name' => 'Melihat Detail Kebijakan Absensi',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Kebijakan Absensi',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Tambah Hari Kerja Kebijakan Absensi',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Edit Kebijakan Absensi',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Hapus Kebijakan Absensi',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 5
            ],
            [
                'name' => 'Ubah Status Pembayaran Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 3
            ],*/
            // [
            //     'name'  => 'Melihat Daftar Pengajuan Lembur Kolektif',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 11
            // ],
            // [
            //     'name'  => 'Melihat Daftar Pengajuan Lembur Per Pegawai',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 11
            // ],
            // [
            //     'name'  => 'Tambah Pengajuan Lembur',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 11
            // ],
            // [
            //     'name'  => 'Edit Pengajuan Lembur',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 11
            // ],
            // [
            //     'name'  => 'Hapus Pengajuan Lembur',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 11
            // ],
            // [
            //     'name'  => 'Detail Pengajuan Lembur',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 11
            // ],

            // -- Pengaturan Acara --
            // -- Sidebar Menu --
            // [
            //     'name' => 'Acara',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 1,
            //     'is_secure' => 1,
            //     'parent_id' => 5
            // ],

            // // -- Menu --
            // [
            //     'name' => 'Melihat Daftar Data Pengaturan Acara',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 5
            // ],
            // [
            //     'name' => 'Melihat Detail Pengaturan Acara',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 5
            // ],
            // [
            //     'name' => 'Edit Pengaturan Acara',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 5
            // ],
            // [
            //     'name' => 'Hapus Pengaturan Acara',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 5
            // ],
            // [
            //     'name' => 'Tambah Pengaturan Acara',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 5
            // ],


            // -- NEW MODULE#2 --
            // [
            //     'name' => 'Kalender',
            //     'icon' => '../../img/custom/kalender.png',
            //     'icon_active' => '../img/custom/active/kalender.png',
            //     'position' => 13,
            //     'is_visible' => 1,
            //     'parent_id' => 0
            // ],
            // [
            //     'name' => 'Melihat Kalender Kegiatan',
            //     'icon' => '',
            //     'icon_active' => '',
            //     'is_visible' => 0,
            //     'is_secure' => 1,
            //     'parent_id' => 207
            // ],

            // -- BPJS => Potongan
            [
                'id'    => 209,
                'name' => 'Melihat Daftar Data Potongan Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                //'Melihat Riwayat Potongan Gaji' pada variable parent_id bernilai 9 sehingga ditampilkan pada bagian potongan (pada pengaturan hak akses jabatan)
                'id'    => 210,
                'name' => 'Melihat Riwayat Potongan Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'id'    => 211,
                'name' => 'Tambah Potongan Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'id'    => 212,
                'name' => 'Edit Potongan Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
            [
                'id'    => 213,
                'name' => 'Hapus Potongan Gaji',
                'icon' => '',
                'icon_active' => '',
                'is_visible' => 0,
                'is_secure' => 1,
                'parent_id' => 9
            ],
        ]);
    }
}
