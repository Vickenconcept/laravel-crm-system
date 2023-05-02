<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\NewProject;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $user = $project->user;
        $user->notify(new NewProject($project));

        $user = User::find(1);
        if ($user) {
            $user->notify(new NewProject($project));
        }
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        $user = User::find(1);
        if ($user) {
            $user->notify(new NewProject($project));
        }
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        // $user = User::find(1);
        // if ($user) {
        //     $user->notify(new NewProject($project));
        // }
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
