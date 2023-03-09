<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Lead;
use App\Models\Project;
Use App\Mail\NewContact;
use App\Models\Technology;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologys = Technology::all();
        return view('admin.projects.create', compact('types','technologys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
      
        $form_data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $form_data['slug']= $slug;
        $newproject = new Project();
        
        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('project_images', $request->cover_image); //$path lo decidiamo noi
            $form_data['cover_image'] = $path;
        }

        $newproject->fill($form_data);
       
        $newproject->save();

        if($request->has('technology')){
            $newproject->technology()->attach($request->technology);
        }
        // bisogna richiamare il nome del model 
        // dd($newproject);

        // ho dovuto dare come valore nullable a descrizione e data_progetto sennò non me li trovava

        $new_lead = new Lead(); // qua me lo salva nel db
        $new_lead->title = $form_data['title'];
        $new_lead->data_progetto = $form_data['data_progetto'];
        $new_lead->difficoltà = $form_data['difficoltà'];
        $new_lead->descrizione = $form_data['descrizione'];
        $new_lead->save();

        Mail::to('info@boolpres.com')->send(new NewContact($new_lead));

    return redirect()->route('admin.projects.index' )->with('message', 'Progetto aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologys = Technology::all();
        return view('admin.projects.edit', compact('project', 'types','technologys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $form_data['slug']= $slug;
        // dd($request);

        if($request->hasFile('cover_image')){
            
            if($project->cover_image){
                Storage::delete($project->cover_image);
            }
            $path = Storage::disk('public')->put('project_images', $request->cover_image);
            $form_data['cover_image'] = $path;
        }

        $project->update($form_data);

        if($request->has('technology')){
            $project->technology()->sync($request->technology);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Progetto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Progetto eliminato correttamente');
    }
}
