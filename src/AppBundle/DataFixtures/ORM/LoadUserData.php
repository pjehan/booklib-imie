<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $pjehan = new User();
        $pjehan->setFirstname("Pierre");
        $pjehan->setLastname("Jehan");
        $pjehan->setUsername("pjehan");
        $pjehan->setEmail("pierre.jehan@gmail.com");
        $pjehan->setPassword("pjehan");
        $manager->persist($pjehan);
        $this->addReference("user-pjehan", $pjehan);
        
        $jdupont = new User();
        $jdupont->setFirstname("Jean");
        $jdupont->setLastname("Dupont");
        $jdupont->setUsername("jdupont");
        $jdupont->setEmail("jean.dupont@hotmail.fr");
        $jdupont->setPassword("jdupont");
        $manager->persist($jdupont);
        $this->addReference("user-jdupont", $jdupont);
        
        $edurand = new User();
        $edurand->setFirstname("Elodie");
        $edurand->setLastname("Durant");
        $edurand->setUsername("edurand");
        $edurand->setEmail("elodie.durand@gmail.com");
        $edurand->setPassword("edurand");
        $manager->persist($edurand);
        $this->addReference("user-edurand", $edurand);

        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}
