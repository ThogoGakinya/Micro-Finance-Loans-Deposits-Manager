<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Minute;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MinutesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('minute_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $minutes = Minute::with(['media'])->get();

        return view('admin.minutes.index', compact('minutes'));
    }

    public function create()
    {
        abort_if(Gate::denies('minute_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.minutes.create');
    }

    public function store(Request $request)
    {
        $minute = Minute::create($request->all());

        if ($request->input('minutes_document', false)) {
            $minute->addMedia(storage_path('tmp/uploads/' . $request->input('minutes_document')))->toMediaCollection('minutes_document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $minute->id]);
        }

        return redirect()->route('admin.minutes.index');
    }

    public function edit(Minute $minute)
    {
        abort_if(Gate::denies('minute_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.minutes.edit', compact('minute'));
    }

    public function update(Request $request, Minute $minute)
    {
        $minute->update($request->all());

        if ($request->input('minutes_document', false)) {
            if (!$minute->minutes_document || $request->input('minutes_document') !== $minute->minutes_document->file_name) {
                if ($minute->minutes_document) {
                    $minute->minutes_document->delete();
                }

                $minute->addMedia(storage_path('tmp/uploads/' . $request->input('minutes_document')))->toMediaCollection('minutes_document');
            }
        } elseif ($minute->minutes_document) {
            $minute->minutes_document->delete();
        }

        return redirect()->route('admin.minutes.index');
    }

    public function show(Minute $minute)
    {
        abort_if(Gate::denies('minute_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.minutes.show', compact('minute'));
    }

    public function destroy(Minute $minute)
    {
        abort_if(Gate::denies('minute_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $minute->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Minute::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('minute_create') && Gate::denies('minute_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Minute();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
