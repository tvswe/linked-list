<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LinkedListTest extends TestCase
{
    public function testCanPrependPayloadToList(): void
    {
        $list = new \Tvswe\LinkedList\LinkedList(3);
        $list->prepend(2);
        $list->prepend(1);

        $this->assertEquals(1, $list->getFirstNode()->getPayload());
        $this->assertEquals(3, $list->getLastNode()->getPayload());
    }

    public function testCanAppendPayloadToList(): void
    {
        $list = new \Tvswe\LinkedList\LinkedList(1);
        $list->append(2);
        $list->append(3);

        $this->assertEquals(1, $list->getFirstNode()->getPayload());
        $this->assertEquals(3, $list->getLastNode()->getPayload());
    }

    public function testCanIterateList(): void
    {
        $list = new \Tvswe\LinkedList\LinkedList(3);
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
        $list = new \Tvswe\LinkedList\LinkedList(3);
        $this->assertEquals(1, count($list));

        $list->append(4);
        $list->prepend(2);
        $this->assertEquals(3, count($list));

        $list->append(5);
        $list->prepend(1);
        $this->assertEquals(5, count($list));
    }
}
