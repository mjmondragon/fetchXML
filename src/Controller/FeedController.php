<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Doctrine\Common\Collections\Criteria;
use App\Service\ImporterXML;
use App\Factory\CriteriaFactory;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Contracts\Cache\ItemInterface;

/**
 * @author Mauricio J Mondragon <mauro102189@gmail.com>
 */
class FeedController extends AbstractController{

    public function index(Request $request, PaginatorInterface $paginator){
        $listings = $this->getListings($request);
        $iterator = $paginator->paginate(
                                            $listings, 
                                            $request->query->getInt('page', 1),
                                            10    
                                        );
        $queryParam = $request->getQueryString();
        return $this->render('listings/index.html.twig', [
            'listings' => $iterator, 'queryParams' =>  $queryParam
        ]);
    }
    

    public function download(Request $request)
    {
        $listings = $this->getListings($request);
        $response = $this->json($listings);
        $response->headers->set('Content-Disposition', 'attachment; filename="listings.json"');
        return $response;
    }

    /**
     * This function fetch the XML from remote url and complete the first task of the test
     *
     * @return Collection
     */
    private function getListings(Request $request)
    {
        $cache = new FilesystemAdapter();
        $listings = $cache->get('listings', function (ItemInterface $item) {
            $item->expiresAfter(3600);
            $importerXML = new ImporterXML();
            $listings = $importerXML->getListings("https://s3-eu-west-1.amazonaws.com/sah-pub-feeds/mitula-UK-en.xml");
            return $listings;
        });
        $sortBy = $request->query->get('sort');
        if(!is_null($sortBy)){
            $direction = $request->query->get('direction');
            $sortBy = CriteriaFactory::create($sortBy);
            $listings = $sortBy->sorted($listings, strtoupper($direction));
        }
        return $listings;
    }
}
?>