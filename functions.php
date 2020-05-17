<?php 
    
    /*--------------- [ 引入GEEKU_FRAMEWORK ] -----------------*/

    require_once(TEMPLATEPATH . '/geeku_framework/framework_init.php');


    /*--------------- [ 网站临时维护 ] -----------------*/

    /*function wp_maintenance_mode(){
        if(!current_user_can('edit_themes') || !is_user_logged_in()){
            wp_die('<meta charset="UTF8" />
网站临时维护中，请稍后...', '网站临时维护中，请稍后...', array('response' => '503'));
        }
    }
    add_action('get_header', 'wp_maintenance_mode');*/


    /*--------------- [ 自定义登录失败的信息 ] -----------------*/

       /***********************************************
        *                增强网站安全性。
	*  我们知道，当我们输入一个存在的用户名，但是输入错误的密码
        *  wordpress默认会返回的信息是该账户的密码不正确，
        *  这就等于告诉黑客确实存在这样的账户，方便了黑客进行下一步行动。
	***********************************************/

    function failed_login() {
        return 'Incorrect login information.';
    }
    add_filter('login_errors', 'failed_login');


    /*--------------- [ 侧边栏 ] -----------------*/

    if ( function_exists('register_sidebar') ) {   
      register_sidebar(array(   
        'name'          =>'文章页侧边栏', 
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="parts %2$s">',   
        'after_widget'  => '</div>',   
        'before_title'  => '<h3>',   
        'after_title'   => '</h3>',   
      ));  

      register_sidebar(array(   
        'name'          =>'底部侧边栏', 
        'id'            => 'sidebar-2',
        'before_widget' => '<div id="%1$s" class="sidebar-f span4 %2$s">',  
        'after_widget'  => '</div>',   
        'before_title'  => '<h4>',   
        'after_title'   => '</h4>',   
      ));    
     }  


    /*--------------- [ 菜单 ] -----------------*/

    add_theme_support('nav-menus');

    if( function_exists('register_nav_menus') )
    {   
        register_nav_menus( array( 'homepage' => __( '主页菜单' ),'friends' => __( '友情链接' )  ) );
    }


    /*--------------- [ 自定义菜单输出格式 ] -----------------*/

    class Bootstrap_Walker extends Walker_Nav_Menu 
    {     
 
        /* Start of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function start_lvl(&$output, $depth) 
        {
            $tabs = str_repeat("\t", $depth); 
            // If we are about to start the first submenu, we need to give it a dropdown-menu class 
            if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above) 
                $output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n"; 
            } else { 
                $output .= "\n{$tabs}<ul>\n"; 
            } 
            return;
        } 
 
        /* End of the <ul> 
         * 
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu".  
         *                   So basically add one to what you'd expect it to be 
         */         
        function end_lvl(&$output, $depth)  
        {
            if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!) 
 
                // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now 
                $output .= '<!--.dropdown-->'; 
            } 
            $tabs = str_repeat("\t", $depth); 
            $output .= "\n{$tabs}</ul>\n"; 
            return; 
        }
 
        /* Output the <li> and the containing <a> 
         * Note: $depth is "correct" at this level 
         */         
        function start_el(&$output, $item, $depth, $args)  
        {    
            global $wp_query; 
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : ''; 
            $class_names = $value = ''; 
            $classes = empty( $item->classes ) ? array() : (array) $item->classes; 
 
            /* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */ 
            if ($item->hasChildren) { 
                $classes[] = 'dropdown'; 
                // level-1 menus also need the 'dropdown-submenu' class 
                if($depth == 1) { 
                    $classes[] = 'dropdown-submenu'; 
                } 
            } 
 
            /* This is the stock Wordpress code that builds the <li> with all of its attributes */ 
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ); 
            $class_names = ' class="' . esc_attr( $class_names ) . '"'; 
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';             
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : ''; 
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : ''; 
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : ''; 
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
            $item_output = $args->before; 
 
            /* If this item has a dropdown menu, make clicking on this link toggle it */ 
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">'; 
            } else { 
                $item_output .= '<a'. $attributes .'>'; 
            } 
 
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; 
 
            /* Output the actual caret for the user to click on to toggle the menu */             
            if ($item->hasChildren && $depth == 0) { 
                $item_output .= '<b class="caret"></b></a>'; 
            } else { 
                $item_output .= '</a>'; 
            } 
 
            $item_output .= $args->after; 
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
            return; 
        }
 
        /* Close the <li> 
         * Note: the <a> is already closed 
         * Note 2: $depth is "correct" at this level 
         */         
        function end_el (&$output, $item, $depth, $args)
        {
            $output .= '</li>'; 
            return;
        } 
 
        /* Add a 'hasChildren' property to the item 
         * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633  
         */ 
        function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) 
        { 
            // check whether this item has children, and set $item->hasChildren accordingly 
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]); 
 
            // continue with normal behavior 
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); 
        }         
    } 

?>