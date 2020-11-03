<?php 
    include '../db/connection.php';

    $supplierName =  $_GET["name"];

    $sql2 = "SELECT COUNT(*) FROM `ledger` WHERE (CONVERT(`purchase` USING utf8) LIKE '%%$supplierName%%')";
    
    $sql2Result = $conn->query($sql2);

    $outp = new \stdClass();

    $offset = $_GET["start"];
    $limit = $_GET["length"];

    $order = $_GET["order"][0];
    $search = $_GET['search']['value'];
    
    $columnPosition = $order['column'] == 0 ? 0 : $order['column'];
    $column = $_GET['columns'][$columnPosition]['data'];

    // $column = $order['column'] == 0 ? '1' : $order['column'];

    $orderingStyle = $order['dir'];

    if ($sql2Result->num_rows > 0) {    

        // $offset = 3;
    
        if($search == 'oc'){
            $search = true;
        }
        if($search == 'flat'){
            $search = false;
        }
          
        if($search == ''){
            $stmt = $conn->prepare("SELECT * FROM `ledger` WHERE (CONVERT(`purchase` USING utf8) LIKE '%%$supplierName%%')");
        }
        else{
            $stmt = $conn->prepare("SELECT * FROM `ledger` WHERE (CONVERT(`id` USING utf8) LIKE '%%$search%%' OR CONVERT(`createdAt` USING utf8) LIKE '%%$search%%' OR CONVERT(`purchase` USING utf8) LIKE '%%$search%%' AND CONVERT(`purchase` USING utf8) LIKE '%%$supplierName%%')");
        }
            
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = array();
        $c = 0;
        $l = 0;
        $t = 0;

        foreach($result->fetch_all(MYSQLI_ASSOC) as $key => $value){

            $ledgerId = $value['id'];
            $createdAt = $value['createdAt'];
            $billNo = json_decode($value['sale'])[0]->billNo;
            
            foreach (json_decode($value['purchase']) as $k => $v) {
                

                if($v->supplier == $supplierName && $l <= $limit){
                    $obj = array(
                        'createdAt' => $createdAt,
                        'ledgerId' => '<a href="edit-ledger.php?id='.$ledgerId.'" >'.$ledgerId.'</a>',
                        'invoiceId' => '<a href="edit-ledger.php?id='.$ledgerId.'" >'.$billNo.'</a>',                        
                        'bags' => $v->bag,
                        'weight' => $v->weight,
                        'oilContent' => $v->oilContent,
                        'priceMethod' => ($v->priceMethod == true ? 'OC' : 'FLAT'),
                        'rate' => $v->rate,
                        'unitRate' => $v->unitRate,
                        'totalCost' => '<span class="totalCost">'.$v->totalCost.'</span>',
                        'paymentStatus' => '<span class="paymentStatus"  id="spanswitch'.$c.'">'.($v->isPaid == true ? 'Paid' : 'Pending').'</span>',
                        'paymentDate' => '<input type="date" id="paymentDateswitch'.$c.'" class="paymentDate form-control form-control-sm" value="'.($v->paymentDate != "" ? $v->paymentDate : '' ).'"/>',
                        'action' => '<input type="checkbox" id="switch'.$c.'" switch="success" ' . ($v->isPaid == true ? "checked" : '') . ' class="paymentBtn" onclick=doPayment(' . $ledgerId . ') />
                                        <label for="switch'.$c.'" data-on-label="Paid"
                                        data-off-label="pay"></label>
                                    '
                    );
                    if($c >= $offset && $l < $limit){
                        array_push($data, $obj);  
                        $l++;                              
                    }
                    $c++;                      
                    $t++;
                }
            }

        }
    } 
    else{
        $outp->recordsFiltered = 0;
        $outp->recordsTotal = 0;    
        $data = 0;       
    }
    
    $outp->draw = (int)($_GET["draw"]);

    if($c == 0){
        $data = 0;       
    }

    $outp->recordsFiltered = $t;
    $outp->recordsTotal = $t;       

    function my_sort($a,$b)
    {
        global $column, $orderingStyle;
        // echo $column;

        if($orderingStyle == 'asc'){
            // var_dump($a['isProfit'], $b['isProfit']).'<br>';
            if ($a[$column]==$b[$column]) return 0;
            return ($a[$column]>$b[$column])?-1:1;
        }

        if($orderingStyle == 'desc')
        {
            // var_dump($a['isProfit'], $b['isProfit']).'<br>';
            if ($a[$column]==$b[$column]) return 0;
            return ($a[$column]<$b[$column])?-1:1;
        }
    }

    if($data != 0){
        usort($data, "my_sort");
    }

    $outp->data = $data;

    // echo json_encode($outp) . '<br>';

    echo json_encode($outp)

    // echo ' ji';
  
?>