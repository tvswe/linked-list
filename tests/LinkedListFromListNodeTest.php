<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Tvswe\LinkedList\LinkedList;
use Tvswe\LinkedList\ListNode;

final class LinkedListFromListNodeTest extends TestCase
{
    public function testCanCreateByListNode(): void
    {
        $first = new ListNode(2);
        $second = new ListNode(3);
        $third = new ListNode(4);

        $first->setNext($second);
        $second->setNext($third);

        $list = LinkedList::createFromListNode($first);

        $this->assertEquals(2, $list->getFirstNode()->getPayload());
        $this->assertEquals(4, $list->getLastNode()->getPayload());
        $this->assertCount(3, $list);

        $list->prepend(1);
        $list->append(5);

        $this->assertEquals(1, $list->getFirstNode()->getPayload());
        $this->assertEquals(5, $list->getLastNode()->getPayload());
        $this->assertCount(5, $list);
    }
}
