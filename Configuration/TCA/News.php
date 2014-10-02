<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_trbpinews_domain_model_news'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_trbpinews_domain_model_news']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, header, teaser, date, authorname, authormail, archivedate, bodytext, images, categories',
	),
	'types' => array(
		'1' => array('showitem' => '
				sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1,
				--palette--;LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:palette.date;date,
				--palette--;LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:palette.author;author,
				header, teaser, bodytext;;;richtext:rte_transform[mode=ts_links],
			--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.images, images,
			--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime,
			--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories

		'),
	),
	'palettes' => array(
		'author' => array('canNotCollapse' => '1', 'showitem' => 'authorname, --linebreak--, authormail'),
		'date' => array('canNotCollapse' => '1', 'showitem' => 'date, archivedate'),

	),
	'columns' => array(

		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_trbpinews_domain_model_news',
				'foreign_table_where' => 'AND tx_trbpinews_domain_model_news.pid=###CURRENT_PID### AND tx_trbpinews_domain_model_news.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'header' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.header',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'teaser' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.teaser',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 5,
				'eval' => 'trim'
			)
		),
		'date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.date',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date,required',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'authorname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.authorname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'authormail' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.authormail',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'archivedate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.archivedate',
			'config' => array(
				'dbType' => 'date',
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'checkbox' => 0,
				'default' => '0000-00-00'
			),
		),
		'bodytext' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.bodytext',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'images',
				array('maxitems' => 10),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'categories' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:trb_pi_news/Resources/Private/Language/locallang_db.xlf:tx_trbpinews_domain_model_news.categories',
					'config' => array(
					'type' => 'select',
					'renderMode' => 'tree',
					'treeConfig' => array(
						'parentField' => 'parent',
						'appearance' => array(
							'showHeader' => TRUE,
							'allowRecursiveMode' => TRUE,
							'expandAll' => TRUE,
							'maxLevels' => 99,
						),
					),
					'MM' => 'sys_category_record_mm',
					'MM_match_fields' => array(
						'fieldname' => 'category',
						'tablenames' => 'tx_trbpinews_domain_model_news',
					),
					'MM_opposite_field' => 'items',
					'foreign_table' => 'sys_category',
					'foreign_table_where' => ' AND (sys_category.sys_language_uid = 0 OR sys_category.l10n_parent = 0) ORDER BY sys_category.sorting',
					'size' => 10,
					'autoSizeMax' => 20,
					'minitems' => 0,
					'maxitems' => 20,
				)
		),

	),
);
