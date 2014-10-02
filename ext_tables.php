<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}


/*
 * PLUGIN
*/
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'News', 'News');


/*
 * FLEXFORM
*/
$TCA['tt_content']['types']['list']['subtypes_excludelist']['trbpinews_news'] = 'layout,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist']['trbpinews_news'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('trbpinews_news', 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/news.xml');


/*
 * TYPOSCRIPT
*/
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TRB PI News');


/*
 * TABLE: NEWS
*/
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_trbpinews_domain_model_news');
$GLOBALS['TCA']['tx_trbpinews_domain_model_news'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news',
		'label' => 'header',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'header,teaser,date,authorname,authormail,archivedate,bodytext,images,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/News.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_trbpinews_domain_model_news.gif'
	),
);
