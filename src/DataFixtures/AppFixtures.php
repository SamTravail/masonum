<?php

namespace App\DataFixtures;


use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{

    // @var Generator

    Private Generator $faker;
    public function __construct()
        {
$this->faker = Factory::create('fr_FR');
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
        $manager->flush();
    }
}
