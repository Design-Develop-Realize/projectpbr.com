<?php
/**
 * Master generated style function
 *
 * @package Septera
 */

function septera_body_classes( $classes ) {
	$septeras = cryout_get_option( array(
		'septera_landingpage', 'septera_layoutalign',  'septera_image_style', 'septera_magazinelayout', 'septera_comclosed', 'septera_contenttitles', 'septera_caption_style',
		'septera_elementborder', 'septera_elementshadow', 'septera_elementborderradius', 'septera_totop', 'septera_menustyle', 'septera_menuposition', 'septera_menulayout',
		'septera_headerresponsive', 'septera_fresponsive', 'septera_comlabels', 'septera_comdate', 'septera_tables', 'septera_normalizetags', 'septera_articleanimation'
	) );

	if ( is_front_page() && $septeras['septera_landingpage'] && ( 'page' == get_option('show_on_front') ) ) {
		$classes[] = 'septera-landing-page';
	}

	if ( $septeras['septera_layoutalign'] ) $classes[] = 'septera-boxed-layout';

	$classes[] = esc_html( $septeras['septera_image_style'] );
	$classes[] = esc_html( $septeras['septera_caption_style'] );
	$classes[] = esc_html( $septeras['septera_totop'] );
	$classes[] = esc_html( $septeras['septera_tables'] );

	if ( $septeras['septera_menustyle'] ) $classes[] = 'septera-fixed-menu';
	if ( $septeras['septera_menuposition'] ) $classes[] = 'septera-over-menu';
	if ( $septeras['septera_menulayout'] == 0 ) $classes[] = 'septera-menu-left';
	if ( $septeras['septera_menulayout'] == 2 ) $classes[] = 'septera-menu-center';

	if ( $septeras['septera_headerresponsive'] ) $classes[] = 'septera-responsive-headerimage';
			else $classes[] = 'septera-cropped-headerimage';

	if ( $septeras['septera_fresponsive'] ) $classes[] = 'septera-responsive-featured';
		else $classes[] = 'septera-cropped-featured';

	if ( $septeras['septera_magazinelayout'] ) {
		switch ( $septeras['septera_magazinelayout'] ):
			case 1: $classes[] = 'septera-magazine-one septera-magazine-layout'; break;
			case 2: $classes[] = 'septera-magazine-two septera-magazine-layout'; break;
			case 3: $classes[] = 'septera-magazine-three septera-magazine-layout'; break;
		endswitch;
	}
	switch ( $septeras['septera_comclosed'] ) {
		case 2: $classes[] = 'septera-comhide-in-posts'; break;
		case 3: $classes[] = 'septera-comhide-in-pages'; break;
		case 0: $classes[] = 'septera-comhide-in-posts'; $classes[] = 'septera-comhide-in-pages'; break;
	}
	if ( $septeras['septera_comlabels'] == 1 ) $classes[] = 'septera-comment-placeholder';
	if ( $septeras['septera_comdate'] == 1 ) $classes[] = 'septera-comment-date-published';

	switch ( $septeras['septera_contenttitles'] ) {
		case 2: $classes[] = 'septera-hide-page-title'; break;
		case 3: $classes[] = 'septera-hide-cat-title'; break;
		case 0: $classes[] = 'septera-hide-page-title'; $classes[] = 'septera-hide-cat-title'; break;
	}

	if ( $septeras['septera_elementborder'] ) $classes[] = 'septera-elementborder';
	if ( $septeras['septera_elementshadow'] ) $classes[] = 'septera-elementshadow';
	if ( $septeras['septera_elementborderradius'] ) $classes[] = 'septera-elementradius';
	if ( $septeras['septera_normalizetags'] ) $classes[] = 'septera-normalizedtags';

	switch ( $septeras['septera_articleanimation'] ) {
		case 1: $classes[] = 'septera-article-animation-fade'; break;
		case 2: $classes[] = 'septera-article-animation-slide'; break;
		case 3: $classes[] = 'septera-article-animation-grow'; break;
	}

	return $classes;
}
add_filter( 'body_class', 'septera_body_classes' );


/*
 * Dynamic styles for the frontend
 */
