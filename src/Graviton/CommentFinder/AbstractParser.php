<?php
/**
 * abstract parser with store integration
 *
 * @category  Application
 * @package   CommentFinder
 * @author    Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @copyright 2013 - Alle Rechte vorbehalten
 * @license   GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://www.swisscom.com
 */

namespace Graviton\CommentFinder;

/**
 * class with store setter and getter
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
abstract class AbstractParser
{
    /**
     * set a store
     *
     * @param Store $store store object
     *
     * @return void
     */
    public function setStore(Store $store)
    {
        $this->_store = $store;
    }

    /**
     * get current store
     *
     * @return Store
     */
    public function getStore()
    {
        return $this->_store;
    }
}

