<?php
/**
 * cli interface "scan"
 *
 * @category  Application
 * @package   CommentFinder
 * @author    Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @copyright 2013 - Alle Rechte vorbehalten
 * @license   GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link      http://www.swisscom.com
 */

namespace Graviton\CommentFinder;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * implement scan command
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class ScanCommand extends Command
{
    /**
     * setup getopt
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('scan')
            ->setDescription('scan a dir and report on comments');
    }

    /**
     * run scanning and rendering
     *
     * @param InputInterface  $input  input
     * @param OutputInterface $output output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->_iterator AS $file) {
            // main loop, does work, please ignore pmd unused local warning
        }
        $this->_renderer->render();
    }

    /**
     * set iterator
     *
     * @param DispatchingIterator $iterator iterator to loop over
     *
     * @return void
     */
    public function setIterator(DispatchingIterator $iterator)
    {
        $this->_iterator = $iterator;
    }

    /**
     * set renderer
     *
     * @param HtmlReport $renderer html report renderer
     *
     * @return void
     */
    public function setRenderer($renderer)
    {
        $this->_renderer = $renderer;
    }
}

