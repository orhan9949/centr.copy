<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?
CModule::IncludeModule("concept.hameleon");


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/concept.hameleon/payments/yandex/lib/autoload.php");
use YandexCheckout\Client;

$payment = json_decode(file_get_contents("php://input"), true);

$status = $payment["object"]["status"];

if($status == "waiting_for_capture")
{
	//file_put_contents("yandex-kassa-log.txt", print_r($payment, true));

	$orderID = $payment["object"]["metadata"]["order_id"];
	$ID = intval($orderID);

	$arOrder = CHamOrder::GetByID($ID);
	$arPaymentParams = CHamOrder::GetPaymentSystemParams($arOrder["ID"]);


	$orderSum = floatval(floatval($arOrder["SUM"])+floatval($arOrder["DELIVERY_SUM"]));
	$yandexSum = floatval($payment["object"]["amount"]["value"]);


	if($orderSum == $yandexSum)
	{
		$client = new Client();
		$client->setAuth($arPaymentParams["VARS"]["YANDEX_SHOP_ID"], $arPaymentParams["VARS"]["YANDEX_SHOP_KEY"]);

		$result = $client->capturePayment(
		    array(
		        'amount' => $payment["object"]["amount"]["value"],
		    ),
		    $payment["object"]["id"],
		    uniqid($arOrder["ID"], true)
		);

		$response = json_decode(json_encode($result), true);

		if($response["status"] == "succeeded")
			CHamOrder::SetPayStatus($arOrder["ID"], "Y");
	}

	
}

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>