<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $projects = Project::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(5);
        $project_count = Project::all()->count();
        return view('projects.index', ['projects' => $projects, 'project_count' => $project_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        return view('projects.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required'
        ]);
        $project = new Project($request->all());
        $request->user()->projects()->save($project);
        return redirect()
                        ->route('projects.index')
                        ->with('success', 'project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $users = User::all();
        $members = $project->members;
        return view('projects.show', ['project' => $project, 'users' => $users, 'members' => $members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required'
        ]);
        $project->update($request->all());
        return redirect()
                        ->route('projects.show', $project->id)
                        ->with('success', 'product updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function addUser(Request $request, Project $project){
        $request->validate([
            'user' => 'required'
        ]);
        $user = User::findOrFail($request->user);
        $project->members()->attach($user);
        return redirect()
                        ->route('projects.show', $project->id)
                        ->with('success', "user $user->name added successfully");
    }

    public function removeUser(Project $project, User $user){
        $project->members()->detach($user);
        return redirect()
                        ->route('projects.show', $project->id)
                        ->with('success', "user $user->name removed from project successfully");

    }
}
