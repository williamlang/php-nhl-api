<?php

use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Guzzle\Plugin\Mock\MockPlugin;
use IcyData\NHL\Client;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class ClientTest extends TestCase {

    private $client;

    public function setUp() {
        $this->guzzleClientMock = $this->getMockBuilder('\GuzzleHttp\Client')
            ->setMethods(array('get'))
            ->getMock();

        $this->client = new Client(new NullLogger());
        $this->client->setGuzzle($this->guzzleClientMock);
    }

    public function testSetVersion() {
        $this->assertEquals($this->client->getVersion(), 'v1');
        $this->client->setVersion('v2');
        $this->assertEquals($this->client->getVersion(), 'v2');
    }
}
