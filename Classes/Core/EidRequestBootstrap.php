<?php
namespace Helhum\AjaxExample\Core;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Core\Bootstrap;
use TYPO3\CMS\Extbase\Service\TypoScriptService;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Frontend\Utility\EidUtility;

/**
 * This class is basically taken from:
 * https://lbrmedia.net/ajaxexample/
 *
 * I would not recommend to use it like this, it is just here to demonstrate
 * that even with a crippled frontend bootstrap there will be no major performance gain...
 */
class EidRequestBootstrap
{
    /**
     * @var array
     */
    protected $pluginConfiguration;

    /**
     * @var Bootstrap
     */
    protected $bootstrap;

    /**
     * Bootstrap Extbase
     *
     * @return string
     */
    public function run()
    {
        return $this->bootstrap->run('', $this->pluginConfiguration);
    }

    /**
     * Initialize frontend environment
     */
    public function __construct()
    {
        if (empty($_POST['tx_ajaxexample_piexample']['action'])) {
            $_POST['tx_ajaxexample_piexample']['action'] = 'hello';
        }
        $_POST['tx_ajaxexample_piexample']['controller'] = 'Example';

        $this->bootstrap = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Core\\Bootstrap');

        $feUserObj = EidUtility::initFeUser();

        $pageId = GeneralUtility::_GET('id') ?: 1;

        /** @var TypoScriptFrontendController $typoScriptFrontendController */
        $typoScriptFrontendController = GeneralUtility::makeInstance(
            'TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController',
            $GLOBALS['TYPO3_CONF_VARS'],
            $pageId,
            0,
            true
        );
        $GLOBALS['TSFE'] = $typoScriptFrontendController;
        $typoScriptFrontendController->connectToDB();
        $typoScriptFrontendController->fe_user = $feUserObj;
        $typoScriptFrontendController->id = $pageId;
        $typoScriptFrontendController->determineId();
        $typoScriptFrontendController->initTemplate();
        $typoScriptFrontendController->getConfigArray();
        EidUtility::initTCA();

        /** @var TypoScriptService $typoScriptService */
        $typoScriptService = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Service\\TypoScriptService');
        $pluginConfiguration = $typoScriptService->convertTypoScriptArrayToPlainArray($typoScriptFrontendController->tmpl->setup['plugin.']['tx_ajaxexample.']);

        // Set configuration to call the plugin
        $this->pluginConfiguration = array(
            'pluginName' => 'PiExample',
            'vendorName' => 'Helhum',
            'extensionName' => 'AjaxExample',
            'controller' => 'Example',
            'action' => $_POST['tx_ajaxexample_piexample']['action'],
            'mvc' => array(
                'requestHandlers' => array('TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler' => 'TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler'),
            ),
            'settings' => $pluginConfiguration['settings'],
            'persistence' => array('storagePid' => $pluginConfiguration['persistence']['storagePid']),
        );
    }
}
