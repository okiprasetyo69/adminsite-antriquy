<?php

namespace Modules\API\Http\Controllers\QueryFilters;

use Modules\API\Http\Controllers\QueryFilters\BaseQueryFilter;

class BookingQueryFilter extends BaseQueryFilter{

    private $user_mobile_id;
    private $status;

    function __construct($request)
    {
        parent::__construct($request);
        $this->user_mobile_id = isset($request['user_mobile_id']) ? $request['user_mobile_id'] : null;
        $this->status = isset($request['status']) ? $request['status'] : null;
    }

    public function get_user_mobile_id(){
        return $this->user_mobile_id;
    }

    public function get_status(){
        return $this->status;
    }
}
