<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Book;

class LoadBookData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $harry_potter_coupe_de_feu = new Book();
        $harry_potter_coupe_de_feu->setTitle("Harry Potter et la coupe de feu");
        $harry_potter_coupe_de_feu->setReference("JKR01546");
        $harry_potter_coupe_de_feu->setImage("harry_potter_et_la_coupe_de_feu.jpg");
        $harry_potter_coupe_de_feu->setSynopsis("La quatrième année à l'école de Poudlard est marquée par le \"Tournoi des trois sorciers\". Les participants sont choisis par la fameuse \"coupe de feu\" qui est à l'origine d'un scandale. Elle sélectionne Harry Potter alors qu'il n'a pas l'âge légal requis ! Accusé de tricherie et mis à mal par une série d'épreuves physiques de plus en plus difficiles, ce dernier sera enfin confronté à Celui dont on ne doit pas prononcer le nom, Lord V.");
        $harry_potter_coupe_de_feu->setAuthor($this->getReference("author-rowling"));
        $harry_potter_coupe_de_feu->addCategory($this->getReference("cat-roman"));
        $harry_potter_coupe_de_feu->addCategory($this->getReference("cat-sf"));
        $manager->persist($harry_potter_coupe_de_feu);
        $this->addReference("book-JKR01546", $harry_potter_coupe_de_feu);
        
        $harry_potter_chambre_des_secret = new Book();
        $harry_potter_chambre_des_secret->setTitle("Harry Potter et la chambre des secrets");
        $harry_potter_chambre_des_secret->setReference("JKR01587");
        $harry_potter_chambre_des_secret->setImage("harry_potter_et_la_chambre_des_secrets.jpg");
        $harry_potter_chambre_des_secret->setSynopsis("Alors que l'oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d'importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition. Il lui annonce que de terribles dangers menacent l'école de Poudlard et qu'il ne doit pas y retourner en septembre. Harry refuse de le croire. Mais sitôt la rentrée des classes effectuée, ce dernier entend une voix malveillante. Celle-ci lui dit que la redoutable et légendaire Chambre des secrets est à nouveau ouverte, permettant ainsi à l'héritier de Serpentard de semer le chaos à Poudlard. Les victimes, retrouvées pétrifiées par une force mystérieuse, se succèdent dans les couloirs de l'école, sans que les professeurs - pas même le populaire Gilderoy Lockhart - ne parviennent à endiguer la menace. Aidé de Ron et Hermione, Harry doit agir au plus vite pour sauver Poudlard.");
        $harry_potter_chambre_des_secret->setAuthor($this->getReference("author-rowling"));
        $harry_potter_chambre_des_secret->addCategory($this->getReference("cat-roman"));
        $harry_potter_chambre_des_secret->addCategory($this->getReference("cat-sf"));
        $manager->persist($harry_potter_chambre_des_secret);
        $this->addReference("book-JKR01587", $harry_potter_chambre_des_secret);
        
        $harry_potter_chambre_des_secret_2 = new Book();
        $harry_potter_chambre_des_secret_2->setTitle("Harry Potter et la chambre des secrets");
        $harry_potter_chambre_des_secret_2->setReference("JKR01645");
        $harry_potter_chambre_des_secret_2->setImage("harry_potter_et_la_chambre_des_secrets.jpg");
        $harry_potter_chambre_des_secret_2->setSynopsis("Alors que l'oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d'importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition. Il lui annonce que de terribles dangers menacent l'école de Poudlard et qu'il ne doit pas y retourner en septembre. Harry refuse de le croire. Mais sitôt la rentrée des classes effectuée, ce dernier entend une voix malveillante. Celle-ci lui dit que la redoutable et légendaire Chambre des secrets est à nouveau ouverte, permettant ainsi à l'héritier de Serpentard de semer le chaos à Poudlard. Les victimes, retrouvées pétrifiées par une force mystérieuse, se succèdent dans les couloirs de l'école, sans que les professeurs - pas même le populaire Gilderoy Lockhart - ne parviennent à endiguer la menace. Aidé de Ron et Hermione, Harry doit agir au plus vite pour sauver Poudlard.");
        $harry_potter_chambre_des_secret_2->setAuthor($this->getReference("author-rowling"));
        $harry_potter_chambre_des_secret_2->addCategory($this->getReference("cat-roman"));
        $harry_potter_chambre_des_secret_2->addCategory($this->getReference("cat-sf"));
        $manager->persist($harry_potter_chambre_des_secret_2);
        $this->addReference("book-JKR01645", $harry_potter_chambre_des_secret_2);
        
        $asterix_cleopatre = new Book();
        $asterix_cleopatre->setTitle("Astérix et Cléopâtre");
        $asterix_cleopatre->setReference("RG02454");
        $asterix_cleopatre->setImage("asterix_cleopatre.jpg");
        $asterix_cleopatre->setSynopsis("Jules César nargue Cléopâtre : les Romains construisent des temples et des forums magnifiques alors que les Égyptiens ne construisent plus rien depuis les pyramides. Vexée, Cléopâtre charge son architecte Numérobis de bâtir un palais pour César en trois mois. Pour Numérobis, sa seule chance de venir au bout de cette tâche malgré l'obstruction des Romains est de demander l'aide de son vieil ami Panoramix. Le druide part donc pour l'Égypte lui prêter main-forte, accompagné d'Astérix et Obélix.");
        $asterix_cleopatre->setAuthor($this->getReference("author-goscinny"));
        $manager->persist($asterix_cleopatre);
        $this->addReference("book-RG02454", $asterix_cleopatre);

        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }

}
