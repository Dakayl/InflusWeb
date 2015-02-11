<?php

namespace Cama\InflusBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testPhpbbreceive()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/phpbbreceive');
    }

}
