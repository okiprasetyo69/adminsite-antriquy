<?php

namespace Modules\WebAdmin\Http\Controllers;

use Auth;

use Modules\WebAdmin\Http\Controllers\APIFetcherController;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class QueueManagementController extends APIFetcherController
{
    /**
     * -- HIT API --
     */
    public function get_live_count() {
        $target_url     = BASE_API_URL . '/queue/live_count';

        $instance_id    = Auth::user()->instance_id;

        $form_data      = [
            'instance_id'   => $instance_id,
        ];

        $res = $this->url($target_url)
            ->method('POST')
            ->form_data($form_data)
            ->hit();

        return response()->json(json_decode($res));
    }

    public function get_queue_list() {
        $target_url     = BASE_API_URL . '/queue/live';

        $instance_id    = Auth::user()->instance_id;

        $form_data      = [
            'instance_id'   => $instance_id,
        ];

        $res = $this->url($target_url)
            ->method('POST')
            ->form_data($form_data)
            ->hit();

        return response()->json(json_decode($res));
    }
}
