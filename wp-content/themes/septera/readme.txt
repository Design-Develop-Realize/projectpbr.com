=============
Septera WordPress Theme
Copyright 2017 Cryout Creations
https://www.cryoutcreations.eu/

Author: Cryout Creations
Requires at least: 4.2
Tested up to: 4.8.0
Stable tag: 1.0.4
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html
Donate link: https://www.cryoutcreations.eu/donate/

Septera is a multipurpose responsive theme, with a clean and elegant design, crisp, stylish typography and an a great set of powerful yet easy to use customizer settings.

== License ==

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see http://www.gnu.org/copyleft/gpl.html


== Third Party Resources ==

Septera WordPress Theme bundles the following third-party resources:

HTML5Shiv, Copyright Alexander Farkas (aFarkas)
Dual licensed under the terms of the GPL v2 and MIT licenses
Source: https://github.com/aFarkas/html5shiv/

FitVids, Copyright Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
Licensed under the terms of the WTFPLlicense
Source: http://fitvidsjs.com/

== Bundled Fonts ==

Icomoon icons, Copyright Keyamoon.com
Licensed under the terms of the GPL license
Source: https://icomoon.io/#icons-icomoon

Zocial CSS social buttons, Copyright Sam Collins
Licensed under the terms of the MIT license
Source: https://github.com/smcllns/css-social-buttons

Feather icons, Copyright Cole Bemis
Licensed under the terms of the MIT license
Source: http://colebemis.com/feather/

== Bundled Images ==

The following bundled images are released into the public domain under Creative Commons CC0:
https://pixabay.com/en/street-sidewalk-vintage-old-1284362/
https://unsplash.com/photos/8WClaa1CmZ0

Preview demo images:
1.jpg - https://pixabay.com/en/sunset-dusk-last-light-lake-coast-192980/
2.jpg - https://pixabay.com/en/city-walkway-street-boat-the-fog-2045453/
3.jpg - https://pixabay.com/en/urban-people-crowd-citizens-438393/
4.jpg - https://pixabay.com/en/adult-blur-book-daylight-education-1835799/
5.jpg - https://pixabay.com/en/girl-hat-brunette-long-hair-people-926738/
6.jpg - https://pixabay.com/en/nature-landscape-coast-beach-shore-1246613/
7.jpg - https://pixabay.com/en/child-beautiful-model-little-cute-920131/
8.jpg - https://pixabay.com/en/street-sidewalk-vintage-old-1284362/
9.jpg - https://pixabay.com/en/taxi-cab-taxicab-taxi-cab-new-york-238478/
10.jpg - https://pixabay.com/en/road-asphalt-space-sky-clouds-220058/

The rest of the bundled images are created by Cryout Creations and released with the theme under GPLv3


== Changelog ==

= 1.0.4 =
* Removed content background colour from landing page slider area
* Changed content left/right from 1em to 2em for better responsiveness and boxed layouts
* Adjusted elements content background colour applies to and replaced its usage on some other elements with site background colour
* Clarified landing page activation requirements in the customize panel
* Improved header video support and fixed header height on non-homepage sections
* Further improved sidebar and colophon responsiveness
* Updated to Cryout Framework 0.6.5+

= 1.0.3.1 =
* Adjusted image inside links vertical alignment
* Reduces WooCommerce select padding
* Removed theme specific WooCommerce product title font size

= 1.0.3 =
* Fixed landing page CTA buttons responsiveness
* Fixed image vertical alignment in main menu
* Improved icon blocks responsiveness
* Other minor responsiveness changes to the landing page, mobile menu and back to top button
* Added IDs to landing page blocks and boxes
* Fixed post navigation floating issue when no Previous Post exists

= 1.0.2.1 =
* Fixed loading comments template

= 1.0.2 =
* Added  CTA buttons to the landing page
* Changed landing page slider and text area text sizes
* Updated style.css description
* Added a new default slider/header image
* Updated screenshot

= 1.0.1.1 =
* Changed slider/header overlay default opacity value once more
* Replaced demo featured images with smaller ones
* Changed left/right widget areas IDs

= 1.0.1 =
* Changed slider/header overlay default opacity value
* Removed slider/header image grayscale effect
* Updated default header image
* Restored 'Reset Defaults' functionality accidentally removed
* Added demo featured images for when theme is previewed
* Added support for the theme preview sample sidebar
* Updated screenshot

= 1.0.0 =
* Fixed custom colour for the mobile menu dropdown arrows
* Fixed author description and info link arrow on RTL
* Hid socials and footer widgets in print styles
* Fixed article titles size in index.php
* Changed archive page titles to be bold
* Removed WooCommerce page-title font-size using old font-root
* Updated translation files

= 0.9.8 =
* Temporary removed 'save/load theme options' feature until we complete the discussions on the subject with the WPTRT

= 0.9.7.1 =
* Escaped variables in custom-styles.php, loop.php, meta.php and main.php

