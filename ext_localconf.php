<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}


/*
 * PLUGIN
*/
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin('TRB.'.$_EXTKEY, 'News', array('News' => 'list, detail'));
