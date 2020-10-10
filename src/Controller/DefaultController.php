<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PictureRepository;

class DefaultController extends AbstractController
{

    /**
     * @Route("/profile", name="app_profile")
     */
    public function profile()
    {
        return $this->render('default/profile.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    
    /**
     * @Route("/about", name="app_about")
     */
    public function about()
    {
        return $this->render('default/about.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/", name="app_home")
     */
    public function index(PictureRepository $pictureRepository)
    {
        return $this->getSinglePicture($pictureRepository, 1);
    }

    /**
     * @Route("/archives/{page}", name="app_archives")
     */
    public function archives(PictureRepository $pictureRepository, int $page = 1)
    {
        return $this->getSinglePicture($pictureRepository, $page);
    }
    
    private function getSinglePicture(PictureRepository $pictureRepository, int $page = 1) {
        $scheduled = $pictureRepository->findPublishedPictures($page);
        $scheduledData = null;
        
        if(!empty($scheduled)) {
            $scheduled = $scheduled[0];
            $scheduledData = [
                "pictureFileName" => $scheduled->getPictureFileName(),
                "publishingTime" => $scheduled->getPublishingTime(),
                "description" => $scheduled->getDescription(),
                "user" => $scheduled->getUser()->getEmail(),
            ];
        }

        $count = $pictureRepository->createQueryBuilder('p')
            ->select('count(p.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'scheduled' => $scheduledData,
            'countPictures' => $count,
            'page' => $page
        ]);
    }
}
