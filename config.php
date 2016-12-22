<?php
/**
 * Orange Management
 *
 * PHP Version 7.1
 *
 * @category   TBD
 * @package    TBD
 * @author     OMS Development Team <dev@oms.com>
 * @author     Dennis Eichhorn <d.eichhorn@oms.com>
 * @copyright  2013 Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://orange-management.com
 */
/**
 * Global config file.
 *
 * @category   Framework
 * @package    phpOMS\Config
 * @since      1.0.0
 */
define('ROOT_PATH', __DIR__);

$CONFIG = [
    'git_path'        => 'C:/Users/coyle/AppData/Local/GitHub/PortableGit_d76a6a98c9315931ec4927243517bc09e9b731a0/cmd/git.exe', // path to the git executable
    'repositories'    => [ // repository paths (recommended maximum = 12, depending on screen dimensions)
                           'C:/Users/coyle/Desktop/Orange-Management/phpOMS',
                           'C:/Users/coyle/Desktop/Orange-Management/jsOMS',
                           'C:/Users/coyle/Desktop/Orange-Management/Modules',
                           'C:/Users/coyle/Desktop/Orange-Management/Tests',
                           'C:/Users/coyle/Desktop/Orange-Management/Socket',
                           'C:/Users/coyle/Desktop/Orange-Management/Console',
                           'C:/Users/coyle/Desktop/Orange-Management/Web',
                           'C:/Users/coyle/Desktop/Orange-Management/cssOMS',
                           'C:/Users/coyle/Desktop/Orange-Management/Build',
                           'C:/Users/coyle/Desktop/Orange-Management/Website',
                           'C:/Users/coyle/Desktop/Orange-Management/Documentation',
                           'C:/Users/coyle/Desktop/Orange-Management/Developer-Guide',
    ],
    'age'             => 60 * 60 * 24 * 30, // statistic age in seconds (statistics from x seconds ago till now)
    'ranking'         => [ // contributors to ignore from ranking
                           'Scrutinizer Auto-Fixer',
    ],
    'ranking_limit'   => 5, // max amount of people showing in the rankings
    'update_interval' => 60 * 3 * 3, // update interval in seconds (a multiple of close to 180 is recommended)
    'source_files'    => ['php', 'js', 'scss',], // file extensions containing code
];