<?php

function blockquote($atts, $content = null) {return '<blockquote><span class="opening"></span>' . do_shortcode($content) . '<span class="closing"></span>';}
function quoted($atts, $content = null) {return '<span class="quoted">' . do_shortcode($content) . '</span>';}
function strong($atts, $content = null) {return '<strong>' . do_shortcode($content) . '</strong>';}
function profile($atts, $content = null) {return '<div class="profile">' . do_shortcode($content) . '</div>';}

function structure_row($atts, $content = null) {return '<div class="row">' . do_shortcode($content) . '</div>';}
function structure_span_one($atts, $content = null) {return '<div class="span one">' . do_shortcode($content) . '</div>';}
function structure_span_two($atts, $content = null) {return '<div class="span two">' . do_shortcode($content) . '</div>';}
function structure_span_three($atts, $content = null) {return '<div class="span three">' . do_shortcode($content) . '</div>';}
function structure_span_four($atts, $content = null) {return '<div class="span four">' . do_shortcode($content) . '</div>';}
function structure_span_five($atts, $content = null) {return '<div class="span five">' . do_shortcode($content) . '</div>';}
function structure_span_six($atts, $content = null) {return '<div class="span six">' . do_shortcode($content) . '</div>';}
function structure_span_seven($atts, $content = null) {return '<div class="span seven">' . do_shortcode($content) . '</div>';}
function structure_span_eight($atts, $content = null) {return '<div class="span eight">' . do_shortcode($content) . '</div>';}
function structure_span_nine($atts, $content = null) {return '<div class="span nine">' . do_shortcode($content) . '</div>';}
function structure_span_ten($atts, $content = null) {return '<div class="span ten">' . do_shortcode($content) . '</div>';}
function structure_span_eleven($atts, $content = null) {return '<div class="span eleven">' . do_shortcode($content) . '</div>';}
function structure_span_twelve($atts, $content = null) {return '<div class="span twelve">' . do_shortcode($content) . '</div>';}

add_shortcode('row', 'structure_row');
add_shortcode('one', 'structure_span_one');
add_shortcode('two', 'structure_span_two');
add_shortcode('three', 'structure_span_three');
add_shortcode('four', 'structure_span_four');
add_shortcode('five', 'structure_span_five');
add_shortcode('six', 'structure_span_six');
add_shortcode('seven', 'structure_span_seven');
add_shortcode('eight', 'structure_span_eight');
add_shortcode('nine', 'structure_span_nine');
add_shortcode('ten', 'structure_span_ten');
add_shortcode('eleven', 'structure_span_eleven');
add_shortcode('twelve', 'structure_span_twelve');

add_shortcode('blockquote', 'blockquote');
add_shortcode('quoted', 'quoted');
add_shortcode('strong', 'strong');
add_shortcode('profile', 'profile');


?>
