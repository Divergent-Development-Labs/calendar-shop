<?php 
    include '../db/connection.php';

    $sql2 = "SELECT COUNT(*) FROM `orders`";
    
    $sql2Result = $conn->query($sql2);

    $outp = new \stdClass();

    $customer_id = $_GET['customer_id'];

    $offset = $_GET["start"];
    $limit = $_GET["length"];
    $order = $_GET["order"][0];
    $search = $_GET['search']['value'];
    
    $columnPosition = $order['column'] == 0 ? 0 : $order['column'];
    $column = $_GET['columns'][$columnPosition]['data'];

    // $column = $order['column'] == 0 ? '1' : $order['column'];

    $orderingStyle = $order['dir'];

    $outp->draw = (int)($_GET["draw"]);
      
    if ($sql2Result->num_rows > 0) {                                
        while($c = $sql2Result->fetch_assoc()) {              
             $outp->recordsFiltered = $c['COUNT(*)'];
             $outp->recordsTotal = $c['COUNT(*)'];       
        }

        if($customer_id != 'all'){
            if($search == ''){
                $stmt = $conn->prepare("SELECT * FROM `orders` WHERE `customer_id` = '$customer_id' LIMIT $limit OFFSET $offset");
            }
            else{
                $stmt = $conn->prepare("SELECT * FROM `orders` WHERE `customer_id` = '$customer_id' AND (CONVERT(`id` USING utf8) LIKE '%%$search%%' OR CONVERT(`subtotal` USING utf8) LIKE '%%$search%%' OR CONVERT(`gst` USING utf8) LIKE '%%$search%%' OR CONVERT(`total` USING utf8) LIKE '%%$search%%' OR CONVERT(`order_date` USING utf8) LIKE '%%$search%%') LIMIT $limit OFFSET $offset");
            }
        }
        else{
            if($search == ''){
                $stmt = $conn->prepare("SELECT * FROM `orders` LIMIT $limit OFFSET $offset");
            }
            else{
                $stmt = $conn->prepare("SELECT * FROM `orders` WHERE (CONVERT(`id` USING utf8) LIKE '%%$search%%' OR CONVERT(`subtotal` USING utf8) LIKE '%%$search%%' OR CONVERT(`gst` USING utf8) LIKE '%%$search%%' OR CONVERT(`total` USING utf8) LIKE '%%$search%%' OR CONVERT(`order_date` USING utf8) LIKE '%%$search%%') LIMIT $limit OFFSET $offset");
            }
        }        
     
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = array();

        foreach($result->fetch_all(MYSQLI_ASSOC) as $key => $value){
            $customerId = $value['customer_id'];
            
            $sqlCustomer = "SELECT `name` FROM `customer` WHERE `id`= $customerId";

            $customerArray = $conn->query($sqlCustomer);

            $customerName = $customerArray->fetch_assoc()['name'];

            $obj = array(                
                // 'checkBox' => '<input id="checkId'.$value['id'].'" type="checkbox" value="' . $value['id'] . '" name="ids" class="myCustomCheckBox"/>',

                'id' => '<a href="view-order.php?id='.$value['id'].'" >'.$value['id'].'</a>',            
                'customer_id' => '<a href="edit-customer.php?id='.$value['customer_id'].'">'.$customerName.'</a>',            
                'subtotal' => $value['subtotal'],            
                'gst' => $value['gst'],            
                'total' => '<span class="totalCost">'.$value['total'].'</span>', 
                'order_date' => $value['order_date'],            
                'payment_status' => '<span class="paymentStatus"  id="spanswitch'.$value['id'].'">'.($value['payment_status'] == 'true' ? 'Paid' : 'Unpaid').'</span>',
                'action' => '<div class="d-flex justify-content-around">
                                <input type="checkbox" id="switch'.$value['id'].'" switch="success" ' . ($value['payment_status'] == 'true' ? "checked" : '') . ' class="paymentBtn" onclick=doPayment(' . $value['id'] . ') />
                                <label for="switch'.$value['id'].'" data-on-label="Paid" data-off-label="pay"></label>                                    
                                <a type="button" onclick="deleteRow(this)" data-content="backend/delete-ledger.php?id=' . $value["id"] . '" class="delete-record-btn ml-1 my-auto waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-content="11">
                                    <i  data-container="body" data-toggle="tooltip" data-placement="top" title="Delete Record" class="fas fa-trash-alt font-size-16 text-danger mr-1"></i>
                                </a>
                            </div>'
            );
    
            array_push($data, $obj);
        }    
    } 
    else{
        $outp->recordsFiltered = 0;
        $outp->recordsTotal = 0;    
        $data = 0;       
    }
    

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