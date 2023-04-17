<?php

namespace App\Policies;

use App\Models\Issue;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IssuePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return $user->role =='QA';
    }

    public function viewAnyDev(User $user): bool
    {
        return $user->role=='dev';
    }


    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Issue $issue): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role =='QA';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Issue $issue): bool
    {
        return $user->id== $issue->reporter_id;
        //return true;
    }

    public function updateDev(User $user, Issue $issue) : bool
    {
        return $user->role =='dev' && $issue->department == $user->department;
        //return true;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Issue $issue): bool
    {
        // user variable injectefd by framework ok thanks
        // go bk to work pls
        return $user->id== $issue->reporter_id;

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Issue $issue): bool
    {
        return $user->id== $issue->reporter_id;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Issue $issue): bool
    {
        return $user->id== $issue->reporter_id;

    }
}
