<?php
namespace TRB\TrbPiNews\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Boris Günther <info@boris-guenther.de>, Boris Günther
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * NewsController
 */
class NewsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * newsRepository
	 *
	 * @var \TRB\TrbPiNews\Domain\Repository\NewsRepository
	 * @inject
	 */
	protected $newsRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		//Setup sorting
		switch($this->settings['list_sorting_direction']) {
			case 'ASC':
				$sorting	= array($this->settings['list_sorting_field'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
				break;

			case 'DESC':
				$sorting	= array($this->settings['list_sorting_field'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING);
				break;
		}
		$this->newsRepository->setDefaultOrderings($sorting);

		//Get records
		$news = $this->newsRepository->findAll();

		//Setup view
		$this->view->assign('news', $news);
	}

	/**
	 * action detail
	 *
	 * @param \TRB\TrbPiNews\Domain\Model\News $news
	 * @return void
	 */
	public function detailAction(\TRB\TrbPiNews\Domain\Model\News $news) {
		$this->view->assign('news', $news);
	}

}