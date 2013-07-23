<?php
/**
 * parser interface
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
 * parser interface
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
interface ParserInterface
{
    /**
     * recieve a parse event
     *
     * @param Event $event event
     *
     * @return void
     */
    public function parse(Event $event);
}