function septera_custom_styles() {
$septeras = cryout_get_option();
foreach ( $septeras as $key => $value ) { ${"$key"} = $value; }

ob_start();
/////////// LAYOUT DIMENSIONS. ///////////
switch ( $septera_layoutalign ) {

	case 0: // wide ?>
			#container:not(.septera-landing-page), #site-header-main-inside, #colophon-inside, #footer-inside, #breadcrumbs-container-inside {
				margin: 0 auto;
				max-width: <?php echo esc_html( $septera_sitewidth ); ?>px;
			}
			<?php if ( esc_html( $septera_menustyle ) ) { ?> #site-header-main { left: 0; right: 0; } <?php } ?>
	<?php break;

	case 1: // boxed ?>
			#site-wrapper, #site-header-main {
				max-width: <?php echo esc_html( $septera_sitewidth ); ?>px;
			}
			<?php if ( esc_html( $septera_menustyle ) ) { ?> #site-header-main { left: 0; right: 0; } <?php } ?>
	<?php break;
}

/////////// COLUMNS ///////////
$colPadding = 0; // percent
$sidebarP = absint( $septera_primarysidebar );
$sidebarS = absint( $septera_secondarysidebar );
?>

#primary 									{ width: <?php echo $sidebarP; ?>px; }
#secondary 									{ width: <?php echo $sidebarS; ?>px; }

#container.one-column .main					{ width: 100%; }
#container.two-columns-right #secondary 	{ float: right; }
#container.two-columns-right .main,
.two-columns-right #breadcrumbs				{ width: calc( <?php echo 100 - (int) $colPadding ?>% - <?php echo $sidebarS; ?>px ); float: left; }
#container.two-columns-left #primary 		{ float: left; }
#container.two-columns-left .main,
.two-columns-left #breadcrumbs				{ width: calc( <?php echo 100 - (int) $colPadding ?>% - <?php echo $sidebarP; ?>px ); float: right; }

#container.three-columns-right #primary,
#container.three-columns-left #primary,
#container.three-columns-sided #primary		{ float: left; }

#container.three-columns-right #secondary,
#container.three-columns-left #secondary,
#container.three-columns-sided #secondary	{ float: left; }


#container.three-columns-right #primary,
#container.three-columns-left #secondary 	{ margin-left: <?php echo esc_html( $colPadding ) ?>%; margin-right: <?php echo esc_html( $colPadding ) ?>%; }
#container.three-columns-right .main,
.three-columns-right #breadcrumbs			{ width: calc( <?php echo 100 - absint( $colPadding ) * 2 ?>% - <?php echo absint( $sidebarS + $sidebarP ); ?>px ); float: left; }
#container.three-columns-left .main,
.three-columns-left #breadcrumbs			{ width: calc( <?php echo 100 - absint( $colPadding ) * 2 ?>% - <?php echo absint( $sidebarS + $sidebarP ); ?>px ); float: right; }

#container.three-columns-sided #secondary 	{ float: right; }
/*
#container.three-columns-sided .main,
.three-columns-sided #breadcrumbs			{ width: calc( <?php echo 100 - absint( $colPadding ) * 2 ?>% - <?php echo absint( $sidebarS + $sidebarP ); ?>px ); float: right;
											  margin: 0 calc( <?php echo absint( $colPadding ) ?>% + <?php echo absint($sidebarS) ?>px ) 0 -1920px; } */

#container.three-columns-sided .main,
.three-columns-sided #breadcrumbs			{ width: calc( <?php echo 100 - absint( $colPadding ) * 2 ?>% - <?php echo absint( $sidebarS + $sidebarP ); ?>px ); float: right; }
.three-columns-sided #breadcrumbs			{ margin: 0 calc( <?php echo absint( $colPadding ) ?>% + <?php echo absint($sidebarS) ?>px ) 0 -1920px; }

<?php if ( in_array( $septera_siteheader, array( 'logo', 'empty' ) ) ) { ?>
	#site-text {text-indent: -9999px;}
<?php }

/////////// FONTS ///////////
?>
html
					{ font-family: <?php echo cryout_font_select( $septera_fgeneral, $septera_fgeneralgoogle ) ?>;
					  font-size: <?php echo esc_html( $septera_fgeneralsize ) ?>; font-weight: <?php echo esc_html( $septera_fgeneralweight ) ?>;
					  line-height: <?php echo esc_html( (float) $septera_lineheight ) ?>; }

#site-title 		{ font-family: <?php echo cryout_font_select( $septera_fsitetitle, $septera_fsitetitlegoogle ) ?>;
					  font-size: <?php echo esc_html( $septera_fsitetitlesize ) ?>; font-weight: <?php echo esc_html( $septera_fsitetitleweight ) ?>; }

#access ul li a 	{ font-family: <?php echo cryout_font_select( $septera_fmenu, $septera_fmenugoogle ) ?>;
					  font-size: <?php echo esc_html( $septera_fmenusize ) ?>; font-weight: <?php echo esc_html( $septera_fmenuweight ) ?>; }

.widget-title 		{ font-family: <?php echo cryout_font_select( $septera_fwtitle, $septera_fwtitlegoogle ) ?>;
					  font-size: <?php echo esc_html( $septera_fwtitlesize ) ?>; font-weight: <?php echo esc_html( $septera_fwtitleweight ) ?>; }
.widget-container 	{ font-family: <?php echo cryout_font_select( $septera_fwcontent, $septera_fwcontentgoogle ) ?>;
				      font-size: <?php echo esc_html( $septera_fwcontentsize ) ?>; font-weight: <?php echo esc_html( $septera_fwcontentweight ) ?>; }
