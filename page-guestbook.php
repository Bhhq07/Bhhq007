<?php 
/*
Template Name: Guestbook Page
*/
?>

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
		    		<div class="post">

			    		<?php the_content(); ?> 

					<!-- start 读者墙  Edited By iSayme-->
					<?php
					    $query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 24 MONTH ) AND user_id='0' AND comment_author_email != 'i@geeku.net' AND comment_author_email != 'ggongpei@qq.com' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 13";//大家把管理员的邮箱改成你的,最后的这个39是选取多少个头像，大家可以按照自己的主题进行修改,来适合主题宽度
					    $wall = $wpdb->get_results($query);
					    $maxNum = $wall[0]->cnt;
					    foreach ($wall as $comment)
					    {
						$width = round(40 / ($maxNum / $comment->cnt),2);//此处是对应的血条的宽度
						if( $comment->comment_author_url )
						$url = $comment->comment_author_url;
						else $url="#";
						$tmp = "<li><a target=\"_blank\" href=\"".$comment->comment_author_url."\"><span class=\"pic\" style=\"background: url(http://www.gravatar.com/avatar/".md5(strtolower($comment->comment_author_email))."?s=50&d=http://ds.cdncache.org/avatar-50/632/11509.jpg&r=G) no-repeat;\">pic</span><span class=\"num\">".$comment->cnt."</span><span class=\"name\">".$comment->comment_author."</span></a><div class='active-bg'><div class='active-degree' style='width:".$width."px'></div></div></li>";
						$output .= $tmp;
					     }
					    $output = "<div class=\"readerwall\">".$output."<div class=\"clear\"></div></div>";
					    echo $output ;
					?><br/><br/>
					<!-- end 读者墙 -->

			    		<?php endwhile; ?>  
			
						<?php else : ?>
					
							<h2><?php _e(’没有发现文章’); ?></h2>

						<?php endif; ?>				
					</div>
		    	</div>
			<div class="parts comment">
		    		<?php if ( comments_open() ) comments_template(); ?>
			 </div>
		    </div>
	    </div>
	</div>

<?php get_footer(); ?>