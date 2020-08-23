<?php

use Illuminate\Database\Seeder;

class SysMenuApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sys_menu_application')->insert([
            // [
            //     'menu_id' => 1,
            //     'action' => '/home'
            // ],
            // [
            //     'menu_id' => 2,
            //     'action' => '/kehadiran'
            // ],
            // [
            //     'menu_id' => 3,
            //     'action' => '/penggajian'
            // ],
            // [
            //     'menu_id' => 4,
            //     'action' => '/perizinan'
            // ],
            // [
            //     'menu_id' => 5,
            //     'action' => '/pengaturan'
            // ],
            // [
            //     'menu_id' => 6,
            //     'action' => '/kasbon'
            // ],
            // [
            //     'menu_id' => 7,
            //     'action' => '/personalia'
            // ],
            // [
            //     'menu_id' => 8,
            //     'action' => '/jadwal'
            // ],
            // [
            //     'menu_id' => 9,
            //     'action' => '/bpjs'
            // ],
            // [
            //     'menu_id' => 10,
            //     'action' => '/perusahaan'
            // ],
            // [
            //     'menu_id' => 11,
            //     'action' => '/lembur'
            // ],
            // [
            //     'menu_id' => 12,
            //     'action' => '/perizinan/approval-cuti'
            // ],
            // [
            //     'menu_id' => 13,
            //     'action' => '/perizinan/approval-cuti'
            // ],
            // [
            //     'menu_id' => 14,
            //     'action' => '/perizinan/approval-cuti'
            // ],
            // [
            //     'menu_id' => 15,
            //     'action' => '/perizinan/approval-cuti'
            // ],
            // [
            //     'menu_id' => 16,
            //     'action' => '/perizinan/approval-cuti'
            // ],
            // [
            //     'menu_id' => 17,
            //     'action' => '/perizinan/approval-cuti'
            // ],
            // [
            //     'menu_id' => 18, //Mengubah Komponen Gaji Pegawai
            //     'action' => '/personalia/createPenggajian'
            // ],
            // [
            //     'menu_id' => 19, //Approval Perubahan Gaji Pegawai
            //     'action' => '/personalia/approve-salaries-changes'
            // ],
            // [
            //     'menu_id' => 19, //Approval Perubahan Gaji Pegawai
            //     'action' => '/personalia/reject-salaries-changes'
            // ],
            // [
            //     'menu_id' => 76, //Data Kehadiran Pegawai Bulanan
            //     'action' => '/dashboard/get/attendances'
            // ],
            // [
            //     'menu_id' => 77, //Data Kehadiran Per Outlet
            //     'action' => '/dashboard/get/outlet-attendances'
            // ],
            // [
            //     'menu_id' => 78, //Data Kehadiran Staff Outlet
            //     'action' => '/dashboard/get/staff-attendances-rank'
            // ],
            // [
            //     'menu_id' => 79, //Data Kehadiran Crew
            //     'action' => '/dashboard/get/crew-attendances-rank'
            // ],
            // [
            //     'menu_id' => 80, //Data Log Aktivitas Harian
            //     'action' => '/dashboard/get/activity-logs'
            // ],
            // [
            //     'menu_id' => 87,
            //     'action' => '/perizinan/approval-perizinan'
            // ],
            // [
            //     'menu_id' => 88,
            //     'action' => '/perizinan/approval-perizinan'
            // ],
            // [
            //     'menu_id' => 89,
            //     'action' => '/perizinan/approval-perizinan'
            // ],
            // [
            //     'menu_id' => 90,
            //     'action' => '/perizinan/approval-perizinan'
            // ],
            // [
            //     'menu_id' => 91,
            //     'action' => '/perizinan/approval-perizinan'
            // ],
            // [
            //     'menu_id' => 92,
            //     'action' => '/perizinan/approval-perizinan'
            // ],
            // [
            //     'menu_id' => 100,
            //     'action' => '/personalia/jadwal/createDatatable'
            // ],
            // [
            //     'menu_id' => 101,
            //     'action' => '/personalia/jadwal/createDatatable'
            // ],
            // [
            //     'menu_id' => 102,
            //     'action' => '/personalia/jadwal/lihat'
            // ],
            // [
            //     'menu_id' => 103,
            //     'action' => '/personalia/addJadwal'
            // ],
            // [
            //     'menu_id' => 104,
            //     'action' => '/personalia/jadwal/edit'
            // ],
            // [
            //     'menu_id' => 105,
            //     'action' => '/personalia/hapusPenjadwalan'
            // ],
            // [
            //     'menu_id' => 106,
            //     'action' => '/personalia/jadwal/kirim'
            // ],
            // [
            //     'menu_id' => 107,
            //     'action' => '/personalia/jadwal/setujui'
            // ],
            // [
            //     'menu_id' => 117,
            //     'action' => '/perizinan/save-izin'
            // ],
            // [
            //     'menu_id' => 118,
            //     'action' => '/perizinan/save-izin'
            // ],
            // [
            //     'menu_id' => 119,
            //     'action' => '/perizinan/save-izin'
            // ],
            // [
            //     'menu_id' => 120,
            //     'action' => '/perizinan/save-izin'
            // ],
            // [
            //     'menu_id' => 121,
            //     'action' => '/perizinan/save-izin'
            // ],
            // [
            //     'menu_id' => 122,
            //     'action' => '/perizinan/save-izin'
            // ],
            // [
            //     'menu_id' => 123,
            //     'action' => '/perizinan/datatable-pengajuan-izin'
            // ],
            // [
            //     'menu_id' => 124,
            //     'action' => '/perizinan/datatable-pengajuan-izin'
            // ],
            // [
            //     'menu_id' => 125,
            //     'action' => '/perizinan/datatable-pengajuan-izin'
            // ],
            // [
            //     'menu_id' => 126,
            //     'action' => '/perizinan/datatable-pengajuan-izin'
            // ],
            // [
            //     'menu_id' => 127,
            //     'action' => '/perizinan/datatable-pengajuan-izin'
            // ],
            // [
            //     'menu_id' => 128,
            //     'action' => '/perizinan/datatable-pengajuan-izin'
            // ],
            // [
            //     'menu_id' => 129,
            //     'action' => '/perizinan/detail-izin/{id}'
            // ],
            // [
            //     'menu_id' => 131,
            //     'action' => '/perizinan/delete-izin'
            // ],


            // [
            //     'menu_id' => 132,
            //     'action' => '/perizinan/save-cuti'
            // ],
            // [
            //     'menu_id' => 133,
            //     'action' => '/perizinan/save-cuti'
            // ],
            // [
            //     'menu_id' => 134,
            //     'action' => '/perizinan/save-cuti'
            // ],
            // [
            //     'menu_id' => 135,
            //     'action' => '/perizinan/save-cuti'
            // ],
            // [
            //     'menu_id' => 136,
            //     'action' => '/perizinan/save-cuti'
            // ],
            // [
            //     'menu_id' => 137,
            //     'action' => '/perizinan/save-cuti'
            // ],
            // [
            //     'menu_id' => 138,
            //     'action' => '/perizinan/datatable-pengajuan-cuti'
            // ],
            // [
            //     'menu_id' => 139,
            //     'action' => '/perizinan/datatable-pengajuan-cuti'
            // ],
            // [
            //     'menu_id' => 140,
            //     'action' => '/perizinan/datatable-pengajuan-cuti'
            // ],
            // [
            //     'menu_id' => 141,
            //     'action' => '/perizinan/datatable-pengajuan-cuti'
            // ],
            // [
            //     'menu_id' => 142,
            //     'action' => '/perizinan/datatable-pengajuan-cuti'
            // ],
            // [
            //     'menu_id' => 143,
            //     'action' => '/perizinan/datatable-pengajuan-cuti'
            // ],
            // [
            //     'menu_id' => 144,
            //     'action' => '/perizinan/detail-cuti/{id}'
            // ],
            // [
            //     'menu_id' => 145,
            //     'action' => '/perizinan/delete-cuti'
            // ],

            [
                'menu_id'   => 158,
                'action'    => '/personalia/createDatatable'
            ],

            //SIDEBAR CHILDS
            // [
            //     'menu_id' => 20,
            //     'action' => '/kehadiran'
            // ],
            // [
            //     'menu_id' => 21,
            //     'action' => '/kehadiran/anggota'
            // ],
            // [
            //     'menu_id' => 22,
            //     'action' => '/pengaturan/pola_kerja'
            // ],
            // [
            //     'menu_id' => 23,
            //     'action' => '/pengaturan/perizinan'
            // ],
            // [
            //     'menu_id' => 24,
            //     'action' => '/pengaturan/departemen'
            // ],
            // [
            //     'menu_id' => 25,
            //     'action' => '/pengaturan/jabatan'
            // ],
            // [
            //     'menu_id' => 26,
            //     'action' => '/pengaturan/jenis_gaji'
            // ],
            // [
            //     'menu_id' => 27,
            //     'action' => '/pengaturan/outlet'
            // ],
            // [
            //     'menu_id' => 28,
            //     'action' => '/pengaturan/cuti'
            // ],
            // [
            //     'menu_id' => 29,
            //     'action' => '/pengaturan/public_holiday'
            // ],
            // [
            //     'menu_id' => 30,
            //     'action' => '/pengaturan/absensi'
            // ],
            // [
            //     'menu_id' => 31,
            //     'action' => '/personalia'
            // ],
            // [
            //     'menu_id' => 32,
            //     'action' => '/personalia/jadwal'
            // ],
            // [
            //     'menu_id' => 175,
            //     'action' => '/audit-trail'
            // ],

            // -- Pengaturan Acara --
            // [
            //     'menu_id' => 201,
            //     'action' => '/pengaturan/acara'
            // ],
            // [
            //     'menu_id' => 202,
            //     'action' => '/pengaturan/acara/createDatatable'
            // ],
            // [
            //     'menu_id' => 203,
            //     'action' => '/pengaturan/acara/detail'
            // ],
            // [
            //     'menu_id' => 204,
            //     'action' => '/pengaturan/acara/edit'
            // ],
            // [
            //     'menu_id' => 205,
            //     'action' => '/pengaturan/acara/delete'
            // ],
            // [
            //     'menu_id' => 206,
            //     'action' => '/pengaturan/acara/create'
            // ],


            /**
             * -- Kalender --
             */

            [
                'menu_id'   => 207,
                'action'    => '/calendar'
            ],
            [
                'menu_id'   => 208,
                'action'    => '/calendar'
            ]
        ]);
    }
}
