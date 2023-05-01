plugin.tx_extbasegallery_pi1 {
	view {
		# cat=plugin.tx_extbasegallery_pi1/file; type=string; label=Path to template root (FE)
		templateRootPath = EXT:extbase_gallery/Resources/Private/Templates/
		# cat=plugin.tx_extbasegallery_pi1/file; type=string; label=Path to template partials (FE)
		partialRootPath = EXT:extbase_gallery/Resources/Private/Partials/
		# cat=plugin.tx_extbasegallery_pi1/file; type=string; label=Path to template layouts (FE)
		layoutRootPath = EXT:extbase_gallery/Resources/Private/Layouts/
	}
	persistence {
		# cat=plugin.tx_extbasegallery_pi1//a; type=string; label=Default storage PID
		storagePid =
	}
	settings{
		imageWidth = 200
		imageHeight = 200
		hidePagination = 1
		itemsPerPage = 9
		fancybox = 0
		includeJquery = 0
	}
}