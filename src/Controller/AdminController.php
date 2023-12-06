<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin/populate', name: 'app_admin_populate')]
    public function populate(EntityManagerInterface $entityManagerInterface): Response
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setPassword('$2y$13$LE0CmP4o6MZH70jmssQeHukdP.LAsqWhWQ202R9Cue.oqGI3uFZ8i');
        $user->setRoles(['ROLE_ADMIN']);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        return new Response('Admin user created');
    }
}
