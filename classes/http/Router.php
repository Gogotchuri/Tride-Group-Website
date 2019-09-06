<?php


namespace http;


class Router
{
    //Stores request for which router has been created
    private $request;

    /**Stores route handlers
     * i.e GET route function with uri /example-route
     * is stored as $functionMap["get"]["/example-route"];
     */
    private $routeHandlers;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function get($route, $lambda){
        $this->routeHandlers["get"][self::formatRoute($route)] = $lambda;
    }

    function post($route, $lambda){
        $this->routeHandlers["post"][self::formatRoute($route)] = $lambda;
    }

    /**
     * Removes trailing forward slashes from the right of the route.
     * @param string route
     * @return string
     */
    private static function formatRoute($route)
    {
        $query_start = strpos($route, "?");
        if($query_start)
            $route = substr($route, 0, $query_start);
        $result = rtrim($route, '/');
        if ($result === '')
        {
            return '/';
        }
        return $result;
    }


    private function defaultRequestHandler()
    {
        require(VIEWS . "/errors/404.shtml");
    }

    /**
     * Resolves a route
     */
    function resolve()
    {
        $requestParams = $this->request->getRequestParams();
        //TODO might need to check key existence before addressing
        $methodHandlers = $this->routeHandlers[ strtolower($requestParams["request_method"]) ];
        $route = $this->formatRoute( $requestParams["request_uri"] );

        if($methodHandlers == null || !array_key_exists($route, $methodHandlers)){
            $this->defaultRequestHandler();
            return;
        }
        $lambda = $methodHandlers[$route];

        echo call_user_func_array($lambda, array($this->request));
    }

    function __destruct()
    {
        $this->resolve();
    }

}