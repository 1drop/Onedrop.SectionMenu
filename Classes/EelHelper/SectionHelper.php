<?php

namespace Onedrop\SectionMenu\EelHelper;

use Onedrop\SectionMenu\Utility\StringFormat;
use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;

/**
 * String helpers for Eel contexts
 *
 * @Flow\Proxy(false)
 */
class SectionHelper implements ProtectedContextAwareInterface
{

    /**
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }

    /**
     * Only keeps allowed characters in string for usage in
     * HTML ID attribute
     *
     * @param string $string
     * @return string The string formatted to be used in ID attribute
     */
    public function htmlId($string)
    {
        return StringFormat::htmlId($string);
    }
}
