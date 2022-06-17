<?php


namespace BlueFeather\EloquentFileMaker\Services;

use BlueFeather\EloquentFileMaker\Database\Query\FMODataBuilder;
use Closure;
use Illuminate\Database\Connection;

class FileMakerODataConnection extends Connection {



    /**
     * The table prefix for the connection.
     *
     * @var string
     */
    protected $tablePrefix = '';
    /**
     * @var string
     */
    protected $database;
    /**
     * @var array
     */
    protected $config;


}
