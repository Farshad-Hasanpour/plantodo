<?php

namespace App\Policies;

use App\Models\TodoList;
use App\Models\User;
use App\Models\Task;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

	public function update(User $user, Task $task){
		return ($user->id == $task->TodoList->user_id);
	}
}
