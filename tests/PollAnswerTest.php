<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\PollAnswer;
use TelegramBot\Api\Types\User;

class PollAnswerTest extends TestCase
{
    public function testGetPollId(): void
    {
        $item = new PollAnswer();
        $item->setPollId(123456789);

        $this->assertSame(123456789, $item->getPollId());
    }

    public function testGetUser(): void
    {
        $item = new PollAnswer();
        $user = new User();
        $user->setId(123456);
        $item->setUser($user);

        $this->assertSame(123456, $item->getUser()->getId());
    }
    public function testGetFrom(): void
    {
        $item = new PollAnswer();
        $user = new User();
        $user->setId(123456);
        $item->setFrom($user);

        $this->assertSame(123456, $item->getFrom()->getId());
    }
    public function testGetOptionIds(): void
    {
        $item = new PollAnswer();
        $item->setOptionIds([1,2,3,4,5,6]);

        $this->assertSame([1,2,3,4,5,6], $item->getOptionIds());
    }
}