<?php
//NOTE: don't use any quotes (single or souble) for css selectors, eg. use input [type=submit]

global $gf_arr;
$gf_arr = array();

function build_google_font_call(){
    global $gf_arr;
    global $gf_call;
    $arr = array();
    
    $web_safe = array( 'Georgia', 'Palatino Linotype', 'Book Antiqua', 'Palatino', 'Times New Roman', 'Times', 'Arial', 'Helvetica', 'Arial Black', 'Gadget', 'Impact', 'Charcoal', 'Lucida Sans Unicode', 'Lucida Grande', 'Tahoma', 'Geneva', 'Trebuchet MS', 'Helvetica', 'Verdana', 'Geneva', 'Courier New', 'Courier', 'Lucida Console', 'Monaco' );
    
    if(count($gf_arr) > 0){
        foreach($gf_arr as $k => $f){
            if(!in_array($k, $web_safe)){
                array_push($arr, $k.':'.implode(',', $f));
            }
        }
    }
    
    if($arr){
        return '@import url(//fonts.googleapis.com/css?family='.implode('|', $arr).');';
    }
    
}
function build_google_font_call_arr($f){
    global $gf_arr;
    
    if($f){
        if(isset($f['family']) && $f['family']){
            if(!array_key_exists($f['family'], $gf_arr)){
                $gf_arr[$f['family']] = array();
                //array_push($gf_arr, array($f['family'], array()));
            }
        }
        
        if(isset($f['weight']) && $f['weight']){
            if(array_key_exists($f['family'], $gf_arr)){
                if(!in_array($f['weight'],$gf_arr[$f['family']])){
                    array_push($gf_arr[$f['family']], $f['weight']);
                }
                
            }
        }
    }
}

