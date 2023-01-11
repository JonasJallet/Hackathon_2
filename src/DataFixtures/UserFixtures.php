<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'email' => 'admin@handiloc.com',
                'password' => 'admin123',
                'role' => 'ROLE_ADMIN',
            ],
            [
                'email' => 'timmy@mail.com',
                'password' => 'timtim123',
                'role' => 'ROLE_CUSTOMER',
            ],
            [
                'email' => 'chacha@mail.com',
                'password' => 'chacha123',
                'role' => 'ROLE_CUSTOMER',
            ],
            [
                'email' => 'jeje@mail.com',
                'password' => 'jeje123',
                'role' => 'ROLE_CUSTOMER',
            ]
        ];

        foreach ($users as $key => $user) {
            $newUser = new User();
            $newUser->setEmail($user['email']);
            $hash = $this->passwordHasher->hashPassword($newUser, $user['password']);
            $newUser->setPassword($hash);
            $newUser->setRoles([$user['role']]);
            $manager->persist($newUser);
            $this->addReference('user_' . $key, $newUser);
        }
        $manager->flush();
    }
}
