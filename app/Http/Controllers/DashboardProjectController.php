<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.project.index', [
            'projects' => Project::all(),
            'title' => 'Projects'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.project.create', [
            'projects' => Project::all(),
            'title' => 'Projects | Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'link_project' => 'required',
            'image' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('project-images', 'public');
        }

        Project::create($validatedData);
        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('dashboard.project.show', [
            'project' => $project,
            'title' => 'Projects | Show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('dashboard.project.edit', [
            'project' => $project,
            'title' => 'Projects | Edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'link_project' => 'required',
            'image' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validatedData['image'] = $request->file('image')->store('project-images', 'public');
        }
        Project::where('id', $project->id)
            ->update($validatedData);
        return redirect()->route('projects.index', $project)->with('success', 'project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        Project::destroy($project->id);
        return redirect()->route('projects.index')->with('deleted', 'project deleted successfully');
    }
}
