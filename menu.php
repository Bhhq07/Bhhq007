 <div class="navbar-inner">
    <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
     		<?php 
			  		wp_nav_menu(
								  array(	'theme_location'   => 'homepage',
											'sort_column'      => 'menu_order',
											'container_class'  => 'nav-collapse collapse',
											'menu_class'       => 'nav',
											'walker'           => new Bootstrap_Walker(),
										) 
						 		); 
			?>
      <botton class="btn pull-right visible-desktop searchButton"><i class="icon-search"></i> <?php $search = get_option('ge_search_button'); if(!empty($search)) { echo $search; } else { echo "搜索"; } ?> </botton>
      <span class="pull-right visible-desktop">
      	<a href="http://weibo.com/u/2828656220" class="sc-xinlang"></a>
        <a href="http://wpa.qq.com/msgrd?V=1&Uin=403075093&Site=Shu&Menu=yes" class="sc-qq"></a>
      </span>
    </div>
</div>
<form class="search navbar-form pull-right" action="<?php bloginfo('url'); ?>/">	
     <input type="text" name="s" placeholder="输入关键字然后回车..." />
</form>