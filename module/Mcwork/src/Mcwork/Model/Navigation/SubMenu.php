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
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\Navigation;

class SubMenu extends SaveNavigation
{

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        
        if (isset($posts['dataaction'])) {
            if (isset($posts['entity'])) {
                $this->setEntity($this->getSl()
                    ->get($posts['entity']));
                switch ($posts['dataaction']) {
                    case 'add':
                        return $this->add($posts);
                        break;
                    case 'unlock':
                        return $this->unlock($posts);
                        break;
                    default:
                        return array(
                            'error' => 'wrong_action_parameter'
                        );
                }
            } else {
                return array(
                    'error' => 'miss_entity_parameter'
                );                
            }
        } else {
            return array(
                'error' => 'miss_action_parameter'
            );
        }
        
    }

    /**
     * Add a navigation branch to this menue point
     *
     * @param array $datas
     * @return multitype:string |multitype:number
     */
    private function add($datas)
    {
        if (! isset($datas['ident'])) {
            return array(
                'error' => 'Missed unique identifier from this data record'
            );
        }
        
        try {
            // prepare insert data and ...
            $insert['treeIdent'] = 'submenue-' . $datas['page'] . '-' . $datas['scope'];
            $insert['title'] = strip_tags($datas['headline']);
            $insert['tplAssign'] = 'STANDARD';
            $insert['menue'] = 'sub';
            $insert['headline'] = $datas['headline'];
            $insert['htmlwidgets'] = 'none';
            $this->save($insert);
            $lastInsertId = $this->getLastInsertId();
            $worker = new SaveMenu($this->getStorage());
            $worker->setEntity($this->getSl()
                ->get('entity_tree'));
            
            $worker->save(array(
                'parentFrom' => $lastInsertId
            ), $worker->find($datas['ident']));
            
            return array(
                'category' => $lastInsertId
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
    
    /**
     * Remove a navigation branch from this menue point
     *
     * @param array $datas
     * @return multitype:string |multitype:number
     */
    private function unlock($datas) 
    {
        if (! isset($datas['ident'])) {
            return array(
                'error' => 'Missed unique identifier from this data record'
            );
        }        
        
        try {
            $worker = new SaveMenu($this->getStorage());
            $worker->setEntity($this->getSl()
                ->get('entity_tree'));
            
            $worker->save(array(
                'parentFrom' => 0
            ), $worker->find($datas['ident']));            
            
            return array(
                'category' => true
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}