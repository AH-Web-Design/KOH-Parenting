<?php
require 'libraries/hubspot-api-php/hubspot.php';
require 'libraries/phpmailer/phpmailer.php';

/*LEGACY CODE START*/

$functions_path = get_template_directory() . '/functions/';

$theme_function_path = get_template_directory() . '/inc/theme-functions/'; 

require_once($functions_path . 'theme-options.php');

require_once($functions_path . 'default-values.php');

function vtdesign_ftn_get_option($name)
{

  $options = get_option('vtdesign_ftn_options');

  if (isset($options[$name]))

    return $options[$name];

}

function vtdesign_ftn_update_option($name, $value)
{

  $options = get_option('vtdesign_ftn_options');

  $options[$name] = $value;

  return update_option('vtdesign_ftn_options', $options);

}

function vtdesign_ftn_delete_option($name)
{

  $options = get_option('vtdesign_ftn_options');

  unset($options[$name]);

  return update_option('vtdesign_ftn_options', $options);

} 

function get_theme_value($field)
{

  $field1 = vtdesign_ftn_get_option($field);

  $field_default = all_default_values($field);

  if (!empty($field1)) {

    $field_val = $field1;

  } else {

    $field_val = $field_default;

  }

  return $field_val;

}

require_once($theme_function_path . 'extra-functions.php');
 

add_filter('comments_template', 'legacy_comments');

function legacy_comments($file)
{

  if (!function_exists('wp_list_comments'))
    $file = TEMPLATEPATH . '/legacy.comments.php';

  return $file;

}

require_once('bootstrap-navwalker.php');

/*LEGACY CODE END*/

//=====================================================================

/*NEW CODE STARTS*/


//GLOBALS
$GLOBALS['CRY_PRIVATE_KEY'] = 'FECCD31A96BAC6CDA31DCBAB89A12E799B39266F569567A3D4C66F18CEC01936';
$GLOBALS['CRY_METHOD'] = 'AES-256-CBC';
$GLOBALS['version'] = 3;
$GLOBALS['subscriber_session_cookie'] = isset($_COOKIE['subscriber_session']) ? $_COOKIE['subscriber_session'] : null;
$GLOBALS['valid_subscriber'];

//FUNCTIONS
function get_parents()
{
  $GLOBALS['parents'] = [];
  function recurr($post)
  {
    $postParent = get_post_parent($post);
    if ($postParent) {
      array_push($GLOBALS['parents'], ['name' => $postParent->post_title, 'permalink' => get_permalink($postParent)]);
      if (get_post_parent($postParent)) {
        recurr($postParent);
      }
    }
  }
  recurr(get_post());
  $GLOBALS['parents'] = array_reverse($GLOBALS['parents']);
}

