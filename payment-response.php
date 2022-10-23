<?php

$data = $_REQUEST;

//print_r($data);

if($data['status'] == 'success') {
    $html = '<form action="user/prikpay-response" id="payment_form_submit" method="get">
        <input type="hidden" id="txnid" name="order_id" value="'.$data['order_id'].'" />
        <input type="hidden" id="amount" name="status" value="'.$data['status'].'" />
        <input type="hidden" id="productInfo" name="amount" value="'.$data['amount'].'" />
        </form>
        <script type="text/javascript">
            document.getElementById("payment_form_submit").submit();	
   
        </script>';
    echo $html;
} else {
    $html = '<form action="user/prikpay-response" id="payment_form_submit" method="get">
        <input type="hidden" id="txnid" name="order_id" value="'.$data['order_id'].'" />
        <input type="hidden" id="amount" name="status" value="'.$data['status'].'" />
        <input type="hidden" id="productInfo" name="amount" value="'.$data['amount'].'" />
        </form>
        <script type="text/javascript">
            document.getElementById("payment_form_submit").submit();	
        
        </script>';
    echo $html;
}

?>