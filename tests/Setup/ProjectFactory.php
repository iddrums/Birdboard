<?php

namespace Tests\Setup;
use App\Project;
use App\User;
use App\Task;


class ProjectFactory
{
    protected $taskCount = 0;

    protected  $user;

    public function withTasks($Count)
    {
       $this->taskCount = $Count;

       return $this;
    }

    public function ownedBy($user)
    {
        $this->user =  $user;

        return  $this;
    }

   public function create()
   {
        $project = factory(Project::class)->create([
            'owner_id' =>  $this->user ?? factory(User::class)
            ]);

                factory(Task::class,$this->taskCount)->create([
                'project_id' => $project->id
            ]);

            return $project;
   }
}



