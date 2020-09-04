<?php

define('AWS_ACCESS_KEY_ID',     'AKIAJTTGBUMUZ6VHLA3A');
define('AWS_SECRET_ACCESS_KEY', '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');  
define('MERCHANT_ID',           'A3LIDTGANAESGU');
define('MARKETPLACE_ID',        'A1VC38T7YXB528');

set_include_path( get_include_path() . PATH_SEPARATOR . 'MarketplaceWebServiceProducts/.' );    


// ���C�������̎��s
main();

//****************************************************************************
// Function		: main
// Description	: ���C������
//****************************************************************************
function main() {

	//--------------------------------
	// Web�T�[�r�X���̎擾
	//--------------------------------
	$service = getService();
	//�P�̃e�X�g�p(MarketplaceWebServiceProducts/Mock��xml�t�@�C�����g�p)
	//$service = new MarketplaceWebServiceProducts_Mock();


	//-------------------------------
	// ���N�G�X�g�p�����[�^�̃Z�b�g
	//-------------------------------
	$asinList = new MarketplaceWebServiceProducts_Model_ASINListType();
	$asinList->setASIN( array( '4478312141', '4797330058' ) );
	
	$request = new MarketplaceWebServiceProducts_Model_GetLowestOfferListingsForASINRequest();
	$request->setSellerId( MERCHANT_ID );
	$request->setMarketplaceId( MARKETPLACE_ID );
	$request->setASINList( $asinList );


	//-------------------------------
	// MWS���N�G�X�gAPI�̎��s
	//-------------------------------
	try {
	    $response = $service->getLowestOfferListingsForASIN($request);
	} catch (MarketplaceWebServiceProducts_Exception $ex) {
	    echo("Caught Exception: "       . $ex->getMessage()    . "\n");
	    echo("Response Status Code: "   . $ex->getStatusCode() . "\n");
	    echo("Error Code: "             . $ex->getErrorCode() . "\n");
	    echo("Error Type: "             . $ex->getErrorType() . "\n");
	    echo("Request ID: "             . $ex->getRequestId() . "\n");
	    echo("XML: "                    . $ex->getXML() . "\n");
	    echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
	}

	//-------------------------------
	// API��������\������
	//-------------------------------
	showResponse( $response );
}



//****************************************************************************
// Function		: getService
// Description	: Web�T�[�r�X���̎擾
// Return		: MarketplaceWebServiceProducts_Client	�T�[�r�X���
//****************************************************************************
function getService() {

	//---------------------------------
	// �N���X�̃I�[�g���[�f�B���O���s��
	//---------------------------------
	function __autoload($className){
	    $filePath = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	    $includePaths = explode(PATH_SEPARATOR, get_include_path());
	    foreach($includePaths as $includePath){
	        if(file_exists($includePath . DIRECTORY_SEPARATOR . $filePath)){
	            require_once $filePath;
	            return;
	        }
	    }
	}

	// Web API�̃G���h�|�C���g(japan)
	$serviceUrl = "https://mws.amazonservices.jp/Products/2011-10-01";

	// proxy/retry�̐ݒ�
	$config = array (
	   'ServiceURL'    => $serviceUrl,
	   'ProxyHost'     => null,
	   'ProxyPort'     => -1,
	   'MaxErrorRetry' => 3,
	);

	// Web�T�[�r�X�I�u�W�F�N�g�𐶐�
	$service = new MarketplaceWebServiceProducts_Client(
			    AWS_ACCESS_KEY_ID,
			    AWS_SECRET_ACCESS_KEY,
			    'nanoappli.com_SampleApp',
			    '1.0.0.0',
			    $config);
			    
	return $service;
}



