<?php

declare(strict_types=1);

class WeatherService
{
    public function __construct(private WeatherApiClient $api_client)
    {
    }

    public function getTemperatureForCity(string $city): string
    {
        $data = $this->api_client->fetchCurrentWeather($city);

        return $data['temperature'] . '°C';
    }
}
