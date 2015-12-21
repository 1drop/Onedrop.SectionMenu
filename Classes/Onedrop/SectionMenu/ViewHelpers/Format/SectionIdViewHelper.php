<?php
namespace Onedrop\SectionMenu\ViewHelpers\Format;

use Onedrop\SectionMenu\Utility\StringFormat;
use TYPO3\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\Fluid\Core\ViewHelper\Facets\CompilableInterface;

/**
 * Wrapper for ID formatting utility
 *
 * @api
 */
class SectionIdViewHelper extends AbstractViewHelper implements CompilableInterface {


    /**
     * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
     * @see AbstractViewHelper::isOutputEscapingEnabled()
     * @var boolean
     */
    protected $escapeOutput = FALSE;

    /**
     * Replaces newline characters by HTML line breaks.
     *
     * @param string $value string to format
     * @return string the altered string.
     * @api
     */
    public function render($value = NULL) {
        return self::renderStatic(array('value' => $value), $this->buildRenderChildrenClosure(), $this->renderingContext);
    }

    /**
     * Applies \Onedrop\SectionMenu\Utility\StringFormat::htmlId() on the specified value.
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param \TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     * @return string
     */
    static public function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        $value = $arguments['value'];
        if ($value === NULL) {
            $value = $renderChildrenClosure();
        }

        $value = StringFormat::htmlId($value);

        return $value;
    }
}