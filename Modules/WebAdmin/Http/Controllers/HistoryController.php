<?php

namespace Modules\WebAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\WebAdmin\Entities\History;
use Modules\WebAdmin\Entities\DetailHistory;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $page_attributes    = [
            'title'             => 'Riwayat Antrian',
            'sidebar_active'    => 'history',
            'breadcrumbs'       => [
                [
                    'label' => 'Riwayat Antrian',
                    'url'   => '/history'
                ]
            ]
        ];
        return view('webadmin::webadmin/history/index', $page_attributes);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($history_id)
    {
        $instance_id = Auth::user()->instance_id;
        $queue_data = History::where('id', $history_id)->first();
        $detail_history = DetailHistory::where([
            ['instance_history_queue_id', $history_id],
            ['instance_id', $instance_id]
        ])->whereIn('status', [-1, 2])->orderByRaw("queue DESC")->get();

        $page_attributes    = [
            'title'             => 'Detail Riwayat Antrian',
            'sidebar_active'    => 'history',
            'queue_data'        => $queue_data,
            'breadcrumbs'       => [
                [
                    'label' => 'Detail Riwayat Antrian',
                    'url'   => '/history/detail'
                ]
            ]
        ];
        return view('webadmin::webadmin/history/detail', $page_attributes, ['detail_histories' => $detail_history]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($history_id)
    {
        //
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
