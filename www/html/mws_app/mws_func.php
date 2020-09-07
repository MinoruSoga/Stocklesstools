<?php
  function invokeGetCompetitivePricingForASIN(MarketplaceWebServiceProducts_Interface $service, $request)
  {
      try {
        $response = $service->GetCompetitivePricingForASIN($request);

        //echo ("Service Response\n");
        //echo ("=============================================================================\n");

        $dom = new DOMDocument();
        $dom->loadXML($response->toXML());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        //echo $dom->saveXML();
        //echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");

     } catch (MarketplaceWebServiceProducts_Exception $ex) {
        //echo("Caught Exception: " . $ex->getMessage() . "\n");
        //echo("Response Status Code: " . $ex->getStatusCode() . "\n");
        //echo("Error Code: " . $ex->getErrorCode() . "\n");
        //echo("Error Type: " . $ex->getErrorType() . "\n");
        //echo("Request ID: " . $ex->getRequestId() . "\n");
        //echo("XML: " . $ex->getXML() . "\n");
        //echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
     }
     return $dom;
 }
 
 
 function invokeGetMatchingProductForId(MarketplaceWebServiceProducts_Interface $service, $request)
  {
      try {
        $response = $service->GetMatchingProductForId($request);

        //echo ("Service Response\n");
        //echo ("=============================================================================\n");

        $dom = new DOMDocument();
        $dom->loadXML($response->toXML());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        //echo $dom->saveXML();
        //echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");

     } catch (MarketplaceWebServiceProducts_Exception $ex) {
        //echo("Caught Exception: " . $ex->getMessage() . "\n");
        //echo("Response Status Code: " . $ex->getStatusCode() . "\n");
        //echo("Error Code: " . $ex->getErrorCode() . "\n");
        //echo("Error Type: " . $ex->getErrorType() . "\n");
        //echo("Request ID: " . $ex->getRequestId() . "\n");
        //echo("XML: " . $ex->getXML() . "\n");
        //echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
     }
     return $dom;
 }
?>