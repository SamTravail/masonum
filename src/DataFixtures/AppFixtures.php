<?php

namespace App\DataFixtures;


use App\Entity\Articles;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    // @var Generator

    private Generator $faker;

   
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');

    }

    public function load(ObjectManager $manager): void
    {
           // users
           $users = [];
           for ($k = 0; $k < 10; $k++) {

            $user = new User();
            $user->setFullName($this->faker->name())
                ->setPseudo(mt_rand(0, 1) === 1 ? $this->faker->firstName() : null)
                ->setEmail($this->faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password');
            $users[] = $user;
            $manager->persist($user);
        }
        $articles = [];
        for ($i = 0; $i < 50; $i++) {

            $article = new Articles();
            $article->setTitle($this->faker->word(2))
                ->setContent($this->faker->word(200))
                ->setAuteur($this->faker->lastName())
                ->setUser($users[mt_rand(0, count($users)-1)]);
                $articles[] = $article;
                $manager->persist($article);
        }


     
        $manager->flush();
    }
}