function get_font($v){

    $gf_f = "";
    $gf_w = "";
    $css_f = "";
    $css_w = "";
    $css_s = "";
    
    if(isset($v['font']) && $v['font']){
        $gf_f = str_replace(' ','+',$v['font']);
        $css_f = $v['font'];
    }
    
    if(isset($v['variants']) && !empty($v['variants'])){
        
        $variant = "";
        
        if(is_array($v['variants'])){
            $variant = $v['variants'][0];
        }
        else {
            $variant = $v['variants'];
        }
        
        if($variant == 'regular'){
            $gf_w = "400";
            $css_w = "400";
        }
        else if($variant == 'italic'){
            $gf_w = "400i";
            $css_w = "400";
            $css_s = 'italic';
        }
        else {
            if (strpos($variant, 'italic') !== false) {
                $gf_w = str_replace('italic','i',$variant);
                $css_w = str_replace('italic','',$variant);
                $css_s = 'italic';
            }
            else {
                $gf_w = $variant;
                $css_w = $gf_w;
            }
        }
        
    }
    else {
        $gf_w = "400";
        $css_w = "400";
    }

    $arr =  array('gf' => array('family' => $gf_f, 'weight' => $gf_w), 'css' => array('family' => $css_f, 'weight' => $css_w, 'style' => $css_s) );
    build_google_font_call_arr($arr['gf']);

    return $arr;
    
    
}
function theme_options_css(){
    ob_start();
    global $gf_arr;
    global $theme_options;

        
        // TYPOGRAPHY
        
            if(isset($theme_options['type']) && $theme_options['type']){
                
                //header font size
                if(isset($theme_options['type'][0]['h_font_size']) && $theme_options['type'][0]['h_font_size']){
                    if(isset($theme_options['type'][0]['h_font_size'][0]) && $theme_options['type'][0]['h_font_size'][0]){
                        foreach($theme_options['type'][0]['h_font_size'][0] as $k => $c){
                            if($c){
                                printf('.%s, %s { font-size: %spx; }', $k, $k, $c);
                            }
                        }
                    }
                    
                }
                
                //p font size
                if(isset($theme_options['type'][0]['p_font_size']) && $theme_options['type'][0]['p_font_size']){
                    printf('body, .basic-form-field, .gform_wrapper .gfield_error .gfield_label, .gform_wrapper form .gform_body .gform_fields .gfield input[type=email], .gform_wrapper form .gform_body .gform_fields .gfield input[type=number], .gform_wrapper form .gform_body .gform_fields .gfield input[type=password], .gform_wrapper form .gform_body .gform_fields .gfield input[type=text], .gform_wrapper form .gform_body .gform_fields .gfield label, .gform_wrapper form .gform_body .gform_fields .gfield textarea, .p, header.main-header .brand-container .tagline, input[type=email], input[type=number], input[type=password], input[type=text], label, p, textarea { font-size: %spx; }', $theme_options['type'][0]['p_font_size']);
                }
                
                //button font size
                if(isset($theme_options['type'][0]['prim_btn_font_size']) && $theme_options['type'][0]['prim_btn_font_size']){
                    printf('.button, .searchform .button, .searchform input[type=submit], input[type=submit] { font-size: %spx; }', $theme_options['type'][0]['prim_btn_font_size']);
                }
                
                //secondary button font size
                if(isset($theme_options['type'][0]['sec_btn_font_size']) && $theme_options['type'][0]['sec_btn_font_size']){
                    printf('.button.secondary { font-size: %spx; }', $theme_options['type'][0]['sec_btn_font_size']);
                }
                
                //cta font size
                if(isset($theme_options['type'][0]['cta_font_size']) && $theme_options['type'][0]['cta_font_size']){
                    printf('.cta { font-size: %spx; }', $theme_options['type'][0]['cta_font_size']);
                }
                
                //menu font size
                if(isset($theme_options['type'][0]['cta_font_size']) && $theme_options['type'][0]['menu_font_size']){
                    printf('header.main-header .header-main-menu ul.main-menu li:not(.menu-button) a, .mobile-menu-container .main-menu li a, .accordion .nav-tabs li a { font-size: %spx; }', $theme_options['type'][0]['menu_font_size']);
                }
                
                //set fonts
                if(isset($theme_options['type'][0]['set_fonts']) && $theme_options['type'][0]['set_fonts']){
                    
                    //all headers
                    if(in_array('all-h', $theme_options['type'][0]['set_fonts']) && $theme_options['type'][0]['h_font']){
                        $f = get_font($theme_options['type'][0]['h_font']);
                        if($f){
                            printf('h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 { font-family: %s; font-weight: %s; }', $f['css']['family'], $f['css']['weight']);
                        }
                    }
                    
                    //individual header fonts
                    $harr = array('h1','h2','h3','h4', 'h5','h6');
                    if(isset($theme_options['type'][0]['ind_h_font']) && $theme_options['type'][0]['ind_h_font']){
                        //output($theme_options['type'][0]['ind_h_font']);
                        foreach($harr as $h){
                            if(in_array($h, $theme_options['type'][0]['set_fonts']) && $theme_options['type'][0]['ind_h_font'][0][$h]){
                                $f = get_font($theme_options['type'][0]['ind_h_font'][0][$h]);
                                if($f){
                                    printf('%s { font-family: %s; font-weight: %s; }', $h, $f['css']['family'], $f['css']['weight']);
                                }
                            }
                        }
                    }
                    
                    //p
                    if(in_array('p', $theme_options['type'][0]['set_fonts']) && $theme_options['type'][0]['p_font']){
                        $f = get_font($theme_options['type'][0]['p_font']);
                        if($f){
                            printf('body, .basic-form-field, .gform_wrapper .gfield_error .gfield_label, .gform_wrapper form .gform_body .gform_fields .gfield input[type=email], .gform_wrapper form .gform_body .gform_fields .gfield input[type=number], .gform_wrapper form .gform_body .gform_fields .gfield input[type=password], .gform_wrapper form .gform_body .gform_fields .gfield input[type=text], .gform_wrapper form .gform_body .gform_fields .gfield label, .gform_wrapper form .gform_body .gform_fields .gfield textarea, .p, header.main-header .brand-container .tagline, input[type=email], input[type=number], input[type=password], input[type=text], label, p, textarea { font-family: %s; font-weight: %s; }', $f['css']['family'], $f['css']['weight']);
                        }
                    }
                    
                    //button
                    if(in_array('btn', $theme_options['type'][0]['set_fonts']) && $theme_options['type'][0]['btn_font']){
                        $f = get_font($theme_options['type'][0]['btn_font']);
                        if($f){
                            printf('.button, .searchform .button, .searchform input[type=submit], input[type=submit] { font-family: %s; font-weight: %s; }', $f['css']['family'], $f['css']['weight']);
                        }
                    }
                    
                    //cta
                    if(in_array('cta', $theme_options['type'][0]['set_fonts']) && $theme_options['type'][0]['cta_font']){
                        $f = get_font($theme_options['type'][0]['cta_font']);
                        if($f){
                            printf('.cta { font-family: %s; font-weight: %s; }', $f['css']['family'], $f['css']['weight']);
                        }
                    }
                    
                    //menu
                    if(in_array('menu', $theme_options['type'][0]['set_fonts']) && $theme_options['type'][0]['menu_font']){
                        $f = get_font($theme_options['type'][0]['menu_font']);
                        if($f){
                            printf('header.main-header .header-main-menu ul.main-menu li:not(.menu-button) a, .mobile-menu-container .main-menu li a, .accordion .nav-tabs li a { font-family: %s; font-weight: %s; }', $f['css']['family'], $f['css']['weight']);
                        }
                    }
                }
            }
            
        // COLORS
            if(isset($theme_options['colors']) && $theme_options['colors']){
                
                //header text
                if(isset($theme_options['colors'][0]['h_text']) && $theme_options['colors'][0]['h_text']){
                    printf('.h1, .h2, .h3, .h4, .h5, .h6, .widgettitle, h1, h2, h3, h4, h5, h6 { color: %s; }', $theme_options['colors'][0]['h_text']);
                }
                
                //individual header text
                if(isset($theme_options['colors'][0]['ind_h_text']) && $theme_options['colors'][0]['ind_h_text']){
                    foreach($theme_options['colors'][0]['ind_h_text'][0] as $k => $c){
                        if($c){
                            printf('.%s, %s { color: %s; }', $k, $k, $c);
                        }
                    }
                }
                
                //p text
                if(isset($theme_options['colors'][0]['p_text']) && $theme_options['colors'][0]['p_text']){
                    printf('body, .basic-form-field, .gform_wrapper .gfield_error .gfield_label, .gform_wrapper form .gform_body .gform_fields .gfield input[type=email], .gform_wrapper form .gform_body .gform_fields .gfield input[type=number], .gform_wrapper form .gform_body .gform_fields .gfield input[type=password], .gform_wrapper form .gform_body .gform_fields .gfield input[type=text], .gform_wrapper form .gform_body .gform_fields .gfield label, .gform_wrapper form .gform_body .gform_fields .gfield textarea, .p, header.main-header .brand-container .tagline, input[type=email], input[type=number], input[type=password], input[type=text], label, p, textarea { color: %s; }', $theme_options['colors'][0]['p_text']);
                }
                
                //primary button
                if(isset($theme_options['colors'][0]['prim_button']) && $theme_options['colors'][0]['prim_button']){
                    
                    if($theme_options['colors'][0]['prim_button'][0]['def_state']){
                        printf('.button, .searchform .button, .searchform input[type=submit], input[type=submit] { background-color: %s; }', $theme_options['colors'][0]['prim_button'][0]['def_state']);
                        printf('.white-text .button { color: %s; }', $theme_options['colors'][0]['prim_button'][0]['def_state']);
                        printf('.white-text .button:hover { background-color: %s; }', $theme_options['colors'][0]['prim_button'][0]['def_state']);
                        
                        printf('.white-text input[type=submit] { color: %s; }', $theme_options['colors'][0]['prim_button'][0]['def_state']);
                        printf('.white-text input[type=submit]:hover { background-color: %s; }', $theme_options['colors'][0]['prim_button'][0]['def_state']);
                    }
                    
                    if($theme_options['colors'][0]['prim_button'][0]['hov_state']){
                        printf('.button:hover, .searchform .button:hover, .searchform input[type=submit]:hover, input[type=submit]:hover { background-color: %s; }', $theme_options['colors'][0]['prim_button'][0]['hov_state']);
                    }
                    
                }
                
                //secondary button
                if(isset($theme_options['colors'][0]['sec_button']) && $theme_options['colors'][0]['sec_button']){
                    
                    if($theme_options['colors'][0]['sec_button'][0]['def_state']){
                        printf('.button.secondary { border-color: %s; }', $theme_options['colors'][0]['sec_button'][0]['def_state']);
                        printf('.button.secondary:hover { background-color: %s; }', $theme_options['colors'][0]['sec_button'][0]['def_state']);
                        
                        printf('.white-text .button.secondary:hover { color: %s; }', $theme_options['colors'][0]['sec_button'][0]['def_state']);
                    }
                    
                }
                
                //cta link
                if(isset($theme_options['colors'][0]['cta_link']) && $theme_options['colors'][0]['cta_link']){
                    
                    if($theme_options['colors'][0]['cta_link'][0]['def_state']){
                        printf('.cta, .cta:active, .cta:focus, .cta:visited { color: %s; }', $theme_options['colors'][0]['cta_link'][0]['def_state']);
                    }
                    if($theme_options['colors'][0]['cta_link'][0]['hov_state']){
                        printf('.cta:hover, .cta:active:hover, .cta:focus:hover, .cta:visited:hover, .white-text .cta:hover, .white-text .cta:active:hover, .white-text .cta:focus:hover, .white-text .cta:visited:hover { color: %s; }', $theme_options['colors'][0]['cta_link'][0]['hov_state']);
                    }
                    
                }
                
                //paragraph link
                if(isset($theme_options['colors'][0]['p_link']) && $theme_options['colors'][0]['p_link']){
                    printf('a, a:hover, a:visited { color: %s; }', $theme_options['colors'][0]['p_link']);
                }
                
                //image caption
                if(isset($theme_options['colors'][0]['img_caption']) && $theme_options['colors'][0]['img_caption']){
                    printf('.wp-caption { border-color: %s; }', $theme_options['colors'][0]['img_caption']);
                }
                
                //blockquote
                if(isset($theme_options['colors'][0]['blockquote']) && $theme_options['colors'][0]['blockquote']){
                    printf('blockquote { border-color: %s; }', $theme_options['colors'][0]['blockquote']);
                }
                
                //superscript
                if(isset($theme_options['colors'][0]['superscript']) && $theme_options['colors'][0]['superscript']){
                    printf('sup { color: %s; }', $theme_options['colors'][0]['superscript']);
                }
                
                //menu
                if(isset($theme_options['colors'][0]['menu']) && $theme_options['colors'][0]['menu']){
                    if($theme_options['colors'][0]['menu'][0]['def_state']){
                        printf('.header-main-menu a, header.main-header .header-main-menu ul.main-menu .menu-item-has-children>.dropdown-menu li a, .mobile-menu-container .main-menu li a, .mobile-menu-container .mobile-menu-button a, .panel-group .nav-tabs li a, .panel-group .nav-tabs li a:hover { color: %s; }', $theme_options['colors'][0]['menu'][0]['def_state']);
                        printf('header.main-header .header-main-menu ul.main-menu .menu-item-has-children>.dropdown-menu li a:hover { background-color: %s;}', $theme_options['colors'][0]['menu'][0]['def_state']);
                    }
                    
                    if($theme_options['colors'][0]['menu'][0]['hov_state']){
                        printf('header.main-header .header-main-menu ul.main-menu>li>a:hover:before, header.main-header .header-main-menu ul.main-menu > .current-menu-item > a:before, header.main-header .header-main-menu ul.main-menu > .current-menu-ancestor > a:before, header.main-header .header-main-menu ul.main-menu > .current_page_ancestor > a:before { background: %s; }', $theme_options['colors'][0]['menu'][0]['hov_state']);
                        printf('.panel-group .nav-tabs li.active a, .panel-group .nav-tabs li a:hover { border-color: %s; }', $theme_options['colors'][0]['menu'][0]['hov_state']);
                    }
                }
                
                //misc ui elems
                if(isset($theme_options['colors'][0]['ui']) && $theme_options['colors'][0]['ui']){
                    //accordion
                    printf('.accordion .panel-heading .toggle, .slick-arrow.slick-next:before, .slick-arrow.slick-prev:before { color: %s; }', $theme_options['colors'][0]['ui']);
                    
                    //slider
                    printf('.slick-dots li.slick-active button { background-color: %s; border-color: %s; }', $theme_options['colors'][0]['ui'], $theme_options['colors'][0]['ui']);
                    
                    //forms
                    
                    //checkbox
                    $f = array();
                    $f['checkbox'] = '.gform_wrapper form .gform_body .gform_fields .gfield input[type=checkbox]:checked+input[type=email]:before, .gform_wrapper form .gform_body .gform_fields .gfield input[type=checkbox]:checked+input[type=number]:before, .gform_wrapper form .gform_body .gform_fields .gfield input[type=checkbox]:checked+input[type=password]:before, .gform_wrapper form .gform_body .gform_fields .gfield input[type=checkbox]:checked+input[type=text]:before, .gform_wrapper form .gform_body .gform_fields .gfield input[type=checkbox]:checked+label:before, .gform_wrapper form .gform_body .gform_fields .gfield input[type=checkbox]:checked+textarea:before, input[type=checkbox]:checked+.basic-form-field:before, input[type=checkbox]:checked+input[type=email]:before, input[type=checkbox]:checked+input[type=number]:before, input[type=checkbox]:checked+input[type=password]:before, input[type=checkbox]:checked+input[type=text]:before, input[type=checkbox]:checked+label:before, input[type=checkbox]:checked+textarea:before';
                    //dropdown
                    $f['dropdown'] = '.address_country:after, .ginput_container_select:after, .ginput_container_time.gfield_time_ampm:after, .select-wrapper:after';
                    printf('%s { color: %s; }', join(',',$f), $theme_options['colors'][0]['ui'], $theme_options['colors'][0]['ui']);
                    
                    
                    $ff = array();
                    //radio
                    $ff['radio'] = '.gform_wrapper form .gform_body .gform_fields .gfield input[type=radio]:checked+input[type=email]:after, .gform_wrapper form .gform_body .gform_fields .gfield input[type=radio]:checked+input[type=number]:after, .gform_wrapper form .gform_body .gform_fields .gfield input[type=radio]:checked+input[type=password]:after, .gform_wrapper form .gform_body .gform_fields .gfield input[type=radio]:checked+input[type=text]:after, .gform_wrapper form .gform_body .gform_fields .gfield input[type=radio]:checked+label:after, .gform_wrapper form .gform_body .gform_fields .gfield input[type=radio]:checked+textarea:after, input[type=radio]:checked+.basic-form-field:after, input[type=radio]:checked+input[type=email]:after, input[type=radio]:checked+input[type=number]:after, input[type=radio]:checked+input[type=password]:after, input[type=radio]:checked+input[type=text]:after, input[type=radio]:checked+label:after, input[type=radio]:checked+textarea:after';
                    printf('%s { background-color: %s; }', join(',',$ff), $theme_options['colors'][0]['ui'], $theme_options['colors'][0]['ui']);
                }
                
                //form
                if(isset($theme_options['colors'][0]['form']) && $theme_options['colors'][0]['form']){
                    
                    //success
                    if($theme_options['colors'][0]['form'][0]['success_msg']){
                        printf('.gform_confirmation_wrapper  { background-color: %s; }', $theme_options['colors'][0]['form'][0]['success_msg']);
                    }
                    
                    //error
                    if($theme_options['colors'][0]['form'][0]['err_msg']){
                        $error_selector_fields = '#content .gform_wrapper.gform_validation_error .gform_body ul li.gfield.gfield_error input[type=text], #content .gform_wrapper.gform_validation_error .gform_body ul li.gfield.gfield_error input[type=email], #content .gform_wrapper.gform_validation_error .gform_body ul li.gfield.gfield_error input[type=password], #content .gform_wrapper.gform_validation_error .gform_body ul li.gfield.gfield_error input[type=number], #content .gform_wrapper.gform_validation_error .gform_body ul li.gfield.gfield_error textarea, #content .gform_wrapper.gform_validation_error .gform_body ul li.gfield.gfield_error .basic-form-field, #content .gform_wrapper.gform_validation_error form .gform_body ul .gform_fields li.gfield.gfield_error input[type=text], #content .gform_wrapper.gform_validation_error form .gform_body .gform_fields ul li.gfield.gfield_error input[type=text], #content .gform_wrapper.gform_validation_error form .gform_body ul .gform_fields li.gfield.gfield_error input[type=email], #content .gform_wrapper.gform_validation_error form .gform_body .gform_fields ul li.gfield.gfield_error input[type=email], #content .gform_wrapper.gform_validation_error form .gform_body ul .gform_fields li.gfield.gfield_error input[type=password], #content .gform_wrapper.gform_validation_error form .gform_body .gform_fields ul li.gfield.gfield_error input[type=password], #content .gform_wrapper.gform_validation_error form .gform_body ul .gform_fields li.gfield.gfield_error input[type=number], #content .gform_wrapper.gform_validation_error form .gform_body .gform_fields ul li.gfield.gfield_error input[type=number], #content .gform_wrapper.gform_validation_error form .gform_body ul .gform_fields li.gfield.gfield_error textarea, #content .gform_wrapper.gform_validation_error form .gform_body .gform_fields ul li.gfield.gfield_error textarea';
                        printf('%s  { border-color: %s; }', $error_selector_fields, $theme_options['colors'][0]['form'][0]['err_msg']);
                        $error_selector_msg = '#content .gform_wrapper.gform_validation_error .gform_body ul li.gfield.gfield_error .validation_message';
                        printf('%s  { background-color: %s; }', $error_selector_msg, $theme_options['colors'][0]['form'][0]['err_msg']);
                        printf('%s:before  { color: %s; }', $error_selector_msg, $theme_options['colors'][0]['form'][0]['err_msg']);
                    }
                
                }
                
                //blog header
                //primary button
                if(isset($theme_options['colors'][0]['blog_header']) && $theme_options['colors'][0]['blog_header']){
                    
                    if($theme_options['colors'][0]['blog_header'][0]['bg']){
                        printf('body.tag .hero, body.category .hero { background-color: %s; }', $theme_options['colors'][0]['blog_header'][0]['bg']);
                    }
                    
                    if($theme_options['colors'][0]['blog_header'][0]['text']){
                        printf('body.tag .hero .editor-content *:not(.button):not(.cta):not(option), body.category .hero .editor-content *:not(.button):not(.cta):not(option) { color: %s; }', $theme_options['colors'][0]['blog_header'][0]['text']);
                    }
                    
                }

            }
            
            $GF = build_google_font_call();
            

    $content = ob_get_contents();
    ob_end_clean();
    return $GF.$content;
}
?>