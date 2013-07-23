<?php
/**
 * php comment parser
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
 * extract all comments from file
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class PhpFileParser extends AbstractParser implements ParserInterface
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
        $tokens = token_get_all(file_get_contents($file));
        $comments = array_filter($tokens, array($this, '_filterTokens'));

        $this->getStore()->add($file, $comments);
    }

    /**
     * used for parsing tokens with array_filter()
     *
     * @param Array $token token from token_get_all()
     *
     * @return Boolean
     */
    private function _filterTokens($token)
    {
        return $token[0] === T_COMMENT;
    }
}

