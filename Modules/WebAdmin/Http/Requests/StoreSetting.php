<?php

namespace Modules\WebAdmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSetting extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'max_queue' => 'required|numeric',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'is_close_queue' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'max_queue.required' => 'Jumlah maksimal antrian tidak boleh kosong',
            'start_time.required'  => 'Waktu mulai tidak boleh kosong',
            'end_time.required'  => 'Waktu selesai tidak boleh kosong',
            'is_close_queue.required'  => 'Harap mendefinisikan status cut-off',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
