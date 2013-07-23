<?php
/**
 * file finding iterator
 *
 * @category  Application
 * @package   CommentFinder
 * @author    Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @copyright 2013 - Alle Rechte vorbehalten
 * @license   GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://www.swisscom.com
 */

namespace Graviton\CommentFinder;

use FilterIterator;

/**
 * extend FiterIterator to filter out only files
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class FileFilterIterator extends FilterIterator
{
    /**
     * accept regular files
     *
     * @return boolean
     */
    public function accept()
    {
        return$this->getInnerIterator()->current()->isFile();
    }
}

