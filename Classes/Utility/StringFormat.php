<?php
namespace Onedrop\SectionMenu\Utility;

use Behat\Transliterator\Transliterator;

/**
 * Class StringFormat
 *
 * @package Onedrop\SectionMenu\Utility
 */
class StringFormat
{

    /**
     * Transforms text into a slug.
     *
     * @param string $input
     * @return string
     */
    public static function htmlId($input)
    {
        return Transliterator::urlize($input);
    }
}
