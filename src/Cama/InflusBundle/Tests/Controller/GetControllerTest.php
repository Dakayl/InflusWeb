<?php

namespace Cama\InflusBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetControllerTest extends WebTestCase
{
    public function testAccess()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/access');
    }

    public function testListetours()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listeTours');
    }

    public function testOrdresactuels()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ordresActuels');
    }

    public function testOrdresprecedents()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ordresPrecedents');
    }

    public function testEditertours()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editerTours');
    }

    public function testEditerpersonnage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editerPersonnage');
    }

}
