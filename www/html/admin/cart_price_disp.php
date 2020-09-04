<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GetCompetitivePricingForASIN 実行結果</title>
</head>
<body>
<h1>GetCompetitivePricingForASIN 実行結果</h1>
<table>
  <tr><th>Status</th><th>ASIN</th><th>カート価格</th></tr>
<?php
//--------------------------------------
// phpで結果を取得して表示する。ここから
//--------------------------------------
    $GetCompetitivePricingForASINResultList = $response->getGetCompetitivePricingForASINResult();
     //--------------------------------------
    // 全てのASIN情報を表示するまで繰り返し
    //--------------------------------------
    foreach ($GetCompetitivePricingForASINResultList as $GetCompetitivePricingForASINResult) {
        echo( "<tr>" );
        //----------------
        // 検索結果
        //----------------
        if ($GetCompetitivePricingForASINResult->isSetStatus()) {
            echo( "<td>" . $GetCompetitivePricingForASINResult->getStatus() . "</td>");
        }
        //----------------
        // ASIN情報
        //----------------
        if ($GetCompetitivePricingForASINResult->isSetASIN()) {
            echo( "<td>" . $GetCompetitivePricingForASINResult->getASIN() . "</td>");
        }
         //----------------
        // カート価格情報
        //----------------
        if ($GetCompetitivePricingForASINResult->isSetProduct()) { 
            $product = $GetCompetitivePricingForASINResult->getProduct();          
            if ($product->isSetCompetitivePricing()) { 
                $competitivePricing = $product->getCompetitivePricing();
                $competitivePrices = $competitivePricing->getCompetitivePrices();
                $competitivePriceList = $competitivePrices->getCompetitivePrice();
                
                //------------------
                // 価格情報
                //------------------
                foreach ($competitivePriceList as $competitivePrice) {
                    if ($competitivePrice->isSetPrice()) { 
                        $price1 = $competitivePrice->getPrice();
                        if ($price1->isSetLandedPrice()) { 
                            $landedPrice = $price1->getLandedPrice();
                            echo("<td>" .  floor($landedPrice->getAmount()) . "円</td>" );
                         } 
                    }
                 }//foreach
            }
        }
        //----------------
        // ランキング情報
        //----------------
//        if ($GetCompetitivePricingForASINResult->isSetProduct()) { 
//            $product = $GetCompetitivePricingForASINResult->getProduct();          
//            if ($product->isSetSalesRankings()) { 
//                $salesRankings = $product->getSalesRankings();
//                $salesRankList = $salesRankings->getSalesRank();
//                foreach ($salesRankList as $salesRank) {
//                    if ($salesRank->isSetProductCategoryId()) {
//                        echo("カテゴリID :" . $salesRank->getProductCategoryId() . "\n");
//                    }
//                    if ($salesRank->isSetRank()) {
//                        echo("<td>" . $salesRank->getRank() . "</td>");
//                    }
//                }
//            } 
//        }
      echo( "</tr>" );
    }//foreach
//--------------------------------------
// phpで結果を取得して表示する。ここまで
//--------------------------------------
?>
</table>
</body>
</html>