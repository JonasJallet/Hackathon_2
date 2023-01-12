<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $customers = [
            [
                'user' => '2',
                'firstname' => 'Timmy',
                'lastname' => 'Burch',
                'phone' => 623456589,
                'address' => 'Chemin de la tuilerie',
                'zipcode' => 69150,
                'city' => 'Décines-Charpieu',
                'disability_card' => 137543456,
                'picture' => 'https://pbs.twimg.com/media/B0BGJKACEAACXJ5.jpg',
            ],
            [
                'user' => '3',
                'firstname' => 'Chacha',
                'lastname' => 'Baila',
                'phone' => 629646589,
                'address' => 'Avenue du non retour',
                'zipcode' => 69320,
                'city' => 'Feyzin',
                'disability_card' => 189543456,
                'picture' => 'https://pbs.twimg.com/media/B0BGJKACEAACXJ5.jpg',

            ],
            [
                'user' => '4',
                'firstname' => 'Jeje',
                'lastname' => 'Dupont',
                'phone' => 623456589,
                'address' => 'Ronde des roses',
                'zipcode' => 69003,
                'city' => 'Lyon',
                'disability_card' => 156745685,
                'picture' => 'https://pbs.twimg.com/media/B0BGJKACEAACXJ5.jpg',
            ],
        ];

        foreach ($customers as $key => $customer) {
            $newcustomer = new Customer();
            $newcustomer->setFirstName($customer['firstname']);
            $newcustomer->setLastName($customer['lastname']);
            $newcustomer->setDisabilityCard($customer['disability_card']);
            $newcustomer->setPhone($customer['phone']);
            $newcustomer->setPicture($customer['picture']);
            $newcustomer->setAddress($customer['address']);
            $newcustomer->setZipcode($customer['zipcode']);
            $newcustomer->setCity($customer['city']);
            $newcustomer->setUser($this->getReference('user_' . $customer['user']));
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
