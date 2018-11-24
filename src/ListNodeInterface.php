<?php declare(strict_types=1);

namespace Tvswe\LinkedList;

interface ListNodeInterface
{
    public function setNext(ListNodeInterface $next): void;

    public function getNext(): ?ListNodeInterface;

    public function getPayload();
}
