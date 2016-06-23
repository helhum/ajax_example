<?php
namespace Helhum\AjaxExample\Renderer;

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

use Helhum\TyposcriptRendering\Mvc\Request;
use Helhum\TyposcriptRendering\Mvc\Response;
use Helhum\TyposcriptRendering\Renderer\RenderingContext;
use Helhum\TyposcriptRendering\Renderer\RenderingInterface;

/**
 * Class HelloWorldRenderer
 */
class HelloWorldRenderer implements RenderingInterface {

	/**
	 * Whether the required arguments for rendering are present or not
	 *
	 * @param Request $request
	 * @return bool
	 */
	public function canRender(Request $request) {
		return $request->hasArgument('renderer') && $request->getArgument('renderer') === 'hello';
	}

	/**
	 * Evaluates request arguments, renders a string based on them
	 * and sets the string content to the response.
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param RenderingContext $renderingContext
	 * @return void
	 */
	public function renderRequest(Request $request, Response $response, RenderingContext $renderingContext) {
		$response->setContent('Hello World');
	}

}