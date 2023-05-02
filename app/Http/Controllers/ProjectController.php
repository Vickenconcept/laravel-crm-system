<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /** Display a listing of the resource.*/

    public function index()
    {
        $project = Project::latest()->get(); // Retrieve all project
        return view('project', ['project' => $project]);
    }
    public function create()
    {
        //
    }

   // Method to handle form submission
   public function store(Request $request)
   {
       // Validate form data
       $validatedData = $request->validate([
           'title' => 'required|string',
           'description' => 'required|string',
           'assigned_user' => 'required|string',
           'assigned_client' => 'required|string',
           'status' => 'required|string',
           'date' => 'required|string',
       ]);

       // Create a new Project model instance
    //    $project = new Project;
       $user = auth()->user();
       $project = $user->project()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'assigned_user' => $request->input('assigned_user'),
            'assigned_client' => $request->input('assigned_client'),
            'status' => $request->input('status'),
            'date' => $request->input('date'),
       ]);
       // Save the model instance to the database
       $project->save();

       // Redirect or return a response as needed
       return redirect('project');
   }
    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project, $id)
    {
        $project = Project::findorfail($id);
        $this->authorize('update-project', $project);

        return view('edit-project',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $project, $id)
    {
        $project = $project->find($id);
        // $this->authorize('update-project', $project);
        $validatedData = $request->validate([
           'title' => 'required|string',
           'description' => 'required|string',
           'assigned_user' => 'required|string',
           'assigned_client' => 'required|string',
           'status' => 'required|string',
           'date' => 'required|string',
       ]);

        $project->update($validatedData);

        return redirect('project');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $project = Project::find($id);

        // if(auth()->user()->id !== $project->user_id) {
        //     abort(403, 'Unauthorized action.');
        // }
        $this->authorize('delete-project', $project);
        $project->delete();

        return redirect()->to('/project');
    }
}
