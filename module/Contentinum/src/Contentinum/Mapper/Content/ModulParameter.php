<?php
namespace Contentinum\Mapper\Content;

use ContentinumComponents\Mapper\Worker;

class ModulParameter extends Worker
{

    /**
     * Content query
     * 
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $module = array();
        $sql = "SELECT wc.id AS contribId, wc.modul AS modul, wc.modul_params AS modulParams, wc.modul_display AS modulDisplay, ";
        $sql .= "wc.modul_config AS modulConfig, wc.modul_link AS modulLink, wc.modul_format AS modulFormat ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_pages_content AS wpc ON wpc.web_contentgroup_id = main.web_contentgroup_id ";
        $sql .= "LEFT JOIN web_content AS wc ON wc.id = main.web_content_id ";
        $sql .= "WHERE (wpc.web_pages_id = '" . $params['pageIdent'] . "' OR wpc.web_pages_id = '" . $params['parentPage'] . "') ";
        $sql .= "AND main.scope = 'content' ";
        $sql .= "AND wc.publish = 'yes'";
        $result = $this->fetchAll($sql);
        
        foreach ($result as $entry) {
            if (strlen($entry['modul']) > 1) {
                $module[$entry['modul']][$entry['contribId']]['modulReferer'] = $entry['contribId'];
                $module[$entry['modul']][$entry['contribId']]['modulParams'] = $entry['modulParams'];
                $module[$entry['modul']][$entry['contribId']]['modulDisplay'] = $entry['modulDisplay'];
                $module[$entry['modul']][$entry['contribId']]['modulConfig'] = $entry['modulConfig'];
                $module[$entry['modul']][$entry['contribId']]['modulLink'] = $entry['modulLink'];
                $module[$entry['modul']][$entry['contribId']]['modulFormat'] = $entry['modulFormat'];
            }
        }
        
        return $module;
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
}