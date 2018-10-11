<?php

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Guzzle\Plugin\Mock\MockPlugin;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use IcyData\NHL\Client;
use IcyData\NHL\NHLObject\Division;

class DivisionsTest extends TestCase {

    private $fixtures = [];

    private $client;

    public function setUp() {
        $this->guzzleClientMock = $this->getMockBuilder('\GuzzleHttp\Client')
            ->setMethods(array('get'))
            ->getMock();

        $this->client = new Client(new NullLogger());
        $this->client->setGuzzle($this->guzzleClientMock);

        $this->fixtures['list']       = file_get_contents(__DIR__ . '/../../../../fixtures/divisions_list.json');
        $this->fixtures['get']        = file_get_contents(__DIR__ . '/../../../../fixtures/divisions_get.json');
    }

    public function testList() {
        $this->guzzleClientMock
            ->expects($this->at(0))
            ->method('get')
            ->with($this->stringContains('division'))
            ->willReturn(new GuzzleResponse(200, [], $this->fixtures['list']));

        $divisions = $this->client->divisions->list()->send();

        foreach ($divisions as $division) {
            $this->assertTrue($division instanceof Division);
        }
    }

    /**
     * @expectedException \IcyData\NHL\Exception\NHLException
     */
    public function testListError() {
        $e = new ClientException("", new GuzzleRequest('GET', 'division'), new GuzzleResponse('404'));

        $this->guzzleClientMock
            ->expects($this->at(0))
            ->method('get')
            ->with($this->stringContains('divisions'))
            ->will($this->throwException($e));

        $this->client->divisions->list()->send();
    }

    public function testGet() {
        $this->guzzleClientMock
            ->expects($this->at(0))
            ->method('get')
            ->with($this->stringContains('divisions/1'))
            ->willReturn(new GuzzleResponse(200, [], $this->fixtures['get']));

        $division = $this->client->divisions->get(1)->send();
        $this->assertTrue($division instanceof Division);
    }
}
