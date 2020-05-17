<?php get_header(); ?>

<div class="s-wrapper">

	<div id="menu" class="navbar">
	     <?php get_template_part( 'menu' ); ?>
    </div>

    <div id="s-Content" class="container-fluid">

    	<div class="row-fluid">
    		<div class="span10 offset1">
    			<?php get_breadcrumbs(); ?>
    		</div>
    	</div>


	    <div id="content" class="row-fluid">
		    <div class="span10 offset1">
		    	<script type="text/javascript" src="http://www.qq.com/404/search_children.js" charset="utf-8"></script>
		    </div>
	    </div>
	</div>

<?php get_footer(); ?>