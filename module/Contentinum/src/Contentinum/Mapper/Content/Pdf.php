<?php
namespace Contentinum\Mapper\Content;

use ContentinumComponents\Mapper\Worker;

class Pdf extends Worker
{

    /**
     * Content query
     * 
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select(array( 'main'));
        $builder->from('Contentinum\Entity\WebContent', 'main');
        $builder->where('main.id = :id');
        $builder->setParameter('id', $params['article']);
        $result['content'] = $builder->getQuery()->getResult();
        switch ($params['section']) {
            case 'blog':
                $result['group'] = $this->fetchBlogGroup($params['category']);
                break;
            default:
                break;
        }
        return $result;
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
     * @param unknown $id
     */
    private function fetchBlogGroup($id)
    {
        $sql = "SELECT main.name, main.group_style, main.group_element, main.group_element_attribute, main.group_params, wpp.url, ";
        $sql .= "wm.media_name, wm.media_link, wm.media_metas ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.content_group_page ";
        $sql .= "LEFT JOIN web_medias AS wm ON wm.id = main.logo_images ";
        $sql .= "WHERE main.id = {$id}";
        return $this->fetchRow($sql);
    }
}