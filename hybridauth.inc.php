<?php

//Try to enable the debug mode

//If you see "CURL error (77): error setting certificate verify locations: CAfile: /etc/ssl/certs/ca-certificates.crt" in the log file
//#sudo apt-get install ca-certificates

//The hybridauth library will start session by using session_start()
//The session_start() will store session_id in cookie as 'PHPSESSID'
//However, Kohana native session by default store cookie name as 'session'
//So if we init our session using $this->session = Session::instance(); the hybridauth cannot determine the correct variables
//To resolve, we have to define our session name in APP/config
/*
 * return array(
	'native' => array(
		'name' => 'PHPSESSID', //we want to keep it compatible with other modules
		'encrypted' => FALSE,
	),
   );
*/

/*
 * 
 * @FIXME(franfran): is_a()
 * Fix for is_a() depreciated function 
 * in Hybrid/thirdparty/Auth/OpenID.php line 123 return is_a($thing, 'Auth_OpenID_FailureResponse');
 * in Hybrid/thindparty/Auth/OpenID/AX.php line 43 return is_a_a($thing, 'Auth_OpenID_AX_Error');
 */

/*
 * @FIXME(franfran): test why global keyword will work if register_global is off?
 * @FIXME(franfran): possible to lock global variable? gupnp_service_proxy_add_notify/register_tick_function
 */
//We have to declare the global variables to be used, otherwise the library cannot pickup the variables and simply set them as NULL
//e.g. the $GLOBAL_HYBRID_AUTH_STORAGE_PATH in startStorage() of Hybrid/Auth.php will be NULL
//http://julianhigman.com/blog/2010/11/05/php-5-3-and-the-global-keyword/
global $GLOBAL_HYBRID_AUTH_URL_BASE;
global $GLOBAL_HYBRID_AUTH_PATH_BASE;
global $GLOBAL_HYBRID_AUTH_IDPROVIDERS;
global $GLOBAL_HYBRID_AUTH_URL_EP;
global $GLOBAL_HYBRID_AUTH_PATH_EP;
global $GLOBAL_HYBRID_AUTH_PATH_CORE;
global $GLOBAL_HYBRID_AUTH_PATH_LIBRARIES;
global $GLOBAL_HYBRID_AUTH_PATH_RESOURCES;
global $GLOBAL_HYBRID_AUTH_REDIRECT_MODE;
global $GLOBAL_HYBRID_AUTH_TEXT_LANG;
global $GLOBAL_HYBRID_AUTH_TEXT_FILE;
global $GLOBAL_HYBRID_AUTH_TEXT;
global $GLOBAL_HYBRID_AUTH_TEMP_FOLDER;
global $GLOBAL_HYBRID_AUTH_DEBUG_MODE;
global $GLOBAL_HYBRID_AUTH_DEBUG_FILE;
global $GLOBAL_HYBRID_AUTH_STORAGE_TYPE;
global $GLOBAL_HYBRID_AUTH_STORAGE_PATH;
global $GLOBAL_HYBRID_AUTH_STORAGE_INSTANCE;
global $GLOBAL_HYBRID_AUTH_SERVICES_JSON;
global $GLOBAL_HYBRID_AUTH_BYPASS_EP_MODE;

require_once realpath( dirname(__FILE__) ).'/hybridauth/hybridauth.php';

//$GLOBAL_HYBRID_AUTH_URL_BASE = "http://www.vcseasonasia.com/staging2/hybridauth/";

require_once realpath( dirname(__FILE__) ).'/hybridauth/index.php';
//require Kohana::find_file('vendor', 'hybridauth/hybridauth');
//require Kohana::find_file('vendor', 'hybridauth/index');
