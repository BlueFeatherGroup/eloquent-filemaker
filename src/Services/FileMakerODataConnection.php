<?php


namespace BlueFeather\EloquentFileMaker\Services;

use BlueFeather\EloquentFileMaker\Database\Query\Builder;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Http;

class FileMakerODataConnection extends Connection {

    /**
     * Get a new query builder instance.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return new Builder(
            $this, $this->getQueryGrammar(), $this->getPostProcessor()
        );
    }

    /**
     * Run a select statement against the database.
     *
     * @param  string  $query
     * @param  array  $bindings
     * @param  bool  $useReadPdo
     * @return array
     */
    public function select($query, $bindings = [], $useReadPdo = true)
    {
        $result =  $this->requestRecords($query);

        $processedData = [];
        return $processedData;

    }

    protected function requestRecords($query)
    {

        // perform the login
        $response = Http::withBasicAuth($this->config['username'], $this->config['password'])->get($this->getDatabaseUrl());
        $response = $request->withMiddleware($this->retryMiddleware())
            ->{$method}($url, $params);

        // Check for errors
        $this->checkResponseForErrors($response);

        // Return the JSON response
        $json = $response->json();
        return $json;

        return '';

    }

    protected function getDatabaseUrl()
    {
        return ($this->config['protocol'] ?? 'https') . "://" . $this->config['host'] . '/fmi/odata/v4/' . $this->config['database'];
    }

}
