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
namespace Contentinum\View\Helper\Account;

use Zend\View\Helper\AbstractHelper;


class Members extends AbstractHelper
{


    /**
     *
     * @var unknown
     */
    private $row = array(
        'element' => 'ul',
        'attr' => array('class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3 account-member-list')
    
    );
    
    /**
     *
     * @var unknown
    */
    private $grid = array(
        'element' => 'li',
    
    );
    
    /**
     *
     * @var unknown
    */
    private $properties = array(
        'row',
        'grid',
    );
    
    public function __invoke(array $entry, $medias, $template)
    {
        if ('shufflepictures' === $entry['modulFormat']){
            return $this->shufflepictures($entry, $medias, $template);
        } elseif ('listdatas' === $entry['modulFormat']){
            return $this->view->accountgroup($entry, $medias, $template);
        }
    
    
        $grid = $this->getTemplateProperty('grid', 'element');
        $list = '';
        $breakloop = false;
        $liAttr = '';
        foreach ($entry['modulContent'] as $orga => $entryRow){
    
            $character = $orga{0};
            if (false !== $breakloop && $breakloop !== $character){
                $liAttr = ' class="list-item-displaynone"';
            }
            $breakloop = $character;
            $characters[$character] = $character;
            $dataKey = ' data-sortkey="' . $character . '"';
            $list .= '<' . $grid . $liAttr . $dataKey . '>';
            $list .= '<figure class="account-member-list-item">';
    
            if ( file_exists(DOCUMENT_ROOT .  $entryRow['imgSource']) ){
                $img = $entryRow['imgSource'];
            } else {
                $img = '/accounts/hsgbmitgliederliste/platzhalter.jpg';
            }
    
            $list .= '<img src="' . $img . '" alt="" />';
            $list .= '<figcaption class="account-member-list-item-caption">';
            $caption = $entryRow['organisation'];
            $internet = '';
            //account_street 	account_addresss 	account_zipcode 	account_city internet
            if ( strlen($entryRow['accountStreet']) > 1 ){
                $caption .= '<br />' . $entryRow['accountStreet'];
            }
    
            if ( strlen($entryRow['accountZipcode']) > 1 && strlen($entryRow['accountCity']) > 1 ){
                $caption .= '<br />' . $entryRow['accountZipcode'] . ' ' . $entryRow['accountCity'];
            }
    
            if ( strlen($entryRow['internet']) > 1 ){
                $internet = 'http://' . $entryRow['internet'];
                $caption .= '<br />' . $entryRow['internet'];
            }
    
            if ( strlen($internet) > 1 ){
                $caption = '<a href="'.$internet.'" target="_blank">' . $caption . '</a>';
            }
    
            $list .= '<p>'.$caption.'</p></figcaption>';
            $list .= '</figure>';
    
            if ( strlen($entryRow['organisationExt']) > 1 ){
                $list .= '<p class="account-expand">' . $entryRow['organisationExt'] . '</p>';
            } else {
                $list .= '<p class="account-expand">&nbsp;</p>';
            }
    
    
            $list .= '</' . $grid . '>';
    
        }
        $html = $this->navigation($characters);
        $html .= $this->view->contentelement($this->getTemplateProperty('row', 'element'), $list, $this->getTemplateProperty('row', 'attr'));
        return $html;
    }
    
    /**
     *
     * @param unknown $characters
     * @return string
     */
    protected function navigation($characters)
    {
        $list = '<ul class="nav-letter-list">';
        foreach (range('a', 'z') as $letter){
            $list .= '<li class="nav-letter-list-item';
            if (isset($characters[$letter])){
                $list .= ' hascontent">';
                $list .= '<a class="nav-letter-list-item-link" href="#" data-letterkey="'.$letter.'">' . strtoupper($letter) . '</a>';
            } else {
                $list .= '"><a href="#">' . strtoupper($letter) . '</a>';
            }
            $list .= '</li>';
        }
        $list .= '</ul>';
        return $list;
    }
    
    protected function shufflepictures(array $entry, $medias, $template)
    {
        $grid = $this->getTemplateProperty('grid', 'element');
        $list = '';
        $listcontent = $entry['modulContent'];
        shuffle($listcontent);
        $list = '';
        $i = 0;
        foreach ($listcontent as $orga => $entryRow){
            if ( file_exists(DOCUMENT_ROOT .  $entryRow['imgSource']) ){
                $list .= '<' . $grid . ' class="account-list-item">';
                $list .= '<figure class="account-list-item-img">';
                $list .= '<img title="'.$entryRow['organisation'].'" src="' . $entryRow['imgSource'] . '" alt="" />';
                $list .= '</figure>';
                //$list .= '<figcaption class="account-member-list-item-caption">';
                //$list .= '<p>'.$entryRow['organisation'].'</p></figcaption>';
                $list .= '</' . $grid . '>';
                $i++;
                if ($i == $entry['modulDisplay']){
                    break;
                }
            }
        }
        $html = $this->view->contentelement($this->getTemplateProperty('row', 'element'), $list, array('class' => 'account-list-images'));
        return $html;
    }
    
    /**
     *
     * @param unknown $prop
     * @param unknown $key
     * @return boolean
     */
    protected function getTemplateProperty($prop, $key)
    {
        if (isset($this->{$prop}[$key])) {
            return $this->{$prop}[$key];
        } else {
            return false;
        }
    }
    
    /**
     *
     * @param unknown $template
     */
    protected function setTemplate($template)
    {
        if (null !== $template) {
    
            foreach ($template as $key => $values) {
                if (in_array($key, $this->properties)) {
                    $this->{$key} = $values;
                }
            }
        }
    }
    
    protected function unsetProperties()
    {
        foreach ($this->properties as $prop){
            $this->{$prop} = null;
        }
    }   
}