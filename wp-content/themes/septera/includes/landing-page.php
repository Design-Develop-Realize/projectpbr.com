<?php
/**
 * Landing page functions
 * Used in front-page.php
 *
 * @package Septera
 */

/**
 * slider builder
 */
if ( ! function_exists('septera_lpslider' ) ):
function septera_lpslider() {
	$septeras = cryout_get_option( array( 'septera_lpslider', 'septera_lpsliderimage', 'septera_lpslidertitle', 'septera_lpslidertext', 'septera_lpslidershortcode', 'septera_lpsliderserious', 'septera_lpslidercta1text', 'septera_lpslidercta1link', 'septera_lpslidercta2text', 'septera_lpslidercta2link'  ) );
	echo '<section class="lp-slider-overlay">';
	if ( $septeras['septera_lpslider'] )
		switch ( $septeras['septera_lpslider'] ):
			case 1:
				if ( is_string( $septeras['septera_lpsliderimage'] ) ) {
					$image = $septeras['septera_lpsliderimage'];
				}
				else {
					list( $image, ) = wp_get_attachment_image_src( $septeras['septera_lpsliderimage'], 'full' );
				}
				septera_lpslider_output( array(
					'image' => $image,
					'title' => $septeras['septera_lpslidertitle'],
					'content' => $septeras['septera_lpslidertext'],
					'lpslidercta1text' => $septeras['septera_lpslidercta1text'],
					'lpslidercta1link' => $septeras['septera_lpslidercta1link'],
					'lpslidercta2text' => $septeras['septera_lpslidercta2text'],
					'lpslidercta2link' => $septeras['septera_lpslidercta2link'],
				) );
			break;
			case 2:
				?> <div class="lp-dynamic-slider"> <?php
				echo do_shortcode( $septeras['septera_lpslidershortcode'] );
				?> </div> <!-- lp-dynamic-slider --> <?php
			break;
			case 3:
				// header image
			break;
			case 4:
				?> <div class="lp-dynamic-slider"> <?php
					if ( ! empty( $septeras['septera_lpsliderserious'] ) ) {
						echo do_shortcode( '[serious-slider id="' . $septeras['septera_lpsliderserious'] . '"]' );
					}
				?> </div> <!-- lp-dynamic-slider --> <?php
			break;

			default:
			break;
		endswitch;
		echo '</section>';
} //  septera_lpslider()
endif;

/**
 * slider output
 */
if ( ! function_exists( 'septera_lpslider_output' ) ):
function septera_lpslider_output( $data ){
	extract($data); ?>

		<section class="lp-staticslider">
			<?php if ( ! empty( $image ) ) { ?>
				<img class="lp-staticslider-image" alt="<?php echo esc_attr( $title ) ?>" src="<?php echo esc_url( $image ); ?>">
			<?php } ?>
			<div class="staticslider-caption">
				<?php if ( ! empty( $title ) ) { ?> <h2 class="staticslider-caption-title"><?php echo do_shortcode( wp_kses_post( $title ) ) ?></h2><?php } ?>
				<?php if ( ! empty( $title ) && ! empty( $content ) )	{ ?><span class="staticslider-sep"></span><?php } ?>
				<?php if ( ! empty( $content ) ) { ?> <div class="staticslider-caption-text"><?php echo do_shortcode( wp_kses_post( $content ) ) ?></div><?php } ?>
				<?php if ( ! empty( $lpslidercta1text ) ) { echo '<a class="staticslider-button-1" href="' . esc_url( $lpslidercta1link ) . '">' . esc_html( $lpslidercta1text ) . '</a>'; } ?>
				<?php if ( ! empty( $lpslidercta2text ) ) { echo '<a class="staticslider-button-2" href="' . esc_url( $lpslidercta2link ) . '">' . esc_html( $lpslidercta2text ) . '</a>'; } ?>
			</div>
		</section><!-- .lp-staticslider -->

<?php
} // septera_lpslider_output()
endif;


/**
 * blocks builder
 */
