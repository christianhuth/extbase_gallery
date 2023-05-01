<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('extbase_gallery', 'Configuration/TypoScript', 'Extbase Gallery');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extbasegallery_domain_model_gallery', 'EXT:extbase_gallery/Resources/Private/Language/locallang_csh_tx_extbasegallery_domain_model_gallery.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extbasegallery_domain_model_gallery');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extbasegallery_domain_model_album', 'EXT:extbase_gallery/Resources/Private/Language/locallang_csh_tx_extbasegallery_domain_model_album.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extbasegallery_domain_model_album');

    }
);
