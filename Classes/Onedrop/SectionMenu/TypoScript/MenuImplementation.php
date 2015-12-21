<?php
namespace Onedrop\SectionMenu\TypoScript;

use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\TYPO3CR\Domain\Repository\NodeDataRepository;
use TYPO3\TypoScript\Exception as TypoScriptException;
use TYPO3\Flow\Annotations as Flow;

class MenuImplementation extends \TYPO3\Neos\TypoScript\MenuImplementation {

    /**
     * @Flow\Inject
     * @var NodeDataRepository
     */
    protected $nodeDataRepository;

    /**
     * Prepare the menu item with state and sub items if this isn't the last menu level.
     *
     * @param NodeInterface $currentNode
     * @return array
     */
    protected function buildMenuItemRecursive(NodeInterface $currentNode) {
        if ($this->isNodeHidden($currentNode)) {
            return NULL;
        }

        $item = array(
            'node' => $currentNode,
            'state' => self::STATE_NORMAL,
            'label' => $currentNode->getLabel()
        );

        $item['state'] = $this->calculateItemState($currentNode);
        if (!$this->isOnLastLevelOfMenu($currentNode)) {
            $this->currentLevel++;
            $item['subItems'] = $this->buildMenuLevelRecursive($currentNode->getChildNodes($this->getFilter()));
            $this->currentLevel--;
        }
        $contextNode = $currentNode->getPrimaryChildNode();
        $result = $this->nodeDataRepository->findByParentAndNodeTypeInContext($contextNode->getPath(), 'Onedrop.SectionMenu:Section', $contextNode->getContext(), TRUE);
        $item['sections'] = $result;
        if (!empty($item['sections']) || !empty($item['subItems'])) {
            $item['hasChildren'] = true;
        } else {
            $item['hasChildren'] = false;
        }

        return $item;
    }
}