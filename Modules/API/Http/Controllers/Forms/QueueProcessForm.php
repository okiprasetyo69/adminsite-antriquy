<?php

namespace Modules\API\Http\Controllers\Forms;

use Modules\API\Http\Controllers\Forms\BaseForm;

class QueueProcessForm extends BaseForm{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'instance_history_queue_detail_id',
                'label' => 'ID Antrian',
                'value' => $this->value_from_request($request, 'instance_history_queue_detail_id'),
                'validate' => true
            ]
        ];
    }

}
