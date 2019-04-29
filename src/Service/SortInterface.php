<?php

namespace App\Service;

use Doctrine\Common\Collections\Collection;

interface SortInterface{
    /**
     * This function sort the collection by field and direction
     *
     * @param Collection $collection
     * @param string $order with the direction [ASC|DESC]
     * @return Collection
     */
    public function sorted(Collection $collection, $order);
}
