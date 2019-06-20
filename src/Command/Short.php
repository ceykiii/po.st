<?php

namespace Acar\Post\Command;

use Acar\Post\Command\AbstractCommand;

/**
 * Short class 
 *
 * @author Cem AÇAR <myceykiii@gmail.com>
 */
class Short extends AbstractCommand
{
    /**
     * The namespace.
     *
     * @var string
     */
    protected $namespace = "shorten";
    /**
     * Create Sorht Url 
     * @param $request array
     * 
     * @return array
     */
    public function createSortUrl($longUrl)
    {   

        $result = [
            "longUrl" =>$longUrl
        ];

        return $this->get($this->namespace, $result);
    }
}
