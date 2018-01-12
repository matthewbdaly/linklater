<?php

namespace LinkLater\Services;

use LinkLater\Contracts\Services\Fetcher as Contract;
use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Client\Common\PluginClient;
use Http\Client\Common\Plugin\RedirectPlugin;

class Fetcher implements Contract
{
    public function __construct(HttpClient $client = null, MessageFactory $messageFactory = null)
    {
        $client = $client ?: HttpClientDiscovery::find();
        $pluginClient = new PluginClient(
            $client,
            [new RedirectPlugin()]
        );
        $this->client = $pluginClient;
        $this->messageFactory = $messageFactory ?: MessageFactoryDiscovery::find();
    }

    public function fetch(string $url)
    {
        $request = $this->messageFactory->createRequest(
            'GET',
            $url
        );
        $response = $this->client->sendRequest($request);
        $content = $this->tidyContent($response->getBody()->getContents());
        $doc = new \DOMDocument();
        $doc->loadHTML($content, LIBXML_NOWARNING|LIBXML_NOERROR);
        $titles = $doc->getElementsByTagName("title");
        if ($titles->length > 0) {
            return trim($titles->item(0)->textContent);
        }
        return null;
    }

    private function tidyContent($content)
    {
        $config = [
            'indent' => true,
            'output-html' => true
        ];
        $tidy = tidy_parse_string($content, $config);
        tidy_clean_repair($tidy);
        return $tidy;
    }
}