.entry-title, #reply-title
					{ font-family: <?php echo cryout_font_select( $septera_ftitles, $septera_ftitlesgoogle ) ?>;
					  font-size: <?php echo esc_html( $septera_ftitlessize ) ?>; font-weight: <?php echo esc_html( $septera_ftitlesweight ) ?>; }
.entry-title.singular-title { font-size: <?php echo esc_html( absint( $septera_ftitlessize ) ) ?>%; }
.content-masonry .entry-title { font-size: <?php echo esc_html( absint( $septera_ftitlessize ) * 0.8 ) ?>%; }
<?php
$font_root = 2.6; // headings font size root
for ( $i = 1; $i <= 6; $i++ ) {
		$size = round( ( $font_root - ( 0.30 * $i ) ) * ( preg_replace( "/[^\d]/", "", esc_html( $septera_fheadingssize ) ) / 100), 5 ); ?>
		h<?php echo $i ?> { font-size: <?php echo $size ?>em; } <?php
} //for ?>
h1, h2, h3, h4, h5, h6 { font-family: <?php echo cryout_font_select( $septera_fheadings, $septera_fheadingsgoogle ) ?>;
					     font-weight: <?php echo esc_html( $septera_fheadingsweight ) ?>; }


<?php
/////////// COLORS ///////////
?>
body 										{ color: <?php echo esc_html( $septera_sitetext ); ?>;
											  background-color: <?php echo esc_html( $septera_sitebackground ) ?>; }

@media (min-width: 1152px) {
	<?php
	$header_image = septera_header_image_url();
	if ( ! empty( $header_image ) ) { ?>

	.septera-over-menu #site-title a,
	.septera-over-menu #access > div > ul > li,
	.septera-over-menu #access > div > ul > li > a,
	.septera-over-menu #sheader.socials a::before {
		color:  <?php echo esc_html( $septera_menutextoverlay ); ?>;
	}
	<?php } else { ?>
		.septera-over-menu:not('.septera-landing-page') #site-header-main,
		.septera-over-menu:not('.septera-landing-page') #access::after
				{ background-color: <?php echo esc_html( $septera_menubackground ) ?>; }
	<?php }; ?>

	.septera-landing-page.septera-over-menu #site-title a,
	.septera-landing-page.septera-over-menu #access > div > ul > li,
	.septera-landing-page.septera-over-menu #access > div > ul > li > a,
	.septera-landing-page.septera-over-menu #sheader.socials a::before	{
		color:  <?php echo esc_html( $septera_menutextoverlay ); ?>;
	}

}

.lp-staticslider .staticslider-caption-title,
.seriousslider.seriousslider-theme .seriousslider-caption-title,
.lp-staticslider .staticslider-caption-text,
.seriousslider.seriousslider-theme .seriousslider-caption-text,
.lp-staticslider .staticslider-caption-text a	{
	color:  <?php echo esc_html( $septera_menutextoverlay ); ?>;
}

#site-header-main, #access ul ul,
.menu-search-animated .searchform input[type="search"], #access::after,
.septera-over-menu .header-fixed#site-header-main, .septera-over-menu .header-fixed#site-header-main #access:after
											{ background-color: <?php echo esc_html( $septera_menubackground ) ?>; }


.septera-over-menu .header-fixed#site-header-main #site-title a
 									{ color: <?php echo esc_html( $septera_accent1 ) ?>; }

#access > div > ul > li,
#access > div > ul > li > a,
.septera-over-menu .header-fixed#site-header-main #access > div > ul > li:not([class*='current']),
.septera-over-menu .header-fixed#site-header-main #access > div > ul > li:not([class*='current']) > a,
.septera-over-menu .header-fixed#site-header-main #sheader.socials a::before,
#sheader.socials a::before
											{ color: <?php echo esc_html( $septera_menutext ) ?>; }
#access ul.sub-menu li a,
#access ul.children li a 					{ color: <?php echo esc_html( $septera_submenutext ) ?>; }

#access ul.sub-menu li a,
#access ul.children li a 					{ background-color: <?php echo esc_html( $septera_submenubackground ) ?>; }

#access > div > ul > li a:hover,
#access > div > ul > li:hover,
.septera-over-menu .header-fixed#site-header-main #access > div > ul > li > a:hover,
.septera-over-menu .header-fixed#site-header-main #access > div > ul > li:hover,
.septera-over-menu .header-fixed#site-header-main #sheader.socials a:hover::before,
#sheader.socials a:hover::before
											{ color: <?php echo esc_html( $septera_accent1 ) ?>; }

