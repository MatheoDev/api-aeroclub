<?php

namespace App\DataFixtures;

use App\Entity\Avions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use function PHPSTORM_META\type;

class AvionsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $avions = [
            [
                "type" => "PA28",
                "immat" => "PA28 F-GDJK"
            ],
            [
                "type" => "PA28",
                "immat" => "PA28 F-GEID"
            ],
            [
                "type" => "AA21",
                "immat" => "AA21 F-GOMK"
            ],
            [
                "type" => "AA21",
                "immat" => "AA21 F-MATK"
            ],
        ];

        foreach ($avions as $avion) {
            $avbdd = new Avions();
            foreach ($avion as $key => $value) {
                if ($key === "type") {
                    $avbdd->setType($value);
                }
                if ($key === "immat") {
                    $avbdd->setImmatriculation($value);
                }
            }
            $manager->persist($avbdd);
        }

        $manager->flush();
    }
}
