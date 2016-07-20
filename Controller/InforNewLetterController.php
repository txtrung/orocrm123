<?php
/**
 * Created by PhpStorm.
 * User: trantrung
 * Date: 12/07/2016
 * Time: 11:41
 */

namespace MCM\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InforNewLetterController extends Controller
{
    public function getInforNewLetterAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.id,c.createdAt,c.statusId FROM OroCRMMagentoBundle:NewsletterSubscriber c WHERE c.customer = :id')
            ->setParameter('id', $id);
        $idNews = $query->getResult();

        $statusNews = "";
        switch($idNews[0]["statusId"])
        {
            case 1:
                $statusNews = "Subscribed";
                break;
            case 2:
                $statusNews = "Not active";
                break;
            case 3:
                $statusNews = "Unsubscribed";
                break;
            case 4:
                $statusNews = "Unconfirmed";
                break;
        }

        $dknns = array("thoi gian dang ky"=>$idNews[0]["createdAt"],"tinh trang dang ky:"=>$statusNews);
        return $dknns;
    }
}