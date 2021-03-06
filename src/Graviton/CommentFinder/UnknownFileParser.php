<?php
/**
 * create output entries for unknown files
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
 * make dummy entry for unknown file types
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class UnknownFileParser extends AbstractParser implements ParserInterface
{
    /**
     * create dummy entry for each file
     *
     * @param Event $event event
     *
     * @return void
     */
    public function parse(Event $event)
    {
        $file = $event->getSubject();

        $message  = 'Unknown file type detected.'.PHP_EOL;
        $message .= 'Please check for comments manually or implement a parser.';

        $comment = array(0 => 0, 1 => $message, 2 => 0);

        $this->getStore()->add($file, array($comment));
    }
}
