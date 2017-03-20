<?php
namespace Onedrop\SectionMenu\ViewHelpers\Format;

use Onedrop\SectionMenu\Utility\StringFormat;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;
use Neos\FluidAdaptor\Core\ViewHelper\Facets\CompilableInterface;

/**
 * Wrapper for ID formatting utility
 *
 * @api
 */
class SectionIdViewHelper extends AbstractViewHelper implements CompilableInterface
{


    /**
     * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
     * @see AbstractViewHelper::isOutputEscapingEnabled()
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * Replaces newline characters by HTML line breaks.
     *
     * @param string $value string to format
     * @return string the altered string.
     * @api
     */
    public function render($value = null)
    {
        return self::renderStatic(array('value' => $value), $this->buildRenderChildrenClosure(), $this->renderingContext);
    }

    /**
     * Applies \Onedrop\SectionMenu\Utility\StringFormat::htmlId() on the specified value.
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $value = $arguments['value'];
        if ($value === null) {
            $value = $renderChildrenClosure();
        }

        $value = StringFormat::htmlId($value);

        return $value;
    }
}
