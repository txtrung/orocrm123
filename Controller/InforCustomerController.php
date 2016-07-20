<?php
/**
 * Created by PhpStorm.
 * User: trantrung
 * Date: 12/07/2016
 * Time: 11:41
 */

namespace MCM\DemoBundle\Controller;

use OroCRM\Bundle\MagentoBundle\Entity\Customer;
use Oro\Bundle\SoapBundle\Controller\Api\Rest\RestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class InforCustomerController extends RestController implements ClassResourceInterface
{
    public function getManager()
    {
        return $this->get('orocrm_magento.customer.manager.api');
    }

    public function getFormHandler()
    {
        return $this->get('orocrm_magento.form.handler.customer.api');
    }

    public function getIdentityCusAction($id)
    {
        $response = $this->handleGetRequest($id);
        $content = $response -> getContent();
        $params = json_decode($content,true);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.name FROM OroIntegrationBundle:Channel c WHERE c.id = :id')
                    ->setParameter('id', $params["channel"]);

        $channelName = $query->getResult();

//        var_dump($params);
        $dktk = array('thoi gian dang ky'=>$params["createdAt"],'IP dang ky'=>$params["ipCreate"]);
        $tdmk = array('thoi gian thay doi'=>$params["password_change"]);
        $dn = array('thoi gian dang nhap'=>$params["syncedAt"],'kenh dang nhap'=>$channelName,'lan dang nhap gan nhat'=>$params["lastSync_at"]);
        $arr = array($dktk,$tdmk,$dn);

        return $arr;
    }
    
    public function getCartCusAction($id)
    {
        
    }
}