<?php

//Functions ESPREDES

define('SITEPATH', '/wp-content/themes/espredes/');

//************* Admin Login Logo
function tf_wp_admin_login_logo()
{ ?>
  <style type="text/css">
    body.login {
      background-image: url('<?php echo get_option('portal_input_2'); ?>');
    }

    #login {
      background: #fff;
      margin-top: 100px !important;      
      padding: 0% 0 0 !important;
      padding: 20px !important;
      box-shadow: 0 0 15px rgb(0, 0, 0, 0.8) !important;
      border-radius: 5px;
    }

    #login h1 a {
      background-image: url('<?php echo get_option('portal_input_1'); ?>');
      background-size: 120px;
      width: 120px;
      height: 100px;
    }

    .language-switcher, #login .galogin-powered {
      display: none;
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'tf_wp_admin_login_logo');


//************* Admin Login Logo Link URL
function tf_wp_admin_login_logo_url()
{
  return home_url();
}
add_filter('login_headerurl', 'tf_wp_admin_login_logo_url');


//************* Admin Login Logo's Title
function tf_wp_admin_login_logo_title($headertext)
{
  $headertext = esc_html__(get_bloginfo('name'), 'plugin-textdomain');
  return $headertext;
}
add_filter('login_headertext', 'tf_wp_admin_login_logo_title');

//************* URL from breadcrumbs
function url_active()
{
  return explode("/", $_SERVER['REQUEST_URI']);
}
add_action('url_active', 'url_active');
