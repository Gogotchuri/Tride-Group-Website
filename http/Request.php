<?php


namespace http;


class Request
{
    private $requestParams;

    public function __construct()
    {
        $this->bootstrapRequest();
    }

    private function bootstrapRequest()
    {
        foreach($_SERVER as $key => $value)
        {
            $this->requestParams[strtolower($key)] = $value;
        }
    }

    public function getData()
    {
        $method = $this->requestParams["request_method"];
        if ($method === "POST")
        {
            $body = array();
            foreach($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }else {
            return null;
        }
    }

    public function getRequestParams(){
        return $this->requestParams;
    }
}