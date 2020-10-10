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
     * @Route("/{page}", name="app_home")
     */
    public function index(PictureRepository $pictureRepository, int $page = 1)
    {
        $scheduled = $pictureRepository->findPublishedPictures($page);

        $count = $pictureRepository->createQueryBuilder('p')
            ->select('count(p.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'scheduled' => $scheduled,
            'countPictures' => $count,
        ]);
    }
}
