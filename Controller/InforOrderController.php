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

class InforOrderController extends RestController
{
    public function getManager()
    {
        return $this->get('orocrm_magento.order.manager.api');
    }

    public function getFormHandler()
    {
        return $this->get('orocrm_magento.form.handler.order.api');
    }

    public function getOrderCusAction($id)
    {
//        var_dump($id);
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.id FROM OroCRMMagentoBundle:Order c WHERE c.customer = :id')
            ->setParameter('id', $id);
        $idOrder = $query->getResult();

//        var_dump($idOrder[0]);

        for($i = 0 ; $i < count($idOrder) ; $i++)
        {
            $response = $this->handleGetRequest($idOrder[$i]["id"]);
            $content = $response -> getContent();
            $params = json_decode($content,true);

            $tdh[$i] = array("tong gia tri gio hang"=>$params["totalAmount"],"Ma don hang"=>$params["id"],
                "thoi gian tao"=>$params["createdAt"],"thoi gian cap nhap"=>$params["updatedAt"],
                "tinh trang don hang"=>$params["status"]);
        }

//        var_dump($cartItemCollection);
        
        return $tdh;
    }

}