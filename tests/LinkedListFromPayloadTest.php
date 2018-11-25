<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Tvswe\LinkedList\LinkedList;

final class LinkedListFromPayloadTest extends TestCase
{
    public function testCanPrependPayloadToList(): void
    {
        $list = LinkedList::createFromPayload(3);
        $list->prepend(2);
        $list->prepend(1);

        $this->assertEquals(1, $list->getFirstNode()->getPayload());
        $this->assertEquals(3, $list->getLastNode()->getPayload());
    }

    public function testCanAppendPayloadToList(): void
    {
        $list = LinkedList::createFromPayload(1);
        $list->append(2);
        $list->append(3);

        $this->assertEquals(1, $list->getFirstNode()->getPayload());
        $this->assertEquals(3, $list->getLastNode()->getPayload());
    }

    public function testCanIterateList(): void
    {
        $list = LinkedList::createFromPayload(3);
        $list->prepend(2);
        $list->append(4);
        $list->prepend(1);
        $list->append(5);

        foreach ($list as $key => $payload) {
            $expected = $key + 1;
            $this->assertEquals($expected, $payload);
        }
    }

    public function testCanCountListNodes(): void
    {
        $list = LinkedList::createFromPayload(3);
        $this->assertCount(1, $list);

        $list->append(4);
        $list->prepend(2);
        $this->assertCount(3, $list);

        $list->append(5);
        $list->prepend(1);
        $this->assertCount(5, $list);
    }
}
