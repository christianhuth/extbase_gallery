<?php
return [
	'ctrl' => [
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY albumdate DESC',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		],
		'iconfile' => 'EXT:extbase_gallery/Resources/Public/Icons/tx_extbasegallery_domain_model_album.gif',
		'label' => 'name',
		'languageField' => 'sys_language_uid',
		'searchFields' => 'name,description,images',
		'title' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_album.title',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'tstamp' => 'tstamp',
		'versioningWS' => true,
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, albumdate, images',
	],
	'types' => [
		'1' => ['showitem' => '	gallery, name, slug, description, albumdate, 
								--div--;LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_tabs.xlf:images, images, 
								--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime,
								--div--;LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource'
				],
	],
	'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					],
				],
				'default' => 0,
			]
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => true,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_news_domain_model_news',
				'foreign_table_where' => 'AND tx_news_domain_model_news.pid=###CURRENT_PID### AND tx_news_domain_model_news.sys_language_uid IN (-1,0)',
				'fieldWizard' => [
					'selectIcons' => [
						'disabled' => true,
					],
				],
				'default' => 0,
			]
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
				'default' => ''
			]
		],
		'hidden' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
			'config' => [
				'type' => 'check',
				'default' => 0
			]
		],
		'starttime' => [
			'exclude' => true,
			'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 16,
				'eval' => 'datetime,int',
				'default' => 0,
				'behaviour' => [
					'allowLanguageSynchronization' => true,
				],
			]
		],
		'endtime' => [
			'exclude' => true,
			'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 16,
				'eval' => 'datetime,int',
				'default' => 0,
				'behaviour' => [
					'allowLanguageSynchronization' => true,
				],
			]
		],

		'slug' => [
				'exclude' => true,
				'label' => 'URL Segment',
				'config' => [
						'type' => 'slug',
						'prependSlash' => false,
						'generatorOptions' => [
								'fields' => ['name'],
								'prefixParentPageSlug' => true,
								'replacements' => [
										'/' => '',
								],
						],
						'fallbackCharacter' => '-',
						'eval' => 'required',
				],
		],
		
		'gallery' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_gallery',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_extbasegallery_domain_model_gallery',
				'foreign_table_where' => 'ORDER BY name ASC',
				'items' => Array (
					Array("", ''),
				),
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		'name' => [
			'exclude' => true,
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_album.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'required, trim'
			],
		],
		'description' => [
			'exclude' => true,
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_album.description',
			'config' => [
				'type' => 'text',
				'enableRichtext' => true,
				'richtextConfiguration' => 'default',
				'fieldControl' => [
					'fullScreenRichtext' => [
						'disabled' => false,
					],
				],
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
			],
			
		],
		'albumdate' => [
			'exclude' => true,
			'behaviour' => [
				'allowLanguageSynchronization' => true
			],
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_album.albumdate',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 13,
				'eval' => 'date, required',
				'default' => 0,
			],
		],
		'images' => [
			'exclude' => true,
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_album.images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'images',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
					],
					'foreign_types' => [
						'0' => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						],
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						]
					],
					'minitems' => 1
				],
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		],
	],
];
