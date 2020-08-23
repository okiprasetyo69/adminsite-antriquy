<?php

namespace Modules\API\Http\Controllers\Forms;

use Modules\API\Http\Controllers\Forms\BaseForm;

class LoginForm extends BaseForm{

    public function __construct($request)
    {
        $this->fields = [
            [
                'name' => 'username',
                'label' => 'Username',
                'value' => $this->value_from_request($request, 'username'),
                'validate' => true
            ],
            [
                'name' => 'password',
                'label' => 'Password',
                'value' => $this->value_from_request($request, 'password'),
                'validate' => true
            ],
            [
                'name' => 'firebase_token',
                'label' => 'Firebase Token',
                'value' => $this->value_from_request($request, 'firebase_token'),
                'validate' => false
            ],
        ];
    }

}
