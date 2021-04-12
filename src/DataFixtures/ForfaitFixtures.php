<?php

namespace App\DataFixtures;

use App\Entity\Forfait;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ForfaitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $forfaits = [
            [
                "libelle" => "Forfait 1",
                "heure" => 50,
                "prix" => 850
            ],
            [
                "libelle" => "Forfait 2",
                "heure" => 100,
                "prix" => 1500
            ],
            [
                "libelle" => "Forfait 3",
                "heure" => 150,
                "prix" => 2000
            ],
        ];

        foreach ($forfaits as $forfait) {
            $ffbdd = new Forfait();
            foreach ($forfait as $key => $value) {
                if ($key === "libelle") {
                    $ffbdd->setlibelle($value);
                }
                if ($key === "heure") {
                    $ffbdd->setHeure($value);
                }
                if ($key === "prix") {
                    $ffbdd->setPrix($value);
                }
            }
            $manager->persist($ffbdd);
        }

        $manager->flush();
    }
}
