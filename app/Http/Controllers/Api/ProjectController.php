<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
   public function index(){
    $projects = Project::with('technology', 'type')->paginate(4);
    return response()->json([  // vanno messe le parentesi quadre dopo la tonda
        'success' => true,
        'results' => $projects
    ]);
   }
}
