<?php

declare(strict_types=1);

use Mockery\Adapter\Phpunit\MockeryTestCase;

final class WeatherServiceTest extends MockeryTestCase
{
    public function testGetTemperatureForCity(): void
    {
        $mock_api_client = Mockery::mock('WeatherApiClient');

        $mock_api_client->shouldReceive('fetchCurrentWeather')
                        ->once()
                        ->with('Berlin')
                        ->andReturn(['temperature' => 18]);
                    
        $service = new WeatherService($mock_api_client);

        $this->assertSame('18°C', $service->getTemperatureForCity('Berlin'));
    }

    public function testSubsequentMethodCalls(): void
    {
        $mock = $this->createMock(WeatherService::class);

        $map = [
            ['Madrid', '26°C'],
            ['Paris', '21°C'],
            ['London', '17°C']
        ];

        $mock->method('getTemperatureForCity')->willReturnMap($map);

        // $mock->method('getTemperatureForCity')->with('Madrid')->willReturn('26°C');
        // $mock->method('getTemperatureForCity')->with('Paris')->willReturn('21°C');
        // $mock->method('getTemperatureForCity')->with('London')->willReturn('17°C');

        $this->assertSame('26°C', $mock->getTemperatureForCity('Madrid'));
        $this->assertSame('17°C', $mock->getTemperatureForCity('London'));
        $this->assertSame('21°C', $mock->getTemperatureForCity('Paris'));
    }

    public function testSubsequentMethodCallsWithMockery(): void
    {
        $mock = Mockery::mock(WeatherService::class);

        $mock->shouldReceive('getTemperatureForCity')->with('Madrid')->andReturn('26°C');
        $mock->shouldReceive('getTemperatureForCity')->with('Paris')->andReturn('21°C');
        $mock->shouldReceive('getTemperatureForCity')->with('London')->andReturn('17°C');

        $this->assertSame('26°C', $mock->getTemperatureForCity('Madrid'));
        $this->assertSame('17°C', $mock->getTemperatureForCity('London'));
        $this->assertSame('21°C', $mock->getTemperatureForCity('Paris'));        
    }
}