if ( ! function_exists( 'septera_lpblocks' ) ):
function septera_lpblocks() {
	$maintitle = cryout_get_option('septera_lpblockmaintitle');
	$maindesc = cryout_get_option('septera_lpblockmaindesc');
	$pageids = cryout_get_option( array( 'septera_lpblockone', 'septera_lpblocktwo', 'septera_lpblockthree', 'septera_lpblockfour') );
	$icon = cryout_get_option( array( 'septera_lpblockoneicon', 'septera_lpblocktwoicon', 'septera_lpblockthreeicon', 'septera_lpblockfouricon' ) );
	$blockscontent = cryout_get_option( 'septera_lpblockscontent' );
	$blocksclick = cryout_get_option( 'septera_lpblocksclick' );
	$count = 1;
	$pagecount = count (array_filter( $pageids ) );
	if ( empty( $pagecount ) ) return;
	?>
	<section id="lp-blocks" class="lp-blocks lp-blocks-rows-<?php echo absint( $pagecount ) ?>">
		<?php if(  ! empty( $maintitle ) || ! empty( $maindesc ) ) { ?>
			<div class="lp-section-header">
				<?php if( ! empty( $maintitle ) ) { ?><h2 class="lp-section-title"> <?php echo do_shortcode( wp_kses_post( $maintitle ) ) ?></h2><?php } ?>
				<?php if( ! empty( $maindesc ) ) { ?><div class="lp-section-desc"> <?php echo do_shortcode( wp_kses_post( $maindesc ) ) ?></div><?php } ?>
			</div>
		<?php } ?>
		<div class="lp-blocks-inside">
			<?php foreach ( $pageids as $key => $pageid ) {
				if ( !empty( $pageid ) ) {
					$page = get_post( $pageid );

					switch ( $blockscontent ) {
						case '0': $text = ''; break;
						case '1': default: if (has_excerpt( $pageid )) $text = get_the_excerpt( $pageid ); else $text = septera_custom_excerpt( $page->post_content ); break;
						case '2': $text = apply_filters( 'the_content', get_post_field( 'post_content', $pageid ) ); break;
					};

					$data[$count] = array(
						'title' => get_the_title( $pageid ),
						'text'	=> $text,
						'icon'	=> ( ( $icon[$key . 'icon'] != 'no-icon' ) ? $icon[$key . 'icon'] : '' ),
						'link'	=> get_permalink( $pageid ),
						'click'	=> $blocksclick,
						'id' 	=> $count,
					);
					septera_lpblock_output( $data[$count] );
					$count++;
				}
			} ?>
		</div>
	</section>
<?php } //septera_lpblocks()
endif;

/**
 * blocks output
 */
if ( ! function_exists( 'septera_lpblock_output' ) ):
function septera_lpblock_output( $data ) {
	extract($data); ?>
			<div class="lp-block block<?php echo absint( $id ); ?>">
				<?php if ( $click ) { ?><a href="<?php echo esc_url( $link ); ?>"><?php } ?>
					<?php if ( ! empty ( $icon ) )	{ ?> <i class="blicon-<?php echo esc_attr( $icon ); ?>"></i><?php } ?>
				<?php if ( $click ) { ?></a> <?php } ?>
					<div class="lp-block-content">
						<?php if ( ! empty ( $title ) ) { ?><h5 class="lp-block-title"><?php echo do_shortcode( $title ) ?></h5><?php } ?>
						<?php if ( ! empty ( $text ) ) { ?><div class="lp-block-text"><?php echo do_shortcode( $text ) ?></div><?php } ?>
						<?php /*<a class="lp-block-readmore" href="<?php echo esc_url( $link ); ?>" <?php echo esc_attr( $target ); ?>> <?php echo wp_kses_post( $readmore ); ?> </a>*/ ?>
					</div>
			</div><!-- lp-block -->
	<?php
} // septera_lpblock_output()
endif;


/**
 * boxes builder
 */