= 0.9.7 =
* Fixed area label missing translation in header.php
* Default sidebar message is now only shown for users that have widget editing capabilities
* Removed hardcoded JS from main.php ( the 'reset to defaults' confirmation message )
* Escaped get_author_posts_url() with esc_url() in author-bio.php
* Removed 'comment-form' and 'comment-list' from add_theme_support( 'html5' )
* Reset custom WP query in septera_lpindex() and septera_lpboxes() using wp_reset_postdata()
* Modified functions using the 'excerpt_length' and 'excerpt_more' filters to not affect the admin side
* Removed @import from editor-style and fixed editor-style.css loading
* Removed error suppressing from admin-functions.php
* Fixed top social menu margin on mobile
* Fixed mobile menu dropdown arrow line height
* Adjusted z-index on main menu dropdowns and menu search to improve multi-line menu usability
* Adjusted featured boxes hover animation
* Added filters to ob_clean in custom-styles.php and renamed custom_editor_styles to editory_styles
* Adjusted headings appearnace
* Fixed slider overlay still present when opacity set to zero
* Updated translation files

= 0.9.6 =
* Changed featured boxes hover animation
* Added styling to disable Chrome's built-in blue border on focused form elements
* Added explicit support for WooCommerce 3.0 new product gallery
* Removed 'wp_calculate_image_srcset' filter support due to Jetpack_Photon::filter_srcset_array() issue
* Fixed typo in description

= 0.9.5 =
* Added more padding to the 'continue reading' button
* Added padding to pagination buttons
* Fixed 'more posts' button animation
* Increased landing page featured box title line-height
* Fixed landing page slider title/text sizes with responsiveness
* Changed post titles in posts lists from 40 units smaller to 80%
* Improved srcset functionality by switching to viewpoint units for better responsiveness
* Improved srcset sizes for the landing page featured images
* Improved backwards compatibility for browsers that do not use srcsets
* Fixed srcset sizes for 1 column posts list layout
* Added 'septera_featured_srcset' filter and support for 'wp_calculate_image_srcset' filter for disabling srcset functionality
* Added hint in landing page customizer controls for activation procedure and autofocus to static frontpage section
* Fixed more posts button visible on the lading page when static page is used
* Changed default value for Featured Image Alignment from center/center to center/top
* Updated Cryout Framework to v0.6.5

= 0.9.4.2 =
* Fixed both DOX and UNIX style line endings in front-page.php

= 0.9.4.1 =
* Replaced esc_html() with esc_attr_e() to make HTML attributes translateble in includes/meta.php

= 0.9.4 =
* Changed landing page activation mode; the feature is now only visible when a static page is set on the homepage in WordPress
* Added featured content option for landing page to display posts list, the homepage static page (default) or nothing
* Fixed meta information visibility malfunctioning on search results
* Replaced _e() and __() with esc_attr_e() and esc_attr__() where translations are used in element attributes

= 0.9.3 =
* Moved "Edit" button at the top of the post/page
* Adjusted post meta paddings
* Added icon blocks icon/title animations on hover
* Reduced landing page "More posts" button padding
* Fixed unexpected arrow background on cropped featured images
* Increased page/post titles default value to 220% and made post titles in page list 40 units smaller
* Fixed pages manual excerpts not working and added support for <!–nextpage–> tag in icon blocks
* Extended Featured Image Alignment option to apply to all featured image crop variants added by the new srcset feature
* Slightly adjusted headings font sizes generator function and added separate distinct styling for h5 and h6
* Fixed footer widgets responsiveness when "All in a row" option is used
* Changed H1 to H2 in the static slider
* Added site title always present in the source of the site (for SEO purposes)
* Fixed WordPress' "Display Site Title and Tagline" option not hiding tagline
* Added colour option for the H1-H4 content headings
* Updated language file

= 0.9.2.1 =
* Fixed floats not clearing properly

= 0.9.2 =
* Added srcset support for featured images and two additional featured image sizes to improve responsiveness and cross-device compatibility
* Improved content_width internal handling to take layouts into account (for better handling of embed media sizing)
* Adjusted the landing page block/text areas title and text retrieval functions to work with qTranslate
* Added support for <!--more--> tag in landing page text area pages
* Added WordPress 4.7 video header support
* Fixed icon blocks customizer controls not displaying the icons in Chrome / Safari
* Fixed author pages displaying broken titles in certain cases
* Added landing page slider shortcode field to translatable fields in WPML / Polylang
* Removed wp_kses() filtering from landing page blocks/boxes/texts titles/contents
* Fixed header and main container padding discrepancies
* Fixed responsive styling arranging footer widgets in two columns even when option was set to one column
* Fixed before/after widget areas extra padding for ul/ol
* Fixed header widget area position and z-index
* Updated Cryout Framework to v0.6.4
* Removed septera_socials_menu_preset() function
* Removed blog and e-commerce subject tags
* Fixed page used as static page
* Fixed search results showing meta information for pages

= 0.9.1 =
* Moved submenu arrows closer to the menu items
* Fixed current menu item on landing page having the same color as the background on fixed menus
* Removed grayscale filter from the header image and slider overlays if overlay opacity is set to 0

= 0.9 =
Initial release
