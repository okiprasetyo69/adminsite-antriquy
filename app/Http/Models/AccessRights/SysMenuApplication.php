<?php

namespace App\Http\Models\AccessRights;

use Session;

use Illuminate\Database\Eloquent\Model;

class SysMenuApplication extends Model
{
    protected $table = 'sys_menu_application';

    public function check_access_by_role($action, $role_id){
        $data = $this
            ->select(
                'sys_menu.*',
                'sys_menu_application.action',
                'sys_menu_application.menu_id',
                'rol_role_menu.options'
            )
            ->join(
                'sys_menu',
                'sys_menu.id',
                'sys_menu_application.menu_id'
            )
            ->join(
                'rol_role_menu',
                'rol_role_menu.menu_id',
                'sys_menu_application.menu_id'
            )
            ->join(
                'set_jabatans',
                'set_jabatans.id',
                'rol_role_menu.role_id'
            )
            ->where('rol_role_menu.role_id', $role_id)
            ->where('sys_menu_application.action', 'LIKE', '%'.$action.'%')
            ->where('sys_menu_application.deleted', 0)
            ->where('sys_menu.deleted', 0)
            ->where('rol_role_menu.deleted', 0)
            ->where('set_jabatans.id_perusahaan', Session::get('perusahaan'))
            ->get();

        if($data->count() > 0){
            return $data;
        } else {
            return null;
        }
    }

    public function check_access_all_role($action){
        $data = $this
            ->select(
                'sys_menu.*',
                'sys_menu_application.action',
                'sys_menu_application.menu_id',
                'rol_role_menu.options',
                'rol_role_menu.role_id'
            )
            ->join(
                'sys_menu',
                'sys_menu.id',
                'sys_menu_application.menu_id'
            )
            ->join(
                'rol_role_menu',
                'rol_role_menu.menu_id',
                'sys_menu_application.menu_id'
            )
            ->join(
                'set_jabatans',
                'set_jabatans.id',
                'rol_role_menu.role_id'
            )
            ->where('sys_menu_application.action', 'LIKE', '%'.$action.'%')
            ->where('sys_menu_application.deleted', 0)
            ->where('sys_menu.deleted', 0)
            ->where('rol_role_menu.deleted', 0)
            ->where('set_jabatans.id_perusahaan', Session::get('perusahaan'))
            ->get();

        if($data->count() > 0){
            return $data;
        } else {
            return null;
        }
    }
}
