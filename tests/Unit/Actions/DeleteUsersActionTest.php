<?php

namespace Actions;

use App\Actions\User\CreateUsersAction;
use App\Actions\User\DeleteUsersAction;
use App\Models\User;
use App\Parents\Test\ParentUnitTest;

class DeleteUsersActionTest extends ParentUnitTest
{
    public function test_action_work_successful(): void
    {

        $user = User::factory()->createOne();

        $this->assertModelExists($user);

        $result = resolve(DeleteUsersAction::class)
            ->run($user);

        $this->assertTrue($result);

        $this->assertModelMissing($user);

    }
}
