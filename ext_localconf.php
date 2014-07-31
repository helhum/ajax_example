<?php
defined('TYPO3_MODE') or die ('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Helhum.' . $_EXTKEY,
	'Piexample',
	array(
		'Example' => 'hello, greet, list',
	),
	// non-cacheable actions
	array(
		'Example' => 'hello, greet, list',
	)
);