//****************************************************************************
// Function		: showResponse
// Description	: Web�T�[�r�X���s���ʂ̕\��
// Params		: $response	WebAPI���s����
//****************************************************************************
function showResponse( $response ) {
	$getLowestOfferListingsForASINResultList = $response->getGetLowestOfferListingsForASINResult();

	//--------------------------------------
	// �S�Ă�ASIN����\������܂ŌJ��Ԃ�
	//--------------------------------------
	foreach ($getLowestOfferListingsForASINResultList as $getLowestOfferListingsForASINResult) {
		echo ("=============================================================================\n");

		// ��������
		if ($getLowestOfferListingsForASINResult->isSetStatus()) {
		    echo( "Status :" . $getLowestOfferListingsForASINResult->getStatus() . "\n");
		}


		//----------------
    	// ���i�̏��
		//----------------
		if ($getLowestOfferListingsForASINResult->isSetASIN()) {
		    echo( "ASIN   :" . $getLowestOfferListingsForASINResult->getASIN() . "\n");
		}
	    if ($getLowestOfferListingsForASINResult->isSetProduct()) { 
	        $product = $getLowestOfferListingsForASINResult->getProduct();			
	        if ($product->isSetSalesRankings()) { 
	            $salesRankings = $product->getSalesRankings();
	            $salesRankList = $salesRankings->getSalesRank();
	            foreach ($salesRankList as $salesRank) {
	                if ($salesRank->isSetProductCategoryId()) {
	                    echo("カテゴリID :" . $salesRank->getProductCategoryId() . "\n");
	                }
	                if ($salesRank->isSetRank()) {
	                    echo("ランク :" . $salesRank->getRank() . "\n");
	                }
	            }
	        } 
	        
	        //-------------------
	        // �o�i���
	        //-------------------
	        if ($product->isSetLowestOfferListings()) { 
	            $lowestOfferListings = $product->getLowestOfferListings();
	            $lowestOfferListingList = $lowestOfferListings->getLowestOfferListing();

				//-----------------------------------------
				// �擾�����S�o�i����\������܂ŌJ��Ԃ�
				//-----------------------------------------
	            foreach ($lowestOfferListingList as $lowestOfferListing) {
		        	echo( "------------------------------------------------\n" );

	                //------------------
	            	// ���i�̏��
	                //------------------
	                if ($lowestOfferListing->isSetQualifiers()) { 
	                    $qualifiers = $lowestOfferListing->getQualifiers();
	                    if ($qualifiers->isSetItemCondition()) {
	                    	$condName    = getConditionName( $qualifiers->getItemCondition() );
	                    	$subCondName = "";
		                    if ($qualifiers->isSetItemSubcondition()) {
			                    $subCondName = "(" . getItemSubconditionName( $qualifiers->getItemSubcondition() ) . ")";
		                    }
	                        echo("コンディション   :" . $condName . $subCondName . "\n" );
	                    }
	                    
	                    
	                    if ($qualifiers->isSetFulfillmentChannel()) {
	                    	$name = getFulfillmentChannelName( $qualifiers->getFulfillmentChannel() );
	                        echo("出荷元           :" . $name . "\n");
	                    }
	                    if ($qualifiers->isSetShipsDomestically()) {
	                        echo("国内より発送     :" . $qualifiers->getShipsDomestically() . "\n");
	                    }
	                    if ($qualifiers->isSetShippingTime()) { 
	                        $shippingTime = $qualifiers->getShippingTime();
	                        if ($shippingTime->isSetMax()) {
	                            echo("発送日数(最大)   :" . $shippingTime->getMax() . "\n");
	                        }
	                    } 

		                if ($lowestOfferListing->isSetSellerFeedbackCount()) {
		                    echo("フィードバック数 :" . $lowestOfferListing->getSellerFeedbackCount() );

		                    if ($qualifiers->isSetSellerPositiveFeedbackRating()) {
		                        echo(" (高評価:" . $qualifiers->getSellerPositiveFeedbackRating() . ")");
		                    }
		                    echo ( "\n" );
		                }
	                }
	                if ($lowestOfferListing->isSetNumberOfOfferListingsConsidered()) {
	                    echo("出品数           :" . $lowestOfferListing->getNumberOfOfferListingsConsidered() . "\n");
	                }

	                //------------------
	                // ���i���
	                //------------------
	                if ($lowestOfferListing->isSetPrice()) { 
	                    $price1 = $lowestOfferListing->getPrice();
	                    if ($price1->isSetLandedPrice()) { 
	                        echo("総額             :" . getPriceName( $price1->getLandedPrice() ) );
	                        
	                    } 
	                    if ($price1->isSetShipping()) { 
	                        echo(" (送料:" . getPriceName( $price1->getShipping() ) . ")" );
	                    } 
                        echo ( "\n" );
	                } 
	            }
	        } 
	    } 
	    
	    if ($getLowestOfferListingsForASINResult->isSetError()) { 
	        echo("エラーが発生しました\n");
	        $error = $getLowestOfferListingsForASINResult->getError();
	        if ($error->isSetType()) {
	            echo("Type:" . $error->getType() . "\n");
	        }
	        if ($error->isSetCode()) {
	            echo("Code:" . $error->getCode() . "\n");
	        }
	        if ($error->isSetMessage()) {
	            echo("Message:" . $error->getMessage() . "\n");
	        }
	    } 
	}
}


//****************************************************************************
// Function		: getConditionName
// Description	: �R���f�B�V������(���{��)���擾����
//****************************************************************************
function getConditionName( $inStr ) {
	switch( $inStr ) {
		case "New":
			return "新品";
			break;
		case "Used":
			return "中古品";
			break;
		case "Collectible":
			return "コレクター品";
			break;
		case "Refurbished":
			return "再生品";
			break;
		default:
			return $inStr;
			break;
	}
}


//****************************************************************************
// Function		: getItemSubconditionName
// Description	: �T�u�R���f�B�V������(���{��)���擾����
//****************************************************************************
function getItemSubconditionName( $inStr ) {
	switch( $inStr ) {
		case "New":
			return "新品";
			break;
		case "Mint":
			return "ほぼ新品";
			break;
		case "Very Good":
		case "VeryGood":
			return "非常に良い";
			break;
		case "Good":
			return "良い";
			break;
		default:
			return $inStr;
			break;
	}
}


//****************************************************************************
// Function		: getFulfillmentChannelName
// Description	: �o�׌�(���{��)���擾����
//****************************************************************************
function getFulfillmentChannelName( $inStr ) {
	switch( $inStr ) {
		case "Amazon":
			return "FBA";
			break;
		case "Merchant":
			return "出品者";
			break;
		default:
			return $inStr;
			break;
	}
}


//****************************************************************************
// Function		: getPriceName
// Description	: ���i(�ʉݒP�ʕt��)���擾����
//****************************************************************************
function getPriceName( $inData ) {
	$outStr = "";

	// �ʉݒP�ʂ̃Z�b�g
	if ( $inData->isSetCurrencyCode() ) {
		switch ( $inData->getCurrencyCode() ) {
			case "JPY":
				$outStr .= "\\";
				break;
			case "USD":
				$outStr .= "$";
				break;
			default:
				$outStr .= "(" . $inData->getCurrencyCode() . ")";
				break;
		}
	}

	// ���z�̃Z�b�g
	if ($inData->isSetAmount()) {
	    $outStr .= sprintf( "%.0lf", $inData->getAmount() );
	}

	return $outStr;
}
