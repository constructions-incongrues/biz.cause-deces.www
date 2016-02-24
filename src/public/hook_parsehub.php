<?php
require_once(__DIR__.'/../../vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client;

// Fetch configuration
require_once(__DIR__.'/../config.php');

$run = [];
$request = Request::createFromGlobals();
parse_str($request->getContent(), $run);

if (isset($run['data_ready']) && $run['data_ready'] == 1) {
    $client = new Client(['base_uri' => 'https://www.parsehub.com']);
    $response = $client->get(sprintf('/api/v2/runs/%s/data', $run['run_token']), ['query' => ['api_key' => $config['parsehubApiKey']]]);
    file_put_contents(__DIR__.'/'.$config['causeTitle'].'/data.json', $response->getBody()->getContents());
}
