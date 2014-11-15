<?php
class Ebay {

	public	$compatability_level = 885;

	public $sandbox_url = 'https://api.sandbox.ebay.com/ws/api.dll';
	public $url = 'https://api.ebay.com/ws/api.dll';

	public $run_name;
	public $dev_id; 
	public $app_id;
	public $cert_id;
	public $site_id;
	public $user_token;
	


	public function __construct($settings){
		$this->run_name = $settings->run_name;
		$this->user_token = $settings->user_token;
		$this->dev_id = $settings->dev_id;
		$this->app_id = $settings->app_id;
		$this->cert_id = $settings->cert_id;
		$this->site_id = $settings->site_id;
	}

	public function request($method, $request_body){

		$client = new GuzzleHttp\Client();

		$response = $client->post($this->url, array(
		    'verify' => false,
		    'headers' => array(
		        'X-EBAY-API-COMPATIBILITY-LEVEL' => $this->compatability_level,
		        'X-EBAY-API-DEV-NAME' => $this->dev_id,
		        'X-EBAY-API-APP-NAME' => $this->app_id,
		        'X-EBAY-API-CERT-NAME' => $this->cert_id,        
		        'X-EBAY-API-SITEID' => $this->site_id,
		        'X-EBAY-API-CALL-NAME' => $method     
		    ),
		    'body' => $request_body
		));

		$body = $response->xml();

		return $body;

	}


    public function getSessionID(){

        $request_body = '<?xml version="1.0" encoding="utf-8"?>
          <GetSessionIDRequest xmlns="urn:ebay:apis:eBLBaseComponents">
            <RuName>' . $this->run_name . '</RuName>
          </GetSessionIDRequest>';

        $response = $this->request('GetSessionID', $request_body);
        return $response->SessionID;
    }


	public function getUserToken($session_id){

	    $request_body = '<?xml version="1.0" encoding="utf-8"?>
	        <FetchTokenRequest xmlns="urn:ebay:apis:eBLBaseComponents">
	          <SessionID>' . $session_id . '</SessionID>
	        </FetchTokenRequest>';

	    $response = $this->request('FetchToken', $request_body);
	    return $response->eBayAuthToken;      

	}


	public function getEbayDetails($detail_name){

		$request_body = '<?xml version="1.0" encoding="utf-8"?>
		<GeteBayDetailsRequest xmlns="urn:ebay:apis:eBLBaseComponents">
			<RequesterCredentials>
			<eBayAuthToken>' . $this->user_token . '</eBayAuthToken>
			</RequesterCredentials>
		<DetailName>' . $detail_name . '</DetailName>
		</GeteBayDetailsRequest>';

		$response = $this->request('GeteBayDetails', $request_body);

		$services = array();
		foreach($response->ShippingServiceDetails as $service){
			$services[] = json_decode(json_encode($service->ShippingService), true)[0];
		}

		return $services;	

	}


	public function getUserPreferences(){

		$request_body = '<?xml version="1.0" encoding="utf-8"?>
			<GetUserPreferencesRequest xmlns="urn:ebay:apis:eBLBaseComponents">
			 <RequesterCredentials>
			    <eBayAuthToken>' . $this->user_token . '</eBayAuthToken>
			  </RequesterCredentials>
			  <ShowGlobalShippingProgramListingPreference>true</ShowGlobalShippingProgramListingPreference>
			  <ShowSellerExcludeShipToLocationPreference>true</ShowSellerExcludeShipToLocationPreference>
			  <ShowSellerPaymentPreferences>true</ShowSellerPaymentPreferences>
			  <ShowSellerProfilePreferences>true</ShowSellerProfilePreferences>
			  <ShowSellerReturnPreferences>true</ShowSellerReturnPreferences>
			</GetUserPreferencesRequest>';

		$response = $this->request('GetUserPreferences', $request_body);

		
		$seller_profiles = array();
		foreach($response->SellerProfilePreferences->SupportedSellerProfiles->SupportedSellerProfile as $profile){
			$is_default = $profile->CategoryGroup->IsDefault;

			if($is_default == 'true'){			
				
				$seller_profiles[] = array(
					'id' => json_decode(json_encode($profile->ProfileID), true)[0],
					'type' => json_decode(json_encode($profile->ProfileType), true)[0],
					'name' => json_decode(json_encode($profile->ProfileName), true)[0]
				);

			}
		}

		$user_preferences = array(	
			'seller_profiles' => $seller_profiles,
			'paypal_emailaddress' => json_decode(json_encode($response->SellerPaymentPreferences->DefaultPayPalEmailAddress), true)[0]
		);

		return $user_preferences;
		

	}


