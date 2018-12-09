<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Tvswe\LinkedList\LinkedList;

final class LinkedListMerges extends TestCase
{
    public function testCanPrependList(): void
    {
        $list1 = LinkedList::createFromPayload(4);
        $list1->append(5);

        $list2 = LinkedList::createFromPayload(3);
        $list2->prepend(2);
        $list2->prepend(1);

        $this->assertEquals(4, $list1->getFirstNode()->getPayload());
        $this->assertEquals(5, $list1->getLastNode()->getPayload());
        $this->assertCount(2, $list1);

        $list1->prependList($list2);

        $this->assertEquals(1, $list1->getFirstNode()->getPayload());
        $this->assertEquals(5, $list1->getLastNode()->getPayload());
        $this->assertCount(5, $list1);
    }

    public function testCanAppendList(): void
    {
        $list1 = LinkedList::createFromPayload(3);
        $list1->prepend(2);
        $list1->prepend(1);

        $list2 = LinkedList::createFromPayload(4);
        $list2->append(5);

        $this->assertEquals(1, $list1->getFirstNode()->getPayload());
        $this->assertEquals(3, $list1->getLastNode()->getPayload());
        $this->assertCount(3, $list1);

        $list1->appendList($list2);

        $this->assertEquals(1, $list1->getFirstNode()->getPayload());
        $this->assertEquals(5, $list1->getLastNode()->getPayload());
        $this->assertCount(5, $list1);
    }
}
