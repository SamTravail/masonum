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

    Private Generator $faker;

    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
        {
$this->faker = Factory::create('fr_FR');
$this->hasher = $hasher;
        }
    
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<50; $i++) {
         
         $article= new Articles();
         $article->setTitle($this->faker->word(2))
         ->setContent($this->faker->word(200))
         ->setAuteur($this->faker->lastName());
         $manager->persist($article);
        }
      
    
    // users
    for($k=0; $k<10; $k++) {
         
        $user= new User();
        $user->setFullName($this->faker->name())
        ->setPseudo(mt_rand(0, 1) ===1 ? $this->faker->firstName() : null)
        ->setEmail($this->faker->email())
        ->setRoles(['ROLE_USER']);
        
        $hashPassword = $this->hasher->hashPassword(
            $user,
            'password'
        );
        $user->setPassword($hashPassword);
        $manager->persist($user);
       }
       $manager->flush();
}
}