function get_page_header()
{
  $breadcrumbLinks = '';
  $breadcrumbLinks .= '<a href="/">HOME</a>';
  for ($i = 0; $i < count($GLOBALS['parents']); $i++) {
    $breadcrumbLinks .= '<a href="' . $GLOBALS['parents'][$i]['permalink'] . '">' . $GLOBALS['parents'][$i]['name'] . '</a>';
  }
  $breadcrumbLinks .= '<a href="">' . get_post()->post_title . '</a>';
  $headerTitle = get_field('header')['title'] ? get_field('header')['title'] : get_the_title();
  $summary = get_field('header')['summary'];
  echo ('
  <section class="head jarallax" style="background-image: url(' . get_template_directory_uri() . '/assets/img/head-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center text-center h-100">
                    <div>
                        <h1><strong>' . $headerTitle . '</strong></h1>
                        <p class="ms-auto me-auto">' . $summary . '</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb">' . $breadcrumbLinks . '</div>
  </section>
  ');
}

function get_image($image_id, $attr = 'src', $size = 'large')
{
  if ($image_id) {
    if ($attr === 'src') {
      $src = wp_get_attachment_image_src($image_id, $size);
      if ($src) {
        return $src[0];
      } else {
        return null;
      }
    } else if ($attr === 'alt') {
      $alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
      if ($alt) {
        return $alt;
      } else {
        return null;
      }
    } else {
      return null;
    }

  } else {
    return null;
  }
}

function loop_tags()
{
  $post_tags = get_the_tags();
  $tags = '';
  if ($post_tags) {
    foreach ($post_tags as $tag) {
      $tags .= $tag->name . ', ';
    }
    return rtrim($tags, ', ');
  }
}

function getSocialInfo($url)
{
  switch ($url) {
    case str_contains($url, 'facebook.com'):
      return ['icon' => '<i class="fa fa-facebook"></i>', 'title' => 'Facebook'];
      break;
    case str_contains($url, 'twitter.com'):
      return ['icon' => '<i class="fa fa-twitter"></i>', 'title' => 'Twitter'];
      break;
    case str_contains($url, 'youtube.com'):
      return ['icon' => '<i class="fa fa-youtube"></i>', 'title' => 'Youtube'];
      break;
    case str_contains($url, 'instagram.com'):
      return ['icon' => '<i class="fa fa-instagram"></i>', 'title' => 'Instagram'];
      break;
    case str_contains($url, 'linkedin.com'):
      return ['icon' => '<i class="fa fa-linkedin"></i>', 'title' => 'Linkedin'];
      break;
    default:
      return ['icon' => '<i class="fa fa-globe"></i>', 'title' => $url];
      break;
  }
}

function C($Arr, $Value)
{
  if (is_array($Value)) {
    foreach ($Value as $Key) {
      if (!(isset($Arr[$Key]))) {
        return (false);
      }
    }
    return (true);
  } else {
    return (isset($Arr[$Value]) ? $Arr[$Value] : false);
  }
}

function SysEncode($Data)
{
  return str_replace('=', '', base64_encode(openssl_encrypt($Data, $GLOBALS['CRY_METHOD'], $GLOBALS['CRY_PRIVATE_KEY'], false, substr($GLOBALS['CRY_PRIVATE_KEY'], 0, 16))));
}

function SysDecode($Data)
{
  $r = openssl_decrypt(base64_decode($Data), $GLOBALS['CRY_METHOD'], $GLOBALS['CRY_PRIVATE_KEY'], false, substr($GLOBALS['CRY_PRIVATE_KEY'], 0, 16));
  return $r === false ? null : $r;
  // return openssl_decrypt(base64_decode($Data), $GLOBALS['CRY_METHOD'], $GLOBALS['CRY_PRIVATE_KEY'], false, substr($GLOBALS['CRY_PRIVATE_KEY'], 0, 16));
}

function contacts_external_assets($hook)
{
  global $post;
  if ($hook == 'post-new.php' || $hook == 'post.php') {
    if ('contact' === $post->post_type) {
      wp_enqueue_style('contacts_external_css', get_template_directory_uri() . '/inc/wp-dashboard/wp-dashboard.css', false, '1.1', 'all');
      wp_enqueue_script('contacts_external_js', get_stylesheet_directory_uri() . '/inc/wp-dashboard/wp-dashboard.js', false, '1.1', true);
    }
  }
}

function dateTime()
{
  return date("m.d.Y") . ' ' . date("h:i");
}

function validateEmail($email)
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  } else {
    return true;
  }
}

function sendNotificationEmail($subscriberEmail)
{
  $subject = 'New Subscriber!';
  $body = $subscriberEmail . ' just subscribed to newsletter. Review at <a href="https://app.hubspot.com/" target="_blank" title="Hubspot">Hubspot</a>';
  $email = get_bloginfo('admin_email');
  if (phpmailer($email, $subject, $body)) {
    return true;
  } else {
    return false;
  }
}

function setCookies($token)
{
  if (getCookieForEmail()) {
    deleteCookie('E');
  }
  if (!getCookie()) {
    $expire = 365 * 24 * 3600; // 1 year
    setcookie('T', $token, time() + $expire, COOKIEPATH, COOKIE_DOMAIN);
    return true;
  }
}

