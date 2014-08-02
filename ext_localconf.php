<?php
defined('TYPO3_MODE') or die ('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Helhum.' . $_EXTKEY,
	'PiExample',
	array(
		'Example' => 'index, hello, greet',
	),
	// non-cacheable actions
	array(
		'Example' => 'hello, greet',
	)
);

/**
 * Register eID for example ajax action-call
 */
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['ajax_example'] = 'EXT:ajax_example/Resources/Public/Scripts/Php/EidRunner.php';
