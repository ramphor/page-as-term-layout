<?php
namespace Ramphor\TermLayout\References;

class PageReference
{
    protected $postType;

    public function __construct($postType)
    {
        $this->postType = $postType;
    }
}
