<?php
class Home extends \SlimController\SlimController{

    public function indexAction(){
        $this->render('index', array('title' => 'home', 'name' => 'dog'));
    }


    public function sessionAction(){

        $session_id = $this->app->ebay->getSessionID();
        $_SESSION['session_id'] = $session_id;
        $redirect_url = "https://signin.sandbox.ebay.com/ws/eBayISAPI.dll?SignIn&RuName=" . $this->app->ebay->run_name . "&SessID=" . $session_id;
        $this->app->redirect($redirect_url);
    
    }

    public function tokenAction(){
        
        $session_id = $_SESSION['session_id'];
        $token = $this->app->ebay->getUserToken($session_id);
       
        $id = 1;

        $settings_result = $this->app->db->query("SELECT user_token FROM settings WHERE id = $id");
        $settings = $settings_result->fetch_object();

        if(!empty($settings)){
            $this->app->db->query("UPDATE settings SET user_token = '$token' WHERE id = $id");
        }else{
            $this->app->db->query("INSERT INTO settings SET user_token = '$token'"); 
        }
        
        $this->app->redirect('/tester/ebay_trading_api');
    }



}