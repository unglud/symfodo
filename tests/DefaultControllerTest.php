<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    private $entityManager;

    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();

        $this->entityManager = $this->client->getContainer()->get('doctrine.orm.entity_manager');

        $this->entityManager->beginTransaction();
        $this->entityManager->getConnection()->setAutoCommit(false);
    }

    protected function tearDown(): void
    {
        $this->entityManager->rollback();
        $this->entityManager->close();
        $this->entityManager = null;
    }

    public function testSomething(): void
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'DefaultController');

        $link = $crawler->filter('a:contains("awesome link")')->link();

        $crawler = $this->client->click($link);
        $this->assertStringContainsString('This is login', $client->getResponse()->getContent());
    }


    /**
     * @dataProvider provideUrls
     */
    public function testDataProviders($url)
    {
        $crawler = $this->client->request('GET', $url);
        $this->assertResponseIsSuccessful();
    }

    public function provideUrls()
    {
        return [['/', '/login']];
    }

    public function testFindVideo()
    {
        //$this->entityManager->getRepository(Video::class)
    }
}
