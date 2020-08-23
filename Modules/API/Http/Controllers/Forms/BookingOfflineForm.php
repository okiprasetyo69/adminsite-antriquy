<?php

namespace Modules\API\Http\Controllers\Forms;

use Modules\API\Http\Controllers\Forms\BaseForm;

class BookingOfflineForm extends BaseForm{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'name',
                'label' => 'Nama',
                'value' => $this->value_from_request($request, 'name'),
                'validate' => true
            ]
        ];
    }
}
