<?php
/**
 * event dispatching iterator
 *
 * @category  Application
 * @package   CommentFinder
 * @author    Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @copyright 2013 - Alle Rechte vorbehalten
 * @license   GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://www.swisscom.com
 */

namespace Graviton\CommentFinder;

use IteratorIterator;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * extend IteratorIterator to get a outerIterator context
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class DispatchingIterator extends IteratorIterator
{
    /**
     * set event dispatcher
     *
     * @param EventDispatcher $dispatcher dispatcher
     *
     * @return void
     */
    public function setDispatcher($dispatcher)
    {
        $this->_dispatcher = $dispatcher;
    }

    /**
     * set factory for creating events
     * 
     * @param EventFactory $eventFactory factory 
     * 
     * @return void
     */
    public function setEventFactory($eventFactory)
    {
        $this->_eventFactory = $eventFactory;
    }

    /**
     * dispatch event and return current record
     *
     * @return SplFileInfo
     */
    public function current()
    {
        $file = parent::current();

        switch ($file->getExtension()) {
            case 'php':
                $eventName = 'file.php';
                break;
            default:
                $eventName = 'file.unknown';
        }
        $this->_dispatcher->dispatch(
            $eventName,
            $this->_eventFactory->get($file)
        );

        return $file;
    }
}

