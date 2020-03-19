<?php

namespace App\Http\Requests\Backend\Server;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'host_name' => ['required'],
            'server_ip' => ['required'],
            'enable' => ['required'],
            'ns1' => ['required'],
            'ns2' => ['required'],
            'secureConnection' => ['required'],
            'api_key' => ['required'],
        ];
    }
}
