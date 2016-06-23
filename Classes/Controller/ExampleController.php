<?php
namespace Helhum\AjaxExample\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use Helhum\AjaxExample\Property\TypeConverter\UploadedFileReferenceConverter;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;

/**
 *
 *
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ExampleController extends ActionController {

	/**
	 * @return void
	 */
	public function helloAction() {
		$this->view->assign('time', time());
	}

	/**
	 * @return void
	 */
	public function indexAction() {
	}

	/**
	 * Action greeting
	 *
	 * @param string $name
	 * @return void
	 */
	public function greetAction($name) {
		$this->view->assign('name', $name);
	}
}
?>