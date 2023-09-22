<?php
/*
@ccnRef: @login_form
*/

defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/authlib.php');
include_once($CFG->dirroot . '/theme/edumy/ccn/page_handler/ccn_page_handler.php');

if ($SESSION) {
  $ccnPageHandler = new ccnPageHandler();
  $ccnGetPageUrl = $ccnPageHandler->ccnGetPageUrl();
  if (!strpos($ccnGetPageUrl->path, 'login')) {
    $SESSION->wantsurl = (new moodle_url($this->page->url))->out(false);
  }
}
if (signup_is_enabled()) {
  $signup = $CFG->wwwroot . '/login/signup.php';
}
$forgot = $CFG->wwwroot . '/login/forgot_password.php';
$username = get_moodle_cookie();
$_ccnlogin = '';
if (!isloggedin() or isguestuser()) {   // Show the block
  if (empty($CFG->authloginviaemail)) {
    $strusername = get_string('username');
  } else {
    $strusername = get_string('usernameemail');
  }


  // Internal stylesheet
  //   $_ccnlogin .= '
  // <style>

  // .container2{
  //   height : 100vh;
  //   width : 100vw;
  //   background-color:yellow;
  // }
  // #image img {
  //     max-width: 100%;
  // }

  // .loginform {
  //     padding: 20px;
  //     background-color: white;
  //     border-radius: 10px;
  //     box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  // }
  // </style>
  // ';

  // Sisipkan JavaScript Bootstrap
  //   $_ccnlogin .= '
  // <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  // <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  // ';

  // // bungkus konten dengan container
  // $_ccnlogin .= '<div class="container2">';
  // $_ccnlogin .= '<div class="row">';

  // tambahan konten gambar robot
  // $_ccnlogin .= '<div class="col-lg-6" id="image">';
  // $_ccnlogin .= '<img src="https://i.postimg.cc/qvsgPth0/robot.png" alt="Contoh Gambar">';
  // $_ccnlogin .= '</div>';

  // login form
  $_ccnlogin .= '<div>';
  $_ccnlogin .= '<form class="loginform" id="login" method="post" action="' . get_login_url() . '">';
  $_ccnlogin .= '<div class="form-group">';
  $_ccnlogin .= '<input type="text" name="username" placeholder="' . get_string('username', 'theme_edumy') . '" id="login_username" ';
  $_ccnlogin .= ' class="form-control" value="' . s($username) . '" autocomplete="username"/></div>';

  $_ccnlogin .= '<div class="form-group">';

  $_ccnlogin .= '<input type="password" name="password" id="login_password" placeholder="' . get_string('password', 'theme_edumy') . '" ';
  $_ccnlogin .= ' class="form-control" value="" autocomplete="current-password"/>';
  $_ccnlogin .= '</div>';

  if (isset($CFG->rememberusername) and $CFG->rememberusername == 2) {
    $checked = $username ? 'checked="checked"' : '';

    $_ccnlogin .= '
      <div class="form-group custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="rememberusername" id="rememberusername">
        <label class="custom-control-label" for="rememberusername">' . get_string('rememberusername', 'admin') . '</label>
        <a class="tdu btn-fpswd float-right" href="' . $forgot . '">' . get_string('forgotaccount') . '</a>
      </div>';
  }

  $_ccnlogin .= '<button type="submit" class="btn btn-log btn-block btn-thm2">' . get_string('login') . '</button>';
  $_ccnlogin .= '<input type="hidden" name="logintoken" value="' . s(\core\session\manager::get_login_token()) . '" />';
  // akhir lg-6 login form
  $_ccnlogin .= "</div>\n";
  // akhir row
  // $_ccnlogin .= "</div>";
  // // akhir kontainer 
  // $_ccnlogin .= "</div>";






  $_ccnlogin .= "</form>\n";

  $authsequence = get_enabled_auth_plugins(true); // Get all auths, in sequence.
  $potentialidps = array();
  foreach ($authsequence as $authname) {
    $authplugin = get_auth_plugin($authname);
    $potentialidps = array_merge($potentialidps, $authplugin->loginpage_idp_list($this->page->url->out(false)));
  }

  if (!empty($potentialidps)) {
    $_ccnlogin .= '<div class="potentialidps">';
    $_ccnlogin .= '<h6>' . get_string('potentialidps', 'auth') . '</h6>';
    $_ccnlogin .= '<div class="potentialidplist">';
    foreach ($potentialidps as $idp) {
      $_ccnlogin .= '<div class="potentialidp">';
      $_ccnlogin .= '<a class="btn btn-secondary btn-block" ';
      $_ccnlogin .= 'href="' . $idp['url']->out() . '" title="' . s($idp['name']) . '">';
      if (!empty($idp['iconurl'])) {
        $_ccnlogin .= '<img src="' . s($idp['iconurl']) . '" width="24" height="24" class="mr-1"/>';
      }
      $_ccnlogin .= s($idp['name']) . '</a></div>';
    }
    $_ccnlogin .= '</div>';
    $_ccnlogin .= '</div>';
  }
}
/* Login */
