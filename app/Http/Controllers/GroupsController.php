<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('permission:manage_groups');
    }

	public function index()
	{
		$groups = Group::paginate();
		return view('groups.index', compact('groups'));
	}

    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

	public function create(Group $group)
	{
		return view('groups.create_and_edit', compact('group'));
	}

	public function store(GroupRequest $request)
	{
		$group = Group::create($request->all());
		return redirect()->route('groups.show', $group->id)->with('message', 'Created successfully.');
	}

	public function edit(Group $group)
	{
        $this->authorize('update', $group);
		return view('groups.create_and_edit', compact('group'));
	}

	public function update(GroupRequest $request, Group $group)
	{
		$this->authorize('update', $group);
		$group->update($request->all());

		return redirect()->route('groups.show', $group->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Group $group)
	{
		$this->authorize('destroy', $group);
		$group->delete();

		return redirect()->route('groups.index')->with('message', 'Deleted successfully.');
	}
}