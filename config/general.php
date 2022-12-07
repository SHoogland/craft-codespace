<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\helpers\App;

$isDev = true;
$isProd = App::env('ENVIRONMENT') === 'production';

$isCodespaces = App::env('CODESPACES');
$codespaceName = App::env('CODESPACE_NAME');

$localhostAlias = 'http://localhost:8080';

if ($isCodespaces) {
    $localhostAlias = 'https://' . $codespaceName . '-8080.githubpreview.dev';
}

return [
    // Default Week Start Day (0 = Sunday, 1 = Monday...)
    'defaultWeekStartDay' => 1,

    // Whether generated URLs should omit "index.php"
    'omitScriptNameInUrls' => true,

    // The URI segment that tells Craft to load the control panel
    'cpTrigger' => App::env('CP_TRIGGER') ?: 'admin',

    // The secure key Craft will use for hashing and encrypting data
    'securityKey' => App::env('SECURITY_KEY'),

    'useEmailAsUsername' => true,

    // Whether Dev Mode should be enabled (see https://craftcms.com/guides/what-dev-mode-does)
    'devMode' => $isDev,

    // Whether administrative changes should be allowed
    'allowAdminChanges' => $isDev,

    // Whether crawlers should be allowed to index pages and following links
    'disallowRobots' => !$isProd,

    'aliases' => [
        '@webroot' => dirname(__DIR__) . '/web',
        '@siteUrl' => $localhostAlias . '/',
    ],
];
