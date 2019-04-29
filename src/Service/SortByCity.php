<?php

namespace App\Service;

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Collection;

/**
 * @author Mauricio J Mondragon R <mauro102189@gmail.com>
 */
class SortByCity implements SortInterface{
    
    /**
     * {@inheritdoc}
     */
    public function sorted(Collection $collection, $order)
    {
        $orderBy = (Criteria::create())->orderBy(['city' => $order]);
        return $collection->matching($orderBy);
    }

}