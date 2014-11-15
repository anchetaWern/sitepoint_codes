<?php
class Settings extends \SlimController\SlimController{


    public function viewAction(){   
     
     	$user_preferences = $this->app->ebay->getUserPreferences();
        $shipping_services = $this->app->ebay->getEbayDetails('ShippingServiceDetails');
        
        $condition_types_result = $this->app->db->query('SELECT id, name FROM condition_types');
        $condition_types = array();
    	while($row = $condition_types_result->fetch_assoc()){
    	  $condition_types[] = $row;
    	}

        $listing_durations_result = $this->app->db->query('SELECT name FROM listing_durations');
        $listing_durations = array();
        while($row = $listing_durations_result->fetch_assoc()){
        	$listing_durations[] = $row['name'];
        }

        $listing_types_result = $this->app->db->query('SELECT name FROM listing_types');
        $listing_types = array();
        while($row = $listing_types_result->fetch_assoc()){
        	$listing_types[] = $row['name'];
        }

        $shippingservice_priorities = range(1, 4);

        $store_id = 1;
        $store_result = $this->app->db->query("SELECT store_name, county, street, country_code_type,
    	 ebay_website, postal_code, category_mapping, category_prefill, currency_code, item_location,
    	 dispatch_time, listing_duration, listing_type, condition_type, optimal_picturesize, out_of_stock_control,
    	 get_it_fast, include_prefilled, shipping_profile, return_profile, payment_profile, shipping_service,
    	 shippingservice_priority, shippingservice_cost, shippingservice_additionalcost
         FROM store_settings WHERE id = '$store_id'");
        $store = $store_result->fetch_object();

        $settings = array(
        	'user_preferences' => $user_preferences,
        	'shipping_services' => $shipping_services,
        	'condition_types' => $condition_types,
        	'listing_durations' => $listing_durations,
        	'listing_types' => $listing_types,
        	'store' => $store,
        	'shippingservice_priorities' => $shippingservice_priorities
        );
        $this->render('settings/view', $settings);    
        
    }



    public function updateAction()
    {
        

        $v = new Valitron\Validator($_POST);
        $v->rule('required', array('store_name', 'county', 'street', 'country_code_type', 'ebay_website', 'postal_code',
        	'currency_code', 'item_location', 'dispatch_time', 'listing_duration', 'listing_type', 'condition_type',
        	'PAYMENT', 'RETURN_POLICY', 'SHIPPING', 'shipping_service', 'shippingservice_priority', 'shippingservice_cost', 'shippingservice_additionalcost'));
       
        if($v->validate()){
            
        	$id = 1;
        	$store_name = $_POST['store_name'];
        	$street = $_POST['street'];
        	$county = $_POST['county'];
        	$country_code_type = $_POST['country_code_type'];
        	$ebay_website = $_POST['ebay_website'];
        	$postal_code = $_POST['postal_code'];

        	$category_mapping = (!empty($_POST['category_mapping'])) ? 1 : 0;
        	$category_prefill = (!empty($_POST['category_prefill'])) ? 1 : 0;
        	$optimal_picturesize = (!empty($_POST['optimal_picturesize'])) ? 1 : 0;
        	$out_of_stock_control = (!empty($_POST['out_of_stock_control'])) ? 1 : 0;
        	$get_it_fast = (!empty($_POST['get_it_fast'])) ? 1 : 0;
        	$include_prefilled = (!empty($_POST['include_prefilled'])) ? 1 : 0;

        	$currency_code = $_POST['currency_code'];
        	$item_location = $_POST['item_location'];
        	$dispatch_time = $_POST['dispatch_time'];
        	$listing_duration = $_POST['listing_duration'];
        	$listing_type = $_POST['listing_type'];
        	$condition_type = $_POST['condition_type'];
        	$payment_policy = $_POST['PAYMENT'];
        	$return_policy = $_POST['RETURN_POLICY'];
        	$shipping_policy = $_POST['SHIPPING'];
        	$shipping_service = $_POST['shipping_service'];

        	$shippingservice_priority = $_POST['shippingservice_priority'];
        	$shippingservice_cost = $_POST['shippingservice_cost']; 
        	$shippingservice_additionalcost = $_POST['shippingservice_additionalcost'];


           
            if($query = $this->app->db->prepare("UPDATE store_settings SET store_name = ?, county = ?, street = ?, 
            	country_code_type = ?, ebay_website = ?, postal_code = ?, category_mapping = ?, category_prefill = ?, 
            	currency_code = ?, item_location = ?, dispatch_time = ?, listing_duration = ?, listing_type = ?, 
            	condition_type = ?, optimal_picturesize = ?, out_of_stock_control = ?, get_it_fast = ?, include_prefilled = ?, 
            	shipping_profile = ?, return_profile = ?, payment_profile = ?, shipping_service = ?,
            	shippingservice_priority = ?, shippingservice_cost = ?, shippingservice_additionalcost = ? 
            	WHERE id = ?")){

            $query->bind_param("ssssssiississsiiiissssiddi", $store_name, $county, $street, 
            	$country_code_type, $ebay_website, $postal_code, $category_mapping, $category_prefill,
            	$currency_code, $item_location, $dispatch_time, $listing_duration, $listing_type, 
            	$condition_type, $optimal_picturesize, $out_of_stock_control, $get_it_fast, $include_prefilled,
            	$shipping_policy, $return_policy, $payment_policy, $shipping_service, 
            	$shippingservice_priority, $shippingservice_cost, $shippingservice_additionalcost, $id);

                $query->execute();

                $this->app->flash('message', array('type' => 'success', 'text' => 'Settings was updated!'));
                $this->app->redirect('/tester/ebay_trading_api/settings');
            }
            
            
        }else{
            
            $this->app->flash('form', $_POST);
            $this->app->flash('message', array(
                'type' => 'danger', 
                'text' => 'Please fix the following errors', 
                'data' => $v->errors())
            );

            $this->app->redirect('/tester/ebay_trading_api/settings');
            
        }



    }


}