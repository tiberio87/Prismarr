<?php

namespace App\Tests\Controller;

use App\Tests\AbstractWebTestCase;

final class ItalianLocaleRenderTest extends AbstractWebTestCase
{
    public function testLoginRendersInItalian(): void
    {
        $this->client->getCookieJar()->clear();
        $this->client->request('GET', '/login?_locale=it');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html[lang="it"]');
        $this->assertSelectorTextContains('button[type="submit"]', 'Accedi');
    }

    public function testAdminSettingsOfferItalianAndRenderTranslatedLabels(): void
    {
        $this->client->request('GET', '/admin/settings?_locale=it');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('html[lang="it"]');
        $this->assertSelectorTextContains('#prismarr_ui option[value="it"]', 'Italiano');
        $this->assertSelectorTextContains('label[for="prismarr_ui"]', "Lingua dell'interfaccia");
    }
}
