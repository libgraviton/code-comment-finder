<?php
/**
 * c-style comment parser
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
 * extract all c-style comments from file
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class CFileParser extends AbstractParser implements ParserInterface
{
    /**
     * {@inheritdocs}
     *
     * @param Event $event event
     *
     * @return void
     */
    public function parse(Event $event)
    {
        $file = $event->getSubject();
        $contents = file_get_contents($file);
        
        // single line comments
        preg_match_all('/(\/\/.*)/', $contents, $singles); 
        foreach ($singles[1] AS $comment) {
            $comments[] = array(
                0 => 0,
                1 => $comment,
                2 => '?'
            );
        }

        // multiline
        preg_match_all('/(\/\*.*\*\/)/sm', $contents, $multis);
        foreach ($multis[1] AS $comment) {
            $comments[] = array(
                0 => 0,
                1 => $comment,
                2 => '?'
            );
        }

        $this->getStore()->add($file, $comments);
    }
}

