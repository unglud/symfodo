<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'DefaultController');

        $link = $crawler->filter('a:contains("awesome link")')->link();

        $crawler = $client->click($link);
        $this->assertStringContainsString('This is login', $client->getResponse()->getContent());
    }


    /**
     * @dataProvider provideUrls
     */
    public function testDataProviders($url)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $url);
        $this->assertResponseIsSuccessful();
    }

    public function provideUrls()
    {
        return [['/', '/login']];
    }
}
