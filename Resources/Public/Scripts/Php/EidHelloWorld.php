<?php
defined('TYPO3_MODE') or die ('Access denied.');

echo 'Hello World';

if (!empty($_GET['feuser'])) {
	\TYPO3\CMS\Frontend\Utility\EidUtility::initFeUser();
}