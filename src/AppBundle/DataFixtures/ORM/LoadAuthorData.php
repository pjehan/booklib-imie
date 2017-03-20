<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Author;

class LoadAuthorData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $goscinny = new Author();
        $goscinny->setFirstname("René");
        $goscinny->setLastname("Goscinny");
        $manager->persist($goscinny);
        $this->addReference("author-goscinny", $goscinny);
        
        $rowling = new Author();
        $rowling->setFirstname("J.K.");
        $rowling->setLastname("Rowling");
        $manager->persist($rowling);
        $this->addReference("author-rowling", $rowling);
        
        $hugo = new Author();
        $hugo->setFirstname("Hugo");
        $hugo->setLastname("Victor");
        $manager->persist($hugo);
        $this->addReference("author-hugo", $hugo);

        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}
