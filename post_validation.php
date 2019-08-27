<?php
session_start();
class Post_Validation
{

  public $post_rules;
  public $post_default_val = array();
  public function __construct()
  {
      $this->post_rules = array("required","email","test",'email_check');
  }
  public function post_validate($post){
    $err = array();
    foreach ($post as $key => $value) {
      $explode_dat = explode("|",$value["post_rules"]);
      for($x = 0;$x < count($explode_dat);$x++){
          $err[] = in_array($explode_dat[$x],$this->post_rules) ? $this->post_config($value) : die('Error imong post rule ondong...');
      }
    }
    $this->error_msg = $err;
    $count = 0;
    foreach ($err as $key => $value) {
      if(!empty($value)){
        $count++;
      }
    }
    if($count == 0){
      return false;
    }
    else{
      $_SESSION['input_data'] = $_POST;
      return true;
    }
    // return $count == 0 ? false : true;$_SESSION['input_data'] = $_POST;
  }
  public function post_config($value = array()){
    $explode_dat = explode("|",$value['post_rules']);
    for($x = 0;$x < count($explode_dat);$x++){
        if($explode_dat[$x] == "required"){
          if(empty($this->test_input($_POST[$value['post_name']]))){
              return array($value['post_name'] => $value['post_label']."");
          }

        }
        if($explode_dat[$x]  == "email"){
          $email = $this->test_input($_POST[$value['post_name']]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return array($value['post_name'] => $value['post_label']." is not valid");
          }
        }
        if($explode_dat[$x]  == "email_check"){
          $email1 = $this->test_input($_POST[$value['post_name']]);
          $email2 = $this->test_input($_POST['email2']);
          if ($email1!=$email2) {
            return array($value['post_name'] => $value['post_label']."同じメールアドレスを入力してください。");
          }
        }
    }
  }
  public function test_input($data="") {
    if(!empty($data)){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    return "";
  }
  public function get_error($name_post){
      foreach($this->error_msg as $key => $value){
        if(isset($value[$name_post]))
          return $value[$name_post];
      }
  }
  public function set_error($name_post = ""){
    if(!empty($this->error_msg)){
        echo "<p class='error-message'><small>".$this->get_error($name_post)."</small></p>";
    }
  }
  public function set_value($name_post = ""){
    if(isset($_SESSION['input_data'][$name_post])){
      return $_SESSION['input_data'][$name_post];
    }
    return "";
  }
  public function select_question($data){
    if (isset($_SESSION['contact_data'])) {
      if($_SESSION['contact_data']['question'] == $data)
    {
      return "selected";
    }
    else{
      return '';
    }
    }
    
  }
  public function select_state($data){
    
    if (isset($_SESSION['contact_data']['state'])) {
       if($_SESSION['contact_data']['state'] == $data)
        {
          return "selected";
        }
        else{
          return '';
        }
    }
   
  }
  public function __destruct(){
    unset($_SESSION['input_data']);

  }
}

 ?>
