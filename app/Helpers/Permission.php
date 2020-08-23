<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
class Permission
{
  public static $all;
  public static function getAll(){
    return json_decode(Session::get('permission'));
  }
  public static function getJadwal(){
    return json_decode(Session::get('permission'))->personalia_jadwal;
  }
  public static function getKasbon(){
    return json_decode(Session::get('permission'))->kasbon;
  }
  public static function getKehadiran(){
    return json_decode(Session::get('permission'))->kehadiran_kehadiran;
  }
  public static function getJenisGaji(){
    return json_decode(Session::get('permission'))->pengaturan_jenis_gaji; 
  }

  public static function getJabatan(){
    return json_decode(Session::get('permission'))->pengaturan_jabatan; 
  }
  public static function getPolaKerja(){
    return json_decode(Session::get('permission'))->pengaturan_pola_kerja; 
  }
  public static function getPersonalia(){
    return json_decode(Session::get('permission'))->personalia_personalia;
  }
  public static function getPenggajian(){
    return json_decode(Session::get('permission'))->penggajian; 
  }
  public static function getPerizinan(){
    return json_decode(Session::get('permission'))->perizinan;
  }
  public static function getLembur(){
    return json_decode(Session::get('permission'))->lembur;
  }
  public static function getPengaturanAbsensi(){
    return json_decode(Session::get('permission'))->pengaturan_absensi; 
  }
}