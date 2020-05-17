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


	    <div id="content others" class="row-fluid">
		    <div class="span10 offset1">
		    	<div class="parts">

		    		<div class="title text-center">
		    			<h1>搜索结果</h1>
		    		</div>
		    		<div class="post">

		    			<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>
			    		<div class="contents row-fluid">
			    			<div class="span2 hidden-phone">
			      				<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>" class="thumbnail hidden-phone">
							      <?php post_thumbnail( 78,78 ) ;  ?>
							    </a>
							</div>
							<div class="span4 text-center">
								<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>">
									<h2><?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 22,"..."); ?></h2>
								</a>
								<p><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 34,"..."); ?></p>
							</div>

							<?php the_post(); ?>

							<div class="span2 hidden-phone">
			      				<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>" class="thumbnail hidden-phone">
							      <?php post_thumbnail( 78,78 ) ;  ?>
							    </a>
							</div>
							<div class="span4 text-center">
								<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>">
									<h2><?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 22,"..."); ?></h2>
								</a>
								<p><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 34,"..."); ?></p>
							</div>
						</div>

					<?php endwhile; ?>  
						
						<?php wp_pagenavi(); ?>						

					<?php else : ?>
					
						<h2><?php _e('没有发现文章'); ?></h2>

					<?php endif; ?>

						<?php get_template_part( 'share' ); ?>
						
					</div>
		    	</div>
		    </div>
	    </div>
	</div>

<?php get_footer(); ?>