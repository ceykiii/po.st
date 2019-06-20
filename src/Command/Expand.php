<?php

namespace Acar\Post\Command;

use Acar\Post\Command\AbstractCommand;

/**
 * Expand Class 
 *
 * @author Cem AÇAR <myceykiii@gmail.com>
 */
class Expand extends AbstractCommand
{
    /**
     * The namespace.
     *
     * @var string
     */
    protected $namespace = "expand";
    /**
     * Create Sorht Url
     * 
     * @param $hash string
     * @param $customHash string
     * 
     * @return array
     */
    public function decodeSortUrl(string $shortUrl, string $hash)
    {
        $result = [
            "shortUrl" => $shortUrl,
            "hash" => $hash
        ];

        return $this->get($this->namespace, $result);
    }
}
