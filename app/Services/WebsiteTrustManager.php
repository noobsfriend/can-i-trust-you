<?php

namespace App\Services;

use App\Criteria\Criterion;
use GuzzleHttp\Client;

class WebsiteTrustManager
{
	public array $criteria;
	private Client $client;

	public function __construct(array $criteria, Client $client)
	{
		$this->criteria = $criteria;
		$this->client = $client;
	}

	public function getRanking(string $url): array
	{
		$data = $this->getWebsiteData($url);
		$ranking = 0.0;
		$result = [];

		foreach ($this->criteria as $criterion) {
			if (!$criterion instanceof Criterion) {
				continue;
			}

			$processed = $criterion->process($data['body']);

			$ranking = $processed ? -.1 : +.1;
			$class = get_class($criterion);

			$result[] = compact('class', 'processed');
		}

		return compact('result', 'ranking');
	}

	private function getWebsiteData(string $url): array
	{
		try {
			$response = $this->client->get($url);
		} catch (\Exception $exception) {

		}

		return [
			'body' => $response->getBody()->getContents(),
			'headers' => $response->getHeaders(),
		];
	}
}
