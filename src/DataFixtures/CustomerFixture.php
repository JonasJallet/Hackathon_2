<?php

namespace App\DataFixtures;

use App\Entity\customer;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class customerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $customers = [
            [
                'user' => 'user_1',
                'firstname' => 'Timmy',
                'lastname' => 'Burch',
                'phone' => '0623456589',
                'address' => 'Chemin de la tuilerie',
                'zipcode' => '69150',
                'city' => 'Décines-Charpieu',
            ],
            [
                'user' => 'user_2',
                'firstname' => 'Chacha',
                'lastname' => 'Baila',
                'phone' => '0629646589',
                'address' => 'Avenue du non retour',
                'zipcode' => '69320',
                'city' => 'Feyzin',
            ],
            [
                'user' => 'user_3',
                'firstname' => 'Jeje',
                'lastname' => 'Dupont',
                'phone' => '0623456589',
                'address' => 'Ronde des roses',
                'zipcode' => '69003',
                'city' => 'Lyon',
            ],
        ];

        foreach ($customers as $key => $customer) {
            $newcustomer = new Customer();
            $newcustomer->setFirstName($customer['firstname']);
            $newcustomer->setLastName($customer['lastname']);
            $newcustomer->setDisabilityCard($customer['disabilitycard']);
            $newcustomer->setPhone($customer['phone']);
            $newcustomer->setAddress($customer['address']);
            $newcustomer->setZipcode($customer['zipcode']);
            $newcustomer->setCity($customer['city']);
            $manager->persist($newcustomer);
            $this->addReference('customer_' . $key, $newcustomer);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}