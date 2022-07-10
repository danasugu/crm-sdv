@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sdVProject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sd-v-projects.update", [$sdVProject->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="proiect">{{ trans('cruds.sdVProject.fields.proiect') }}</label>
                <input class="form-control {{ $errors->has('proiect') ? 'is-invalid' : '' }}" type="text" name="proiect" id="proiect" value="{{ old('proiect', $sdVProject->proiect) }}" required>
                @if($errors->has('proiect'))
                    <span class="text-danger">{{ $errors->first('proiect') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sdVProject.fields.proiect_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection