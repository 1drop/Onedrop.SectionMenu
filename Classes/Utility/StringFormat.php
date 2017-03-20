<?php
namespace Onedrop\SectionMenu\Utility;

/**
 * Class StringFormat
 *
 * @package Onedrop\SectionMenu\Utility
 */
class StringFormat
{

    /**
     * Only keeps allowed characters in string for usage in
     * HTML ID attribute.
     *
     * Note: You should already have removed html tags
     *
     * @param string $input
     * @return string
     */
    public static function htmlId($input)
    {
        $input = str_replace(' ', '-', $input);
        $input = str_replace('/', '-', $input);
        $input = str_replace(',', '-', $input);
        $input = str_replace('|', '-', $input);
        $input = str_replace('.', '-', $input);
        $input = str_replace('ä', 'ae', $input);
        $input = str_replace('ü', 'ue', $input);
        $input = str_replace('ö', 'oe', $input);
        $input = preg_replace('/[^[:alnum:]]/', '', trim($input));
        while (strpos($input, '--') !== false) {
            $input = str_replace('--', '-', $input);
        }
        return $input;
    }
}
