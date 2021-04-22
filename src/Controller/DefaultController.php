<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(
        GiftService $gifts
    ): Response {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render("default/index.html.twig", [
            "controller_name" => "DefaultController",
            "users"           => $users,
            "random_gift"     => $gifts->gifts,
        ]);
    }

    #[Route('/blog/{page?}', name: 'blog_list', requirements: ['page' => '\d+'])]
    public function index2()
    {
        return new Response("Optional parameters im url");
    }

    #[Route('/blog/{_locale}/{year}/{slug}/{category}', requirements: [
        '_locale'  => 'en|fr',
        'category' => 'computers|rtv',
        'year'     => '\d+'
    ], defaults: ['category' => 'computers'])]
    public function index3()
    {
        return new Response("Optional parameters im url");
    }

    #[Route(['nl' => '/over-ons', 'en' => '/about'], name: 'about_us')]
    public function index4()
    {
        return new Response("Optional parameters im url");
    }
}
