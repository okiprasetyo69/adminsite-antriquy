<?php

namespace App\Http\Models\AccessRights;

use Illuminate\Database\Eloquent\Model;

class RolRoleMenu extends Model
{
    protected $table = 'rol_role_menu';

    public function check_access_by_role($action, $role_id){
        $data   = $this
            ->select('sys_menu_application.*')
            ->join(
                'sys_menu_application',
                'rol_role_menu.menu_id',
                'sys_menu_application.menu_id'
            )
            ->where('rol_role_menu.role_id', $role_id)
            ->where('sys_menu_application.action', 'LIKE', '%'.$action.'%')
            ->where('rol_role_menu.deleted', 0)
            ->where('sys_menu_application.deleted', 0)
            ->get();

        if($data->count() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function get_access_by_role($role_id){
        $data   = $this
            ->select(
                'sys_menu.*',
                'rol_role_menu.role_id'
            )
            ->join(
                'sys_menu',
                'sys_menu.id',
                'rol_role_menu.menu_id'
            )
            ->where('rol_role_menu.role_id', $role_id)
            ->where('sys_menu.deleted', 0)
            ->where('rol_role_menu.deleted', 0)
            ->get();

        return $data;
    }

    public function get_access_by_name_role($role_id, $name){
        $data   = $this
            ->select(
                'sys_menu.*',
                'rol_role_menu.options',
                'rol_role_menu.role_id'
            )
            ->join(
                'sys_menu',
                'sys_menu.id',
                'rol_role_menu.menu_id'
            )
            ->where('sys_menu.name', 'LIKE', '%'.$name.'%')
            ->where('rol_role_menu.role_id', $role_id)
            ->where('sys_menu.deleted', 0)
            ->where('rol_role_menu.deleted', 0)
            ->get();

        return $data;
    }
}
