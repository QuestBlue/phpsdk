<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\CurlWrapper\CurlRequest;

class CurlRequestTest extends TestCase
{
    /**
     * @covers
     */
    public function testCanGetTodo(){
        // Create a mock of CurlRequest that returns a canned response
        $mockResponse = '{"userId": 1, "id": 1, "title": "delectus aut autem", "completed": false}';
        $curl = $this->createMock(CurlRequest::class);
        $curl->method('execute')->willReturn($mockResponse);
        $curl->method('getInfo')->willReturn(200);

        $response = $curl->execute();

        $this->assertIsString($response);
        $this->assertNotEmpty($response);

        $json = json_decode($response);

        $this->assertNotNull($json);
        $this->assertEquals(1, $json->id);
        $this->assertEquals('delectus aut autem', $json->title);

        $status = $curl->getInfo(CURLINFO_HTTP_CODE);

        $this->assertEquals(200, $status);
    }
}