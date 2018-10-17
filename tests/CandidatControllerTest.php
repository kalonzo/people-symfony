<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CandidatControllerTest extends WebTestCase
{
    private $controller_url = '/candidat';

    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $this->controller_url.'/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Create new', $client->getResponse()->getContent());
    }

    public function testNewGet()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $this->controller_url.'/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Save', $client->getResponse()->getContent());
    }
    public function testNewPost()
    {
        $client = static::createClient();
        $crawler = $client->request('POST', $this->controller_url.'/new',[
            'gender'=>1,
            'prename'=>'claude',
            'street'=>'8a chemin de la chenalette',
            'adresse'=>'city',
            'postalCode'=>'1197',
            'city'=>'Prangins',
            'email'=>'claudejanz@gmail.com',
            'birthday'=>'1976-09-18 12:00:00'
        ]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    
}