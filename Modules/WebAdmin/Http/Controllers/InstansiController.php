<?php

namespace Modules\WebAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\MstInstances;
use Illuminate\Support\Facades\DB;
use Auth;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $dataInstansi =  MstInstances::get();
        // return view('instances.index', ['instansi' => $dataInstansi]);
        $page_attributes    = [
            'title'             => 'Manajemen Instansi',
            'sidebar_active'    => 'instance',
            'breadcrumbs'       => [
                [
                    'label' => 'Manajemen Instansi',
                    'url'   => '/manajemen-instansi'
                ]
            ]
        ];
        return view('webadmin::webadmin/instances/index', $page_attributes);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //return view('webadmin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //return view('webadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //return view('webadmin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
