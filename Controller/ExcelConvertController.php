<?php

namespace MCM\DemoBundle\Controller;
use MCM\DemoBundle\Entity\AccountCustomers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;

use PHPExcel_Shared_Date;

class ExcelConvertController extends Controller
{
    public function indexAction() {
        return array();
    }

    public function mapColumn($col)
    {
        switch ($col) {
            case 0:
                return 'A';

            case 1:
                return 'B';

            case 2:
                return 'C';

            case 3:
                return 'D';

            case 4:
                return 'E';

            case 5:
                return 'F';

            case 6:
                return 'G';

            case 7:
                return 'H';

        }

    }

    public function importAction()
    {
        // __DIR__ => path of current folder of file
        //$pathfile = __DIR__.'/../../../../../web/uploads/import/cegid_cus_data.xlsx';
        $pathFile = '~/Desktop/datagrid_accounts.xlsx';
        $phpExcelObject = PHPExcel_IOFactory::load($pathFile);
        if(empty($phpExcelObject)) {
            throw $this->createNotFoundException(

                'No data'
            );
        }
        $objWorksheet  = $phpExcelObject->setActiveSheetIndex(0);
        $highestRow    = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $array_data = array();
        $i = 0;
        for ($row = 0; $row <= $highestRow; $row++) {
            for ($col = 0; $col <= 22; $col++) {
                $cell = $objWorksheet->getCell($this->mapColumn($col) . $row);
                $InvDate = $cell->getValue();
//                    $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                if(PHPExcel_Shared_Date::isDateTime($cell)) {
                    $InvDate = date($format = "m/d/Y", PHPExcel_Shared_Date::ExcelToPHP($InvDate));
                }
                $array_data[$i][$col] = $InvDate;
            }
            $i++;
        }
        var_dump($array_data);
        // count value
        $card_total = 0;
        $card_add = 0;
        $card_update = 0;
        $card_error = 0;

        foreach ($array_data as $key => $data) {
            if ($data[0] != null && intval($data[0]) != 0 && intval($data[1]) != 0) {
                // if card already exist
                $repository = $this->getDoctrine()
                    ->getRepository('MCMDemoBundle:AccountCustomers');
                $repository->find($data[0]);
                if ($repository) {
                    // update car
                    $this->updateCard($data);
                    $card_update++;
                    $card_total++;
                } else {
                    // add new card
                    $this->addNewCard($data);
                    $card_add++;
                    $card_total++;
                }

            } elseif ($data[0] != null) {
                $card_error++;
                $card_total++;
            }
        }
        return array('success'=>'1');
//        return new Response();
    }

    protected function addNewCard($card) {
        $accountCustomer = new AccountCustomers();
        if($card[1] == null ) {
            $accountCustomer->setAccountName('');
        } else {
            $accountCustomer->setAccountName($card[1]);
        }
        if($card[2] == null ) {
            $accountCustomer->setContactName('');
        } else {
            $accountCustomer->setContactName($card[2]);
        }
        if($card[3] == null ) {
            $accountCustomer->setContactEmail('');
        } else {
            $accountCustomer->setContactEmail($card[3]);
        }
        if($card[4] == null ) {
            $accountCustomer->setContactPhone('');
        } else {
            $accountCustomer->setContactPhone($card[4]);
        }
        if($card[5] == null ) {
            $accountCustomer->setOwner('');
        } else {
            $accountCustomer->setOwner($card[5]);
        }
        if($card[6] == null ) {
            $accountCustomer->setCreateAt('0000-00-00 0:0:0');
        } else {
            $accountCustomer->setCreateAt($card[6]);
        }
        if($card[7] == null ) {
            $accountCustomer->setUpdateAt('0000-00-00 0:0:0');
        } else {
            $accountCustomer->setUpdateAt($card[7]);
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($accountCustomer);
        $em->flush();
    }

    protected function updateCard($card)
    {
        $em = $this->getDoctrine()->getManager();
        $accountCustomer = $em->getRepository('MCMDemoBundle:AccountCustomers')->find($card[0]);
        if(!$accountCustomer) {
            throw $this->createNotFoundException(
                'No product found for id '.$card[0]
            );
        }
        if($card[1] == null ) {
            $accountCustomer->setAccountName('');
        } else {
            $accountCustomer->setAccountName($card[1]);
        }
        if($card[2] == null ) {
            $accountCustomer->setContactName('');
        } else {
            $accountCustomer->setContactName($card[2]);
        }
        if($card[3] == null ) {
            $accountCustomer->setContactEmail('');
        } else {
            $accountCustomer->setContactEmail($card[3]);
        }
        if($card[4] == null ) {
            $accountCustomer->setContactPhone('');
        } else {
            $accountCustomer->setContactPhone($card[4]);
        }
        if($card[5] == null ) {
            $accountCustomer->setOwner('');
        } else {
            $accountCustomer->setOwner($card[5]);
        }
        if($card[6] == null ) {
            $accountCustomer->setCreateAt('0000-00-00 0:0:0');
        } else {
            $accountCustomer->setCreateAt($card[6]);
        }
        if($card[7] == null ) {
            $accountCustomer->setUpdateAt('0000-00-00 0:0:0');
        } else {
            $accountCustomer->setUpdateAt($card[7]);
        }
        $em->flush();
    }
}