if ( ! function_exists( 'septera_lpboxes' ) ):
function septera_lpboxes( $sid = 1 ) {
	$septeras = cryout_get_option(
				array(
					 'septera_lpboxmaintitle' . $sid,
					 'septera_lpboxmaindesc' . $sid,
					 'septera_lpboxcat' . $sid,
					 'septera_lpboxrow' . $sid,
					 'septera_lpboxcount' . $sid,
					 'septera_lpboxlayout' . $sid,
					 'septera_lpboxmargins' . $sid,
					 'septera_lpboxanimation' . $sid,
					 'septera_lpboxreadmore' . $sid,
					 'septera_lpboxlength' . $sid,
				 )
			 );

	if ( ( $septeras['septera_lpboxcount' . $sid] <= 0 ) || ( $septeras['septera_lpboxcount' . $sid] == '-' ) ) return;

 	$box_counter = 1;
	$animated_class = "";
	if ( $septeras['septera_lpboxanimation' . $sid] == 1 ) $animated_class = 'lp-boxes-animated';
	if ( $septeras['septera_lpboxanimation' . $sid] == 2 ) $animated_class = 'lp-boxes-static';
    $custom_query = new WP_query();
    if ( ! empty( $septeras['septera_lpboxcat' . $sid] ) ) $cat = '&category_name=' . $septeras['septera_lpboxcat' . $sid]; else $cat = '';

    $custom_query->query( 'showposts=' . $septeras['septera_lpboxcount' . $sid] . $cat . '&ignore_sticky_posts=1' );
    if ( $custom_query->have_posts() ) : ?>
		<section id="lp-boxes-<?php echo absint( $sid ) ?>" class="lp-boxes lp-boxes-<?php echo absint( $sid ) ?> <?php  echo esc_attr( $animated_class ) ?> lp-boxes-rows-<?php echo absint( $septeras['septera_lpboxrow' . $sid] ); ?>">
			<?php if( $septeras['septera_lpboxmaintitle' . $sid] || $septeras['septera_lpboxmaindesc' . $sid] ) { ?>
				<div class="lp-section-header">
					<?php if ( ! empty( $septeras['septera_lpboxmaintitle' . $sid] ) ) { ?> <h2 class="lp-section-title"> <?php echo do_shortcode( wp_kses_post( $septeras['septera_lpboxmaintitle' . $sid] ) ) ?></h2><?php } ?>
					<?php if ( ! empty( $septeras['septera_lpboxmaindesc' . $sid] ) ) { ?><div class="lp-section-desc"> <?php echo do_shortcode( wp_kses_post( $septeras['septera_lpboxmaindesc' . $sid] ) ) ?></div><?php } ?>
				</div>
			<?php } ?>
			<div class="<?php if ( $septeras['septera_lpboxlayout' . $sid] == 2 ) { echo 'lp-boxes-inside'; }?>
						<?php if ( $septeras['septera_lpboxmargins' . $sid] == 2 ) { echo 'lp-boxes-margins'; }?>
						<?php if ( $septeras['septera_lpboxmargins' . $sid] != 2 &&  $septeras['septera_lpboxmargins' . $sid] != 2 ) { echo 'lp-boxes-padding'; }?>">
    		<?php while ( $custom_query->have_posts() ) :
		            $custom_query->the_post();
					if ( has_excerpt() ) {
						$excerpt = septera_custom_excerpt( get_the_excerpt(), $septeras['septera_lpboxlength' . $sid] );
					} else {
						$excerpt = septera_custom_excerpt( get_the_content(), $septeras['septera_lpboxlength' . $sid] );
					};
		            $box = array();
		            $box['colno'] = $box_counter++;
		            $box['counter'] = $septeras['septera_lpboxcount' . $sid];
		            $box['title'] = get_the_title();
		            $box['content'] = $excerpt;
		            list( $box['image'], ) = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'septera-lpbox-' . $sid );
		            $box['link'] = get_permalink();
					$box['readmore'] = $septeras['septera_lpboxreadmore' . $sid];
		            $box['target'] = ''; // unused for now

					$box['image'] = apply_filters('septera_preview_img_src', $box['image']);

            		septera_lpbox_output( $box );
        		endwhile; ?>
			</div>
		</section><!-- .lp-boxes -->
<?php endif;
wp_reset_postdata();
} //  septera_lpboxes()
endif;

/**
 * boxes output
 */
