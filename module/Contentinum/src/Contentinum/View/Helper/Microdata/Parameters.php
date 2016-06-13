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
namespace Contentinum\View\Helper\Microdata;

use Contentinum\View\Helper\AbstractContentHelper;

class Parameters extends AbstractContentHelper
{

    const VIEW_LAYOUT_KEY = 'contribution';
    
    /**
     * 
     * @var unknown
     */
    protected $schemakey;

    /**
     *
     * @var array
     */
    protected $files;

    /**
     *
     * @var array
     */
    protected $toolbar;

    /**
     *
     * @var array
     */
    protected $schema;

    /**
     *
     * @var array
     */
    protected $wrapper;

    /**
     *
     * @var array
     */
    protected $organisation;

    /**
     *
     * @var array
     */
    protected $person;

    /**
     *
     * @var array
     */
    protected $businessTitle;

    /**
     *
     * @var array
     */
    protected $phoneHome;

    /**
     *
     * @var array
     */
    protected $phoneWork;

    /**
     *
     * @var unknown
     */
    protected $phoneMobile;

    /**
     *
     * @var array
     */
    protected $phoneFax;

    /**
     *
     * @var unknown
     */
    protected $accountEmail;

    /**
     *
     * @var unknown
     */
    protected $alternateEmail;

    /**
     *
     * @var array
     */
    protected $internet;

    /**
     *
     * @var array
     */
    protected $address;

    /**
     *
     * @var array
     */
    protected $imagesSource;
    
    /**
     * 
     * @var unknown
     */
    protected $descriptionhead;

    /**
     *
     * @var array
     */
    protected $description;
    
    /**
     * 
     * @var array
     */
    protected $button;

    /**
     *
     * @var array
     */
    protected $properties = array(
        'schemakey',
        'files',
        'toolbar',
        'wrapper',
        'schema',        
        'organisation',        
        'person',        
        'businessTitle',        
        'phoneHome',        
        'phoneWork',        
        'phoneMobile',        
        'phoneFax',        
        'accountEmail',        
        'alternateEmail',        
        'internet',       
        'address',       
        'imagesSource',  
        'descriptionhead',
        'description',
        'button',
    );
    
    
    protected function templateSettings($entries, $key)
    {
        $viewTemplate = $this->view->contentstyles[static::VIEW_LAYOUT_KEY];
        if (isset($viewTemplate[$entries['modulFormat']])) {
            $this->setTemplate($viewTemplate[$entries['modulFormat']]);
        } elseif (isset($viewTemplate[$key])) {
            $this->setTemplate($viewTemplate[$key]);
        } else {
            return '<p style="font-weight:bold;color:red">Template configuration error</p>';
        }        
    }
}