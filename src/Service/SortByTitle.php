<?php

namespace App\Service;

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Collection;

/**
 * @author Mauricio J Mondragon <mauro102189@gmail.com>
 */
class SortByTitle implements SortInterface{
    
    /**
     * {@inheritdoc}
     */
    public function sorted(Collection $collection, $order)
    {
        $orderBy = (Criteria::create())->orderBy(['title' => $order]);
        return $collection->matching($orderBy);
    }

}