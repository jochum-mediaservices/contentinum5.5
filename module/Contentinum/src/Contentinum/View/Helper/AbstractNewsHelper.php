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
namespace Contentinum\View\Helper;

use ContentinumComponents\Tools\HandleSerializeDatabase;

abstract class AbstractNewsHelper extends AbstractContentHelper
{
    const VIEW_LAYOUT_KEY = 'plugins';
    
    const VIEW_TEMPLATE = 'news';

    /**
     *
     * @var array
     */
    protected $wrapper;
    
    /**
     *
     * @var array
     */
    protected $news;
    
    /**
     *
     * @var array
     */
    protected $header;
    
    /**
     * 
     * @var array
     */
    protected $groupheadline;
    /**
     * 
     * @var array
     */
    protected $headline;
    
    /**
     *
     * @var array
     */
    protected $footer;
    
    /**
     *
     * @var array
     */
    protected $media;
    
    /**
     *
     * @var array
     */
    protected $mediateaser;
    
    /**
     *
     * @var array
     */
    protected $mediateaserleft;
    
    /**
     *
     * @var array
     */
    protected $mediateaserright;
    
    /**
     * 
     * @var boolen
     */
    protected $teasermedia;
    
    /**
     * 
     * @var boolen
     */
    protected $mediaplaces;
    
    /**
     *
     * @var array
     */
    protected $publishAuthor;
    
    /**
     * 
     * @var array
     */
    protected $publishDate;
    
    /**
     *
     * @var array
     */
    protected $groupParams;
    
    /**
     *
     * @var string
     */
    protected $groupName;
    
    
   /**
    * 
    * @var unknown
    */
    protected $groupImages;
    
    /**
     *
     * @var array
     */
    protected $labelReadMore;
    
    /**
     * 
     * @var array
     */
    protected $backlink;
    
    /**
     *
     * @var integer
     */
    protected $teaserLandscapeSize;
    
    /**
     *
     * @var integer
     */
    protected $teaserPortraitSize;
    
    /**
     *
     * @var integer
     */
    protected $iTotal = 10;
    
    /**
     * 
     * @var unknown
     */
    protected $toolbar;
    
    /**
     * 
     * @var unknown
     */
    protected $groupurl;
    
    /**
     * 
     * @var unknown
     */
    protected $shariff;
    
    /**
     * 
     * @var unknown
     */
    protected $displayimage = 'yes';
    
    /**
     * 
     * @var array
     */
    protected $imagesProperties = array(
        'media_name',
        'media_link',
        'media_metas'
    );
    
    /**
     *
     * @var array
     */
    protected $properties = array(
        'wrapper',
        'news',
        'header',
        'groupheadline',
        'headline',
        'footer',
        'media',
        'mediateaserleft',
        'mediateaserright',
        'teasermedia',
        'mediaplaces',
        'publishAuthor',
        'publishDate',
        'labelReadMore',
        'backlink',
        'teaserLandscapeSize',
        'teaserPortraitSize',
        'toolbar',
        'displayimage',
    );   
    
    /**
     * Get group paramter if isset
     * @param unknown $key
     */
    protected function getGroupParameter($key) 
    {
        if (isset($this->groupParams[$key]) && strlen($this->groupParams[$key]) > 0){
            return $this->groupParams[$key];
        } else {
            return false;
        }
    }
    
    /**
     *
     * @param unknown $params
     */
    protected function convertGroupParams($group)
    {
        $this->groupName = $group['name'];
        $this->groupurl = $group['url'];
        foreach ($this->imagesProperties as $prop){
            if (isset($group[$prop])){
                $this->groupImages[$prop] = $group[$prop];
            }
        }
    
        if (strlen($group['group_params']) > 4) {
            $mcSerialize = new HandleSerializeDatabase();
            $this->groupParams = $mcSerialize->execUnserialize($group['group_params']);
        } else {
            $this->groupParams = array();
        }
    }  
    
    protected function convertPublishDate($date)
    {
        $array = explode(' ', $date);
        return str_replace('-', '/', $array[0]);
    }
    
    /**
     * date format
     * @param array $config
     */
    protected function getDateFormat($config)
    {
        if (isset($config['modulConfig']) && in_array($config['modulConfig'], array('FULL','LONG' , 'MEDIUM','SHORT','FULLLONG','LONGLONG' , 'MEDIUMLONG','SHORTLONG'))){
            return $config['modulConfig'];
        } else {
            return 'FULL';
        }
    }
}