<?php declare(strict_types=1);

namespace Tvswe\LinkedList;

interface LinkedListInterface extends \Countable
{
    public function append($payload);

    public function getFirstNode(): ListNodeInterface;

    public function getLastNode(): ListNodeInterface;
}
