<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Box;

class LoadBoxData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $rennes = new Box();
        $rennes->setLatitude(48.092047);
        $rennes->setLongitude(-1.653398);
        $rennes->setAddress("Rue Gérard Philippe");
        $rennes->setCity("Rennes");
        $rennes->setZipCode("35200");
        $manager->persist($rennes);
        $this->addReference('box-rennes', $rennes);
        
        $nantes1 = new Box();
        $nantes1->setLatitude(47.2127566);
        $nantes1->setLongitude(-1.548186);
        $nantes1->setAddress("22 Rue Emile Pehant");
        $nantes1->setCity("Nantes");
        $nantes1->setZipCode("44000");
        $nantes1->setComment("Dépôt de livres dans le hall d'entrée.");
        $manager->persist($nantes1);
        $this->addReference('box-nantes1', $nantes1);
        
        $nantes2 = new Box();
        $nantes2->setLatitude(47.2135489);
        $nantes2->setLongitude(-1.5791585);
        $nantes2->setAddress("9 rue Nicolas Appert");
        $nantes2->setCity("Nantes");
        $nantes2->setZipCode("44000");
        $nantes2->setComment("RecycLivre (La Conserverie) ouverture le 7 juillet");
        $manager->persist($nantes2);
        $this->addReference('box-nantes2', $nantes2);
        
        $angers = new Box();
        $angers->setLatitude(47.4441464);
        $angers->setLongitude(-0.5636733);
        $angers->setAddress("1 bis rue Henri-Bergson");
        $angers->setCity("Angers");
        $angers->setZipCode("49100");
        $angers->setComment("Il y en a plusieurs , en effet il y a une petite étagère dans la bibliothèque , et 2 très grosses dans le fond de la salle café.");
        $manager->persist($angers);
        $this->addReference('box-angers', $angers);
        
        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}
