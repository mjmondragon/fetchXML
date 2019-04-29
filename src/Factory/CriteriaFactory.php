<?php
namespace App\Factory;

use App\Service\SortInterface;
use App\Service\SortByTitle;
use App\Service\SortById;
use App\Service\SortByCity;

/**
 * @author Mauricio J Mondragon R <mauro102189@gmail.com>
 */
abstract class CriteriaFactory{

    /**
     * Return the Sort Criteria
     *
     * @param string $type
     * @return SortInterface
     */
    public static function create(string $type):SortInterface
    {
        switch ($type) {
            case 'title':
                return new SortByTitle();
            case 'id':
                return new SortById();
            case 'city':
                return new SortByCity();
            default:
                return null;
        }
    }

}