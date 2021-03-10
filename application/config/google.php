<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '695237622252-ekllhdrhqblorlpf3p2mhblcnibdbh3k.apps.googleusercontent.com';
$config['google']['client_secret']    = '5W4nX62NCwJDHHvm9LWqMr0L';
$config['google']['redirect_uri']     = 'http://localhost:8001/ci/User_Authentication/index';
$config['google']['application_name'] = 'codeigniter-demo';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array('email','profile');