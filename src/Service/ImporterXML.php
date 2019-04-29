<?php

namespace App\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Entity\Listing;
use App\Entity\Picture;
use App\Entity\Price;

/**
 * @author Mauricio J Mondragon R <mauro102189@gmail.com>
 */
class ImporterXML implements ImporterInterface{

    /**
     * {@inheritdoc}
     */
    public function getListings($url)
    {
        $xmlContent = $this->fetchXML($url);
        $encoders = [new XMLEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $listings = new ArrayCollection(); 
        foreach($xmlContent->children() as $xmlAd){
            $xmlPrice = $xmlAd->price;
            $xmlPictures = clone $xmlAd->pictures;
            $price = new Price();
            $price->setAmount((int)$xmlPrice->__toString());
            $price->setCurrency($xmlPrice->attributes()[0]);
            unset($xmlAd->pictures);
            unset($xmlAd->price);
            $listing = $serializer->deserialize($xmlAd->asXML(), Listing::class, 'xml', [
                'allow_extra_attributes' => true,
            ]);
            foreach ($xmlPictures->children() as $xmlPicture) {
                $picture = $serializer->deserialize($xmlPicture->asXML(), Picture::class, 'xml');
                $listing->addPicture($picture);
            }
            $listing->setPrice($price);
            $listings->add($listing);
        }
        return $listings; 
    }
    /**
     * This function convert the XML file to SimpleXMLElement object
     *
     * @param string $url
     * @return SimpleXMLElement
     */
    public function fetchXML($url)
    {
        return \simplexml_load_file($url);
    }
}