#access > div > ul > li.current_page_item > a,
#access > div > ul > li.current-menu-item > a,
#access > div > ul > li.current_page_ancestor > a,
#access > div > ul > li.current-menu-ancestor > a,
#access .sub-menu, #access .children,
.septera-over-menu .header-fixed#site-header-main #access > div > ul > li > a
											{ color: <?php echo esc_html( $septera_accent2 ) ?>; }

#access ul.children > li.current_page_item > a,
#access ul.sub-menu > li.current-menu-item > a,
#access ul.children > li.current_page_ancestor > a,
#access ul.sub-menu > li.current-menu-ancestor > a
											{ color: <?php echo esc_html( $septera_accent2 ) ?>; }
.searchform .searchsubmit					{ color: <?php echo esc_html( $septera_sitetext ) ?>; }

.searchform:hover input[type="search"],
.searchform input[type="search"]:focus { border-color:  <?php echo esc_html( $septera_accent1 ) ?>; }

body:not(.septera-landing-page) .main, #lp-posts, #lp-page, .searchform
											{ background-color: <?php echo esc_html( $septera_contentbackground ) ?>; }
.pagination span, .pagination a 			{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 12 ) ) ?>; }
#breadcrumbs-container 						{ border-bottom-color: <?php echo esc_html( cryout_hexdiff( $septera_menubackground, 17 ) ); ?>; }
#primary	 								{ background-color: <?php echo esc_html( $septera_primarybackground ) ?>; }
#secondary			 						{ background-color: <?php echo esc_html( $septera_secondarybackground ) ?>; }

#colophon, #footer 							{ background-color: <?php echo esc_html( $septera_footerbackground ) ?>;
 											  color: <?php echo esc_html( $septera_footertext ) ?>; }
.entry-title a:active, .entry-title a:hover { color: <?php echo esc_html( $septera_accent1 ) ?>; }
span.entry-format 							{ color: <?php echo esc_html( $septera_accent1 ) ?>; }

.format-aside 								{ border-top-color: <?php echo esc_html( $septera_sitebackground ) ?>; }

article.hentry .post-thumbnail-container
											{ background-color: rgba(<?php echo cryout_hex2rgb( esc_html( $septera_sitetext ) ) ?>,0.15); }
article.hentry .post-thumbnail-container a::after
											{ background-color: <?php echo esc_html( $septera_accent1 ) ?>; }
.entry-content blockquote::before,
.entry-content blockquote::after 			{ color: rgba(<?php echo cryout_hex2rgb( esc_html( $septera_sitetext ) ) ?>,0.2); }
.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4
											{ color: <?php echo esc_html( $septera_headingstext ) ?>; }

a 											{ color: <?php echo esc_html( $septera_accent1 ); ?>; }
a:hover, .entry-meta span a:hover,
.comments-link a:hover 						{ color: <?php echo esc_html( $septera_accent2 ); ?>; }
.entry-meta span.comments-link 				{ top: <?php echo absint( $septera_ftitlessize )/200 ?>em;}

.continue-reading-link { color: <?php echo esc_html( $septera_contentbackground ) ?>; background-color: <?php echo esc_html( $septera_accent2 ); ?>}
.continue-reading-link:hover { color: <?php echo esc_html( $septera_contentbackground ) ?>; background-color: <?php echo esc_html( $septera_accent1 ) ?>;}

.socials a:before 							{ color: <?php echo esc_html( $septera_accent1 ) ?>; }
.socials a:hover:before 					{ color: <?php echo esc_html( $septera_accent2 ) ?>; }

.septera-normalizedtags #content .tagcloud a { color: <?php echo esc_html($septera_contentbackground) ?>; background-color: <?php echo esc_html( $septera_accent1 ) ?>; }
.septera-normalizedtags #content .tagcloud a:hover { background-color: <?php echo esc_html( $septera_accent2 ) ?>; }

#toTop 										{ background-color: rgba(<?php echo esc_html( cryout_hex2rgb( cryout_hexdiff( $septera_sitebackground, 25 ) ) ) ?>,0.8); color: <?php echo esc_html( $septera_accent1 ) ?>; }
#toTop:hover								{ background-color: <?php echo esc_html( $septera_accent1 ) ?>;  color: <?php echo esc_html( $septera_sitebackground ) ?>; }

.entry-meta .icon-metas:before				{ color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, -69) ) ?>; }

.septera-caption-one .main .wp-caption .wp-caption-text 	{ border-bottom-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 17 ) ) ?>; }
.septera-caption-two .main .wp-caption .wp-caption-text 	{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground,10 ) ) ?>; }

.septera-image-one .entry-content img[class*="align"],
.septera-image-one .entry-summary img[class*="align"],
.septera-image-two .entry-content img[class*='align'],
.septera-image-two .entry-summary img[class*='align'] 	{ border-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 17 ) ) ?>; }
.septera-image-five .entry-content img[class*='align'],
.septera-image-five .entry-summary img[class*='align'] 	{ border-color: <?php echo esc_html( $septera_accent1 ); ?>; }

