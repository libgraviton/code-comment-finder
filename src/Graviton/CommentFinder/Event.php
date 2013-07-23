<?php
/**
 * event factory for dispatching iterator
 *
 * @category  Application
 * @package   CommentFinder
 * @author    Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @copyright 2013 - Alle Rechte vorbehalten
 * @license   GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://www.swisscom.com
 */

namespace Graviton\CommentFinder;

use Symfony\Component\EventDispatcher\Event as FrameworkEvent;

/**
 * return events containing subject
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class Event extends FrameworkEvent
{
    protected $_subject;

    /**
     * intanciate event
     *
     * @param Mixed $subject subject
     *
     * @return void
     */
    public function __construct($subject)
    {
        $this->_subject = $subject;
    }

    /**
     * return event subject
     *
     * @return Mixed
     */
    public function getSubject()
    {
        return $this->_subject;
    }
}

