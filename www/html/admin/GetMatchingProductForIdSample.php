<?php
require_once('.config.inc.php');

// Japan
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

 // @TODO: set request. Action can be passed as MarketplaceWebServiceProducts_Model_GetMatchingProductForId
 $request = new MarketplaceWebServiceProducts_Model_GetMatchingProductForIdRequest();
 $request->setSellerId(MERCHANT_ID);

 $request->setMarketplaceId(MARKETPLACE_ID);
 $request->setIdType("ASIN");
 $asinList = new MarketplaceWebServiceProducts_Model_IdListType();
//  $asinList->setId("B0035ESZBY");
//  $asinList->setId(array('B0035ESZBY', 'B00TRUOD5C', 'B01MSK1R3O'));
require_once dirname(__FILE__) . '/textarea_to_arr.php';
$input_asin = textarea_to_arr();
$asinList->setId($input_asin);
$request->setIdList($asinList);
 // object or array of parameters
$array = invokeGetMatchingProductForId($service, $request);

/**
  * Get Get Matching Product For Id Action Sample
  * Gets competitive pricing and related information for a product identified by
  * the MarketplaceId and ASIN.
  *
  * @param MarketplaceWebServiceProducts_Interface $service instance of MarketplaceWebServiceProducts_Interface
  * @param mixed $request MarketplaceWebServiceProducts_Model_GetMatchingProductForId or array of parameters
  */

  function invokeGetMatchingProductForId(MarketplaceWebServiceProducts_Interface $service, $request)
  {
      try {
        $response = $service->GetMatchingProductForId($request);

        // echo ("Service Response\n");
        // echo ("=============================================================================\n");

        $dom = new DOMDocument();
        $dom->loadXML($response->toXML());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        // echo $dom->saveXML();
        // echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");

     } catch (MarketplaceWebServiceProducts_Exception $ex) {
        // echo("Caught Exception: " . $ex->getMessage() . "\n");
        // echo("Response Status Code: " . $ex->getStatusCode() . "\n");
        // echo("Error Code: " . $ex->getErrorCode() . "\n");
        // echo("Error Type: " . $ex->getErrorType() . "\n");
        // echo("Request ID: " . $ex->getRequestId() . "\n");
        // echo("XML: " . $ex->getXML() . "\n");
        // echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
     }
    //  API応答情報を表示する
    // require_once dirname(__FILE__) . '/product_name_disp.php';
    // require_once dirname(__FILE__) . '/product_image_disp.php';
    // require_once dirname(__FILE__) . '/etc_item_disp.php';
    require_once dirname(__FILE__) . '/product_image_arr.php';
    return $array;
 }

