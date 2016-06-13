<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category Contentinum
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\Navigation\Builds;

use Zend\View\Helper\Navigation\Menu;
use Zend\Navigation\Page\AbstractPage;

/**
 * Copy method findActive()
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Crumbs extends Menu
{

    /**
     * Whether last page in breadcrumb should be hyperlinked
     *
     * @var bool
     */
    protected $linkLast = false;

    /**
     * Copy from Zend View Helper Navigation AbstractHelper
     * 
     * @see \Zend\View\Helper\Navigation\AbstractHelper::findActive()
     */
    public function findActive($container, $minDepth = null, $maxDepth = -1)
    {
        $this->parseContainer($container);
        if (! is_int($minDepth)) {
            $minDepth = $this->getMinDepth();
        }
        if ((! is_int($maxDepth) || $maxDepth < 0) && null !== $maxDepth) {
            $maxDepth = $this->getMaxDepth();
        }
        
        $found = null;
        $foundDepth = - 1;
        $iterator = new \RecursiveIteratorIterator($container, \RecursiveIteratorIterator::CHILD_FIRST);
        
        if ('index' === $this->view->url) {
            $url = '/';
        } else {
            $url = '/' . $this->view->url;
        }
        
        /**
         * @var \Zend\Navigation\Page\AbstractPage $page
         */
        foreach ($iterator as $page) {
            if ($url === $page->uri) {
                $page->active = 1;
            }
            $currDepth = $iterator->getDepth();
            if ($currDepth < $minDepth || ! $this->accept($page)) {
                // page is not accepted
                continue;
            }
            
            if ($page->isActive(false) && $currDepth > $foundDepth) {
                // found an active page at a deeper level than before
                $found = $page;
                $foundDepth = $currDepth;
            }
        }
        
        if (is_int($maxDepth) && $foundDepth > $maxDepth) {
            while ($foundDepth > $maxDepth) {
                if (-- $foundDepth < $minDepth) {
                    $found = null;
                    break;
                }
                
                $found = $found->getParent();
                if (! $found instanceof AbstractPage) {
                    $found = null;
                    break;
                }
            }
        }
        
        if ($found) {
            return array(
                'page' => $found,
                'depth' => $foundDepth
            );
        }
        
        return array();
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\View\Helper\Navigation\Menu::__invoke()
     */
    public function __invoke($container = null)
    {
        $this->parseContainer($container);
        if (null !== $container) {
            $this->setContainer($container);
        }
        $home = false;
        // find deepest active
        if (! $active = $this->findActive($container)) {
            return '';
        }
        
        $active = $active['page'];
        
        if ('/' === $active->getHref()) {
            $home = true;
        }
        
        $html = '';
        // put the deepest active page last in breadcrumbs
        if ($this->getLinkLast()) {
            $html = '<li role="menuitem" class="current"><a href="#">' . $active->getLabel() . '</a></li>';
        } else {
            $html = '<li role="menuitem" class="current"><a href="#">' . $active->getLabel() . '</a></li>';
        }
        
        // walk back to root
        while ($parent = $active->getParent()) {
            if ($parent instanceof AbstractPage) {
                $lnk = '';
                if ('#' === $parent->getHref()) {
                    $lnk = ' class="linknot"';
                }
                $html = '<li role="menuitem"' . $lnk . '><a href="' . $parent->getHref() . '">' . $parent->getLabel() . '</a></li>' . $html;
            }
            if ($parent === $container) {
                // at the root of the given container
                break;
            }
            $active = $parent;
        }
        if (false === $home) {
            $html = '<li role="menuitem"><a href="/">Start</a></li>' . $html;
        }
        $html = '<li class="notacrumble">Sie befinden sich hier:</li>' . $html;
        return '<nav><ul class="breadcrumbs" role="menubar" aria-label="breadcrumbs">' . $html . '</ul></nav>';
    }

    /**
     * Sets whether last page in breadcrumbs should be hyperlinked
     *
     * @param bool $linkLast whether last page should be hyperlinked
     * @return Breadcrumbs
     */
    public function setLinkLast($linkLast)
    {
        $this->linkLast = (bool) $linkLast;
        return $this;
    }

    /**
     * Returns whether last page in breadcrumbs should be hyperlinked
     *
     * @return bool
     */
    public function getLinkLast()
    {
        return $this->linkLast;
    }
}