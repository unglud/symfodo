<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * DefaultController constructor.
     */
    public function __construct($logger) { }

    #[Route('/', name: 'default')]
    public function index(
        GiftService $gifts, Request $request, SessionInterface $session
    ): Response {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        $cookie = new Cookie('my_cookie', 'cookie vsalue', time() + 9000);

        $response = new Response();
        $response->headers->setCookie($cookie);

        $session->set('name','session value');
        exit($request->query->get('page', 'default'));

        return $this->render("default/index.html.twig", [
            "controller_name" => "DefaultController",
            "users"           => $users,
            "random_gift"     => $gifts->gifts,
        ], $response);
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

    #[Route('/generate-url/{param?}', name: 'generate_url')]
    public function generate_url()
    {
        exit($this->generateUrl('generate_url', ['param'=> 10]));
    }

    #[Route('/download', name: 'download')]
    public function download()
    {
        $path = $this->getParameter('download_directory');
    }
}
