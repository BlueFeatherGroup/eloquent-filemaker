<?php


namespace BlueFeather\EloquentFileMaker\Database\Query;


use Illuminate\Database\Query\Expression;
use Illuminate\Support\Str;

class Builder extends \Illuminate\Database\Query\Builder
{

    public $operators = [
        '=', '<', '>', '<=', '>=', '<>', '!='
        ];

    /**
     * All of the available bitwise operators.
     *
     * @var string[]
     */
    public $bitwiseOperators = [];


}
