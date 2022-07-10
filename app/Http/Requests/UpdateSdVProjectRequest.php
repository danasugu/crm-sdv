<?php

namespace App\Http\Requests;

use App\Models\SdVProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSdVProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sd_v_project_edit');
    }

    public function rules()
    {
        return [
            'proiect' => [
                'string',
                'required',
            ],
        ];
    }
}
