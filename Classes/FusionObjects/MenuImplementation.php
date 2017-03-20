<?php
namespace Onedrop\SectionMenu\FusionObjects;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\ContentRepository\Domain\Repository\NodeDataRepository;
use Neos\Fusion\Exception as FusionException;
use Neos\Flow\Annotations as Flow;

class MenuImplementation extends \Neos\Neos\Fusion\MenuImplementation
{

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
    protected function buildMenuItemRecursive(NodeInterface $currentNode)
    {
        if ($this->isNodeHidden($currentNode)) {
            return null;
        }

        $item = [
            'node' => $currentNode,
            'state' => self::STATE_NORMAL,
            'label' => $currentNode->getLabel(),
            'menuLevel' => $this->currentLevel,
            'sections' => []
        ];

        $item['state'] = $this->calculateItemState($currentNode);
        if (!$this->isOnLastLevelOfMenu($currentNode)) {
            $this->currentLevel++;
            $item['subItems'] = $this->buildMenuLevelRecursive($currentNode->getChildNodes($this->getFilter()));
            $this->currentLevel--;
        }
        $contextNode = $currentNode->getPrimaryChildNode();
        if ($contextNode instanceof NodeInterface) {
            $result = $this->nodeDataRepository->findByParentAndNodeTypeInContext($contextNode->getPath(), 'Onedrop.SectionMenu:Section', $contextNode->getContext(), true);
            $item['sections'] = $result;
        }
        if (!empty($item['sections']) || !empty($item['subItems'])) {
            $item['hasChildren'] = true;
        } else {
            $item['hasChildren'] = false;
        }

        return $item;
    }
}
