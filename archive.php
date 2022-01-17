<?php
/**
 * Archive Template
 *
 * This template is loaded when viewing a archive and replaces the default template.  
 * It can also be overwritten for individual categories and tags with new template files
 * specific to the category or the tag. 
 * 
 * @package Agile
 * @subpackage Template
 */



get_header();

get_template_part('templates/loop');

get_sidebar('blog');

get_footer(); 

?>