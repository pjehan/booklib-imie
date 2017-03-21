<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LayoutControllerTest extends WebTestCase
{
    public function testMenu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/menu');
    }

}
