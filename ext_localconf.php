<?php

defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Balumedien.ExtbaseGallery',
	'Pi1',
	[
		'Gallery' => 'list, show',
		'Album' => 'show',
	],
	// non-cacheable actions
	[
		'Gallery' => 'list, show',
		'Album' => 'show',
	]
);