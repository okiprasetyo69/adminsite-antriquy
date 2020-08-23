<?php

namespace Modules\API\Http\Controllers\QueryFilters;

use Modules\API\Http\Controllers\QueryFilters\BaseQueryFilter;

class InstanceQueryFilter extends BaseQueryFilter{

    private $lat;
    private $long;
    private $for_web;

    function __construct($request)
    {
        parent::__construct($request);
        $this->lat = isset($request['lat']) ? $request['lat'] : null;
        $this->long = isset($request['long']) ? $request['long'] : null;
        $this->for_web = isset($request['for_web']) ? $request['for_web'] : null;
    }

    public function getLat(){
        return $this->lat;
    }

    public function getLong(){
        return $this->long;
    }

    public function get_for_web(){
        return $this->for_web;
    }
}
