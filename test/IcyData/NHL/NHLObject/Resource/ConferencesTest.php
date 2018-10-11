<?php

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Guzzle\Plugin\Mock\MockPlugin;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use IcyData\NHL\Client;
use IcyData\NHL\NHLObject\Conference;

class ConferencesTest extends TestCase {

    private $fixtures = [];

    private $client;

    public function setUp() {
        $this->guzzleClientMock = $this->getMockBuilder('\GuzzleHttp\Client')
            ->setMethods(array('get'))
            ->getMock();

        $this->client = new Client(new NullLogger());
        $this->client->setGuzzle($this->guzzleClientMock);

        $this->fixtures['list']       = file_get_contents(__DIR__ . '/../../../../fixtures/conferences_list.json');
        $this->fixtures['get']        = file_get_contents(__DIR__ . '/../../../../fixtures/conferences_get.json');
    }

    public function testList() {
        $this->guzzleClientMock
            ->expects($this->at(0))
            ->method('get')
            ->with($this->stringContains('conference'))
            ->willReturn(new GuzzleResponse(200, [], $this->fixtures['list']));

        $conferences = $this->client->conferences->list()->send();

        foreach ($conferences as $conference) {
            $this->assertTrue($conference instanceof Conference);
        }
    }

    /**
     * @expectedException \IcyData\NHL\Exception\NHLException
     */
    public function testListError() {
        $e = new ClientException("", new GuzzleRequest('GET', 'conference'), new GuzzleResponse('404'));

        $this->guzzleClientMock
            ->expects($this->at(0))
            ->method('get')
            ->with($this->stringContains('conferences'))
            ->will($this->throwException($e));

        $this->client->conferences->list()->send();
    }

    public function testGet() {
        $this->guzzleClientMock
            ->expects($this->at(0))
            ->method('get')
            ->with($this->stringContains('conferences/1'))
            ->willReturn(new GuzzleResponse(200, [], $this->fixtures['get']));

        $conference = $this->client->conferences->get(1)->send();
        $this->assertTrue($conference instanceof Conference);
    }
}
