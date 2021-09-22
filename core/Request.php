<?php

declare(strict_types=1);

namespace core;
use \core\Parser;
use \core\Factory;

class Request extends Parser
{

    private object $factory;

    public function __construct()
    {
        $this->factory = new Factory;
        $this->bootQuery();
        $this->bootPayload();
        $this->bootFiles();
    }

    public function query()
    {
        return $this->factory->query();
    }

    private function bootQuery()
    {
        Parser::parseQuery(
            factory: $this->factory,
            query: $_SERVER["QUERY_STRING"]
        );
    }

    private function bootPayload()
    {
        Parser::parsePayload(
            factory: $this->factory,
            payload: file_get_contents('php://input')
        );
    }

    private function bootFiles()
    {
        Parser::parseFiles(
           factory: $this->factory,
           files: $_FILES
       );
    }
}
