<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $users = [
            [
                "email" => "matheo.deknuydt@mail.fr",
                "roles" => ['ROLE_ADMIN'],
                "password" => "mdeknuydt"
            ],
            [
                "email" => "anas.fargal@mail.fr",
                "roles" => ['ROLE_USER'],
                "password" => "afargal"
            ],
            [
                "email" => "dylan.derro@mail.fr",
                "roles" => ['ROLE_ADMIN'],
                "password" => "dderro"
            ],
            [
                "email" => "bacptiste.lemaire@mail.fr",
                "roles" => ['ROLE_USER'],
                "password" => "blemaire"
            ],
        ];

        foreach ($users as $user) {
            $userbdd = new User();
            foreach ($user as $key => $value) {
                if ($key === "email") {
                    $userbdd->setEmail($value);
                }
                if ($key === "roles") {
                    $userbdd->setRoles($value);
                }
                if ($key === "password") {
                    $userbdd->setPassword($this->encoder->encodePassword($userbdd, $value));
                }
            }
            $manager->persist($userbdd);
        }

        $manager->flush();
    }
}
