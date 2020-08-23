<?php

namespace Modules\WebAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use \Modules\WebAdmin\Entities\Setting;
use \Modules\WebAdmin\Http\Requests\StoreSetting;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $instance_id = $this->getInstanceId();
        $instance_setting = Setting::where('instance_id', $instance_id)->first();
        $pre_exist_setting = Setting::where('instance_id', $instance_id)->orderBy('updated_at', 'desc')->first();

        if (is_null($instance_setting)) {

            $page_attributes    = [
                'title'             => 'Pengaturan Antrian',
                'sidebar_active'    => 'setting',
                'action' => 'create',
                'setting' => $instance_setting,
                'breadcrumbs'       => [
                    [
                        'label' => 'Pengaturan Antrian',
                        'url'   => '/settings'
                    ]
                ]
            ];

            return view('webadmin::webadmin/settings/index', $page_attributes);
        } else {

            $page_attributes    = [
                'title'             => 'Pengaturan Antrian',
                'sidebar_active'    => 'setting',
                'action' => 'edit',
                'setting' => $instance_setting,
                'breadcrumbs'       => [
                    [
                        'label' => 'Pengaturan Antrian',
                        'url'   => '/settings'
                    ]
                ]
            ];

            return view('webadmin::webadmin/settings/index', ['instance_setting' => $pre_exist_setting], $page_attributes);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('webadmin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreSetting $request)
    {
        try {
            $validated = $request->validated();

            $uuid = (string) Str::uuid();
            $instance_id = $this->getInstanceId();

            $setting = new Setting;

            if ($validated['max_queue'] == 0)
                $setting->with_max_queue = 0;
            else
                $setting->with_max_queue = 1;

            $setting->id = $uuid;
            $setting->instance_id = $instance_id;
            $setting->max_queue = $validated['max_queue'];
            $setting->start_time = $validated['start_time'];
            $setting->end_time = $validated['end_time'];
            $setting->is_close_queue = $validated['is_close_queue'];

            $setting->save();

            $request->session()->flash('alert-success', 'Data berhasil disimpan');
            return redirect('/settings');
        } catch (\Exception $e) {
            echo $e->getMessage();
            $request->session()->flash('alert-warning', 'Data gagal disimpan');
            return redirect('/settings');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('webadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function update(StoreSetting $request)
    {
        try {
            $validated = $request->validated();

            $id = $this->getIdOfCurrentSetting();

            $setting = Setting::find($id);

            if ($validated['max_queue'] == 0)
                $setting->with_max_queue = 0;
            else
                $setting->with_max_queue = 1;

            $setting->max_queue = $validated['max_queue'];
            $setting->start_time = $validated['start_time'];
            $setting->end_time = $validated['end_time'];
            $setting->is_close_queue = $validated['is_close_queue'];

            $setting->save();

            $request->session()->flash('alert-success', 'Data berhasil disimpan');
            return redirect('/settings');
        } catch (\Exception $e) {
            echo $e->getMessage();
            $request->session()->flash('alert-warning', 'Data gagal disimpan');
            return redirect('/settings');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getInstanceId()
    {
        $instance_id = Auth::user()->instance_id;
        return $instance_id;
    }

    public function getIdOfCurrentSetting()
    {
        $pre_exist_setting = Setting::where('instance_id', $this->getInstanceId())->orderBy('updated_at', 'desc')->first();
        return $pre_exist_setting->id;
    }
}
