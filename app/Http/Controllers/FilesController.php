<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$files = File::paginate();
		return view('files.index', compact('files'));
	}

    public function show(File $file)
    {
        return view('files.show', compact('file'));
    }

	public function create(File $file)
	{
		return view('files.create_and_edit', compact('file'));
	}

	public function store(FileRequest $request)
	{
		$file = File::create($request->all());
		return redirect()->route('files.show', $file->id)->with('message', 'Created successfully.');
	}

	public function edit(File $file)
	{
        $this->authorize('update', $file);
		return view('files.create_and_edit', compact('file'));
	}

	public function update(FileRequest $request, File $file)
	{
		$this->authorize('update', $file);
		$file->update($request->all());

		return redirect()->route('files.show', $file->id)->with('message', 'Updated successfully.');
	}

	public function destroy(File $file)
	{
		$this->authorize('destroy', $file);
		$file->delete();

		return redirect()->route('files.index')->with('message', 'Deleted successfully.');
	}
}