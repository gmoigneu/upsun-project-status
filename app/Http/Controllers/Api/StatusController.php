<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewActivityRequest;
use App\Models\Activity;
use App\Models\Environment;
use App\Models\Project;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function show(Request $request, Project $project, Environment $environment)
    {
        return response()->json([
            'project' => $project->project,
            'environment' => $environment->name,
            'state' => true,
        ]);
    }

    public function update(NewActivityRequest $request)
    {

        $project = Project::where('project', $request->project)->firstOrCreate([
            'project' => $request->project,
        ]);

        foreach ($request->environments as $environment) {
            $env = Environment::where('name', $environment)
                ->where('project_id', $project->id)
                ->first();

            if (!$env) {
                $env = Environment::create([
                    'name' => $environment,
                    'project_id' => $project->id,
                ]);
            }

            Activity::updateOrCreate(
                [
                    'environment_id' => $env->id,
                    'activity_id' => $request->id,
                ],
                [
                    'type' => $request->type,
                    'state' => $request->state,
                    'result' => $request->result,
                    'started_at' => $request->started_at,
                    'completed_at' => $request->completed_at,
                    'cancelled_at' => $request->cancelled_at,
                    'expires_at' => $request->expires_at,
                    'availability' => $request->availability,
                    'description' => $request->description,
                    'text' => $request->text,
                    'timing_wait' => $request->timing_wait,
                    'timing_build' => $request->timing_build,
                    'timing_deploy' => $request->timing_deploy,
                    'timing_execute' => $request->timing_execute,
                ]
            );
        }

        return response()->json([
            'state' => true,
        ]);
    }
}