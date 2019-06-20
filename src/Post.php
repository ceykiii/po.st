<?php

namespace Acar\Post;

use GuzzleHttp;

/**
 * API Client
 * 
 * @version 1.0.0
 * @author Cem AÇAR
 * 
 */

class Post
{
    /**
     * @var string
     */
    public $requestUrl = "http://po.st/api/";

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string 
     */
    protected $shortenUrl;

    /**
     * Client Constructor Method
     *      
     * @param   string  $apikey
     * @param   string  $shortenUrl
     * @return  self
     */
    public function __construct(string $apikey)
    {
        $this->apikey = $apikey; 
    }

    /**
     * @param string $name     
     */
    public function __call($name, $args): object
    {
        try {
            return $this->api($name);
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }

    /**
     * Get Api Object Method
     * 
     * @param string $name  
     */
    public function api($name): object
    {
        $api_class = "Acar\\Post\\Command\\{$name}";
        if (class_exists($api_class)) {
            return new $api_class($this);
        }
        
        throw new InvalidArgumentException(sprintf('Undefined api called: "%s"', $name));
    }

    
}
