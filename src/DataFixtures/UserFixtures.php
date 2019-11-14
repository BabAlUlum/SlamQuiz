<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;


class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('user@ndlp.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'azerty'
                        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('admin@ndlp.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'password'
                        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('superadmin@ndlp.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'password123'
                        ));
        $manager->persist($user);


        $manager->flush();
    }
   
}