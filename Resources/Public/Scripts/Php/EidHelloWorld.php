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

echo 'Hello World';

if (!empty($_GET['feuser'])) {
    \TYPO3\CMS\Frontend\Utility\EidUtility::initFeUser();
}
