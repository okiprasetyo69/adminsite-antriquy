<?php

namespace Modules\API\Http\Controllers\Forms;

use Modules\API\Http\Controllers\Forms\BaseForm;

class BookingForm extends BaseForm{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'user_mobile_id',
                'label' => 'User',
                'value' => $this->value_from_request($request, 'user_mobile_id'),
                'validate' => true
            ],
            [
                'name' => 'instance_id',
                'label' => 'Instansi',
                'value' => $this->value_from_request($request, 'instance_id'),
                'validate' => true
            ],
            [
                'name' => 'name',
                'label' => 'Nama',
                'value' => $this->value_from_request($request, 'name'),
                'validate' => true
            ]
        ];
    }

}
