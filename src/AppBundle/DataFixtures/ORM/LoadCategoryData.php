<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $categories = array(
            "roman" => "Roman",
            "sf" => "SF",
            "histoire" => "Histoire",
            "thriller" => "Thriller",
            "bd" => "BD"
        );

        foreach ($categories as $key => $category) {
            $cat = new Category();
            $cat->setName($category);
            $manager->persist($cat);
            $this->addReference("cat-" . $key, $cat);
        }

        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}
