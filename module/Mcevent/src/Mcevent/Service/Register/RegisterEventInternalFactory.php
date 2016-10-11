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
 * @package Service
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Service\Register;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ContentinumComponents\Mapper\Worker;

/**
 * Config template key html layout
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class RegisterEventInternalFactory implements FactoryInterface
{    
    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $worker = new Worker($serviceLocator->get('doctrine.entitymanager.orm_default'));
        $current = date('Y-m-d') . ' 00:00:00';
        $selectdate = date('Y');
        $sql = "SELECT mtc.id, mtc.date_start, mtc.applicant_int, mtc.applicant_ext, mtc.summary ";
        $sql .= "FROM mcevent_dates AS mtc ";
        $sql .= "WHERE mtc.publish = 'yes' ";
        $sql .= "AND mtc.date_start >= '".$selectdate."%'";
        $sql .= "ORDER BY mtc.date_start ASC;";
        $orders = $this->countOrders($current, $worker);
        $trashdates = $worker->fetchAll($sql);
        $options = array();
        $convert = new \ContentinumComponents\Tools\ConvertMonthDayNames();
        foreach ($trashdates as $row){
            $num = 0;
            $ext = '(*)';
            $int = '(*)';
            if (isset($orders[$row['id']])){
                $num = $orders[$row['id']];
            }
            
            if ($num >= $row['applicant_ext']){
                $ext = '(!)';
            }
            
            if ($num >= $row['applicant_int']){
                $int = '(!)';
            }            
            if ($row['date_start'] >= $current ){
                $datetime = new \DateTime($row['date_start']);
                $trashDate = $convert->get($datetime->format('N'), 'dayname') . ', ' . $datetime->format('d') . '. ' . $convert->get($datetime->format('m')) . ' ' . $datetime->format('Y');
                $options[$row['id']] = $trashDate . ': '. $row['applicant_int'] . $int . '/' . $row['applicant_ext'] . $ext . '/' . $num . '';    
            }
        }
              
        return $options;
    } 
    
    /**
     * count trash orders
     * @param unknown $id
     * @param unknown $current
     */
    private function countOrders($current, $worker)
    {
        $sql = "SELECT mtc.id, COUNT(mto.mcevent_id) AS orders ";
        $sql .= "FROM mcevent_dates_register AS mto ";
        $sql .= "LEFT JOIN mcevent_dates AS mtc ON mtc.id = mto.mcevent_id ";
        $sql .= "WHERE mtc.date_start >= '{$current}' ";
        $sql .= "GROUP BY mto.mcevent_id;";
        $result = $worker->fetchAll($sql);
        $orders = array();
        if (!empty($result)){
            foreach ($result as $row){
                $orders[$row['id']] = $row['orders'];
            }
        }
        return $orders;
    }    
}