<?php

namespace App\Service;

/**
 * @author Mauricio J Mondragon R <mauro102189@gmail.com>
 */
interface ImporterInterface{
    /**
     * Fetch the listings from a url or path
     *
     * @param string $url
     * @return Collection
     */
    public function getListings($url);
}