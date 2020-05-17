<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="ie ie6" lang="zh_CN"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="zh_CN"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="zh_CN"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="zh_CN"> <!--<![endif]-->
<head>
	
	<?php if(is_home()) : { ?>
    	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <?php ;} ?>
    
    <?php else : ?>
    	<title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php endif; ?>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php get_template_part( 'meta' ); ?>
	

	<link rel="shortcut icon" href="<?php echo get_option('ge__favicon'); ?>" type="image/x-icon" />


	
	<!--[if lt IE 9]> 
		<script src="<?php bloginfo('template_url'); ?>/js/ie.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/geeku_framework/css/main.css" />

		
	<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">
		!window.jQuery && document.write('<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"><\/script>');
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('body').fadeIn(1200);
		})
	</script>

	<?php wp_head(); ?>

</head>

<body style="display: none">