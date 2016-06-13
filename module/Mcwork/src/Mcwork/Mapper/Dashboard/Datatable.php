<?php

namespace Mcwork\Mapper\Dashboard;



use ContentinumComponents\Mapper\Worker;
class Datatable extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select('ref1');
        $builder->from('Contentinum\Entity\WebContentGroups', 'main');
        $builder->leftJoin('Contentinum\Entity\WebContent', 'ref1', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref1.id = main.webContent');
        $builder->where("main.scope = 'content'");
        $builder->andWhere('ref1.deleted = 0');
        $builder->andWhere('ref1.updateflag = 1');
        $builder->orderBy('ref1.upDate', 'DESC');
        $builder->setMaxResults(20);
        return $builder->getQuery()->getResult();  
    }  
    
    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)){
            $params = array_merge($params,$posts);
        }
        return $this->fetchContent($params);
    }  
}