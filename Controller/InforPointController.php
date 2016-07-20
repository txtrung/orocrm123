<?php

namespace MCM\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InforPointController extends Controller
{
    public function getPointAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.id,c.type,c.status FROM MCMDemoBundle:PointCard c WHERE c.cusId = :id')
            ->setParameter('id', $id);
        $pointData = $query->getResult();

        $dkttd = array("ma the"=>$pointData[0]["id"],"loai the"=>$pointData[0]["type"],"tinh trang"=>$pointData[0]["status"]);

        return $dkttd;
    }

    public function getPointUsedAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.amount,c.orderId,c.time FROM MCMDemoBundle:PointCardUse c WHERE c.cusId = :id')
            ->setParameter('id', $id);
        $pointData = $query->getResult();

        $sdt = array("don hang dung"=>$pointData[0]["orderId"],"so diem dung"=>$pointData[0]["amount"],
            "thoi gian su dung"=>$pointData[0]["time"]);

        return $sdt;
    }

    public function getPointPlusedAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.amount,c.reason,c.time FROM MCMDemoBundle:PointCardPlus c WHERE c.cusId = :id')
            ->setParameter('id', $id);
        $pointData = $query->getResult();

        $cdt = array("ly do nhan diem"=>$pointData[0]["reason"],"so diem duoc nhan"=>$pointData[0]["amount"],
            "thoi gian nhan"=>$pointData[0]["time"]);

        return $cdt;
    }
}
