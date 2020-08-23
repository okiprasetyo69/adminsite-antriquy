<?php

namespace Modules\API\Http\Controllers\QueryFilters;

use Modules\API\Http\Controllers\QueryFilters\BaseQueryFilter;

class QueueQueryFilter extends BaseQueryFilter
{

    private $instance_id;

    function __construct($request)
    {
        parent::__construct($request);
        $this->instance_id = isset($request['instance_id']) ? $request['instance_id'] : null;
    }

    public function get_instance_id()
    {
        return $this->instance_id;
    }
}
