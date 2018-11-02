<?php

namespace App\DataFixtures;

use App\Entity\Marketing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MarketingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $item1 = new Marketing();
        $item1->setType("Diseñadora");
        $item1->setValor(2);
        $item1->setDias(2);
        $item1->setHoras(2);
        $item1->setMeses(2);
        $manager->persist($item1);

        $item2 = new Marketing();
        $item2->setType("Tecnico SEO");
        $item2->setValor(2);
        $item2->setDias(2);
        $item2->setHoras(2);
        $item2->setMeses(2);
        $manager->persist($item2);

        $item9 = new Marketing();
        $item9->setType("Tarjetas");
        $item9->setValor(2);
        $item9->setDias(2);
        $item9->setHoras(2);
        $item9->setMeses(2);
        $manager->persist($item9);

        $item3 = new Marketing();
        $item3->setType("Folletos");
        $item3->setValor(2);
        $item3->setDias(2);
        $item3->setHoras(2);
        $item3->setMeses(2);
        $manager->persist($item3);

        $item4 = new Marketing();
        $item4->setType("Google adwords");
        $item4->setValor(2);
        $item4->setDias(2);
        $item4->setHoras(2);
        $item4->setMeses(2);
        $manager->persist($item4);

        $item5 = new Marketing();
        $item5->setType("Hosting Web");
        $item5->setValor(2);
        $item5->setDias(2);
        $item5->setHoras(2);
        $item5->setMeses(2);
        $manager->persist($item5);

        $item6 = new Marketing();
        $item6->setType("Dominio Web");
        $item6->setValor(2);
        $item6->setDias(2);
        $item6->setHoras(2);
        $item6->setMeses(2);
        $manager->persist($item6);

        $item7 = new Marketing();
        $item7->setType("Mercado Libre");
        $item7->setValor(2);
        $item7->setDias(2);
        $item7->setHoras(2);
        $item7->setMeses(2);
        $manager->persist($item7);

        $item8 = new Marketing();
        $item8->setType("Facebook");
        $item8->setValor(2);
        $item8->setDias(2);
        $item8->setHoras(2);
        $item8->setMeses(2);
        $manager->persist($item8);



        $manager->flush();
    }
}
