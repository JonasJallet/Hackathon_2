<?php

namespace App\DataFixtures;

use App\Entity\Collectivity;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CollectivityFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $collectivity = new Collectivity();
        $collectivity->setName("Handi'loc Lyon");
        $collectivity->setPhone(633831565);
        $collectivity->setAddress('17 rue Delandine');
        $collectivity->setZipcode(69000);
        $collectivity->setCity('Lyon');
        $collectivity->setUser($this->getReference('user_1'));

        $manager->persist($collectivity);
        $this->addReference('collectivity_', $collectivity);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class
        ];
    }
}
