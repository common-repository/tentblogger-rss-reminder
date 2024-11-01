<?php
/*
Plugin Name: TentBlogger RSS Reminder
Plugin URI: http://tentblogger.com/rss-reminder
Description: A simple Subscribe via RSS reminder at the end of your comment form.
Version: 2.3
Author: TentBlogger
Author URI: http://tentblogger.com
Author Email: info@tentblogger.com
*/

/*------------------------------------------------*
 * Core Functions
 *------------------------------------------------*/ 

/**
 * Imports the default stylesheet for the plugin.
 */
function tentblogger_rss_reminder_init() {
  if(!is_admin()) {
    wp_register_style('tentblogger-rss-reminder', WP_PLUGIN_URL . '/tentblogger-rss-reminder/css/style.css');
    wp_enqueue_style('tentblogger-rss-reminder'); 
  } // end if
} // end rss_reminder_init
 
/**
 * Appends a subscription reminder below the "Submit Comment" button on the comment form
 * reminding users to subscribe to the RSS feed.
 *
 * Using the /feed address to capture Atom, RSS, RSS2, etc.
 */
function show_subscription_message() {
  
  $str_reminder = '<p class="tentblogger-rss-reminder">';
    $str_reminder .= __('Have you', 'tentblogger-rss-reminder');
      $str_reminder .=  ' <a href="' . get_bloginfo('wpurl') . '/feed">';
          $str_reminder .= __('Subscribed via RSS', 'tentblogger-rss-reminder');
      $str_reminder .= '</a> ';
    $str_reminder .= __('yet? Don\'t miss a post!', 'tentblogger-rss-reminder');
  $str_reminder .= '</p>';
  
  echo $str_reminder;
  
} // end show_subscription_message

/*------------------------------------------------*
 * WordPress Hooks
 *------------------------------------------------*/ 
add_action('init', 'tentblogger_rss_reminder_init');
add_action('comment_form', 'show_subscription_message');

?>