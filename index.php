<?php get_header(); ?>
<?php 

	$count = get_option('ge_count');
	if(empty($count))
	{
		$count = 4;
	}

	//设置首页四块的文章分类
	$part_1 = get_cat_ID(get_option('ge_part1'));
	$part_2 = get_cat_ID(get_option('ge_part2'));
	$part_3 = get_cat_ID(get_option('ge_part3'));
	$part_4 = get_cat_ID(get_option('ge_part4'));

	//设置首页四块的标题描述
	$part_1_description = get_option('ge_part1_des');
	$part_2_description = get_option('ge_part2_des');
	$part_3_description = get_option('ge_part3_des');
	$part_4_description = get_option('ge_part4_des');

	$more = get_option('ge_readmore_button'); 
	if(empty($more)) { 
		$more= '阅读更多'; 
	}
	
?>

	<div id="indexLogo">
		<div id="logo">
			<?php $logo = get_option('ge_sitelogo'); if(!empty($logo)) { ?>
		    <a href="<?php bloginfo('url'); ?>">
				<img src="<?php echo $logo; ?>" alt="logo" />
            </a>
            <?php } ?>
			<h1><?php bloginfo('name'); ?></h1><br/>
				<p><?php bloginfo('description'); ?></p><br/><br/>
		</div>

		<div id="srolldown">
			<a>
				<b>
					<?php $enter = get_option('ge_enter_button'); if(!empty($enter)) { echo $enter; } else { echo "点击进入"; } ?>
				</b>
			</a>
		</div>
	</div>

<div class="wrapper">

	 <div id="indexMenu" class="navbar">
	 	<?php get_template_part( 'menu' ); ?>
    </div>
	<div id="indexContent" class="container-fluid">

	<div id="content" class="row-fluid">
    		<div class="span12">

    			<?php $posts = query_posts($query_string . "&cat=".$part_1."&orderby=date&showposts=".$count); ?>
      			<div id="aboutSchool" class="parts span6">
      				<div class="title text-center span12">
      					<h2><?php single_cat_title(); ?><small> | <?php echo $part_1_description ?></small></h2>
      				</div>

      				<?php while(have_posts()) : the_post(); ?>

      				<div class="contents row-fluid">
	  					<div class="span2 offset1 hidden-phone">
		      				<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>" class="thumbnail hidden-phone">
						      <?php post_thumbnail( 78,78 ) ;  ?>
						    </a>
						</div>
						<div class="span8">
							<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>">
								<h2><?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 36,"..."); ?></h2>
							</a>
							<p><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 80,"..."); ?></p>
						</div>
					</div>

					<?php endwhile; ?>

				    <div class="readMore offset4">
				    	<a href="<?php echo get_category_link( $part_1 ) ?>" class="btn btn-primary btn-large"><?php echo $more ?></a>
				    </div>
      			</div>
				<?php wp_reset_query(); ?>

      			<?php $posts = query_posts($query_string . "&cat=".$part_2."&orderby=date&showposts=".$count); ?>
      			<div id="aboutLife" class="parts span6">
      				<div class="title text-center span12">
      					<h2><?php single_cat_title(); ?><small> | <?php echo $part_2_description ?></small></h2>
      				</div>

      				<?php while(have_posts()) : the_post(); ?>

      				<div class="contents row-fluid">
	  					<div class="span2 offset1 hidden-phone">
		      				<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>" class="thumbnail hidden-phone">
						      <?php post_thumbnail( 78,78 ) ;  ?>
						    </a>
						</div>
						<div class="span8">
							<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>">
								<h2><?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 36,"..."); ?></h2>
							</a>
							<p><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 80,"..."); ?></p>
						</div>
					</div>

					<?php endwhile; ?>

				    <div class="readMore offset4">
				    	<a href="<?php echo get_category_link( $part_2 ) ?>" class="btn btn-primary btn-large"><?php echo $more ?></a>
				    </div>
      			</div>

    		</div>
 		</div><!-- END CONTENT -->
		
		<?php wp_reset_query(); ?>
 		 <div id="content-t" class="row-fluid">
    		<div class="span12">

    			<?php $posts = query_posts($query_string . "&cat=".$part_3."&orderby=date&showposts=".$count); ?>
      			<div id="aboutSchool" class="parts span6">
      				<div class="title text-center span12">
      					<h2><?php single_cat_title(); ?><small> | <?php echo $part_3_description ?></small></h2>
      				</div>

      				<?php while(have_posts()) : the_post();	?>

      				<div class="contents row-fluid">
	  					<div class="span2 offset1 hidden-phone">
		      				<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>" class="thumbnail hidden-phone">
						      <?php post_thumbnail( 78,78 ) ;  ?>
						    </a>
						</div>
						<div class="span8">
							<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>">
								<h2><?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 36,"..."); ?></h2>
							</a>
							<p><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 80,"..."); ?></p>
						</div>
					</div>

					<?php endwhile; ?>

				    <div class="readMore offset4">
				    	<a href="<?php echo get_category_link( $part_3 ) ?>" class="btn btn-primary btn-large"><?php echo $more ?></a>
				    </div>
      			</div>
      			<?php wp_reset_query(); ?>

      			<?php $posts = query_posts($query_string . "&cat=".$part_4."&orderby=date&showposts=".$count); ?>
      			<div id="aboutLife" class="parts span6">
      				<div class="title text-center span12">
      					<h2><?php single_cat_title(); ?><small> | <?php echo $part_4_description ?></small></h2>
      				</div>

      				<?php while(have_posts()) : the_post(); ?>

      				<div class="contents row-fluid">
	  					<div class="span2 offset1 hidden-phone">
		      				<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>" class="thumbnail hidden-phone">
						      <?php post_thumbnail( 78,78 ) ;  ?>
						    </a>
						</div>
						<div class="span8">
							<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>">
								<h2><?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 36,"..."); ?></h2>
							</a>
							<p><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 80,"..."); ?></p>
						</div>
					</div>

					<?php endwhile; ?>

				    <div class="readMore offset4">
				    	<a href="<?php echo get_category_link( $part_4 ) ?>" class="btn btn-primary btn-large"><?php echo $more ?></a>
				    </div>
      			</div>
				<?php wp_reset_query(); ?>
    		</div>
 		</div><!-- END CONTENT -->
    </div><!-- END INDEXPAGE -->
    
<?php get_footer(); ?>