	public function addItem($store_settings, $item_data){

		$boolean_value = array('false', 'true');

		$product_images = $_SESSION['uploads'];
		
		$baseupload_url = 'http://mywebsite.com/uploads/';

		$picture_details = '';
		if(!empty($product_images)){
			foreach($product_images as $img){

				$requestBody = '<?xml version="1.0" encoding="utf-8"?>
				<UploadSiteHostedPicturesRequest xmlns="urn:ebay:apis:eBLBaseComponents">
				  <RequesterCredentials>
				    <eBayAuthToken>' . $this->user_token . '</eBayAuthToken>
				  </RequesterCredentials>
				  <ExternalPictureURL>' . $baseupload_url . $img . '</ExternalPictureURL>
				</UploadSiteHostedPicturesRequest>';


				$response = $this->request('UploadSiteHostedPictures', $requestBody);
				
				if(!empty($response->Ack) && $response->Ack != 'Failure'){
					$uploaded_img = json_decode(json_encode($response->SiteHostedPictureDetails->PictureSetMember[3]->MemberURL), true);
					$picture_details .= '<PictureURL>' . $uploaded_img[0] . '</PictureURL>';
				}
			}		
		}
		
		$requestBody = '<?xml version="1.0" encoding="utf-8"?>
			<VerifyAddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
			  <RequesterCredentials>
			    <eBayAuthToken>' . $this->user_token . '</eBayAuthToken>
			  </RequesterCredentials>
			  <Item>
			   	<SellerProfiles> 
			      <SellerPaymentProfile>
			        <PaymentProfileID>' . $store_settings->payment_profile . '</PaymentProfileID>
			      </SellerPaymentProfile>
			      <SellerReturnProfile>
			        <ReturnProfileID>' . $store_settings->return_profile . '</ReturnProfileID>
			      </SellerReturnProfile>
			      <SellerShippingProfile>
			        <ShippingProfileID>' . $store_settings->shipping_profile . '</ShippingProfileID>
			      </SellerShippingProfile>
			    </SellerProfiles> 
			  	<OutOfStockControl>' . $store_settings->out_of_stock_control . '</OutOfStockControl>
			  	<GetItFast>' . $boolean_value[$store_settings->get_it_fast] . '</GetItFast>
			    <CategoryBasedAttributesPrefill>' . $boolean_value[$store_settings->category_prefill] . '</CategoryBasedAttributesPrefill>
			    <CategoryMappingAllowed>' . $boolean_value[$store_settings->category_mapping] . '</CategoryMappingAllowed>
			    <ConditionID>' . $store_settings->condition_type . '</ConditionID>
			    <Country>' . $store_settings->country_code_type . '</Country>
			    <Currency>' . $store_settings->currency_code . '</Currency>
			    <Description>' . $item_data['description'] . '</Description>
			    <DispatchTimeMax>' . $store_settings->dispatch_time . '</DispatchTimeMax>
			    <ListingDesigner>
			      <OptimalPictureSize>' . $boolean_value[$store_settings->optimal_picturesize] . '</OptimalPictureSize>
			    </ListingDesigner> 
			    <ListingDuration>' . $store_settings->listing_duration . '</ListingDuration>
			    <ListingType>' . $store_settings->listing_type . '</ListingType>
			    <Location>' . $store_settings->item_location . '</Location>
			    <PictureDetails>'
			    	. $picture_details . 
			    '</PictureDetails>
			    <PostalCode>' . $store_settings->postal_code . '</PostalCode>
			    <PrimaryCategory>
			      <CategoryID>' . $item_data['category_id'] . '</CategoryID>
			    </PrimaryCategory>
			    <Quantity>' . $item_data['quantity'] . '</Quantity>
			    <SellerContactDetails>
			      <CompanyName>' . $store_settings->store_name . '</CompanyName>
			      <County>' . $store_settings->county . '</County>
			      <Street>' . $store_settings->street . '</Street>
			    </SellerContactDetails>
			    <Site>' . $store_settings->ebay_website . '</Site>
			    <StartPrice currencyID="' . $store_settings->currency_code . '">' . $item_data['price'] . '</StartPrice>
			    <Title>' . $item_data['title'] . '</Title>
			    <ShippingDetails>
					<ShippingServiceOptions>
						<ShippingServicePriority>' . $store_settings->shippingservice_priority . '</ShippingServicePriority>
						<ShippingService>' . $store_settings->shipping_service . '</ShippingService>
						<ShippingServiceCost currencyID="' . $store_settings->currency_code . '">' . $store_settings->shippingservice_cost . '</ShippingServiceCost>
						<ShippingServiceAdditionalCost currencyID="' . $store_settings->currency_code . '">' . $store_settings->shippingservice_additionalcost . '</ShippingServiceAdditionalCost>
					</ShippingServiceOptions>
			    </ShippingDetails>
			  </Item>
			</VerifyAddItemRequest>';

		$response = $this->request('VerifyAddItem', $requestBody);

		return $response;	
		
	}


	public function getSuggestedCategories($title){

		$requestBody = '<?xml version="1.0" encoding="utf-8"?>
			<GetSuggestedCategoriesRequest xmlns="urn:ebay:apis:eBLBaseComponents">
			<RequesterCredentials>
			    <eBayAuthToken>' . $this->user_token . '</eBayAuthToken>
			  </RequesterCredentials>
			  <Query>' . $title . '</Query>
			</GetSuggestedCategoriesRequest>';

		$response = $this->request('GetSuggestedCategories', $requestBody);

		$suggested_categories = array();
		if($response->Ack == 'Success'){

			foreach($response->SuggestedCategoryArray->SuggestedCategory as $category){
				$suggested_categories[] = array(
					'id' => json_decode(json_encode($category->Category->CategoryID), true)[0],
					'name' => json_decode(json_encode($category->Category->CategoryName), true)[0]
				);
			}
		}

		return $suggested_categories;
	}

}