function checkCookie()
{
  if (!is_admin()) {
    $ds = false;
    if ($cookie = getCookie()) {
      $ds ? var_dump('Token acquired') : '';
      $token = $cookie;
      $contact = getContactByToken($token);
      if ($contact) {
        $ds ? var_dump('Contact acquired') : '';
        $email = get_post_meta($contact->ID, 'email', true);
        $emailConfirmed = get_post_meta($contact->ID, 'email_confirmed', true);
        if ($emailConfirmed !== 'No') {
          $ds ? var_dump('Email confirmed') : '';
          $i = 0;
          $contactInHubspot = false;
          for ($i; $i < 21; $i++) {
            ob_flush();
            flush();
            sleep(1);
            if (searchContact($email)) {
              $contactInHubspot = true;
              break;
            }
          }
          ob_end_flush();
          if ($contactInHubspot) {
            $ds ? var_dump('Email in hubspot') : '';
            return $email;
          } else {
            $ds ? var_dump('Email not in hubspot') : '';
            deleteContact($contact->ID);
            return false;
          }
        } else {
          $ds ? var_dump('Email is not confirmed') : '';
          return false;
        }
      } else {
        $ds ? var_dump('No contact') : '';
        return false;
      }
    } else {
      $ds ? var_dump('No token') : '';
      return false;
    }
  }

}

function getCookie()
{
  return isset($_COOKIE['T']) ? $_COOKIE['T'] : false;
}

function deleteCookie($cookieName)
{
  if (isset($_COOKIE[$cookieName])) {
    unset($_COOKIE[$cookieName]);
    setcookie($cookieName, '', time() - 3600, '/');
  }
}

function addEmailToHubspotAfterContactFormSubmission( $contact_data ){
  insertContact($_POST['Email'], $_POST['Name'], 'contact');
}

function addEmailToHubspotAfterComment( $comment_id ){
  $comment = get_comment($comment_id);
  insertContact($comment->comment_author_email, $comment->comment_author, 'contact');
}



/*MAIN FORM CLASS*/
class Main {

  public $newContactId = null;

  public function __construct($email, $name) {

    /** Error codes
     * @param string $create          E01: Thrown if insertion of contact to wordpress database fails
     * @param string $update          E02: Thrown if contact update fails
     * @param string $email           E03: Thrown if email address is invalid
     * @param string $hubspotCreate   E04: Thrown if adding contact to hubspot fails
     * @param string $alreadyExists   E05: Thrown if email already exists
     */

    //Create error objects
    $this->errorCodes = new stdClass();
    $this->errorCodes->create = new stdClass();         #Create
    $this->errorCodes->update = new stdClass();         #Update
    $this->errorCodes->email  = new stdClass();         #Email
    $this->errorCodes->hubspotCreate = new stdClass();  #Hubspot Create
    $this->errorCodes->alreadyExists = new stdClass();  #Already Exists

    //Create
    $this->errorCodes->create->status = 'FAIL';
    $this->errorCodes->create->code = 'E01';
    $this->errorCodes->create->message = 'Failed to create contact on database: System error';

    //Update
    $this->errorCodes->update->status = 'FAIL';
    $this->errorCodes->update->code = 'E02';
    $this->errorCodes->update->message = 'Failed to update contact: System error';

    //Email
    $this->errorCodes->email->status = 'FAIL';
    $this->errorCodes->email->code = 'E03';
    $this->errorCodes->email->message = 'Failed to create contact: Invalid email address';

    //Hubspot Create
    $this->errorCodes->hubspotCreate->status = 'FAIL';
    $this->errorCodes->hubspotCreate->code = 'E04';
    $this->errorCodes->hubspotCreate->message = 'Failed to add ccntact to Hubspot: API error';

    //Already exists
    $this->errorCodes->alreadyExists->status = 'FAIL';
    $this->errorCodes->alreadyExists->code = 'E05';
    $this->errorCodes->alreadyExists->message = 'Failed to create contact on database: email already exists';
 


    /** Logs
    * @param string $create Logged when contact creation is complete
    * @param string $update Logged when contact update is complete
    * @param string $hubspotCreate Logged when adding contact to hubspot is complete
    * @param string $token Logged when creation of token is complete
    * @param string $cookieDeleted Logged when cookie deleted
    */

    //Create log object
    $this->logs = new stdClass();

    //Create
    $this->logs->create = 'Contact creation on wordpress database completed';
    $this->logs->update = 'Contact update on wordpress database completed';
    $this->logs->hubspotCreate = 'Adding contact on Hubspot completed';
    $this->logs->token = 'Token creation completed';
    $this->logs->cookieDeleted = 'Cookie deletion completed';
    $this->logs->cookieCreated = 'Cookie creation completed';

    //Contact data
    $this->email = $email;
    $this->name  = $name;

  }

