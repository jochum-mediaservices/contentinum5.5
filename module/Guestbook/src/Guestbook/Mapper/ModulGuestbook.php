<?php
namespace Guestbook\Mapper;

use Contentinum\Mapper\AbstractModuls;

class ModulGuestbook extends AbstractModuls
{

    public function fetchContent(array $params = null)
    {
        return $this->query($this->configure['modulParams']);
    }

    /**
     *
     * @param array $params            
     * @param string $posts            
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)) {
            $params = array_merge($params, $posts);
        }
        return $this->fetchContent($params);
    }

    /**
     * 
     */
    private function query($ident = null)
    {
      
        $result = array();
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select('main');
        $builder->from('Guestbook\Entity\Guestbook', 'main');
        $builder->where("main.approved = 'publish'");
        $builder->orderBy('main.registerDate', 'DESC');
        if (false !== ($section = $this->getParameter('section'))) {
            switch ($section) {
                case 'set':
                    if (false !== ($article = $this->getParameter('article'))) {
                        $builder->setFirstResult((int) $article);
                        $builder->setMaxResults(5);
                    }
                    break;
                default:
                    break;
            }
        } else {
            $builder->setFirstResult(0);
            $builder->setMaxResults(5);
        }
        $result['entries'] = $builder->getQuery()->getResult();    
        if ('html' === $this->getXmlHttpRequest()){
            return $result;
        }
        $contresult = $this->fetchRow("SELECT COUNT(id) AS countentry FROM web_guestbook;");
        if (is_array($contresult) && isset($contresult['countentry'])){
            $result['count'] = $contresult['countentry']; 
        } else {
            $result['count'] = 0;
        }
        return $result;
        
    }
}