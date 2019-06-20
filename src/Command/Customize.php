<?php

namespace Acar\Post\Command;

use Acar\Post\Command\AbstractCommand;

/**
 * Customize class 
 *
 * @author Cem AÇAR <myceykiii@gmail.com>
 */
class Customize extends AbstractCommand
{
    /**
     * The namespace.
     *
     * @var string
     */
    protected $namespace = "customize";
    /**
     * Create Sorht Url
     * 
     * @param $hash string
     * @param $customHash string
     * @param $longUrl string
     * @param $smartLink array
     * 
     * @return array
     */
    public function customSortUrl(string $hash, string $customHash = '', array $smartLink = [])
    {   
        $result = [
            "hash" => $hash
        ];

        if($customHash <> ''){
            $result["customHash"] = $customHash;    
        } 

        if(count($smartLink) > 0){
            $result["smartLinks"] = "[".json_encode($smartLink,JSON_UNESCAPED_SLASHES)."]";    
        } 
        
        return $this->get($this->namespace,$result);
    }
}
