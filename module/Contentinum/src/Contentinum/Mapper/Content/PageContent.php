<?php
namespace Contentinum\Mapper\Content;

use ContentinumComponents\Mapper\Worker;

class PageContent extends Worker
{

    /**
     * Content query
     * 
     * @param array $params
     *            query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $dateQuery = date('Y-m-d H:i:s');
        $entries = array();
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select('main');
        $builder->from('Contentinum\Entity\WebPagesContent', 'main');
        $builder->leftJoin('Contentinum\Entity\WebContentGroups', 'ref2', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref2.id = main.webContentgroup');
        $builder->leftJoin('Contentinum\Entity\WebContent', 'ref3', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref3.id = ref2.webContent');
        $builder->where('main.webPages = :id');
        $builder->orWhere('main.webPages = :id2');
        $builder->andWhere("main.publish = 'yes'");
        $builder->andWhere('ref2.scope = :group');
        $builder->andWhere("ref3.publish = 'yes'");
        
        $builder->andWhere("ref3.lang = :lang");
        $builder->setParameter('lang', $this->getLanguage());
        
        if (null !== ($identity = $this->getIdentity())) {
            if ('admin' == $identity->role) {
                $builder->andWhere("ref3.resourceGroup >= 0");
            } else {
                
                switch ($identity->role) {
                    case 'intranet':
                        $builder->andWhere("ref3.resource = 'index' OR ref3.resource = 'intranetresource'");
                        $orWhere = "ref3.resourceGroup = 0";
                        if ($identity->usergroups && ! empty($identity->usergroups)  ){
                            foreach ($identity->usergroups as $usrgrp){
                                $orWhere .= ' OR ';                            
                                $orWhere .= "ref3.resourceGroup = {$usrgrp}";
                            }
                        }
                        $builder->andWhere($orWhere);
                        break;
                    case 'member':
                        $builder->andWhere("ref3.resource = 'index' OR ref3.resource = 'memberresource'");
                        $orWhere = "ref3.resourceGroup = 0";
                        if ($identity->usergroups && ! empty($identity->usergroups)  ){
                            foreach ($identity->usergroups as $usrgrp){
                                $orWhere .= ' OR ';                            
                                $orWhere .= "ref3.resourceGroup = {$usrgrp}";
                            }
                        }
                        $builder->andWhere($orWhere);
                        break;
                    case 'guest':
                    default:
                        $builder->andWhere("ref3.resource = 'index'");
                        $builder->andWhere("ref3.resourceGroup = 0");
                        break;
                }
                
            }
        } else {
            $builder->andWhere("ref3.resource = 'index'");
            $builder->andWhere("ref3.resourceGroup = 0");            
        }
        
        $builder->andWhere("ref3.publishUp = '0000-00-00 00:00:00' OR ref3.publishUp <= '" . $dateQuery . "'");
        $builder->andWhere("ref3.publishDown = '0000-00-00 00:00:00' OR ref3.publishDown >= '" . $dateQuery . "'");
        $builder->setParameter('id', $params['pageIdent']);
        $builder->setParameter('id2', $params['parentPage']);
        $builder->setParameter('group', 'content');
        $builder->orderBy('ref2.itemRang', 'ASC');
        $builder->orderBy('main.itemRang', 'ASC');
        $builder->getQuery()->getSql();
        $entries['content'] = $builder->getQuery()->getResult(); // page content
        $entries['groups'] = $this->fetchContentGroups($params, $dateQuery); // default content
        return $entries;
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
     * @param array $params            
     */
    protected function fetchContentGroups(array $params = null, $dateQuery)
    {
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select('main');
        $builder->from('Contentinum\Entity\WebContentGroups', 'main');
        $builder->leftJoin('Contentinum\Entity\WebPagesContent', 'ref2', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref2.webContentgroup = main.webContentgroup');
        $builder->leftJoin('Contentinum\Entity\WebContent', 'ref3', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref3.id = main.webContent');
        $builder->where('ref2.webPages = :id');
        $builder->orWhere('ref2.webPages = :id2');
        $builder->andWhere('main.scope = :group');
        $builder->andWhere("main.groupStyle != 'none'");
        $builder->andWhere("ref2.publish = 'yes'");
        $builder->andWhere("ref3.publish = 'yes'");
        $builder->andWhere("ref3.resource = 'index'");
        $builder->andWhere("ref3.resourceGroup = 0"); 
        $builder->andWhere("ref3.publishUp = '0000-00-00 00:00:00' OR ref3.publishUp <= '" . $dateQuery . "'");
        $builder->andWhere("ref3.publishDown = '0000-00-00 00:00:00' OR ref3.publishDown >= '" . $dateQuery . "'");
        $builder->setParameter('id', $params['pageIdent']);
        $builder->setParameter('id2', $params['parentPage']);
        $builder->setParameter('group', 'content');
        $builder->orderBy('ref2.itemRang', 'ASC');
        $builder->orderBy('main.itemRang', 'ASC');
        return $builder->getQuery()->getResult();
    }
}