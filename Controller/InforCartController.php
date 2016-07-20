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

class InforCartController extends RestController
{
    public function getManager()
    {
        return $this->get('orocrm_magento.cart.manager.api');
    }

    public function getFormHandler()
    {
        return $this->get('orocrm_magento.form.handler.cart.api');
    }

    public function getCartCusAction($id)
    {
//        var_dump($id);
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.id FROM OroCRMMagentoBundle:Cart c WHERE c.customer = :id')
            ->setParameter('id', $id);
        $idCart = $query->getResult();

        for($j = 0 ; $j < count($idCart) ; $j++)
        {
            $response = $this->handleGetRequest($idCart[$j]["id"]);
            $content = $response -> getContent();
            $params = json_decode($content,true);

            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery('SELECT c.name,c.price,c.qty,c.discountAmount FROM OroCRMMagentoBundle:CartItem c WHERE c.cart = :id')
                ->setParameter('id', $idCart);

            $cartItemCollection = $query->getResult();
            $totalDiscount = 0;
            for($i = 0 ; $i < count($cartItemCollection) ; $i++)
            {
                $totalDiscount += $cartItemCollection[$i]["qty"] * $cartItemCollection[$i]["discountAmount"];
            }

//        var_dump($cartItemCollection);
            $tvgh = array("tong gia tri gio hang"=>$params["grandTotal"],"tong gia tri duoc discount"=>$totalDiscount,
                "thoi gian tao"=>$params["createdAt"],"thoi gian cap nhap"=>$params["updatedAt"],"IP"=>$params["ip_createCart"],
                $cartItemCollection);
        }
        
        return $tvgh;
    }

}