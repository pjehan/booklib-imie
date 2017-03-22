<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface {

    use ContainerAwareTrait;
    
    public function load(ObjectManager $manager) {
        $passwordEncoder = $this->container->get('security.password_encoder');
        
        $pjehan = new User();
        $pjehan->setFirstname("Pierre");
        $pjehan->setLastname("Jehan");
        $pjehan->setUsername("pjehan");
        $pjehan->setEmail("pierre.jehan@gmail.com");
        $encodedPassword = $passwordEncoder->encodePassword($pjehan, 'pjehan');
        $pjehan->setPassword($encodedPassword);
        $pjehan->setRoles(['ROLE_ADMIN']);
        $manager->persist($pjehan);
        $this->addReference("user-pjehan", $pjehan);
        
        $jdupont = new User();
        $jdupont->setFirstname("Jean");
        $jdupont->setLastname("Dupont");
        $jdupont->setUsername("jdupont");
        $jdupont->setEmail("jean.dupont@hotmail.fr");
        $encodedPassword = $passwordEncoder->encodePassword($jdupont, 'jdupont');
        $jdupont->setPassword($encodedPassword);
        $jdupont->setRoles(['ROLE_USER']);
        $manager->persist($jdupont);
        $this->addReference("user-jdupont", $jdupont);
        
        $edurand = new User();
        $edurand->setFirstname("Elodie");
        $edurand->setLastname("Durant");
        $edurand->setUsername("edurand");
        $edurand->setEmail("elodie.durand@gmail.com");
        $encodedPassword = $passwordEncoder->encodePassword($edurand, 'edurand');
        $edurand->setPassword($encodedPassword);
        $edurand->setRoles(['ROLE_USER']);
        $manager->persist($edurand);
        $this->addReference("user-edurand", $edurand);

        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}