  //Generate date-time
  public function generateDateTime(){
    return date("m.d.Y") . ' ' . date("h:i");
  }

  //Generate error
  public function generateError($errorCode){
    return json_encode($errorCode);
  }

  //Generate response
  public function generateResponse($status = null, $message = null, $data = null) {
    
    $responseDataObject = new stdClass();
    $responseDataObject->status = $status;
    $responseDataObject->message = $message;
    $responseDataObject->data = $data;
    
    $responseData = json_encode($responseDataObject);

    return $responseData;
  }


  //Create token with given value
  public function createToken($contactId){
    $token = $this->sysEncode($contactId);
    return $token;
  }

  //Respond 
  public function respond($data){
    echo $data;
  }


  //Update custom field in the contact post
  public function updateCustomField($postId, $field, $value){

    $updatedPost = add_post_meta($postId, $field, $value);

    if(!$updatedPost){
      $error = $this->generateError($this->errorCodes->update);
      return $error;
    } else {
      return $updatedPost;
    }
  }

  //Check if contact exists in Wordpress database 
  public function checkContact($email)
  {
    $args = array(
      'post_type' => 'contact',
      'post_status' => 'draft',
      'posts_per_page' => -1,
      'meta_key' => 'email',
      'meta_value' => $email
    );
    $contactPosts = get_posts($args);

    if (!empty($contactPosts)) {
      foreach ($contactPosts as $contactPost) {
        $post_id = $contactPost->ID;
        return $post_id;
      }
    } else {
      return false;
    }
  }


  public function checkContactById($contactId){
    $args = array(
      'post_type' => 'contact',
      'post_status' => 'draft',
      'id' => $contactId
    );
    $contactPosts = new WP_Query($args);
    if ($contactPosts->post_count == 0) {
      return false;
    } else {
      return true;
    }
  }

  public function checkContactActive($contactId){
    return get_field('active', $contactId);
  }

  //Update contact with given field, data, postId and add or replace prompt
  public function updateContact($field, $data, $contactId, $add = false)
  {
    $dat = $data;
    if ($add) {
      $existingData = get_post_meta($contactId, $field, true);
      $dat .= ',' . $existingData;
    }
    $postData = array(
      'ID' => $contactId,
      'post_type' => 'contact',
      'meta_input' => array(
        $field => $dat
      )
    );
  
    wp_update_post($postData);
    return;
  }

  //Create logs of operations
  public function createLog($logData, $contactId){
    $dateTime = $this->generateDateTime();
    $log = '[' . $dateTime . '] > ' .$logData;
    $this->updateContact('logs', $log, $contactId, true);
    return;
  }

  //Create contact item with 'contact' post type
  public function createContact($email, $name, $type = 'Subscriber') {

    $validEmail = $this->validateEmail($email);
    
    if(!$validEmail){
      $error = $this->generateError($this->errorCodes->email);
      return $error;
    } else {
      $checked = $this->checkContact($email);
      if($checked){
        $response = $this->generateResponse($this->errorCodes->alreadyExists, '', $this->createToken($checked));
        return $response;
      } else {
        $contactData = array(
          'post_type' => 'contact',
          'post_title' =>  $email.' - '.$name,
          'post_status' => 'draft'  
        );
    
        $this->newContactId = wp_insert_post($contactData);
        
        $dateTime = $this->generateDateTime();
        if(!$this->newContactId){
          $error = $this->generateError($this->errorCodes->create);
          return $error;
        } else {
          $this->updateCustomField($this->newContactId, 'name', $name);
          $this->updateCustomField($this->newContactId, 'email', $email);
          $this->updateCustomField($this->newContactId, 'type', $type);
          $this->updateCustomField($this->newContactId, 'register_date', $dateTime);
          $this->updateCustomField($this->newContactId, 'unique_id', uniqid('kpsc-'));
          $this->createLog($this->logs->create, $this->newContactId);
          return $this->newContactId;
        }
      }
    }
  }

