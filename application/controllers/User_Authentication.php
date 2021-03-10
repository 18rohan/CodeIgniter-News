
<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_Authentication extends CI_Controller { 
     
    function __construct(){ 
        parent::__construct(); 
         
        // Load google oauth library 
        $this->load->library('google'); 
         
        // Load user model 
        $this->load->model('Google_login_model'); 
        $this->load->model('User'); 
    } 
     

 // function logout()
 // {
 //  $this->session->unset_userdata('access_token');

 //  $this->session->unset_userdata('user_data');

 //  redirect('google_login/login');
 // }
     
     function login(){
       require_once 'vendor/autoload.php';
      $google_client = new Google_Client();
      $google_client->setClientId('695237622252-ekllhdrhqblorlpf3p2mhblcnibdbh3k.apps.googleusercontent.com');
      $google_client->setClientSecret('5W4nX62NCwJDHHvm9LWqMr0L');
      $google_client->setRedirectUri(base_url('User_Authentication/index'));
      $google_client->addScope('email');
      $google_client->addScope('profile');
      // print_r($google_client);die;
      if(isset($_GET['code'])){
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
        if(!isset($token['error'])){
          $google_client->setAccesToken($token['access_token']);
          $this->session->set_userdata('access_token',$token['access_token']);

          $google_service = new Google_Service_Oauth2($google_client);
          $data = $google_service->userinfo->get();
          $current_datetime = data('Y-m-d H:i:s');

          if($this->Google_login_model->Is_already_register($data['id'])){
            // Update Data
            $user_data = array(
              'first_name' => $data['given_name'],
              'last_name' => $data['family_name'],
              'email_address' => $data['email'],
              'profile_picture' =>$data['picture'],
              'updated' =>$current_datetime
            );
            $this->Google_login_model->Update_user_data($user_data,$data['id']);

          }else{
            // Insert Data
            $user_data = array(
              'oauth_uid' =>$data['id'],
              'first_name'=>$data['given_name'],
              'last_name'=>$data['family_name'],
              'email'=>$data['email'],
              'picture_url'=>$data['picture'],
              'created'=> $current_datetime
            );

            $this->google_login_model->Insert_user_data($user_data);

          }
          $this->session->set_userdata('user_data',$user_data);
          // print_r($this->session->userdata('user_data'));die;
          // redirect('google_login',$user_data);

        }
      }
      $login_button='';
      if(!$this->session->userdata('access_token')){
        $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'assets/images/google-signin.png" /></a>';
        $data['login_button'] = $login_button;

    $this->load->view('templates/header');    
    $this->load->view('google_login', $data);
    // $this->load->view('templates/footer');    
      // $this->load->view('templates/header');
      }if($this->session->userdata('access_token')){
    
    $this->load->view('google_login', $data);
    
      }
      
      


     }


     function logout(){
      $this->session->unset_userdata('access_token');
      $this->session->unset_userdata('user_data');
      redirect('User_Authentication/login');
     }
     function glogin()
    {
      require_once 'vendor/autoload.php';
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        $client_id = '695237622252-ekllhdrhqblorlpf3p2mhblcnibdbh3k.apps.googleusercontent.com';
        $client_secret = '5W4nX62NCwJDHHvm9LWqMr0L';
        $redirect_uri = base_url('User_Authentication/gcallback');;

        //Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("codeigniter-demo");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        
        $authUrl = $client->createAuthUrl();
        
        header('Location: '.$authUrl);
    }
    function gcallback()
    {
      require_once 'vendor/autoload.php';
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
     $client_id = '695237622252-ekllhdrhqblorlpf3p2mhblcnibdbh3k.apps.googleusercontent.com';
     $client_secret = '5W4nX62NCwJDHHvm9LWqMr0L';
     $redirect_uri = base_url('User_Authentication/gcallback');;


    //Create Client Request to access Google API
    $client = new Google_Client();
    $client->setApplicationName("codeigniter-demo");
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope("email");
    $client->addScope("profile");

    //Send Client Request
    $service = new Google_Service_Oauth2($client);

    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    
    // User information retrieval starts..............................

    $user = $service->userinfo->get(); //get user info 
    // print_r($user);die;
    echo "</br> User ID :".$user->id; 
    echo "</br> User Name :".$user->name;
    echo "</br> locale:".$user->locale;
    // echo "</br> expires in :".$client->;
    echo "</br> User Email :".$user->email;
    // echo "</br> User Link :".$user->link;    
    echo "</br><img src='$user->picture' height='200' width='200' > ";

    $data1 = $this->Google_login_model->create_user($user);
       
    }
}