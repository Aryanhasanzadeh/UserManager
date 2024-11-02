<?php

namespace Actions;

use App\Actions\User\CreateUsersAction;
use App\Dtos\User\CreateUserDto;
use App\Jobs\User\UpdateUserCountryInformation;
use App\Models\User;
use App\Parents\Test\ParentUnitTest;
use Illuminate\Support\Facades\Queue;

class CreateUserActionTest extends ParentUnitTest
{
    public function test_action_work_successful(): void
    {
        Queue::fake();

        $userData = User::factory()->make();

        $user = resolve(CreateUsersAction::class)
            ->run(
                CreateUserDto::from([
                    ...$userData->toArray(),
                    'country' => 'iran'
                ])
            );


        $this->assertInstanceOf(User::class, $user);

        $this->assertSame($user->name, $userData->name);

        Queue::assertPushed(UpdateUserCountryInformation::class);
    }
}
