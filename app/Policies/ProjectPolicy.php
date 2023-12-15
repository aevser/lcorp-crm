<?php

namespace App\Policies;

use App\Models\CRM\Project\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    public function view(User $user, Project $project)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->id > 0;
    }

    public function update(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }

    public function delete(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}
