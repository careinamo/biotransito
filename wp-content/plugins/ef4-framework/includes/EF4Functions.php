<?php

/**
 * Created by FsFlex.
 * User: VH
 * Date: 8/23/2017
 * Time: 4:47 PM
 */
if (!defined('ABSPATH')) {
    //First catches the Apache users
    header("HTTP/1.0 404 Not Found");
    //This should catch FastCGI users
    header("Status: 404 Not Found");
    die();
}

class EF4Functions
{
    public static $cms_html_id = array();
    public static function get_request($name,$default = '')
    {
        if(isset($_REQUEST[$name]))
            return $_REQUEST[$name];
        return $default;
    }
    public static function get_vc_sorting_allow()
    {
        return array(
            esc_html__('Sort by ID',CMS_NAME)=> 'ID',
            esc_html__('Sort by date',CMS_NAME)=> 'Date',
            esc_html__('Sort by author',CMS_NAME)=> 'author',
            esc_html__('Sort by title',CMS_NAME)=> 'title',
            esc_html__('Sort by modified',CMS_NAME)=> 'modified',
            esc_html__('Random sorting',CMS_NAME)=> 'rand',
            esc_html__('Sort by comments count',CMS_NAME)=> 'comment_count',
            esc_html__('Sort by menu order',CMS_NAME)=> 'menu_order',
        );
    }
    public static function asset($path)
    {
        if(substr($path,0,1)!== '/')
            $path = '/'.$path;
        return untrailingslashit(EF4_URL).'/assets'.$path;
    }
    public static function parse_vc_sorting_allow_value($str_value)
    {
        $result = array();
        if(!(!empty($str_value) && is_string($str_value)))
            return $result;
        $temp = explode(',',$str_value);
        $all_allow = self::get_vc_sorting_allow();
        foreach ($all_allow as $key => $value)
        {
            if(in_array($value,$temp))
                $result[$key] = $value;
        }
        return $result;
    }
    public static function convert_sources_vc_to_array($source)
    {
        $result = array();
        $temp_source = explode('|', $source);
        foreach ($temp_source as $seg) {
            $temp = explode(':', $seg);
            if (count($temp) < 2)
                continue;
            list($key, $val) = $temp;
            $result[$key] = $val;
        }
        return $result;
    }

    public static function convert_array_to_sources_vc(array $arr)
    {
        $result = '';
        $first = true;
        foreach ($arr as $key => $value) {
            if ($first)
                $first = false;
            else
                $result .= '|';
            $result .= $key . ':' . $value;
        }
        return $result;
    }

    public static function cmsFileScanDirectory($dir, $mask, $options = array(), $depth = 0)
    {
        $options += array(
            'nomask'    => '/(\.\.?|CSV)$/',
            'callback'  => 0,
            'recurse'   => TRUE,
            'key'       => 'uri',
            'min_depth' => 0,
        );

        $options['key'] = in_array($options['key'], array('uri', 'filename', 'name')) ? $options['key'] : 'uri';
        $files = array();
        if (is_dir($dir) && $handle = opendir($dir)) {
            while (FALSE !== ($filename = readdir($handle))) {
                if (!preg_match($options['nomask'], $filename) && $filename[0] != '.') {
                    $uri = "$dir/$filename";
                    if (is_dir($uri) && $options['recurse']) {
                        // Give priority to files in this folder by merging them in after any subdirectory files.
                        $files = array_merge(self::cmsFileScanDirectory($uri, $mask, $options, $depth + 1), $files);
                    } elseif ($depth >= $options['min_depth'] && preg_match($mask, $filename)) {
                        // Always use this match over anything already set in $files with the
                        // same $$options['key'].
                        $file = new stdClass();
                        $file->uri = $uri;
                        $file->filename = $filename;
                        $file->name = pathinfo($filename, PATHINFO_FILENAME);
                        $files[$filename] = $file;
                    }
                }
            }
            closedir($handle);
        }
        return $files;
    }

    public static function cmsGetCategoriesByPostID($post_ID = null, $taxo = 'category')
    {
        $term_cats = array();
        $categories = get_the_terms($post_ID, $taxo);
        if ($categories) {
            foreach ($categories as $category) {
                $term_cats[] = get_term($category, $taxo);
            }
        }
        return $term_cats;
    }

    /**
     * Generator unique html id
     * @param $id : string
     */
    public static function cmsHtmlID($id)
    {
        $cms_html_id = self::$cms_html_id;
        $id = str_replace(array('_'), '-', $id);
        if (isset($cms_html_id[$id])) {
            $count = count($cms_html_id[$id]);
            $cms_html_id[$id][$count] = 1;
            $count++;
            self::$cms_html_id = $cms_html_id;
            return $id . '-' . $count;
        } else {
            $cms_html_id[$id] = array(1);
            self::$cms_html_id = $cms_html_id;
            return $id;
        }
    }
}


function cmsGetCategoriesByPostID($post_ID = null, $taxo = 'category')
{
    return EF4Functions::cmsGetCategoriesByPostID($post_ID, $taxo);
}

/**
 * Generator unique html id
 * @param $id  string
 */
function cmsHtmlID($id)
{
    return EF4Functions::cmsHtmlID($id);
}

function cmsFileScanDirectory($dir, $mask, $options = array(), $depth = 0)
{
    return EF4Functions::cmsFileScanDirectory($dir, $mask, $options, $depth);
}