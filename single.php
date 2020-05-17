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

		    <div class="span7 offset1">
		    	<div class="parts">
		    		<?php if(have_posts()): ?><?php while(have_posts()):the_post();  ?>
		    		<?php updatePostViews(get_the_ID()); ?>

		    		<div class="title text-center">
		    			<h1><?php the_title(); ?></h1>
		    		</div>
		    		<div class="meta text-center">
		    			<p> <i class="icon-calendar"></i> <?php the_time('Y-n-j') ?> &nbsp;&nbsp;&nbsp;
		    				<i class="icon-book"></i> <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;
		    				<i class="icon-eye-open"></i> <?php echo getPostViews(get_the_ID()); ?></p>
		    		</div>
		    		<div class="post">
		    			<div class="thumb">
			    			<div class="hidden-phone">
							      <?php post_thumbnail( 641,237,'img-rounded' ); ?>
							</div>
		    			</div>

			    		<?php the_content(); ?> 

						<?php get_template_part( 'share' ); ?>
						
					</div>

		    	</div>

		    	<?php endwhile; ?>  
			
				<?php else : ?>
					
					<h2><?php _e(’没有发现文章’); ?></h2>

				<?php endif; ?>
			
		    	<div class="parts comment">
		    		<?php comments_template(); ?>
			 </div>

		    </div>
		    
		    <?php get_sidebar(); ?>

	    </div>

	</div>

<?php get_footer(); ?>