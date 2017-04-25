<?php
namespace Mcevent\Mapper\Download;

use Contentinum\Mapper\AbstractModuls;

class PrepareCalendar extends AbstractModuls
{

    public function fetchContent(array $params = null)
    {
        return $this->query($params);
    }

    /**
     *
     * @param unknown $id
     */
    private function query($queryparams)
    {
        return $this->fetchAll("SELECT id, name FROM mcevent_types ORDER BY name ASC;");
    }

}