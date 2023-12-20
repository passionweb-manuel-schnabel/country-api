<?php

defined('TYPO3') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'CountryApi',
    'Examples',
    [
        \Passionweb\CountryApi\Controller\CountryController::class => 'list'
    ],
    // non-cacheable actions
    [
        \Passionweb\CountryApi\Controller\CountryController::class => 'list',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        examples {
                            iconIdentifier = country-api-examples
                            title = LLL:EXT:country_api/Resources/Private/Language/locallang_db.xlf:plugin_country_api_examples.name
                            description = LLL:EXT:country_api/Resources/Private/Language/locallang_db.xlf:plugin_country_api_examples.description
                            tt_content_defValues {
                                CType = list
                                list_type = countryapi_examples
                            }
                        }
                    }
                    show = *
                }
           }'
);
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'country-api-examples',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:country_api/Resources/Public/Icons/Extension.png']
);