  //Validate Email
  public function validateEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false;
    } else {
      return true;
    }
  }

  //Add contact to Hubspot contact list
  public function addContactToHubspot($email, $name, $type) {
    $inserted = insertContact($email, $name, $type);
    if(!$inserted){
      $error = $this->generateError($this->errorCodes->hubspotCreate);
      return $error;
    } else {
      $response = $this->generateResponse(
        'OK', 
        'Subscription successful',
        array(
          'email' => $email,
          'name' => $name,
          'type'=> $type
        ));
      $this->createLog($this->logs->hubspotCreate, $this->newContactId);
      return $response;
    }
  }

  public function setContactInactive($contactId){
    $this->updateContact('active', 'No', $contactId);
  }

  public function setContactActive($contactId){
    $this->updateContact('active', 'Yes', $contactId);
  }

  public function deleteContact($contactId){
    wp_delete_post($contactId);
  }

  public function searchContactOnHubspot($email) {
    $result = searchContact($email);
    if(!$result){
      return false;
    } else {
      return true;
    }
  }
}

/*SUBSCRIPTION FORM CLASS*/
class Subscriber extends Main {

  //Data encoder
  public function sysEncode($Data)
  {
    return str_replace('=', '', base64_encode(openssl_encrypt($Data, $GLOBALS['CRY_METHOD'], $GLOBALS['CRY_PRIVATE_KEY'], false, substr($GLOBALS['CRY_PRIVATE_KEY'], 0, 16))));
  }

  //Data decoder
  public function sysDecode($Data)
  {
    $r = openssl_decrypt(base64_decode($Data), $GLOBALS['CRY_METHOD'], $GLOBALS['CRY_PRIVATE_KEY'], false, substr($GLOBALS['CRY_PRIVATE_KEY'], 0, 16));
    return $r === false ? null : $r;
  }

  //Subscribe contact 
  public function subscribeContact(){
    $contact = $this->createContact($this->email, $this->name);
    if(gettype($contact) == 'integer'){
      $this->addContactToHubspot($this->email, $this->name, 'subscriber');
      $token = $this->createToken($contact);
      $this->updateContact('token', $token, $contact);
      $this->createLog($this->logs->token, $contact);
      $response = $this->generateResponse('OK', 'Contact subscription successfull', $token);
      $this->respond($response);
    } else {
      $this->respond($contact);
    }
  }
}

//COOKIE CLASS
class CookieSetter extends Subscriber {

  public $cookieName = 'subscriber_session';
  public function __construct($token){
    $this->token = $token;
  }

  //Set cookie: subscriber_session
  function setCookie($token){
    $expire = 365 * 24 * 3600; // 1 year
    setcookie($this->cookieName, $token, time() + $expire, "/");
  }

  //Get cookie: subscriber_session
  public function getCookie(){
    return isset($_COOKIE[$this->cookieName]) ? $_COOKIE[$this->cookieName] : false;
  }

  //Check cookie 
  public function checkCookie(){
    if(!is_admin()){
      $cookie = $this->getCookie();
      if($cookie){
        return true;
      } else {
        return false;
      }
    }
  }

  //Delete cookie: subscriber_session
  public function deleteCookie(){
    setcookie($this->cookieName);
    //unset($_COOKIE[$this->cookieName]);
  }

  //Set
  public function set(){
    $checkCookie = $GLOBALS['subscriber_session_cookie'];
    if(!$checkCookie){
      $this->setCookie($this->token);
    } else {
      $this->deleteCookie();
      $this->setCookie($this->token);
    }
  }
}

//VALIDATOR CLASS
class ValidateSubscriber extends CookieSetter {
  public function __construct($sessionToken){
    $this->sessionToken = $sessionToken;
  }

