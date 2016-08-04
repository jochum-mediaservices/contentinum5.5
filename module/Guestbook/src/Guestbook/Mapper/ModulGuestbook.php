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
        return $this->getStorage()->getRepository( 'Guestbook\Entity\Guestbook' )->findBy(array(), array('registerDate' => 'DESC'));
    }
}