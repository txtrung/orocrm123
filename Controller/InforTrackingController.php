<?php
/**
 * Created by PhpStorm.
 * User: trantrung
 * Date: 12/07/2016
 * Time: 11:41
 */

namespace MCM\DemoBundle\Controller;

use BeSimple\SoapCommon\Type\KeyValue\DateTime;
use OroCRM\Bundle\MagentoBundle\Entity\Customer;
use Oro\Bundle\SoapBundle\Controller\Api\Rest\RestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InforTrackingController extends Controller
{
    public function getTrackingAction($customerId)
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p.websiteId
    FROM OroTrackingBundle:TrackingVisit p
    WHERE p.customerId = :id'
        )->setParameter('id', $customerId);

        $visitorId = $query->getResult();

        // lay ten customer tu database ..
        // ...
        //

        $query = $em->createQuery(
            'SELECT p.name,p.loggedAt,p.value
    FROM OroTrackingBundle:TrackingEvent p
    WHERE p.userIdentifier = :userIdentifier'
        )->setParameter('userIdentifier', 'barrack obama');

        $trackUser = $query->getResult();
//        var_dump($products[0]["firstActionTime"]->format('Y-m-d H:i:s'));
//        $time1 = new DateTime($products[0]["firstActionTime"]->format('Y-m-d H:i:s'));
//        $time2 = new DateTime($products[0]["lastActionTime"]->format('Y-m-d H:i:s'));
//        $intervalTime = $time2->diff($time1);
//        var_dump($time1);

        for($i = 0 ; $i < count($trackUser) ; $i++)
        {
            $xtbk[$i] = array("xem trang web"=>$trackUser[$i]["name"],
                "thoi gian xem trang web"=>$trackUser[$i]["loggedAt"],
                "value"=>$trackUser[$i]["value"]);
        }

        return array($xtbk);
    }
}