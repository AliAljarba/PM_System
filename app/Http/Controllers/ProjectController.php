<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $projects = Project::orderBy('id','desc')->paginate(5);

        return view('projects.index')->with('storedProjects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'newProjectName' => 'required|min:5|max:255',
            ]);

        $project = new Project;

        $project->name = $request->newProjectName;

        $project->save();

        Session::flash('success', 'New Project has been succesfully added!');

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show' , compact('project'));
           }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $project = Project::find($id);

        return view('projects.edit')->with('projectUnderEdit', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
                'updatedProjectName' => 'required|min:5|max:255',
            ]);

        $project = project::find($id);

        $project->name = $request->updatedProjectName;

        $project->save();

        Session::flash('success', 'Project #' . $id . ' has been successfully updated.');

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $project = project::find($id);

        $project->delete();

        Session::flash('success', 'Project #' . $id . ' has been successfully deleted.');

        return redirect()->route('projects.index');
    }
}
