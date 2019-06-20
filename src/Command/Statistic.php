<?php

namespace Acar\Post\Command;

use Acar\Post\Command\AbstractCommand;

/**
 * Statistic class 
 *
 * @author Cem AÇAR <myceykiii@gmail.com>
 */
class Statistic extends AbstractCommand
{
    /**
     * The namespace.
     *
     * @var string
     */
    protected $namespace = "daily";
    /**
     * Create Sorht Url 
     * @param $shortUrl string
     * @param $hash string
     * 
     * @return array
     */
    public function getStatic(string $shortUrl, string $hash, string $days = '')
    {
        $result = [
            "shortUrl" => $shortUrl,
            "hash" => $hash
        ];

        if($days <> '') {
            $result["days"] = $days;
        }

        return $this->get($this->namespace, $result);
    }
}
