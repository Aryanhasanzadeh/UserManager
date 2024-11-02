<?php

namespace Actions;

use App\Actions\User\UpdateUsersAction;
use App\Dtos\User\UpdateUserDto;
use App\Jobs\User\UpdateUserCountryInformation;
use App\Models\User;
use App\Parents\Test\ParentUnitTest;
use Illuminate\Support\Facades\Queue;

class UpdateUsersActionTest extends ParentUnitTest
{
    public function test_action_work_successful(): void
    {
        Queue::fake();

        $user = User::factory()->createOne();
        $userData = User::factory()->make();

        $this->assertNotSame($user->name, $userData->name);

        $result =resolve(UpdateUsersAction::class)
            ->run($user,
                UpdateUserDto::from([
                    ...$userData->toArray(),
                    'country' => 'iran'
                ]));

        $this->assertTrue($result);

        $this->assertSame($user->name, $userData->name);

        Queue::assertPushed(UpdateUserCountryInformation::class);
    }
}
