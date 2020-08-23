<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\Pengaturan\Entities\SetJabatan;

use App\Http\Models\AccessRights\SysMenu;
use App\Http\Models\AccessRights\SysMenuApplication;
use App\Http\Models\AccessRights\RolRoleMenu;


if (! function_exists('do_i_have_access_for')) {
    function do_i_have_access_for($action){
        $model_sys_menu_application   = new SysMenuApplication();
        $model_rol_role_menu          = new RolRoleMenu();

        //need authentication
        if(!empty(Auth::user())){
            $employee_id    = Auth::user()->id_pegawai;
            $role_id        = Session::get('id_jabatan');

            $authorization  = $model_sys_menu_application->check_access_by_role($action, $role_id);
            
            if($authorization){
                return true;
            } else {
                return false;
            }
        }
    }
}

if (! function_exists('get_access_rights')) {
    function get_access_rights(){
        $model_rol_role_menu    = new RolRoleMenu();

        //need authentication
        if(!empty(Auth::user())){
            $role_id        = Session::get('id_jabatan');

            $access_rights  = $model_rol_role_menu->get_access_by_role($role_id);
            
            return $access_rights;
        }
    }
}

if (! function_exists('can_i_access')) {
    function can_i_access($name){
        $model_rol_role_menu    = new RolRoleMenu();

        //need authentication
        if(!empty(Auth::user())){
            $role_id    = Session::get('id_jabatan');

            $access     = $model_rol_role_menu->get_access_by_name_role($role_id, $name);
            
            if($access->count() > 0){
                return true;
            } else {
                return false;
            }
        }
    }
}

if (! function_exists('get_access_like')) {
    function get_access_like($name){
        $model_rol_role_menu    = new RolRoleMenu();

        //need authentication
        if(!empty(Auth::user())){
            $role_id    = Session::get('id_jabatan');

            $access     = $model_rol_role_menu->get_access_by_name_role($role_id, $name);
            
            return $access;
        }
    }
}

if (! function_exists('get_access_menu_by_action')) {
    function get_access_menu_by_action($action){
        $model_sys_menu_application   = new SysMenuApplication();

        //need authentication
        if(!empty(Auth::user())){
            $role_id    = Session::get('id_jabatan');

            $access     = $model_sys_menu_application->check_access_by_role($action, $role_id);
            
            if($access !== null){
                return $access;
            } else {
                return collect([]);
            }
        }
    }
}

if (! function_exists('get_all_role_access_menu_by_action')) {
    function get_all_role_access_menu_by_action($action){
        $model_sys_menu_application   = new SysMenuApplication();

        //need authentication
        if(!empty(Auth::user())){
            $access     = $model_sys_menu_application->check_access_all_role($action);
            
            if($access !== null){
                return $access;
            } else {
                return collect([]);
            }
        }
    }
}

if (! function_exists('get_all_role_access_menu_by_menu_name')) {
    function get_all_role_access_menu_by_menu_name($name){
        $model_sys_menu = new SysMenu();

        //need authentication
        if(!empty(Auth::user())){
            $access     = $model_sys_menu->check_access_all_role_by_menu_name($name);
            
            if($access !== null){
                return $access;
            } else {
                return collect([]);
            }
        }
    }
}

if (! function_exists('get_sidebar_menus')) {
    function get_sidebar_menus(){
        $model_sys_menu = new SysMenu();

        //need authentication
        if(!empty(Auth::user())){
            $role_id        = Session::get('id_jabatan');
            $sidebars       = $model_sys_menu->get_sidebar_menus($role_id);
            
            return $sidebars;
        }
    }
}

if (! function_exists('get_sidebar_menus_by_role')) {
    function get_sidebar_menus_by_role($role_id){
        $model_sys_menu = new SysMenu();

        $sidebars       = $model_sys_menu->get_sidebar_menus($role_id);
        
        return $sidebars;
    }
}

if (! function_exists('get_menu_detail_like')) {
    function get_menu_detail_like($name){
        $model_sys_menu = new SysMenu();

        //need authentication
        if(!empty(Auth::user())){
            $menu     = $model_sys_menu->get_menu_detail_by_name($name);
            
            return $menu;
        }
    }
}

if (! function_exists('get_role_access_for_menu')) {
    function get_role_access_for_menu($role_id, $name){
        $model_rol_role_menu    = new RolRoleMenu();

        //need authentication
        if(!empty(Auth::user())){
            $access     = $model_rol_role_menu->get_access_by_name_role($role_id, $name);
            
            return $access;
        }
    }
}
?>