  public function validate()
  {
    if ($this->sessionToken) {
      //Decode token to contactId 
      $contactId = $this->sysDecode($this->sessionToken);
      //Check if contact exists by given contactId
      $checkedContact = $this->checkContactById($contactId);
      if ($checkedContact) {
        //If contact exists:
        //Get email address of this contact
        $contactEmail = get_field('email', $contactId);
        if (!$contactEmail) {
          //If that email doesn't exist:
          //Delete cookie
          $this->deleteCookie();
          return false;
        } else {
          //If that email exists:
          //Check if that email exists in Hubspot
          $contactOnHubspot = $this->searchContactOnHubspot($contactEmail);
          //Check if that contact set active in wordpress
          $contactActive = $this->checkContactActive($contactId) === 'Yes' ? true : false;
          if (!$contactActive) {
            //If contact is not active:
            if(!$contactOnHubspot){
              //If contact is not in Hubspot:
              //Set contact inactive
              $this->setContactInactive($contactId);
              //Delete cookie
              $this->deleteCookie();
              return false;
            } else {
              //If that contact in Hubspot:
              //Set contact active
              $this->setContactActive($contactId);
              return true;
            }
          } else {
            //If contact is active:
            if (!$contactOnHubspot) {
              //If contact is not in Hubspot:
              //Set contact inactive
              $this->setContactInactive($contactId);
              //Delete cookie
              $this->deleteCookie();
              return false;
            } else {
              //If contact on Hubspot:
              //Set contact active
              $this->setContactActive($contactId);
              return true;
            }
          }
        }
      } else {
        //If contact doesnt exist on wordpress db:
        //Delete cookie
        $this->deleteCookie();
        return false;
      }
    } else {
      //If there is no token:
      //Return false
      return false;
    }
  }
}

//Service: Set subscriber cookie 
function setSubscriberCookie()
{
  status_header(200);
  $token = $_REQUEST['token'];
  $ref = $_REQUEST['ref'];
  $cookieSetter = new CookieSetter($token);
  $decryptedToken = $cookieSetter->sysDecode($token);
  $checkedContact = $cookieSetter->checkContactById($decryptedToken);

  if (!$checkedContact) {
    ob_start();
    header('Location: ' . get_site_url());
    ob_end_flush();
  } else {
    $checkedCookie = $GLOBALS['subscriber_session_cookie'];
    if($checkedCookie){
      $cookieSetter->deleteCookie();
    }
    $cookieSetter->set();
    $cookieSetter->createLog('Cookie creation completed', $decryptedToken);
    ob_start();
    header('Location: ' . get_site_url() . '/wp-admin/admin-post.php?action=loadPage&ref='.$ref);
    ob_end_flush();
  }
}

//Service: Load page
function loadPage(){
  status_header(200);
  $ref = $_REQUEST['ref'];
  ob_start();
  header('Location: ' . get_site_url() . $ref);
  ob_end_flush();
}

//Service: Submit contact 
function submitContact()
{
  status_header(200);
  $email = $_REQUEST['email'];
  $name = $_REQUEST['name'];
  $contact = new Subscriber($email, $name);
  $contact->subscribeContact();
}

//Validate subscriber
$validateSubscriber = new ValidateSubscriber($GLOBALS['subscriber_session_cookie']);
$GLOBALS['valid_subscriber'] = $validateSubscriber->validate();


/*ACTIONS*/
add_action('admin_post_nopriv_loadPage', 'loadPage');
add_action('admin_post_loadPage', 'loadPage');
add_action('admin_post_nopriv_submitContact', 'submitContact');
add_action('admin_post_submitContact', 'submitContact');
add_action('admin_post_nopriv_setSubscriberCookie', 'setSubscriberCookie');
add_action('admin_post_setSubscriberCookie', 'setSubscriberCookie');
add_action('admin_enqueue_scripts', 'contacts_external_assets', 10, 1);
add_action( 'wpcf7_before_send_mail', 'addEmailToHubspotAfterContactFormSubmission' );
add_action( 'comment_post', 'addEmailToHubspotAfterComment', 10, 2 );
add_theme_support( 'post-thumbnails' );
