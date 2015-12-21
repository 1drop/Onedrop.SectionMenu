<?php

namespace Onedrop\SectionMenu\Eel\Helper;

use Onedrop\SectionMenu\Utility\StringFormat;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Eel\ProtectedContextAwareInterface;

/**
 * String helpers for Eel contexts
 *
 * @Flow\Proxy(false)
 */
class SectionHelper implements ProtectedContextAwareInterface {

    /**
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName) {
        return TRUE;
    }

    /**
     * Only keeps allowed characters in string for usage in
     * HTML ID attribute
     *
     * @param string $string
     * @return string The string formatted to be used in ID attribute
     */
    public function htmlId($string) {
        return StringFormat::htmlId($string);
    }

}