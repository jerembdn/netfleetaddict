<?php


namespace App\DataFixtures;

use App\Entity\Sheet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SheetFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    $faker = Factory::create('fr_FR');
    $types = ['movie', 'series'];

    for ($i = 0; $i < 10; $i++) {
      $sheet = new Sheet();
      $sheet->setName($faker->sentence(3));
      $sheet->setSynopsis($faker->sentence(10));
      $sheet->setType(array_rand($types, 1));
      $sheet->setCreatedAt($faker->dateTimeBetween('-6 months'));

      $manager->persist($sheet);
    }

    $manager->flush();
  }
}