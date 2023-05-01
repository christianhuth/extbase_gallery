<?php

namespace DRC\AlbumGallery\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Paginate the bodytext which is very useful for longer texts or to increase
 * traffic.
 */
class PaginateBodytextViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * @var bool
	 */
	protected $escapeOutput = false;

	/**
	 * Initialize arguments
	 */
	public function initializeArguments() {
		parent::initializeArguments();
		$this->registerArgument('object', 'mixed', 'object', true);
		$this->registerArgument('as', 'string', 'as', true);
		$this->registerArgument('currentPage', 'int', 'current page', true);
		$this->registerArgument('token', 'string', 'token', '###more###');
	}

	/**
	 * Render everything
	 *
	 * @return string
	 */
	public function render() {
		$as = $this->arguments['as'];
		$currentPage = $this->arguments['currentPage'];

		$parts = GeneralUtility::trimExplode($this->arguments['token'], $this->arguments['object']->getBodytext(), true);
		$numberOfPages = count($parts);

		if ($numberOfPages === 1) {
			$result = $parts[0];
		} else {
			$currentPage = (int) $currentPage;
			if ($currentPage < 1) {
				$currentPage = 1;
			} elseif ($currentPage > $numberOfPages) {
				$currentPage = $numberOfPages;
			}

			$tagsToOpen = [];
			$tagsToClose = [];

			for ($j = 0; $j < $currentPage; $j++) {
				$chunk = $parts[$j];

				while (($chunk = mb_strstr($chunk, '<'))) {
					$tag = $this->extractTag($chunk);
					$tagStrLen = mb_strlen($tag);

					if ($this->isOpeningTag($tag)) {
						if ($j < $currentPage - 1) {
							$tagsToOpen[] = $tag;
						}
						$tagsToClose[] = $tag;
					} elseif ($this->isClosingTag($tag)) {
						if ($j < $currentPage - 1) {
							array_pop($tagsToOpen);
						} elseif (mb_strpos($parts[$j], $chunk) === 0) {
							$parts[$j] = mb_substr($parts[$j], $tagStrLen);
							array_pop($tagsToOpen);
						}
						array_pop($tagsToClose);
					}

					$chunk = mb_substr($chunk, $tagStrLen);
				}
			}

			$result = implode('', $tagsToOpen) . $parts[$currentPage - 1];

			while ($tag = array_pop($tagsToClose)) {
				$result .= $this->getClosingTagByOpeningTag($tag);
			}
		}

		$pages = [];
		for ($i = 1; $i <= $numberOfPages; $i++) {
			$pages[] = ['number' => $i, 'isCurrent' => ($i === $currentPage)];
		}

		$pagination = [
			'pages' => $pages,
			'numberOfPages' => $numberOfPages,
			'current' => $currentPage,
		];

		if ($currentPage < $numberOfPages) {
			$pagination['nextPage'] = $currentPage + 1;
		}
		if ($currentPage > 1) {
			$pagination['previousPage'] = $currentPage - 1;
		}

		$this->templateVariableContainer->add($as, $result);
		$this->templateVariableContainer->add('pagination', $pagination);

		return $this->renderChildren();
	}

	/**
	 * Extracts the first html tag for a given html string
	 *
	 * @param string $html
	 * @return string
	 */
	protected function extractTag($html) {
		$tag = '';
		$length = mb_strlen($html);
		for ($i = 0; $i < $length; $i++) {
			$char = mb_substr($html, $i, 1);
			$tag .= $char;
			if ($char === '>') {
				break;
			}
		}
		return $tag;
	}

	/**
	 * Checks whether a given tag is self closing
	 *
	 * @param string $tag
	 * @return bool
	 */
	protected function isSelfClosingTag($tag) {
		return mb_substr($tag, -2) === '/>';
	}

	/**
	 * Checks whether a given tag is closing tag
	 *
	 * @param string $tag
	 * @return bool
	 */
	protected function isClosingTag($tag) {
		return mb_substr($tag, 0, 2) === '</';
	}

	/**
	 * Checks whether a given Tag is a an opening tag
	 *
	 * @param string $tag
	 * @return bool
	 */
	protected function isOpeningTag($tag) {
		return !($this->isSelfClosingTag($tag) || $this->isClosingTag($tag));
	}

	/**
	 * Gets a closing tag from a given opening tag
	 *
	 * @param string $openingTag
	 * @return string
	 */
	protected function getClosingTagByOpeningTag($openingTag) {
		if (!$tag = mb_strstr(mb_substr($openingTag, 1), ' ', true)) {
			$tag = mb_strstr(mb_substr($openingTag, 1), '>', true);
		}

		return '</' . $tag . '>';
	}
}