/* diffs */
span.edit-link a.post-edit-link, span.edit-link a.post-edit-link:hover, span.edit-link .icon-edit:before
											{ color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, 69) ) ?>; }

.searchform 								{ border-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 20) ) ?>; }
.entry-meta span, .entry-meta a, .entry-utility span, .entry-utility a, .entry-meta time,
#breadcrumbs-nav,
 .footermenu ul li span.sep					{ color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, -69) ) ?>; }
.entry-meta span.entry-sticky				{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, -69) ) ?>;  color: <?php echo esc_html( $septera_contentbackground ); ?>; }
 #footer-separator							{ background: <?php echo esc_html (cryout_hexdiff ($septera_footerbackground, 15 ) ) ?>; }

#commentform								{ <?php if ( $septera_comformwidth ) { echo 'max-width:' . esc_html( $septera_comformwidth ) . 'px;';}?>}

code, #nav-below .nav-previous a:before, #nav-below .nav-next a:before
											{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 17 ) ) ?>; }
pre, .page-link > span, .comment-author,
.commentlist .comment-body, .commentlist .pingback
											{ border-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 17 ) ) ?>; }
.page-header.pad-container, article #author-info
											{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 10 ) ) ?>; }
.comment-meta a 							{ color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, -99) ) ?>; }
.commentlist .reply a 						{ color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, -79) ) ?>; }
select, input[type], textarea 				{ color: <?php echo esc_html( $septera_sitetext ); ?>;
											  border-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 15 ) ) ?>; }

input[type]:hover, textarea:hover, select:hover,
input[type]:focus, textarea:focus, select:focus
											{ background: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 15 ) ) ?>; }

button, input[type="button"], input[type="submit"], input[type="reset"]
											{ background-color: <?php echo esc_html( $septera_accent1 ) ?>;
											  color: <?php echo esc_html( $septera_contentbackground ) ?>; }

button:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover
											{ background-color: <?php echo esc_html( $septera_accent2 ) ?>; }

hr											{ background-color: <?php echo esc_html(cryout_hexdiff($septera_contentbackground, 15 ) ) ?>; }

/* woocommerce */
.woocommerce-page #respond input#submit.alt, .woocommerce a.button.alt,
.woocommerce-page button.button.alt, .woocommerce input.button.alt,
.woocommerce #respond input#submit, .woocommerce a.button,
.woocommerce button.button, .woocommerce input.button
											{ background-color: <?php echo esc_html( $septera_accent1 ) ?>;
											  color: <?php echo esc_html( $septera_contentbackground ) ?>;
											  line-height: <?php echo esc_html( (float) $septera_lineheight ) ?>; }
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,
.woocommerce button.button:hover, .woocommerce input.button:hover
											{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_accent1, -34 ) ) ?>;
										 	 color: <?php echo esc_html( $septera_contentbackground ) ?>;}
.woocommerce-page #respond input#submit.alt, .woocommerce a.button.alt,
.woocommerce-page button.button.alt, .woocommerce input.button.alt
											{ background-color: <?php echo esc_html( $septera_accent2 ) ?>;
											  color: <?php echo esc_html( $septera_contentbackground ) ?>;
										  	  line-height: <?php echo esc_html( (float) $septera_lineheight ) ?>; }
.woocommerce-page #respond input#submit.alt:hover, .woocommerce a.button.alt:hover,
.woocommerce-page button.button.alt:hover, .woocommerce input.button.alt:hover
											{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_accent2, -34 ) ) ?>;
											  color: <?php echo esc_html( $septera_contentbackground ) ?>;}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active
											{ border-bottom-color: <?php echo esc_html( $septera_contentbackground ) ?>; }
.woocommerce #respond input#submit.alt.disabled,
.woocommerce #respond input#submit.alt.disabled:hover,
.woocommerce #respond input#submit.alt:disabled,
.woocommerce #respond input#submit.alt:disabled:hover,
.woocommerce #respond input#submit.alt[disabled]:disabled,
.woocommerce #respond input#submit.alt[disabled]:disabled:hover,
.woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover,
.woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover,
.woocommerce a.button.alt[disabled]:disabled,
.woocommerce a.button.alt[disabled]:disabled:hover,
.woocommerce button.button.alt.disabled,
.woocommerce button.button.alt.disabled:hover,
.woocommerce button.button.alt:disabled,
.woocommerce button.button.alt:disabled:hover,
.woocommerce button.button.alt[disabled]:disabled,
.woocommerce button.button.alt[disabled]:disabled:hover,
.woocommerce input.button.alt.disabled,
.woocommerce input.button.alt.disabled:hover,
.woocommerce input.button.alt:disabled,
.woocommerce input.button.alt:disabled:hover,
.woocommerce input.button.alt[disabled]:disabled,
.woocommerce input.button.alt[disabled]:disabled:hover
											{ background-color: <?php echo esc_html( $septera_accent2 ) ?>; }
