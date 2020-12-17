<?php
	$f = fopen("payproexample.txt", "r");
	$content = array();

	while (!feof($f)) {  
	 	$read = fgets($f);
	 	array_push($content, $read);
	}
	
	$imp = implode($content);
	$imp = explode("\n", $imp);
	$data = array();
	foreach ($imp as $value) {
		$key = ltrim(stristr($value, ':', true));
		$value1 = substr(stristr($value, ':', false), 2);
		$data[$key]=$value1;
	}
	echo"Продукт: ".$data['ORDER_ITEM_NAME']."<br>
		Тип продукта: ".$data['ORDER_ITEM_TYPE_ID']."<br>
		Стоимость: ".($data['ORDER_ITEM_TOTAL_AMOUNT'] - $data['ORDER_ITEM_BALANCE_CURRENCY_PAYPRO_AMOUNT'])."<br>
		Заказчик: ".$data['CUSTOMER_NAME']."<br>
		Email: ".$data['CUSTOMER_EMAIL']."<br>
		Количество: ".$data['PRODUCT_QUANTITY']."<br>";

	fclose($f);