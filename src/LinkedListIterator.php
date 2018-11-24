<?php declare(strict_types=1);

namespace Tvswe\LinkedList;

class LinkedListIterator implements \Iterator
{
    /** @var ListNodeInterface */
    private $first;

    /** @var ListNodeInterface|null */
    private $current;

    /** @var int */
    private $key;

    public function __construct(LinkedListInterface $linkedList)
    {
        $this->first = $linkedList->getFirstNode();
        $this->key = 0;
    }

    public function current()
    {
        return $this->current->getPayload();
    }

    public function next(): void
    {
        $this->current = $this->current->getNext();
        $this->key++;
    }

    public function key(): int
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return (bool)$this->current;
    }

    public function rewind(): void
    {
        $this->current = $this->first;
        $this->key = 0;
    }
}
