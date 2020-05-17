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


	    <div id="content" class=" others row-fluid">
		    <div class="span10 offset1">
		    	<div class="parts">
		    	<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>

		    		<div class="title text-center">
		    			<h1><?php the_title(); ?></h1>
		    		</div>
		    		<div class="post page">

			    		<?php the_content(); ?> 

			    		<?php endwhile; ?>  
			
						<?php else : ?>
					
							<h2><?php _e(’没有发现文章’); ?></h2>

						<?php endif; ?>

						<?php get_template_part( 'share' ); ?>
						
					</div>
		    	</div>
			<div class="parts comment">
		    		<?php if ( comments_open() ) comments_template(); ?>
			 </div>
		    </div>
	    </div>
	</div>

<?php get_footer(); ?>