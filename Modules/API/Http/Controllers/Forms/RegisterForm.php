<?php

namespace Modules\API\Http\Controllers\Forms;

use Modules\API\Http\Controllers\Forms\BaseForm;

class RegisterForm extends BaseForm{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'name',
                'label' => 'Nama',
                'value' => $this->value_from_request($request, 'name'),
                'validate' => true
            ],
            [
                'name' => 'username',
                'label' => 'Username',
                'value' => $this->value_from_request($request, 'username'),
                'validate' => true
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'value' => $this->value_from_request($request, 'email'),
                'validate' => true
            ],
            [
                'name' => 'password',
                'label' => 'Password',
                'value' => $this->value_from_request($request, 'password'),
                'validate' => true
            ],
        ];
    }

}
