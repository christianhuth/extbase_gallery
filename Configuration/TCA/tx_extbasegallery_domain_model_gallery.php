<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_gallery.title',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		],
		'searchFields' => 'name,description,albums',
		'iconfile' => 'EXT:extbase_gallery/Resources/Public/Icons/tx_extbasegallery_domain_model_gallery.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, albums',
	],
	'types' => [
		'1' => ['showitem' => '	name, slug, description,
								--div--;LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_tabs.xlf:albums, albums,
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
						'eval' => 'required, uniqueInSite',
				],
		],
		
		'name' => [
			'exclude' => true,
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_gallery.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'required, trim'
			],
		],
		'description' => [
			'exclude' => true,
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_gallery.description',
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
		'albums' => [
			'exclude' => true,
			'label' => 'LLL:EXT:extbase_gallery/Resources/Private/Language/locallang_db.xlf:tx_extbasegallery_domain_model_gallery.albums',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_extbasegallery_domain_model_album',
				'foreign_field' => 'gallery',
				'maxitems' => 9999,
				'appearance' => [
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				],
			],
			
		],
		
	],
];
