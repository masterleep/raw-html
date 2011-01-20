<?php
/*
Plugin Name: ML Raw HTML
Plugin URI: http://masterleep.com/projects/raw-html
Description: Simple, efficient, and flexible raw html support via shortcodes.
Version: 1.0.2
Author: Bill Lipa
Author URI: http://masterleep.com/
*/


class MLRawHtml
{
  
  function __construct()
  {
    add_shortcode('ml_raw_html', array(&$this, 'get'));
  }
  
  // Singleton accesor
  static function instance()
  {
    static $instance = null;
    if ($instance == null)
      $instance = new MLRawHtml();
    return $instance;
  }
  
  // Top-level call which is the public interface for getting raw HTML.
  function get($atts, $content = null)
  {
    global $post;
    
    extract(shortcode_atts(array(
      'id' => null
      ), $atts));

    // Sadly, we can't use $content directly because it's already been through
    // the dreaded WordPress auto <p> filter.  So use $post->post_content to
    // access the raw characters in the db.
    return $this->get_raw($id, $post->post_content);
  }
  
  private function get_raw($id, $str)
  {
    $start = $id ? "[ml_raw_html id=\"{$id}\"]" : "[ml_raw_html]";
    $end = "[/ml_raw_html]";
    $stpos = strpos($str, $start);
    if ($stpos === FALSE)
      return "";
    $stpos += strlen($start);
    $endpos = strpos($str, $end, $stpos);
    if ($endpos === FALSE)
      return "";
    $len = $endpos - $stpos;
    return substr($str, $stpos, $len);
  }
  
  // Debug log
  private function log($msg)
  {
    error_log($msg, 0);
  }

}


MLRawHtml::instance();

?>
