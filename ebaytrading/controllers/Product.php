<?php
class Product extends \SlimController\SlimController{

    public function newAction(){   
       
        $page_data = array(
            'is_productpage' => 'true'
        );
        $this->render('product/new', $page_data);       
    }

    public function createAction(){
      
        
        $v = new Valitron\Validator($_POST);
        $v->rule('required', array('title', 'category_id', 'price', 'quantity', 'brand', 'description'));
        $v->rule('numeric', 'price');
        $v->rule('integer', 'quantity');
        if($v->validate()){
           
            $store_settings_result = $this->app->db->query("SELECT payment_profile, return_profile, shipping_profile, out_of_stock_control, get_it_fast, category_prefill,
                category_mapping, condition_type, country_code_type, currency_code, dispatch_time, optimal_picturesize,
                listing_duration, listing_type, item_location, postal_code, store_name, county,
                street, ebay_website, shippingservice_priority, shipping_service, shippingservice_cost, shippingservice_additionalcost
                FROM store_settings WHERE id = 1");
            $store_settings = $store_settings_result->fetch_object();

            $response = $this->app->ebay->addItem($store_settings, $_POST);

            if($response->Ack == 'Success'){

                if($query = $this->app->db->prepare("INSERT INTO products SET title = ?, category_id = ?, price = ?, qty = ?, brand = ?, description = ?")){

                    $title = $_POST['title'];
                    $category_id = $_POST['category_id'];
                    $price = $_POST['price'];
                    $qty = $_POST['quantity'];
                    $brand = $_POST['brand'];
                    $description = $_POST['description'];

                    $query->bind_param("ssdiss", $title, $category_id, $price, $qty, $brand, $description);
                    $query->execute();

                    $this->app->flash('message', array('type' => 'success', 'text' => 'Product was created!'));
                }

            }else{

                $long_message = json_decode(json_encode($response->Errors->LongMessage), true);
                $this->app->flash('message', array('type' => 'danger', 'text' => $long_message[0]));
            }
            
            
            
        }else{
            
            $this->app->flash('form', $_POST);
            $this->app->flash('message', array(
                'type' => 'danger', 
                'text' => 'Please fix the following errors', 
                'data' => $v->errors())
            );
            
        }

        $this->app->redirect('/tester/ebay_trading_api/products/new');
       
    }


    public function categoriesAction(){
        $suggested_categories = $this->app->ebay->getSuggestedCategories($_POST['title']);
        echo json_encode($suggested_categories);
    }


    public function uploadAction(){

        $storage = new \Upload\Storage\FileSystem('uploads');
        $file = new \Upload\File('file', $storage);

        $new_filename = uniqid();
        $file->setName($new_filename);

        $_SESSION['uploads'][] = $new_filename . '.' . $file->getExtension();

        $file->addValidations(array(
            new \Upload\Validation\Mimetype(array('image/png', 'image/gif', 'image/jpg')),
            new \Upload\Validation\Size('6M')
        ));

        $errors = array();

        try{
            $file->upload();
        }catch(Exception $e){
            $errors = $file->getErrors();
        }

        $response_data = array(
            'errors' => $errors
        );

        echo json_encode($response_data);

    }


}