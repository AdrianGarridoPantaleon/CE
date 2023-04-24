<?php

    function getOrder(){
    $order = "";
    $numeros = "1234567890";
    $alfanumericos = "1234567890qwertyuioplkjhgfdsazxcvbnm";
    for($i=0;$i<4;$i++){
        $order[$i] = $numeros[rand()% strlen($numeros)];
    }
    
    for($i=4;$i<12;$i++){
        $order[$i] = $alfanumericos[rand()% strlen($alfanumericos)];
    }
    return $order;
    }
    
    $order= getOrder();
    
    function Firma($order){
    $signature = "";
    $signature = $_POST['DS_Merchant_Amount'] . $order . $_POST['DS_Merchant_MerchantCode'] . $_POST['DS_Merchant_Currency'] . $_POST['DS_Merchant_TransactionType'] . "UMH2809";
    $signature = sha1($signature);
    $signature = strtoupper($signature);
    return $signature;
    }
    
    function Decimal_to_Entero($numero){
        return intval($numero*100);
    }
    
    
    $signature= Firma($order);
    
    $desc = $_POST['DS_Merchant_ProductDescription'];
    $precio = Decimal_to_Entero($_POST['DS_Merchant_Amount']);
    
    
    echo "<h1>Datos de la compra</h1>";
    
    echo "DS_Merchant_Amount: {$precio}<br/>";
    echo "DS_Merchant_Currency: {$_POST['DS_Merchant_Currency']}<br/>";
    
    echo "DS_Merchant_Order: {$order}<br/>";
    
    echo "DS_Merchant_ProductDescription: {$_POST['DS_Merchant_ProductDescription']}<br/>";
    echo "DS_Merchant_MerchantCode: {$_POST['DS_Merchant_MerchantCode']}<br/>";
    echo "DS_Merchant_MerchantName: {$_POST['DS_Merchant_MerchantName']}<br/>";
    echo "DS_Merchant_Terminal: {$_POST['DS_Merchant_Terminal']}<br/>";
    echo "DS_Merchant_TransactionType: {$_POST['DS_Merchant_TransactionType']}<br/>";
    echo "DS_Merchant_Titular: {$_POST['nombre']} {$_POST['apellidos']}<br/>";
    echo "DS_Merchant_urlOK: {$_POST['DS_Merchant_urlOK']}<br/>";
    echo "DS_Merchant_urlKO: {$_POST['DS_Merchant_urlKO']}<br/>";
    
    echo "DS_Merchant_Signature: {$signature}<br/>";
    
    
?>