<?php
/**
 * store for found comments
 *
 * @category  Application
 * @package   CommentFinder
 * @author    Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @copyright 2013 - Alle Rechte vorbehalten
 * @license   GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://www.swisscom.com
 */

namespace Graviton\CommentFinder;

use ArrayObject;

/**
 * extend arrayobject and use to store comments in a per file tree
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class Store extends ArrayObject
{
    private $_data = array();
    /**
     * add comment to files on a per file basis
     *
     * @param SplFileInfo $file     path to file
     * @param Array       $comments data to add with filename as key
     *
     * @return void
     */
    public function add($file, $comments)
    {
        $pathname = $file->getPathname();

        if (!array_key_exists($pathname, $this->_data)) {
            $this->_data[$pathname] = array(
              'file'     => $file,
              'comments' => $comments
            );
        } else {
            $this->_data[$pathname]['comments'] += $comments;
        }
    }

    /**
     * return all records
     *
     * @return void
     */
    public function getAll()
    {
        return $this->_data;
    }
}
