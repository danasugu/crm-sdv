<?php

namespace App\Http\Requests;

use App\Models\SdVProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySdVProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sd_v_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sd_v_projects,id',
        ];
    }
}
