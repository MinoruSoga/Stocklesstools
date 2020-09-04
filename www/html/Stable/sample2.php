<?php
require_once ('.config.inc.php');

$serviceUrl = "https://mws.amazonservices.jp/Products/2011-10-01";

$config = array (
    'ServiceURL' => $serviceUrl,
    'ProxyHost' => null,
    'ProxyPort' => -1,
    'ProxyUsername' => null,
    'ProxyPassword' => null,
    'MaxErrorRetry' => 3,
);

$service = new MarketplaceWebServiceProducts_Client(
    AWS_ACCESS_KEY_ID,
    AWS_SECRET_ACCESS_KEY,
    APPLICATION_NAME,
    APPLICATION_VERSION,
    $config);

//↓ここだけ追記↓
$idList = new MarketplaceWebServiceProducts_Model_IdListType();
$idList->setId('B07GKQDQZG');
//↑ここだけ追記↑

$request = new MarketplaceWebServiceProducts_Model_GetMatchingProductForIdRequest();
$request->setSellerId(MERCHANT_ID);

//↓ここだけ追記↓
$request->setMarketplaceId('A1VC38T7YXB528');
$request->setIdType('ASIN');
$request->setIdList($idList);
//↑ここだけ追記↑

invokeGetMatchingProductForId($service, $request);



function invokeGetMatchingProductForId(MarketplaceWebServiceProducts_Interface $service, $request){
    try {
        $response = $service->GetMatchingProductForId($request);

        echo ("Service Response\n");
        echo ("=============================================================================\n");

        $dom = new DOMDocument();
        $dom->loadXML($response->toXML());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        // echo $dom->textContent;
        echo "<br>";
        echo "<br>";
        // echo $dom->textContent;
        // echo $response;
        echo "<br>";
        echo $dom->saveXML();

        echo "<br>";
        echo "-------------------------------------------------------------";
        echo "<br>";
        var_dump($dom->saveXML());
        echo "<br>";
        echo "-------------------------------------------------------------";
        echo "<br>";


        echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
    } catch (MarketplaceWebServiceProducts_Exception $ex) {
        echo("Caught Exception: " . $ex->getMessage() . "\n");
        echo("Response Status Code: " . $ex->getStatusCode() . "\n");
        echo("Error Code: " . $ex->getErrorCode() . "\n");
        echo("Error Type: " . $ex->getErrorType() . "\n");
        echo("Request ID: " . $ex->getRequestId() . "\n");
        echo("XML: " . $ex->getXML() . "\n");
        echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
    }

}
?>
