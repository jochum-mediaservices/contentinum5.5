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
 * @category contentinum
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Mapper;




class ModulAccountLinks extends AbstractModuls
{
    /**
     * {@inheritDoc}
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->query($this->configure['modulParams']);
        
    }
    
    
    protected function query($id)
    {
        
        /*if ('html' === $this->getXmlHttpRequest()){
            print '<pre>';
            var_dump($this->getParams());
            var_dump('yes');
            exit;
        } */       
        
        
        $result = array();
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select('main');
        $builder->from('Contentinum\Entity\AccountContact', 'main');
        $builder->leftJoin('Contentinum\Entity\Accounts', 'ref1', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref1.id = main.account');
        $builder->where('ref1.fieldtypes = :id');
        $builder->andWhere('ref1.publish = :publish');
        if (false !== ($section = $this->getParameter('section'))) {
            switch ($section) {
                case 'letter':
                    if (false !== ($article = $this->getParameter('article'))) {
                        $builder->andWhere("ref1.organisationExt LIKE '".$article."%'");
                    }
                    break;
                case 'tags':
                    if (false !== ($article = $this->getParameter('article'))) {
                        $builder->leftJoin('Contentinum\Entity\WebTagsAssign', 'ref2', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref2.webItemId = ref1.id');
                        $builder->leftJoin('Contentinum\Entity\WebTags', 'ref3', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref3.id = ref2.webTagId');
                        $builder->andWhere("ref3.tagScope = '".$article."'");
                    }
                    break;                    
                default:
                    break;
            }
        }
        
        
        
        $builder->orderBy('ref1.organisationExt', 'ASC');
        $builder->setParameter('id', $id);
        $builder->setParameter('publish', 'yes');
        return $builder->getQuery()->getResult();
    }

    
}