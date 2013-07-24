<?php
/**
 * bootstrap
 *
 * @category  Application
 * @package   CommentFinder
 * @author    Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @copyright 2013 - Alle Rechte vorbehalten
 * @license   GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://www.swisscom.com
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

define('GRAVITON_COMMENTFINDER_ROOT', __DIR__.'/..');

// set up dependency injection
$container = new ContainerBuilder();
$loader = new XmlFileLoader(
    $container,
    new FileLocator(__DIR__.'/Graviton/CommentFinder')
);
$loader->load('services.xml');
