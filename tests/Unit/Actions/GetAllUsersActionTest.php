<?php

namespace Actions;

use App\Actions\User\GetAllUsersAction;
use App\Builder\User\UserBuilder;
use App\Models\User;
use App\Parents\Test\ParentUnitTest;
use Illuminate\Pagination\LengthAwarePaginator;

class GetAllUsersActionTest extends ParentUnitTest
{
    public function test_action_work_successful(): void
    {
        User::factory()->createMany(6);

        $result = resolve(GetAllUsersAction::class)->run();

        $this->assertInstanceOf(LengthAwarePaginator::class, $result);

        $this->assertSame($result->count(), 6);
    }
}
