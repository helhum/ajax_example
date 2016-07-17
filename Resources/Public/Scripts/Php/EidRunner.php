<?php
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

defined('TYPO3_MODE') or die('Access denied.');

/** @var \Helhum\AjaxExample\Core\EidRequestBootstrap $eid */
$eid = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Helhum\\AjaxExample\\Core\\EidRequestBootstrap');
echo $eid->run();
