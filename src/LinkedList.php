<?php declare(strict_types=1);

namespace Tvswe\LinkedList;

class LinkedList implements LinkedListInterface, \IteratorAggregate, \Countable
{
    /** @var ListNodeInterface */
    private $first;

    /** @var ListNodeInterface */
    private $last;

    /** @var int */
    private $length;

    public function __construct($firstPayload)
    {
        $this->first = $this->createListNode($firstPayload);
        $this->last = $this->first;
        $this->length = 1;
    }

    public function prepend($payload): void
    {
        $listNode = $this->createListNode($payload);
        $listNode->setNext($this->first);
        $this->first = $listNode;
        $this->length++;
    }

    public function append($payload): void
    {
        $listNode = $this->createListNode($payload);
        $this->last->setNext($listNode);
        $this->last = $listNode;
        $this->length++;
    }

    protected function createListNode($payload): ListNodeInterface
    {
        return new ListNode($payload);
    }

    public function getFirstNode(): ListNodeInterface
    {
        return $this->first;
    }

    public function getFirstPayload()
    {
        return $this->first->getPayload();
    }

    public function getLastNode(): ListNodeInterface
    {
        return $this->last;
    }

    public function getLastPayload()
    {
        return $this->last->getPayload();
    }

    public function getIterator(): \Traversable
    {
        return new LinkedListIterator($this);
    }

    public function count(): int
    {
        return $this->length;
    }
}