.woocommerce ul.products li.product .price, .woocommerce div.product p.price,
.woocommerce div.product span.price
											{ color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, -50 ) ); ?> }
#add_payment_method #payment, .woocommerce-cart #payment, .woocommerce-checkout #payment {
	background: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 10 ) ) ?>;
}

.woocommerce .main .page-title {
	/*font-size: <?php echo round( ( $font_root - ( 30 ) ) / 100 * ( preg_replace( "/[^\d]/", "", esc_html( $septera_fheadingssize ) ) / 100), 5 ); ?>em;*/
}


/* mobile menu */
nav#mobile-menu 							{ background-color: <?php echo esc_html( $septera_menubackground ) ?>; }
#mobile-menu .mobile-arrow 					{ color: <?php echo esc_html( $septera_sitetext ) ?>; }

<?php
/////////// LAYOUT ///////////
?>
.main .entry-content, .main .entry-summary 	{ text-align: <?php echo esc_html( $septera_textalign ) ?>; }
.main p, .main ul, .main ol, .main dd, .main pre, .main hr
											{ margin-bottom: <?php echo esc_html( $septera_paragraphspace ) ?>; }
.main p 									{ text-indent: <?php echo esc_html( $septera_parindent ) ?>;}
.main a.post-featured-image 				{ background-position: <?php echo esc_html( $septera_falign ) ?>; }

#header-widget-area 						{ width: <?php echo esc_html( $septera_headerwidgetwidth ) ?>;
											<?php switch ( esc_html( $septera_headerwidgetalign ) ) {
												case 'left': ?> left: 10px; <?php break;
												case 'right': ?> right: 10px; <?php break;
												case 'center': ?>  left: calc(50% - <?php echo esc_html( $septera_headerwidgetwidth ) ?> / 2); <?php break;
											} ?> }
.septera-stripped-table .main thead th		{ border-bottom-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 22 ) ) ?>; }
.septera-stripped-table .main td, .septera-stripped-table .main th
 											{ border-top-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 22 ) ) ?>; }
.septera-bordered-table .main th, .septera-bordered-table .main td
											{ border-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 22 ) ) ?>; }
.septera-stripped-table .main tr:nth-child(even) td
											{ background-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 9 ) ) ?>; }
<?php if ( $septera_fpost ) { ?>
.septera-cropped-featured .main .post-thumbnail-container
											{ height: <?php echo esc_html( $septera_fheight ) ?>px; }
.septera-responsive-featured .main .post-thumbnail-container
											{ max-height: <?php echo esc_html( $septera_fheight ) ?>px; height: auto; }
<?php } ?>

<?php
/////////// SOME CONDITIONAL CLEANUP ///////////
if ( empty( $septera_contentbackground ) ) {  ?> #primary, #colophon { border: 0; box-shadow: none; } <?php }

/////////// ELEMENTS PADDING ///////////
?>

article.hentry .article-inner,
#content-masonry article.hentry .article-inner {
		padding: <?php echo esc_html( $septera_elementpadding ) ?>%;
}

<?php if ( $septera_elementpadding ) { ?>

#breadcrumbs-nav,
body.woocommerce.woocommerce-page #breadcrumbs-nav,
.pad-container  {
	padding: <?php echo esc_html( $septera_elementpadding ) ?>%;
}

.septera-magazine-two.archive #breadcrumbs-nav,
.septera-magazine-two.archive .pad-container,
.septera-magazine-two.search #breadcrumbs-nav,
.septera-magazine-two.search .pad-container {
	padding: <?php echo esc_html( $septera_elementpadding/2 ) ?>%;
}

.septera-magazine-three.archive #breadcrumbs-nav,
.septera-magazine-three.archive .pad-container,
.septera-magazine-three.search #breadcrumbs-nav,
.septera-magazine-three.search .pad-container {
	padding: <?php echo esc_html( $septera_elementpadding/3 ) ?>%;
}
<?php } ?>
<?php
/////////// HEADER LAYOUT ///////////
?>
#site-header-main { height:<?php echo esc_html( $septera_menuheight ) ?>px; }
#access .menu-search-animated .searchform { top: <?php echo esc_html( $septera_menuheight )+2 ?>px; }
.menu-search-animated, #sheader, .identity, #nav-toggle
											{ height:<?php echo esc_html( $septera_menuheight ) ?>px;
											  line-height:<?php echo esc_html( $septera_menuheight ) ?>px; }
#access div > ul > li > a 					{ line-height:<?php echo intval( (int) $septera_menuheight ) ?>px; }
#branding		 							{ height:<?php echo intval( $septera_menuheight ) ?>px; }
#header-widget-area		 					{ top:<?php echo intval( $septera_menuheight ) + 10 ?>px; }
.septera-responsive-headerimage #masthead #header-image-main-inside
											{ max-height: <?php echo esc_html( $septera_headerheight ) ?>px; }
