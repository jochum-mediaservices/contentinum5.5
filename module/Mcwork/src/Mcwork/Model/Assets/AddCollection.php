<?php
namespace Mcwork\Model\Assets;

use ContentinumComponents\Storage\StorageDirectory;

class AddCollection extends StorageDirectory
{

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        try {
            $config = new \Zend\Config\Config(include CON_ROOT_PATH . DS . $this->getEntity()->getCurrentPath() . DS . $posts['ident'] . '.php', true);
            $filter = new \Zend\I18n\Filter\Alnum();
            $name = $filter->filter($posts['collectionname']);
            $save = false;
            switch ($posts['collectiontype']) {
                case 'styles':
                    $save = true;
                    $styles = $name . 'styles';
                    $config->collections->{$styles} = array();
                    $config->collections->{$styles}->debug = false;
                    $config->collections->{$styles}->area = 'styles';
                    $config->collections->{$styles}->type = 'styles';
                    $config->collections->{$styles}->attr = array();
                    $config->collections->{$styles}->attr->media = 'all';
                    $config->collections->{$styles}->attr->rel = 'stylesheet';
                    $config->collections->{$styles}->assets = array();
                    $config->collections->{$styles}->includes = array();
                    $config->collections->{$styles}->includes[] = '/data/usr/share/min/css/cssmin-v3.0.1.php';
                    $config->collections->{$styles}->filters = array();
                    $config->collections->{$styles}->filters->mincss = 'Assetic\Filter\CssMinFilter';
                    break;
                case 'scripts':
                    $save = true;
                    $scripts = $name . 'scripts';
                    $config->collections->{$scripts} = array();
                    $config->collections->{$scripts}->debug = false;
                    $config->collections->{$scripts}->area = 'head';
                    $config->collections->{$scripts}->type = 'js';
                    $config->collections->{$scripts}->attr = array();
                    $config->collections->{$scripts}->attr->type = 'text/javascript';
                    $config->collections->{$scripts}->assets = array();
                    $config->collections->{$scripts}->includes = array();
                    $config->collections->{$scripts}->includes[] = '/data/usr/share/min/js/JSMin.php';
                    $config->collections->{$scripts}->filters = array();
                    $config->collections->{$scripts}->filters->minjs = 'Assetic\Filter\JSMinFilter';
                    break;
                case 'header':
                    $save = true;
                    $header = $name . 'header';
                    $config->collections->{$header} = array();
                    $config->collections->{$header}->debug = false;
                    $config->collections->{$header}->area = 'head';
                    $config->collections->{$header}->type = 'js';
                    $config->collections->{$header}->attr = array();
                    $config->collections->{$header}->attr->type = 'text/javascript';
                    $config->collections->{$header}->assets = array();
                    break;
                default:
                    break;
            }
            
            if (true === $save){
                $writer = new \Zend\Config\Writer\PhpArray();
                $writer->toFile(CON_ROOT_PATH . DS . $this->getEntity()
                    ->getCurrentPath() . DS . $posts['ident'] . '.php', $config);
                
                return array(
                    'success' => true
                );
            } else {
                return array(
                    'warn' => 'wrong_parameter'
                );
            }
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}