<?php

namespace App\Http\Controllers;

use App\File;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Contracts\IFileController;

/**
 * FileController
 */
class FileController extends Controller implements IFileController
{

    use ApiResponse;

    /**
     * index
     *
     * @return void
     */
    public function index() {
        $files = File::orderBy('id', 'desc')
            ->simplePaginate(7);

        return $this->successResponse($files, Response::HTTP_OK);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request) {
        $rules = ['file' => 'required'];

        $this->validate($request, $rules);

        $attr = new File();
        $attr->name = $request->file->store('');
        $attr->extension = $request->file->getClientOriginalExtension();
        $attr->size = round($_FILES['file']['size'] / 1024 / 1024, 4);
        $file = $attr->save();

        return $this->successResponse($attr, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file) {
        Log::info("Show file by id '{$file->id}'");
        return $this->successResponse($file, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rules = ['file' => 'required'];

        $this->validate($request, $rules);

        $file = File::findOrFail($id);
        $file->name = $request->file->store('');
        $file->extension = $request->file->getClientOriginalExtension();
        $file->size = round($_FILES['file']['size'] / 1024 / 1024, 4);
        $file->save();

        return $this->successResponse($file, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
