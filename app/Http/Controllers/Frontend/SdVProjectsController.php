<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySdVProjectRequest;
use App\Http\Requests\StoreSdVProjectRequest;
use App\Http\Requests\UpdateSdVProjectRequest;
use App\Models\SdVProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SdVProjectsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sd_v_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sdVProjects = SdVProject::all();

        return view('frontend.sdVProjects.index', compact('sdVProjects'));
    }

    public function create()
    {
        abort_if(Gate::denies('sd_v_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sdVProjects.create');
    }

    public function store(StoreSdVProjectRequest $request)
    {
        $sdVProject = SdVProject::create($request->all());

        return redirect()->route('frontend.sd-v-projects.index');
    }

    public function edit(SdVProject $sdVProject)
    {
        abort_if(Gate::denies('sd_v_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sdVProjects.edit', compact('sdVProject'));
    }

    public function update(UpdateSdVProjectRequest $request, SdVProject $sdVProject)
    {
        $sdVProject->update($request->all());

        return redirect()->route('frontend.sd-v-projects.index');
    }

    public function show(SdVProject $sdVProject)
    {
        abort_if(Gate::denies('sd_v_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.sdVProjects.show', compact('sdVProject'));
    }

    public function destroy(SdVProject $sdVProject)
    {
        abort_if(Gate::denies('sd_v_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sdVProject->delete();

        return back();
    }

    public function massDestroy(MassDestroySdVProjectRequest $request)
    {
        SdVProject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
