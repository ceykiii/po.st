<?php

namespace Acar\Post\Command;

use GuzzleHttp;

use Acar\Post\Post;

/**
 * Abstract class for Api Command classes.
 *
 * @author Cem AÇAR <myceykiii@gmail.com>
 */
abstract class AbstractCommand
{
    /**
     * The Api Object.
     *
     * @var object
     */
    protected $api;

    /**
     * Construct with API Layer
     * 
     * @param   object $client
     * @return  self
     */
    public function __construct(Post $client)
    {
        $this->api = $client;

        return $this;
    }

    /**
     * GET Request
     *
     * @param   string  $namespace
     * @param   array  $data
     * 
     * @return  array|boolean
     */
    protected function get($namespace, $data = [])
    {
        $this->api->requestUrl .= $namespace . "?";
        $this->api->requestUrl .= "apiKey=" . $this->api->apikey . "&";
        $this->api->requestUrl .= http_build_query($data);        
        return $this->_requestApi($this->api->requestUrl); 
    }

    /**
     * Request Api
     *
     * @param   string  $url 
     * @return  array|boolean
     */
    protected function _requestApi(string $url) {
         
        $httpClient = new GuzzleHttp\Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            'allow_redirects' => true,
            'cookies' => true
        ]);
        
        $response = $httpClient->request('GET', $url);
        $result = $response->getBody()->getContents();
        return $result;
    }
}
