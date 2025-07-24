<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheetsService
{
    protected $client;
    protected $service;
    protected $spreadsheetId;
    protected $range;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName('Google Sheets API');
        $this->client->setScopes([Sheets::SPREADSHEETS_READONLY]);
        $this->client->setAuthConfig(storage_path('app/credentials.json')); // File credentials dari Google Cloud
        $this->client->setAccessType('offline');

        $this->service = new Sheets($this->client);
        $this->spreadsheetId = '1DJ55pfX13929wE37CuEGs9zfY7RsnbM6blAoXQvmRZY';
        $this->range = 'Form Responses 1!A2:G'; // Sesuaikan dengan range data Anda
    }

    public function getData()
    {
        $response = $this->service->spreadsheets_values->get($this->spreadsheetId, $this->range);
        return $response->getValues();
    }
}
