<?php

namespace Balumedien\ExtbaseGallery\ViewHelpers\Widget;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * This ViewHelper renders a Pagination of objects.
 */
class PaginateViewHelper extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper {

	/**
	 * @var \Balumedien\ExtbaseGallery\ViewHelpers\Widget\Controller\PaginateController
	 */
	protected $controller;

	/**
	 * Inject controller
	 *
	 * @param \Balumedien\ExtbaseGallery\ViewHelpers\Widget\Controller\PaginateController $controller
	 */
	public function injectController(\Balumedien\ExtbaseGallery\ViewHelpers\Widget\Controller\PaginateController $controller) {
		$this->controller = $controller;
	}

	/**
	 * Initialize arguments
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('objects', 'mixed', 'Objects to auto-complete', true);
		$this->registerArgument('as', 'string', 'Property to fill', true);
		$this->registerArgument('configuration', 'array', 'Configuration', false, ['itemsPerPage' => 10, 'insertAbove' => false, 'insertBelow' => true]);
		$this->registerArgument('initial', 'array', 'Initial configuration', false, []);
	}

	/**
	 * Render everything
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $objects
	 * @param string $as
	 * @param mixed $configuration
	 * @param array $initial
	 * @internal param array $initial
	 * @return string
	 */
	public function render() {
		return $this->initiateSubRequest();
	}
}