if ( ! function_exists( 'septera_lpbox_output' ) ):
function septera_lpbox_output( $data ) {
	$randomness = array ( 6, 8, 1, 5, 2, 7, 3, 4 );
	extract($data); ?>
			<div class="lp-box box<?php echo absint( $colno ); ?> ">
					<div class="lp-box-image lpbox-rnd<?php echo $randomness[$colno%8]; ?>">
						<?php if( ! empty( $image ) ) { ?><img alt="<?php echo esc_attr( $title ) ?>" src="<?php echo esc_url( $image ) ?>" /> <?php } ?>
						<a class="lp-box-link" href="<?php if( ! empty( $link ) ) { echo esc_url( $link ); } ?>"><i class="icon-arrow-right2"></i></a>
						<div class="lp-box-overlay"></div>
					</div>
					<div class="lp-box-content">
						<?php if ( ! empty( $title ) ) { ?><h5 class="lp-box-title"><?php echo do_shortcode( $title ) ?></h5><?php } ?>
						<div class="lp-box-text">
							<?php if ( ! empty( $content ) ) { ?>
								<div class="lp-box-text-inside"> <?php echo do_shortcode( $content ) ?> </div>
							<?php } ?>
							<?php if( ! empty( $readmore ) ) { ?>
								<a class="lp-box-readmore" href="<?php if( ! empty( $link ) ) { echo esc_url( $link ); } ?>" <?php echo esc_attr( $target ); ?>> <?php echo do_shortcode( wp_kses_post( $readmore ) ) ?> <i class="icon-continue-reading"></i></a>
							<?php } ?>
						</div>
					</div>
			</div><!-- lp-box -->
	<?php
} // septera_lpbox_output()
endif;


/**
 * text area builder
 */
if ( ! function_exists( 'septera_lptext' ) ):
function septera_lptext( $what = 'one' ) {
	$pageid = cryout_get_option( 'septera_lptext' . $what );
	if ( ! empty( $pageid ) ) {
		$page = get_post( $pageid );
		$data = array(
			'title' => get_the_title( $pageid ),
			'text'	=> apply_filters( 'the_content', get_post_field( 'post_content', $pageid ) ),
			'id' 	=> $what,
		);
		list( $data['image'], ) = wp_get_attachment_image_src( get_post_thumbnail_id( $pageid ), 'full' );
		septera_lptext_output( $data );
	}
} // septera_lptext()
endif;

/**
 * text area output
 */
if ( ! function_exists( 'septera_lptext_output' ) ):
function septera_lptext_output( $data ){ ?>
	<section class="lp-text" id="lp-text-<?php echo esc_attr( $data['id'] ); ?>"<?php if( ! empty( $data['image'] ) ) { ?> style="background-image: url( <?php echo esc_url( $data['image'] ); ?>);" <?php } ?> >
		<?php if( ! empty( $data['image'] ) ) { ?><div class="lp-text-overlay"></div><?php } ?>
			<div class="lp-text-inside">
				<?php if( ! empty( $data['title'] ) ) { ?><h2 class="lp-text-title"><?php echo do_shortcode( $data['title'] ) ?></h2><?php } ?>
				<?php if( ! empty( $data['text'] ) ) { ?><div class="lp-text-content"><?php echo do_shortcode( $data['text'] ) ?></div><?php } ?>
			</div>

	</section><!-- .lp-text-<?php echo esc_attr( $data['id'] ); ?> -->
<?php
} // septera_lptext_output()
endif;

/**
 * page or posts output, also used when landing page is disabled
 */
 if ( ! function_exists( 'septera_lpindex' ) ):
 function septera_lpindex() {

	$septera_lpposts = cryout_get_option ('septera_lpposts');

	switch ($septera_lpposts) {

		case 2: // static page

			if ( have_posts() ) :
					?><section id="lp-page"> <div class="lp-page-inside"><?php
					get_template_part( 'content/content', 'page' );
					?></div> </section><!-- #lp-posts --><?php
			endif;

		break;

		case 1: // posts

			if ( get_query_var('paged') ) $paged = get_query_var('paged');
			elseif ( get_query_var('page') ) $paged = get_query_var('page');
			else $paged = 1;
			$custom_query = new WP_query( array('posts_per_page'=>get_option('posts_per_page'),'paged'=>$paged) );

			if ( $custom_query->have_posts() ) :  ?>
				<section id="lp-posts"> <div class="lp-posts-inside">
				<div id="content-masonry" class="content-masonry" <?php cryout_schema_microdata( 'blog' ); ?>> <?php
					while ( $custom_query->have_posts() ) : $custom_query->the_post();
						get_template_part( 'content/content', get_post_format() );
					endwhile; ?>
				</div> <!-- content-masonry -->
				</div> </section><!-- #lp-posts -->
				<?php septera_pagination();
				wp_reset_postdata();
			else :
				get_template_part( 'content/content', 'notfound' );
			endif;

		break;

		case 0: // disabled
		default: break;
	}

 } // septera_lpindex()
 endif;

// FIN
