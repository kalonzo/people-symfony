<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CandidatControllerTest extends WebTestCase
{
   private $controller_url = '/candidat';
    public function testShowPost()
    {
        $client = static::createClient();
        $client->request('GET', $this->controller_url.'/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}