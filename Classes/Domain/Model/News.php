<?php
namespace TRB\TrbPiNews\Domain\Model;


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
 * News
 */
class News extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * header
	 *
	 * @var string
	 */
	protected $header = '';

	/**
	 * teaser
	 *
	 * @var string
	 */
	protected $teaser = '';

	/**
	 * date
	 *
	 * @var \DateTime
	 */
	protected $date = NULL;

	/**
	 * authorname
	 *
	 * @var string
	 */
	protected $authorname = '';

	/**
	 * authormail
	 *
	 * @var string
	 */
	protected $authormail = '';

	/**
	 * archivedate
	 *
	 * @var \DateTime
	 */
	protected $archivedate = NULL;

	/**
	 * bodytext
	 *
	 * @var string
	 */
	protected $bodytext = '';

	/**
	 * images
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $images = NULL;

	/**
	 * Returns the header
	 *
	 * @return string $header
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * Sets the header
	 *
	 * @param string $header
	 * @return void
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

	/**
	 * Returns the teaser
	 *
	 * @return string $teaser
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Sets the teaser
	 *
	 * @param string $teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;
	}

	/**
	 * Returns the authorname
	 *
	 * @return string $authorname
	 */
	public function getAuthorname() {
		return $this->authorname;
	}

	/**
	 * Sets the authorname
	 *
	 * @param string $authorname
	 * @return void
	 */
	public function setAuthorname($authorname) {
		$this->authorname = $authorname;
	}

	/**
	 * Returns the authormail
	 *
	 * @return string $authormail
	 */
	public function getAuthormail() {
		return $this->authormail;
	}

	/**
	 * Sets the authormail
	 *
	 * @param string $authormail
	 * @return void
	 */
	public function setAuthormail($authormail) {
		$this->authormail = $authormail;
	}

	/**
	 * Returns the archivedate
	 *
	 * @return \DateTime $archivedate
	 */
	public function getArchivedate() {
		return $this->archivedate;
	}

	/**
	 * Sets the archivedate
	 *
	 * @param \DateTime $archivedate
	 * @return void
	 */
	public function setArchivedate(\DateTime $archivedate) {
		$this->archivedate = $archivedate;
	}

	/**
	 * Returns the bodytext
	 *
	 * @return string $bodytext
	 */
	public function getBodytext() {
		return $this->bodytext;
	}

	/**
	 * Sets the bodytext
	 *
	 * @param string $bodytext
	 * @return void
	 */
	public function setBodytext($bodytext) {
		$this->bodytext = $bodytext;
	}

	/**
	 * Returns the images
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
	 */
	public function getImages() {
		return $this->images;
	}

	/**
	 * Sets the images
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
	 * @return void
	 */
	public function setImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images) {
		$this->images = $images;
	}

}