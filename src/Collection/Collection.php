<?php

namespace SimpleService\Collection;

trait Collection
{
    private $list = [];
    private $collectionType;

    public function add($item)
    {
        $this->validateItemType($item);
        array_push($this->list, $item);
    }

    public function getValue() : array
    {
        return $this->list;
    }

    private function validateItemType($item)
    {
        if (is_null($this->collectionType)) {
            $this->setType($item);
        }

        if (!is_a($item, $this->collectionType)) {
            throw new \InvalidArgumentException("INVALID_COLLECTION_ITEM");
        }
    }

    private function setType($item)
    {
        if (!is_object($item)) {
            throw new \InvalidArgumentException("INVALID_COLLECTION_ITEM_TYPE");
        }
        $this->collectionType = get_class($item);
    }
}
