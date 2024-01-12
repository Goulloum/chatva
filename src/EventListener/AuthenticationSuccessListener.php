<?php

namespace App\EventListener;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationSuccessListener
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();
        $userRepository = $this->entityManager->getRepository(User::class);

        if (!$user instanceof UserInterface) {
            return;
        }

        $user = $userRepository->findOneBy(['username' => $user->getUserIdentifier()]);

        $data['data'] = array(
            'username' => $user->getUsername(),
            'id' => $user->getId(),
        );

        $event->setData($data);
    }
}
