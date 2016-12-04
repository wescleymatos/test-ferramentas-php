<?php

namespace Domain\Services;

use Domain\Contracts\Repositories\GroupRepositoryInterface;
use Domain\Services\GroupService;
use PHPUnit\Framework\TestCase;

class GroupServiceTest extends TestCase
{
    private $groupService;
    private $groupRepository;

    public function setUp()
    {
        $this->groupRepository = $this->createMock(GroupRepositoryInterface::class);
        $this->groupService = new GroupService($this->groupRepository);
    }

    public function testMethodEditReciveJustFirstParam()
    {
        $this->setExpectedException('TypeError');

        $this->groupService->edit(12);
    }

    public function testMethodEditThrowExceptionNameIsEmpty()
    {
        $this->groupService->edit(1, '');
    }
}
