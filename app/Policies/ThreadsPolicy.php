<?php

namespace App\Policies;

use App\Models\Thread;
use App\User;
 use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function view(User $user, odel $odel)
    {
        //
    }

    /**
     * Determine whether the user can create odels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function update(User $user,Thread $thread)
    {
        //
        return $thread->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the odel.
     *
     * @param  \App\User  $user
     * @param  \App\odel  $odel
     * @return mixed
     */
    public function delete(User $user, odel $odel)
    {
        //
    }
}
