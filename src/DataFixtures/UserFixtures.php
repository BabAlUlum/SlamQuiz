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
        $user->setEmail('thiosey@user.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'azerty'
                        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('thiosey@superadmin.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'password'
                        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('thiosey@admin.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
                        $user,
                        'password123'
                        ));
        $manager->persist($user);


        $manager->flush();
    }
   
}
