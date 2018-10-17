<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageControllerTest extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Bienvenue sur l\'ERP de Lab4Tech', $client->getResponse()->getContent());
    }
}