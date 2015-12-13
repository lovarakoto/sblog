<?php

namespace Blogger\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testAddBlogComment()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/21/a-day-with-symfony');

        $this->assertEquals(1, $crawler->filter('h2:contains("A day with Symfony2")')->count());

        // Select based on button value, or id or name for buttons
        $form = $crawler->selectButton('Submit')->form();

        $crawler = $client->submit($form, array(
            'blogger_blogbundle_comment[user]'          => 'name',
            'blogger_blogbundle_comment[comment]'       => 'comment',
        ));

        // Il faut suivre la redirection
        $crawler = $client->followRedirect();

        // On vérifie que le comment s'affiche, et que c'est le dernier. Cela assure que les commentaires
        // vont du plus vieux au plus récent.
        $articleCrawler = $crawler->filter('section .previous-comments article')->last();

        $this->assertEquals('name', $articleCrawler->filter('header span.highlight')->text());
        $this->assertEquals('comment', $articleCrawler->filter('p')->last()->text());

        // On vérifie que la barre latérale affiche bien 10 derniers articles.
        $this->assertEquals(10, $crawler->filter('aside.sidebar section')->last()
                                        ->filter('article')->count()
        );

        $this->assertEquals('name', $crawler->filter('aside.sidebar section')->last()
                                            ->filter('article')->first()
                                            ->filter('header span.highlight')->text()
        );
    }
}

