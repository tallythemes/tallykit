<?php $blog_query = new WP_Query( $query ); ?>
<div class="tallykit-blog-timeline">
	<?php if( $blog_query->have_posts()): ?>
    	<div class="line"></div>  
        <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
            <div class="tallykit-blog-timeline-list">
                <div class="tallykit-blog-author-img"><?php echo get_avatar(get_the_author_meta('email'), '128'); ?></div>
                <div class="tallykit-blog-timeline-post">
                    <div class="tk-post-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo acoc_max_charlength(120); ?></p>
                    </div>
                    <div class="tk-timeline-thum">
                        <span class="date"><?php the_date(); ?></span>
                        <?php 
							//video
							if(get_post_format() == 'video'){
								$video_mp4 = get_post_meta(get_the_ID(), 'tally_postformat_video_mp4', true);
								$video_ogv = get_post_meta(get_the_ID(), 'tally_postformat_video_ogv', true);
								$video_mov = get_post_meta(get_the_ID(), 'tally_postformat_video_mov', true);
								$video_poster = get_post_meta(get_the_ID(), 'tally_postformat_video_poster', true);
								$embed = get_post_meta(get_the_ID(), 'tally_postformat_video_embed', true);
								if($embed){
									echo '<div class="entry-video-om entry-media">';
										echo wp_oembed_get($embed);
									echo '</div>';
								}else{
									echo '<div class="entry-video entry-media">';
										echo do_shortcode('[video mp4="'.$video_mp4.'" ogv="'.$video_ogv.'" mov="'.$video_mov.'" poster="'.$video_poster.'"]');
									echo '</div>';
								}
							}elseif(get_post_format() == 'audio'){
								$ogg_url = get_post_meta(get_the_ID(), 'tally_postformat_audio_ogg', true);
								$m4a_url = get_post_meta(get_the_ID(), 'tally_postformat_audio_m4a', true);
								$embed = (string)get_post_meta(get_the_ID(), 'tally_postformat_audio_embed', true);
								if($embed){
									echo '<div class="audio-embed entry-media">';
										echo wp_oembed_get($embed);
									echo '</div>';
								}else{
									echo '<div class="audio-hosted entry-media">';
										echo get_the_post_thumbnail(get_the_ID(), 'image_format', array('class'	=> "audio-poster-image"));
										echo do_shortcode('[audio mp3="'.$m4a_url.'" ogg="'.$ogg_url.'"]');
									echo '</div>';
								}
							}elseif(get_post_format() == 'gallery'){
								echo '<div class="entry-gallery ">';
									echo '<ul class="" >';
										$attachments = explode(",", get_post_meta(get_the_ID(), 'tally_postformat_gallery', true));
										if ( $attachments ) {
											foreach ( $attachments as $attachment ) {
												$image = wp_get_attachment_image_src($attachment, 'gallery_format');
												$imagefull = wp_get_attachment_image_src($attachment, 'full');
												
												echo '<li>';
													echo '<a href="'.$imagefull[0].'" rel="prettyPhoto[g_'.get_the_ID().']"><img src="' . mr_image_resize($image[0], 90, 78) . '" height="78" width="90" alt="" /></a>';
												echo '</li>';
											}
										}
									echo '</ul>';
								echo '</div>';
							}elseif(get_post_format() == 'image'){
								echo '<div class="entry-image entry-media">';
									$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
									echo '<a href="'.$large_image_url[0].'" rel="prettyPhoto">';
										echo get_the_post_thumbnail(get_the_ID(), 'image_format');
									echo '</a>';
								echo '</div>';
							}else{
								echo get_the_post_thumbnail(get_the_ID(), 'image_format');
							}
						?>
                    </div>
                </div>
            </div>
            
        <?php endwhile; ?>
	<?php else: ?>
    	<?php _e('No Posts found.', 'tallykit_portfolio'); ?>
    <?php endif; ?>            
</div>
<?php wp_reset_postdata(); ?>