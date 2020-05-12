<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Facades\Tests\Setup\ProjectFactory;
use App\User;


class UserTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_user_has_projects()
    {
       $user = factory('App\User')->create();

    $this->assertInstanceOf(Collection::class, $user->projects);
    }

    /** @test */
    function a_user_has_accessible_projects()
    {
         $Dami =  $this->signIn();

        ProjectFactory::ownedBy($Dami)->create();

         $this->assertCount(1, $Dami->accessibleProjects());

          $Sade = factory(User::class)->create();
           $nick = factory(User::class)->create();

            $project = tap(ProjectFactory::ownedBy($Sade)->create())->invite($nick);

           $this->assertCount(1, $Dami->accessibleProjects());

           $project->invite($Dami);

             $this->assertCount(2, $Dami->accessibleProjects());

    }
}
