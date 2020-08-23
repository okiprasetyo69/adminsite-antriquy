<?php

namespace App\Http\Models\AccessRights;

use Session;

use Illuminate\Database\Eloquent\Model;

class SysMenu extends Model
{
    protected $table    = 'sys_menu';
    protected $fillable = [
        'name',
        'parent_id',
        'is_visible',
        'is_secure',
        'position',
        'icon',
        'icon_active',
        'created_by',
        'updated_by',
        'deleted',
        'created_at',
        'updated_at',
    ];

    public function get_sidebar_menus($role_id){
        $parents    = $this
            ->select(
                'sys_menu.*',
                'sys_menu_application.action'
            )
            ->leftJoin(
                'rol_role_menu',
                'rol_role_menu.menu_id',
                'sys_menu.id'
            )
            ->leftJoin(
                'set_jabatans',
                'set_jabatans.id',
                'rol_role_menu.role_id'
            )
            ->leftJoin(
                'sys_menu_application',
                'sys_menu_application.menu_id',
                'sys_menu.id'
            )
            ->where('rol_role_menu.role_id', $role_id)
            ->where('sys_menu.is_visible', 1)
            ->where('sys_menu.parent_id', 0)
            ->where('sys_menu.deleted', 0)
            ->where('sys_menu_application.deleted', 0)
            ->where('rol_role_menu.deleted', 0)
            ->where('set_jabatans.id_perusahaan', Session::get('perusahaan'))
            ->orderBy('sys_menu.position', 'asc')
            ->distinct()
            ->get();
        
        foreach($parents as $parent){
            $childs = $this
                ->select(
                    'sys_menu.*',
                    'sys_menu_application.action'
                )
                ->leftJoin(
                    'rol_role_menu',
                    'rol_role_menu.menu_id',
                    'sys_menu.id'
                )
                ->leftJoin(
                    'set_jabatans',
                    'set_jabatans.id',
                    'rol_role_menu.role_id'
                )
                ->leftJoin(
                    'sys_menu_application',
                    'sys_menu_application.menu_id',
                    'sys_menu.id'
                )
                ->where('rol_role_menu.role_id', $role_id)
                ->where('sys_menu.is_visible', 1)
                ->where('sys_menu.parent_id', $parent->id)
                ->where('sys_menu.deleted', 0)
                ->where('rol_role_menu.deleted', 0)
                ->where('set_jabatans.id_perusahaan', Session::get('perusahaan'))
                ->get();

            if($childs->count() == 0){
                $childs = null;
            }

            $parent->{'childs'} = $childs;
        }

        return $parents;
    }

    public function get_menu_detail_by_name($name){
        $data   = $this
            ->select(
                'sys_menu.*',
                'sys_menu_application.action'
            )
            ->join(
                'sys_menu_application',
                'sys_menu_application.menu_id',
                'sys_menu.id'
            )
            ->where('sys_menu.name', 'LIKE', '%'.$name.'%')
            ->where('sys_menu.deleted', 0)
            ->where('sys_menu_application.deleted', 0)
            ->get();

        return $data;
    }

    public function check_access_all_role_by_menu_name($name){
        $data = $this
            ->select(
                'sys_menu.*',
                'rol_role_menu.options',
                'rol_role_menu.role_id'
            )
            ->join(
                'rol_role_menu',
                'rol_role_menu.menu_id',
                'sys_menu.id'
            )
            ->join(
                'set_jabatans',
                'set_jabatans.id',
                'rol_role_menu.role_id'
            )
            ->where('sys_menu.name', 'LIKE', '%'.$name.'%')
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
