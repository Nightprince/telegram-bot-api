<?php

namespace TelegramBot\Api\Test;

use PHPUnit\Framework\TestCase;
use TelegramBot\Api\Types\Poll;
use TelegramBot\Api\Types\PollOption;

class PollTest extends TestCase
{
    public function testGetId(): void
    {
        $item = new Poll();
        $item->setId(123456789);

        $this->assertSame(123456789, $item->getId());
    }

    public function testGetQuestion(): void
    {
        $item = new Poll();
        $item->setQuestion('What is the name of Heisenberg from "Breaking bad"?');

        $this->assertSame('What is the name of Heisenberg from "Breaking bad"?', $item->getQuestion());
    }

    public function testGetOptions(): void
    {
        $item = new Poll();
        $options = [
            PollOption::fromResponse([
                'text' => 'Walter White',
                'voter_count' => 100
            ]),
        ];

        $item->setOptions($options);

        $this->assertSame($options, $item->getOptions());

        foreach ($item->getOptions() as $option) {
            $this->assertInstanceOf(PollOption::class, $option);
        }
    }

    public function testGetTotalVoterCount(): void
    {
        $item = new Poll();
        $item->setTotalVoterCount(17);

        $this->assertSame(17, $item->getTotalVoterCount());
    }

    public function testIsClosed(): void
    {
        $item = new Poll();
        $item->setIsClosed(true);

        $this->assertTrue($item->isClosed());
    }

    public function testIsAnonymous(): void
    {
        $item = new Poll();
        $item->setIsAnonymous(false);

        $this->assertFalse($item->isAnonymous());
    }

    public function testGetType(): void
    {
        $item = new Poll();
        $item->setType('regular');

        $this->assertSame('regular', $item->getType());
    }

    public function testAllowsMultipleAnswers(): void
    {
        $item = new Poll();
        $item->setAllowsMultipleAnswers(true);

        $this->assertTrue($item->isAllowsMultipleAnswers());
    }

    public function testGetCorrectOptionId(): void
    {
        $item = new Poll();
        $item->setCorrectOptionId(2);

        $this->assertEquals(2, $item->getCorrectOptionId());
    }
}