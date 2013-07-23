<?php
/**
 * html report renderer
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
 * use twig and file_put_contents to render output
 *
 * @category Application
 * @package  CommentFinder
 * @author   Lucas S. Bickel <lucas.bickel@swisscom.com>
 * @license  GPL http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     http://www.swisscom.com
 */
class HtmlReport
{
    /**
     * create report renderer
     *
     * @param Twig_Enviroment $twig      twig renderer
     * @param String          $reportDir target dir for reports
     *
     * @return void
     */
    public function __construct($twig, $reportDir)
    {
        $this->_twig = $twig;
        $this->_reportDir = $reportDir;
    }

    /**
     * set store to render from
     *
     * @param Store $store store
     *
     * @return void
     */
    public function setStore($store)
    {
        $this->_store = $store;
    }

    /**
     * render all the reports and index file
     *
     * @return void 
     */
    public function render()
    {
        array_walk($this->_store->getAll(), array($this, 'renderFile'));

        $index = array(
            'reports' => $this->_reports
        );
        file_put_contents(
            sprintf('%s/index.html', $this->_reportDir),
            $this->_twig->render('index.html.twig', $index)
        );
    }

    /**
     * render a report for an individual file
     *
     * @param Array  $item data for report subject
     * @param String $key  pathname of report subject
     *
     * @return void
     */
    public function renderFile($item, $key)
    {
        if (!empty($item['comments'])) {
            $target = sprintf('%s/%s.html', $this->_reportDir, $key);
            $data = array(
                'file' => $key,
                'comments' => $item['comments']
            );
            file_put_contents(
                $target,
                $this->_twig->render('file.html.twig', $data)
            );
            $this->_reports[] = array(
                'name' => $key,
                'output' => $target
            );
        }
    }
}
