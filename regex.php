<?php

class Regex
{
	/* Change the link to an embed version */
    public function linkToEmbed($string)
    {
    	$cutMe = 'watch?v=';
    	$orMe = 'youtu.be';
    	$newString = str_replace($cutMe, "embed/", $string); 	
    	$resultString = str_replace($orMe, "www.youtube.com/embed", $newString);
    	return $resultString;
    }
}

// $link = new Regex();
// echo $link->linkToEmbed("https://www.youtube.com/watch?v=3QrQdv_TP5Q") . '<br />';
// echo $link->linkToEmbed("https://youtu.be/_GjHWa9hQic") . '<br />';
// echo $link->linkToEmbed("https://youtu.be/3QrQdv_TP5Q") . '<br />';
// https://www.youtube.com/embed/3QrQdv_TP5Q

/*
README.md 

composer require twig/extensions

{{ tutorial.link|embed(tutorial.link) }}


// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('embed', array($this, 'embedFilter')),
        );
    }

    public function embedFilter($string)
    {
        $cutMe = 'watch?v=';
    	$orMe = 'youtu.be';
    	$newString = str_replace($cutMe, "embed/", $string); 	
    	$resultString = str_replace($orMe, "www.youtube.com/embed", $newString);
    	return $resultString;
    }
}

# config/services.yaml
services:
    App\Twig\AppExtension:
        public: false
        tags: ['twig.extension']

*/
