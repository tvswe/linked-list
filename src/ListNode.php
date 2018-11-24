<?php declare(strict_types=1);

namespace Tvswe\LinkedList;

class ListNode implements ListNodeInterface
{
    /** @var ListNodeInterface|null */
    private $next;

    /** @var mixed */
    private $payload;

    public function __construct($payload)
    {
        $this->next = null;
        $this->payload = $payload;
    }

    public function setNext(ListNodeInterface $next): void
    {
        $this->next = $next;
    }

    public function getNext(): ?ListNodeInterface
    {
        return $this->next;
    }

    public function getPayload()
    {
        return $this->payload;
    }
}
