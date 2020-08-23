<?php

namespace Modules\Api\Http\Controllers\Forms;

class BaseForm{

    protected $fields = [];

    public function __construct(){

    }

    public function validate(){
        $validate = "";

        foreach ($this->fields as $field) {
            if(!isset($field['value']) && $field['validate'] == true){
                $validate = $field['label'] . " Harus diisi";
                break;
            }
        }

        return $validate;
    }

    public function convert_form_field(){
        $array_object = array();

        foreach ($this->fields as $field) {
            $array_object[$field['name']] = $field['value'];
        }

        return $array_object;
    }

    public function value_from_request($request, $key) {
        return isset($request[$key]) ? $request[$key] : null;
    }
}
