<?php
namespace Helhum\AjaxExample\View\Example;

/*
 * This file is part of the Ajax example TYPO3 extension.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Mvc\View\AbstractView;

/**
 * Class HelloJsonView
 */
class HelloJson extends AbstractView
{
    /**
     * Renders the view
     *
     * @return string The rendered view
     *
     * @api
     */
    public function render()
    {
        return json_encode(array('Hello World', $this->variables['time']));
    }
}
