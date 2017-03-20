<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Borrow;

class LoadBorrowData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        // Pierre dépose un nouveau livre à Nantes 1
        $borrow1 = new Borrow();
        $borrow1->setDateEnd(new \DateTime("2016-12-02"));
        $borrow1->setBoxTo($this->getReference("box-nantes1"));
        $borrow1->setUser($this->getReference("user-pjehan"));
        $borrow1->setBook($this->getReference("book-JKR01546"));
        $manager->persist($borrow1);
        
        // Jean prend le livre déposé par Pierre à Nantes 1 et le dépose ensuite à Nantes 2
        $borrow2 = new Borrow();
        $borrow2->setDateStart(new \DateTime("2016-12-12"));
        $borrow2->setBoxFrom($this->getReference("box-nantes1"));
        $borrow2->setDateEnd(new \DateTime("2016-12-15"));
        $borrow2->setBoxTo($this->getReference("box-nantes2"));
        $borrow2->setUser($this->getReference("user-jdupont"));
        $borrow2->setBook($this->getReference("book-JKR01546"));
        $manager->persist($borrow2);
        
        // Elodie prend le livre déposé par Jean à Nantes 2 et ne l'a pas encore rendu
        $borrow3 = new Borrow();
        $borrow3->setDateStart(new \DateTime("2017-01-05"));
        $borrow3->setBoxFrom($this->getReference("box-nantes2"));
        $borrow3->setUser($this->getReference("user-edurand"));
        $borrow3->setBook($this->getReference("book-JKR01546"));
        $manager->persist($borrow3);
        
        // Elodie dépose un nouveau livre à Rennes
        $borrow4 = new Borrow();
        $borrow4->setDateStart(new \DateTime("2017-01-05"));
        $borrow4->setBoxTo($this->getReference("box-rennes"));
        $borrow4->setUser($this->getReference("user-edurand"));
        $borrow4->setBook($this->getReference("book-JKR01645"));
        $manager->persist($borrow4);

        $manager->flush();
    }

    public function getOrder() {
        return 3;
    }

}
