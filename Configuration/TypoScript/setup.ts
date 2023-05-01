plugin.tx_extbasegallery_pi1 {
	view {
		templateRootPaths.0 = EXT:extbase_gallery/Resources/Private/Templates/
		templateRootPaths.1 = {$plugin.tx_extbasegallery_pi1.view.templateRootPath}
		partialRootPaths.0 = EXT:extbase_gallery/Resources/Private/Partials/
		partialRootPaths.1 = {$plugin.tx_extbasegallery_pi1.view.partialRootPath}
		layoutRootPaths.0 = EXT:extbase_gallery/Resources/Private/Layouts/
		layoutRootPaths.1 = {$plugin.tx_extbasegallery_pi1.view.layoutRootPath}
		widget.DRC\AlbumGallery\ViewHelpers\Widget\PaginateViewHelper.templateRootPath = EXT:extbase_gallery/Resources/Private/Templates/
	}
	persistence {
		#storagePid = {$plugin.tx_extbasegallery_pi1.persistence.storagePid}
		storagePid >
		#recursive = 1
	}
	features {
		#skipDefaultArguments = 1
		# if set to 1, the enable fields are ignored in BE context
		ignoreAllEnableFieldsInBe = 0
		# Should be on by default, but can be disabled if all action in the plugin are uncached
		requireCHashArgumentForActionArguments = 1
	}
	mvc {
		#callDefaultActionIfActionCantBeResolved = 1
	}
	settings{
		imageWidth = {$plugin.tx_extbasegallery_pi1.settings.imageWidth}
		imageHeight = {$plugin.tx_extbasegallery_pi1.settings.imageHeight}
		hidePagination = {$plugin.tx_extbasegallery_pi1.settings.hidePagination}
		itemsPerPage = {$plugin.tx_extbasegallery_pi1.settings.itemsPerPage}
		fancybox = {$plugin.tx_extbasegallery_pi1.settings.fancybox}
		includeJquery = {$plugin.tx_extbasegallery_pi1.settings.includeJquery}
	}
}

page.includeCSS{
	tx_extbasegallery = EXT:extbase_gallery/Resources/Public/css/tx_extbasegallery.css
}

[globalVar = LIT:1 = {$plugin.tx_extbasegallery_pi1.settings.fancybox}]
	page.includeCSS.fancy = EXT:extbase_gallery/Resources/Public/css/fancy.css
	page.includeJSFooter.fancy = EXT:extbase_gallery/Resources/Public/js/fancy.js
	page.includeJSFooter.tx_extbasegallery = EXT:extbase_gallery/Resources/Public/js/tx_extbasegallery.js
[global]

[globalVar = LIT:1 = {$plugin.tx_extbasegallery_pi1.settings.includeJquery}]
	page.includeJSFooter.includeJquery = EXT:extbase_gallery/Resources/Public/js/jquery-1.12.4.min.js
[global]

# these classes are only used in auto-generated templates
plugin.tx_extbasegallery._CSS_DEFAULT_STYLE (
	textarea.f3-form-error {
		background-color:#FF9F9F;
		border: 1px #FF0000 solid;
	}

	input.f3-form-error {
		background-color:#FF9F9F;
		border: 1px #FF0000 solid;
	}

	.tx-album-gallery table {
		border-collapse:separate;
		border-spacing:10px;
	}

	.tx-album-gallery table th {
		font-weight:bold;
	}

	.tx-album-gallery table td {
		vertical-align:top;
	}

	.typo3-messages .message-error {
		color:red;
	}

	.typo3-messages .message-ok {
		color:green;
	}
)