.septera-cropped-headerimage #masthead div.header-image
											{ height: <?php echo esc_html( $septera_headerheight ) ?>px; }
<?php if ( is_front_page() && function_exists( 'the_custom_header_markup' ) && has_header_video() ) { ?>
	.septera-responsive-headerimage #masthead #header-image-main-inside
												{ max-height: none; }
	.septera-cropped-headerimage #masthead div.header-image
												{ height: auto; }
<?php } ?>
<?php if ( $septera_sitetagline ) {?> #site-description { display: block; } <?php } ?>
<?php if (! display_header_text() ) { ?>
	#site-text	 							{ display: none; }
<?php }; ?>
<?php if ( esc_html( $septera_menustyle ) ) { ?>
	#masthead #site-header-main 			{ position: fixed; }
<?php }; ?>
<?php if ( ! esc_html( $septera_menuposition ) ) { ?>
	#header-image-main						{ margin-top: <?php echo esc_html( $septera_menuheight ) ?>px; }
<?php }; ?>
<?php
$header_image = septera_header_image_url();
if ( empty( $header_image ) ) { ?>
@media (min-width: 1152px) {
	body:not(.septera-landing-page)	#site-wrapper
											{ margin-top: <?php echo esc_html( $septera_menuheight ) ?>px; }
	body:not(.septera-landing-page) #masthead
											{ border-bottom: 1px solid <?php echo esc_html( cryout_hexdiff( $septera_menubackground, 17 ) ); ?>; }
}
<?php }; ?>

.lp-staticslider .staticslider-caption-text a {
	border-color:  <?php echo esc_html( $septera_menutextoverlay ); ?>;
}
 <?php
/////////// lANDING PAGE ///////////
?>
.lp-staticslider .staticslider-caption,
.seriousslider.seriousslider-theme .seriousslider-caption,
.septera-landing-page .lp-blocks-inside,
.septera-landing-page .lp-boxes-inside,
.septera-landing-page .lp-text-inside,
.septera-landing-page .lp-posts-inside,
.septera-landing-page .lp-page-inside,
.septera-landing-page .lp-section-header,
.septera-landing-page .content-widget	{ max-width: <?php echo esc_html( $septera_sitewidth ) ?>px;	}
.septera-landing-page .content-widget 	{ margin: 0 auto; }

a.staticslider-button-1 {  color: <?php echo esc_html( $septera_sitetext ) ?>;  border-color: <?php echo esc_html( $septera_sitebackground ) ?>; background-color: <?php echo esc_html( $septera_sitebackground ) ?>;   }
a.staticslider-button-1:hover { color: <?php echo esc_html( $septera_sitebackground ); ?>; }
a.staticslider-button-2 {  border-color: <?php echo esc_html( $septera_sitebackground ) ?>; color: <?php echo esc_html( $septera_sitebackground ); ?>; }
.staticslider-button-2:hover { color: <?php echo esc_html( $septera_sitetext ) ?>; background-color: <?php echo esc_html( $septera_sitebackground ) ?>; }

<?php if ( $septera_lpslider == 3 ) {?> .septera-landing-page #header-image-main-inside { display: block; } <?php } ?>
.lp-slider-overlay::before, #header-image-main::before { background-color: <?php echo esc_html( $septera_headeroverlay ); ?>; }
<?php if ( $septera_headeroverlayopacity ) { ?>
	.lp-slider-overlay::before, #header-image-main::before { z-index: 2; }
<?php } ?>
@-webkit-keyframes animation-slider-overlay { to { opacity: <?php echo esc_html( absint( $septera_headeroverlayopacity )/100 ); ?>; } }
@keyframes animation-slider-overlay { to { opacity:  <?php echo esc_html( absint( $septera_headeroverlayopacity )/100 ); ?>; } }
<?php if ( ! $septera_headeroverlayopacity ) { ?>
	@-webkit-keyframes animation-slider-image { to { filter: grayscale(0); } }
	@keyframes animation-slider-image { to { filter: grayscale(0); } }
<?php } ?>
.lp-block > i::before { color: <?php echo esc_html( $septera_accent1 ); ?>; }
.lp-block:hover i::before { color: <?php echo esc_html( $septera_accent2 ); ?>; }
.lp-block:hover .lp-block-title { color: <?php echo esc_html( $septera_accent1 ); ?>; }
.lp-block i::after { background-color: <?php echo esc_html( $septera_accent1 ); ?>; }
.lp-block:hover i::after { background-color: <?php echo esc_html( $septera_accent2); ?>; }
.lp-block-text, .lp-boxes-static .lp-box-text, .lp-section-desc { color: <?php echo esc_html( cryout_hexdiff( $septera_sitetext, -40 ) ) ?>; }
.lp-text { background-color:  <?php echo esc_html( $septera_primarybackground ) ?>; }
.lp-boxes-1 .lp-box .lp-box-image { height: <?php echo intval ( (int) $septera_lpboxheight1 ); ?>px; }
.lp-boxes-1.lp-boxes-animated .lp-box:hover .lp-box-text { max-height: <?php echo intval ( (int) $septera_lpboxheight1 - 100 ); ?>px; }
.lp-boxes-2 .lp-box .lp-box-image { height: <?php echo intval ( (int) $septera_lpboxheight2 ); ?>px; }
.lp-boxes-2.lp-boxes-animated .lp-box:hover .lp-box-text { max-height: <?php echo intval ( (int) $septera_lpboxheight2 - 100 ); ?>px; }
.lp-box-readmore:hover { color: <?php echo esc_html( $septera_accent1 ) ?>; }
.lp-boxes-static .lp-box-overlay { background-color: rgba(<?php echo cryout_hex2rgb( esc_html( $septera_accent1 ) ) ?>, 0.9); }
#cryout_ajax_more_trigger { background-color: <?php echo esc_html( $septera_accent1 ); ?>; color: <?php echo esc_html( $septera_contentbackground ); ?>;}
<?php
for ($i=1; $i<=8; $i++) { ?>
	.lpbox-rnd<?php echo $i ?> { background-color:  <?php echo esc_html( cryout_hexdiff( $septera_sitebackground, 50+5*$i ) ) ?>; }
<?php }

	return apply_filters( 'septera_custom_styles', ob_get_clean() );
} // septera_custom_styles()


/*
 * Dynamic styles for the admin MCE Editor
 */
function septera_editor_styles() {
	header( 'Content-type: text/css' );
	$septeras = cryout_get_option();
	foreach ( $septeras as $key => $value ) { ${"$key"} = $value; }

	switch ( $septera_sitelayout ) {
		case '1c':
			$septera_primarysidebar = $septera_secondarysidebar = 0;
			break;
		case '2cSl':
			$septera_secondarysidebar = 0;
			break;
		case '2cSr':
			$septera_primarysidebar = 0;
			break;
		default:
			break;
	}
	$content_body = floor( (int) $septera_sitewidth - ( (int) $septera_primarysidebar + (int) $septera_secondarysidebar ) );

	ob_start();
?>
body.mce-content-body {
	max-width: <?php echo esc_html( $content_body ); ?>px;
	font-family: <?php echo cryout_font_select( $septera_fgeneral, $septera_fgeneralgoogle ) ?>;
	font-size: <?php echo esc_html( $septera_fgeneralsize ) ?>; font-weight: <?php echo esc_html( $septera_fgeneralweight ) ?>;
	line-height: <?php echo esc_html( (float) $septera_lineheight ) ?>;
	color: <?php echo esc_html( $septera_sitetext ); ?>;
	background-color: <?php echo esc_html( $septera_contentbackground ) ?>	}
<?php
$font_root = 2.6; // headings font size root
for ( $i = 1; $i <= 6; $i++ ) {
		$size = round( ( $font_root - ( 0.30 * $i ) ) * ( preg_replace( "/[^\d]/", "", esc_html( $septera_fheadingssize ) ) / 100), 5 ); ?>
		h<?php echo $i ?> { font-size: <?php echo $size ?>em; } <?php
} //for ?>
h1, h2, h3, h4, h5, h6 {
	font-family: <?php echo cryout_font_select( $septera_fheadings, $septera_fheadingsgoogle ) ?>;
	font-weight: <?php echo esc_html( $septera_fheadingsweight ) ?>; }

blockquote::before,
blockquote::after {
	color: rgba(<?php echo cryout_hex2rgb( esc_html( $septera_sitetext ) ) ?>,0.1);
}

a 		{ color: <?php echo esc_html( $septera_accent1 ); ?>; }
a:hover	{ color: <?php echo esc_html( $septera_accent2 ); ?>; }

code	{ background-color: <?php echo esc_html(cryout_hexdiff( $septera_contentbackground, 17 ) ) ?>; }
pre		{ border-color: <?php echo esc_html(cryout_hexdiff( $septera_contentbackground, 17 ) ) ?>; }

select,
input[type],
textarea {
	color: <?php echo esc_html( $septera_sitetext ); ?>;
	background-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 10 ) ) ?>;
	border-color: <?php echo esc_html( cryout_hexdiff( $septera_contentbackground, 17 ) ) ?> }

p, ul, ol, dd,
pre, hr { margin-bottom: <?php echo esc_html( $septera_paragraphspace ) ?>; }
p { text-indent: <?php echo esc_html( $septera_parindent ) ?>;}

<?php // end </style>
echo apply_filters( 'septera_editor_styles', ob_get_clean() );
} // septera_editor_styles()


/* FIN */
