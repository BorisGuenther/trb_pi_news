<?php
namespace TRB\TrbPiNews\ViewHelpers;

class GroupViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param QueryResultInterface|array $items
	 * @param string $as
	 *
	 * @return string
	 */
	public function render($items, $as) {
		//Adjust input
		if($items instanceof \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult) {
			$items	= $items->toArray();
		}

		//Setup result
		$result	= array();
		foreach($items as $item) {
			$item instanceof \TRB\TrbPiNews\Domain\Model\News;
			$key = $item->getDate()->format('Y-m');
			$result[$key][]	= $item;
		}

		//Process items
		$this->templateVariableContainer->add($as, $result);
		$content	= $this->renderChildren();
		$this->templateVariableContainer->remove($as);

		//Deliver
		return $content;
	}

}
