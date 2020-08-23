<?php

namespace Modules\WebAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_code == 'admin') {
            return redirect('/manajemen-instansi');
        } else {
            $page_attributes    = [
                'title'             => 'Antrean',
                'sidebar_active'    => 'queues',
                'breadcrumbs'       => [
                    [
                        'label'     => 'Antrean',
                        'url'       => '/webadmin'
                    ]
                ]
            ];

            return view('webadmin::instanceadmin/queues/index', $page_attributes);
        }
    }
}
