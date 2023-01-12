<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VehicleFixtures extends Fixture
{
    const VEHICLES = [

        [
            'brand' => "Ford ",
            'model' => "Transit Connect Wagon",
            'mileage' => 36,
            'energy' => "électrique",
            'registrationPlate' => "AA-123-ZZ",
            'isAvailable' => true,
            'picture' => 'https://www.gruau-vehicule-handicap.com/media/standyhaccessplusfordgrantourneoconnect__020655300_1042_23052016.jpg'
        ],
        [
            'brand' => "Mercedes-Benz",
            'model' => "Sprinter",
            'mileage' => 3555,
            'energy' => "électrique",
            'registrationPlate' => "YY-123-ZZ",
            'isAvailable' => true,
            'picture' => 'https://hacavie.fr/wp-content/uploads/2012/12/mercedes_sprinter_32N_frontaccess_hay7110-2-1.jpg'
        ],
        [
            'brand' => "Honda",
            'model' => "Odyssey",
            'mileage' => 355566,
            'energy' => "hybride",
            'registrationPlate' => "PP-123-ZZ",
            'isAvailable' => true,
            'picture' => 'https://www.mobilityworks.com/wp-content/uploads/2023-honda-odyssey-braun-white.jpg'
        ],
        [
            'brand' => "Volkswagen",
            'model' => "cadie",
            'mileage' => 355455,
            'energy' => "électrique",
            'registrationPlate' => "FF-123-OO",
            'isAvailable' => true,
            'picture' => 'https://img.medicalexpo.fr/images_me/photo-mg/115847-10839735.jpg'
        ],
        [
            'brand' => "Chrysler",
            'model' => "Pacifica",
            'mileage' => 55,
            'energy' => "hybride",
            'registrationPlate' => "TO-006-TO",
            'isAvailable' => true,
            'picture' => 'https://mobilityexpress.com/media/wysiwyg/smartwave/porto/blog/blog_chrysler_pacifica3.jpg'
        ],
        [
            'brand' => "Nissam",
            'model' => "E-nv200",
            'mileage' => 5557,
            'energy' => "électrique",
            'registrationPlate' => "TR-500-TO",
            'isAvailable' => true,
            'picture' => 'https://www.gruau-vehicule-handicap.com/media/nv20001__034681400_1148_23052016.jpg'
        ],
        [
            'brand' => "Mercedes-Benz",
            'model' => "V-Class",
            'mileage' => 5787,
            'energy' => "essence",
            'registrationPlate' => "TR-009-TO",
            'isAvailable' => true,
            'picture' => 'https://www.mercedes-benz.fr/vans/fr/vehicules_carrosses/tpmr/_jcr_content/main-parsys/text_image/parsys-gallery/image.mq6.jpg/1642515930000.jpg'
        ],
        [
            'brand' => "Renault",
            'model' => "Espace",
            'mileage' => 55467,
            'energy' => "essence",
            'registrationPlate' => "TR-009-TO",
            'isAvailable' => true,
            'picture' => 'https://cdn.group.renault.com/ren/fr/mobilit%C3%A9-r%C3%A9duite/kangoo-tpmr/Renault-kangoo-ffk-tpmr.jpg.ximg.xsmall.jpg/5bfeef3e56.jpg'
        ],
        [
            'brand' => "Opel",
            'model' => "zafira",
            'mileage' => 467,
            'energy' => "essence",
            'registrationPlate' => "TR-049-TO",
            'isAvailable' => true,
            'picture' => 'https://voiture.kidioui.fr/image/img-auto/opel-zafira-life.jpg'
        ],
        [
            'brand' => "Ford",
            'model' => "Galaxy",
            'mileage' => 546,
            'energy' => "essence",
            'registrationPlate' => "RT-049-TO",
            'isAvailable' => true,
            'picture' => 'https://medias.agenda-automobile.com/2015/04/ford-galaxy-8.jpg'
        ],
        [
            'brand' => "Elbee",
            'model' => "Elbee Mobility",
            'mileage' => 5467,
            'energy' => "essence",
            'registrationPlate' => "TR-339-UO",
            'isAvailable' => true,
            'picture' => 'https://www.comptoirdessolutions.org/wp-content/uploads/2018/04/134-Elbee-CARRE.png'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (SELF::VEHICLES as $car) {

            $vehicle = new Vehicle();
            $vehicle->setBrand($car['brand']);
            $vehicle->setModel($car['model']);
            $vehicle->setMileage($car['mileage']);
            $vehicle->setEnergy($car['energy']);
            $vehicle->setRegistrationPlate($car['registrationPlate']);
            $vehicle->setIsAvailable($car['isAvailable']);
            $vehicle->setPicture($car['picture']);

            $manager->persist($vehicle);
        }

        $manager->flush();
    }
}
