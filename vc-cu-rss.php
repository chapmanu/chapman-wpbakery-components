<?php

/**
* Adds new shortcode "rss-carousel-shortcode" and registers it to
* the WPBakery Visual Composer plugin
*
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
    die ('File should not be called directly. See content/plugins/chapman-wbakery-components/vc-cu-rss.php');
}


if ( ! class_exists( 'rssCarousel' ) ) {

	class rssCarousel {

		/**
		* Main constructor
		*
		*/
		public function __construct() {

			// Registers the shortcode in WordPress
			add_shortcode( 'rss-carousel-shortcode', array( 'rssCarousel', 'output' ) );

			// Map shortcode to Visual Composer
			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'rss-carousel-shortcode', array( 'rssCarousel', 'map' ) );
			}

		}

		/**
		* Map shortcode to VC
    *
    * This is an array of all your settings which become the shortcode attributes ($atts)
		* for the output.
		*
		*/
		public static function map() {
			$options = explode( ',', $options );
			if ( in_array( 'show_summary', $options ) ) {
				$atts['show_summary'] = true;
			}
			if ( in_array( 'show_author', $options ) ) {
				$atts['show_author'] = true;
			}
			if ( in_array( 'show_date', $options ) ) {
				$atts['show_date'] = true;
			}

			return array(

				'name'        => esc_html__( 'RSS Carousel', 'text-domain' ),
				'url'        => esc_html__( 'RSS Carousel', 'text-domain' ),
				'description' => esc_html__( 'Add new RSS Carousel', 'text-domain' ),
				'base'        => 'vc_infobox',
				'category' => __('Chapman University', 'text-domain'),
				'icon' =>  'icon-wpb-images-stack',
				'params'      => array(
					array(
						'type' => 'textfield',
						'holder' => 'h2',
						'class' => 'title-class',
						'heading' => __( 'Title (Optional)', 'text-domain' ),
						'param_name' => 'title',
						'value' => __( '', 'text-domain' ),
						'admin_label' => false,
						'weight' => 0,
						'group' => 'RSS Carousel',
				),
					array(
						'type'        => 'dropdown',
						'heading'     => __('Choose Feed (Or Enter One in the Field Below)'),
						'param_name'  => 'dropdown_feed',
						'admin_label' => true,
						'description'             => 'Choose a feed above, or write one below.',
						'value'       => array(
							'Custom Feed' => 'custom_feed',
							'https://blogs.chapman.edu/business/feed' => 'https://blogs.chapman.edu/business/feed',
'https://blogs.chapman.edu/business/feed?post_type=announcement' => 'https://blogs.chapman.edu/business/feed?post_type=announcement',
'http://blogs.chapman.edu/education/feed' => 'http://blogs.chapman.edu/education/feed',
'http://blogs.chapman.edu/education/feed?post_type=announcement' => 'http://blogs.chapman.edu/education/feed?post_type=announcement',
'https://blogs.chapman.edu/center-for-global-education/feed' => 'https://blogs.chapman.edu/center-for-global-education/feed',
  'https://blogs.chapman.edu/center-for-global-education/feed?post_type=announcement' => 'https://blogs.chapman.edu/center-for-global-education/feed?post_type=announcement',
'https://blogs.chapman.edu/undergraduate-excellence/feed' => 'https://blogs.chapman.edu/undergraduate-excellence/feed',
'https://blogs.chapman.edu/undergraduate-excellence/feed?post_type=announcement' => 'https://blogs.chapman.edu/undergraduate-excellence/feed?post_type=announcement',
'https://blogs.chapman.edu/alumni/feed' => 'https://blogs.chapman.edu/alumni/feed',
'https://blogs.chapman.edu/alumni/feed?post_type=announcement' => 'https://blogs.chapman.edu/alumni/feed?post_type=announcement',
'https://blogs.chapman.edu/magazine/feed' => 'https://blogs.chapman.edu/magazine/feed',
'https://blogs.chapman.edu/magazine/feed?post_type=announcement' => 'https://blogs.chapman.edu/magazine/feed?post_type=announcement',
'https://blogs.chapman.edu/copa/feed' => 'https://blogs.chapman.edu/copa/feed',
'https://blogs.chapman.edu/copa/feed?post_type=announcement' => 'https://blogs.chapman.edu/copa/feed?post_type=announcement',
'https://blogs.chapman.edu/crean/feed' => 'https://blogs.chapman.edu/crean/feed',
'https://blogs.chapman.edu/crean/feed?post_type=announcement' => 'https://blogs.chapman.edu/crean/feed?post_type=announcement',
'https://blogs.chapman.edu/diversity/feed' => 'https://blogs.chapman.edu/diversity/feed',
'https://blogs.chapman.edu/diversity/feed?post_type=announcement' => 'https://blogs.chapman.edu/diversity/feed?post_type=announcement',
'https://blogs.chapman.edu/dodge/feed' => 'https://blogs.chapman.edu/dodge/feed',
'https://blogs.chapman.edu/dodge/feed?post_type=announcement' => 'https://blogs.chapman.edu/dodge/feed?post_type=announcement',
'https://blogs.chapman.edu/collections/feed' => 'https://blogs.chapman.edu/collections/feed',
'https://blogs.chapman.edu/collections/feed?post_type=announcement' => 'https://blogs.chapman.edu/collections/feed?post_type=announcement',
'https://blogs.chapman.edu/fish/feed' => 'https://blogs.chapman.edu/fish/feed',
'https://blogs.chapman.edu/law/feed' => 'https://blogs.chapman.edu/law/feed',
'https://blogs.chapman.edu/law/feed?post_type=announcement' => 'https://blogs.chapman.edu/law/feed?post_type=announcement',
'https://blogs.chapman.edu/graduate-education/feed' => 'https://blogs.chapman.edu/graduate-education/feed',
'https://blogs.chapman.edu/graduate-education/feed?post_type=announcement' => 'https://blogs.chapman.edu/graduate-education/feed?post_type=announcement',
'https://blogs.chapman.edu/academics/feed' => 'https://blogs.chapman.edu/academics/feed',
'https://blogs.chapman.edu/academics/feed?post_type=announcement' => 'https://blogs.chapman.edu/academics/feed?post_type=announcement',
'https://blogs.chapman.edu/holocaust-education/feed' => 'https://blogs.chapman.edu/holocaust-education/feed',
'https://blogs.chapman.edu/holocaust-education/feed?post_type=announcement' => 'https://blogs.chapman.edu/holocaust-education/feed?post_type=announcement',
'https://blogs.chapman.edu/huell-howser-archives/feed' => 'https://blogs.chapman.edu/huell-howser-archives/feed',
'https://blogs.chapman.edu/huell-howser-archives/feed?post_type=announcement' => 'https://blogs.chapman.edu/huell-howser-archives/feed?post_type=announcement',
'https://blogs.chapman.edu/information-systems/feed' => 'https://blogs.chapman.edu/information-systems/feed',
'https://blogs.chapman.edu/information-systems/feed?post_type=announcement' => 'https://blogs.chapman.edu/information-systems/feed?post_type=announcement',
'http://blogs.chapman.edu/library/feed' => 'http://blogs.chapman.edu/library/feed',
'http://blogs.chapman.edu/library/feed?post_type=announcement' => 'http://blogs.chapman.edu/library/feed?post_type=announcement',
'https://blogs.chapman.edu/community-relations/feed' => 'https://blogs.chapman.edu/community-relations/feed',
'https://blogs.chapman.edu/community-relations/feed?post_type=announcement' => 'https://blogs.chapman.edu/community-relations/feed?post_type=announcement',
'https://blogs.chapman.edu/news-and-stories/feed' => 'https://blogs.chapman.edu/news-and-stories/feed',
'https://blogs.chapman.edu/news-and-stories/feed?post_type=announcement' => 'https://blogs.chapman.edu/news-and-stories/feed?post_type=announcement',
'https://blogs.chapman.edu/research/feed' => 'https://blogs.chapman.edu/research/feed',
'https://blogs.chapman.edu/research/feed?post_type=announcement' => 'https://blogs.chapman.edu/research/feed?post_type=announcement',
'https://blogs.chapman.edu/scst/feed' => 'https://blogs.chapman.edu/scst/feed',
'https://blogs.chapman.edu/scst/feed?post_type=announcement' => 'https://blogs.chapman.edu/scst/feed?post_type=announcement',
'https://blogs.chapman.edu/communication/feed' => 'https://blogs.chapman.edu/communication/feed',
'https://blogs.chapman.edu/communication/feed?post_type=announcement' => 'https://blogs.chapman.edu/communication/feed?post_type=announcement',
'https://blogs.chapman.edu/pharmacy/feed' => 'https://blogs.chapman.edu/pharmacy/feed',
'https://blogs.chapman.edu/pharmacy/feed?post_type=announcement' => 'https://blogs.chapman.edu/pharmacy/feed?post_type=announcement',
'https://blogs.chapman.edu/sustainability/feed' => 'https://blogs.chapman.edu/sustainability/feed',
'https://blogs.chapman.edu/sustainability/feed?post_type=announcement' => 'https://blogs.chapman.edu/sustainability/feed?post_type=announcement',
'https://blogs.chapman.edu/wilkinson/feed' => 'https://blogs.chapman.edu/wilkinson/feed',
'https://blogs.chapman.edu/wilkinson/feed?post_type=announcement' => 'https://blogs.chapman.edu/wilkinson/feed?post_type=announcement',
'http://blogs.chapman.edu/tpi/feed' => 'http://blogs.chapman.edu/tpi/feed',
'http://blogs.chapman.edu/tpi/feed?post_type=announcement' => 'http://blogs.chapman.edu/tpi/feed?post_type=announcement',

						),
						'std'         => 'two', // Your default value
						'group' => 'RSS Carousel',

					),
					array(
						'type'       => 'textfield',
						'holder' => 'h2',
						'heading' => __( 'Custom Feed URL', 'text-domain' ),
                        'param_name' => 'url',
                        'admin_label' => false,
                        'weight' => 0,
												'group' => 'RSS Carousel',
												'description'             => 'Override the dropdown and enter your own valid RSS feed URL',
					),
					array(
						'type'       => 'textfield',
						'holder' => 'h2',
						'heading' => __( 'Number of Items', 'text-domain' ),
												'description'             => 'Number of Items to Fetch and Display',
												'value' => '20', // New default value
                        'param_name' => 'number_items',
                        'admin_label' => false,
                        'weight' => 0,
												'group' => 'RSS Carousel',
					),
					array(
						'type' => 'checkbox',
						'param_name' => 'display_description',
						'heading' => __( 'Display Description', 'text-domain' ),
						'group' => 'RSS Carousel',
						'value' => 'Yes'
					),
					array(
						'type' => 'checkbox',
						'param_name' => 'display_date',
						'heading' => __( 'Display Date', 'text-domain' ),
						'group' => 'RSS Carousel',
						'value' => 'Yes'
					),
					array(
						// 'type' => 'textfield',
						'heading' => __( 'Shortcode', 'js_composer' ),
						'param_name' => 'shortcode',
						'group' => 'RSS Carousel',
						'value' => '[rss-carousel-shortcode title="Test" dropdown_feed="' . $url.'"' . 'url="" display_description="true" display_date="true"]',
						'description' => __( 'You may paste a shortcode in any text-area, following this format:' .'<br><code>'. '[rss-carousel-shortcode url="http://blogs.chapman.edu/business/feed" number_items="50" display_description="true" display_date="true" title="RSS Feed"]'.'</code>', 'js_composer' )),
						),
			);
		}


		/**
		* Shortcode output
		*
		*/
		public static function output( $atts, $content = null ) {

			extract(
				shortcode_atts(
					array(
						'bgimg' => 'bgimg',
						'title'   => '',
						'url' => '',
						'number_items' => '',
						'display_description' => '',
						'display_date' => '',
						'dropdown_feed' => '',
					),
					$atts
				)
			);

    

			echo "<div class='rss-carousel-relative-wrapper container'>";
			echo "<div class='rss-carousel-flex-wrapper'>";
			echo '<h2 class="rss-carousel-outer-title">' . $title . '</h2>';
			echo "<div class='rss-carousel-actions'><div class='gridlove-slider-controls'><div class='owl-prev' style='' tabindex='0' aria-label='scroll previous'><i class='fa fa-chevron-left'></i></div><div class='owl-next' style='' tabindex='0' aria-label='scroll next'><i class='fa fa-chevron-right'></i></div></div></div>";
			echo "</div>";
			echo "<div class='cu-rss-feed__outer-wrapper owl-carousel row'>";
			
			if (empty($url)){ 
				$url = $dropdown_feed;
			};

			if ($display_description == 'true'){ 
				$display_flex_class = "display-flex";
			}
			else {
				$display_flex_class = "no-description";
			};

			if ($display_date == 'true'){ 
				$display_date_class = "display-date";
			}
			else { 
				$display_date_class = "no-date";
			};

      


			$feed = fetch_feed("$url");

			if( ! is_wp_error( $feed ) ) {
			if(function_exists("fetch_feed")) {
				
				include_once(ABSPATH.WPINC."/feed.php");
				$feed = fetch_feed("$url");
				$limit = $feed->get_item_quantity($number_items); // specify number of items
				$items = $feed->get_items(0, $limit); // create an array of items
			 
		
			}

			 }



			 if ($limit == 0) echo "<div>The feed is either empty or unavailable.</div>";
			

      
			 
			 else foreach ($items as $item) : 

      
        if ($enclosure = $item->get_enclosure())
        {
          if ($enclosure->get_link() != ''){
            $img_src = $enclosure->get_link();

          }
          else {
          $img_src = $enclosure->get_thumbnail() ;
        }
          $bgImage = 'background-image: url(' . $img_src .'); background-position:center center;';
          $color_filter = "";
          
					}

					if (empty($img_src)){ 
          //  $img_src = get_first_image_url($item->get_content());
          //  $bgImage = 'background-image: url(' . $img_src .')';
           $bgImage = 'background-image: url(https://www.chapman.edu/_assets/homepage/undergrad-admissions.webp)';
						$color_filter = "grayscale";
					 };
	
        

           

				echo "<a style='$bgImage' class='$color_filter cu-rss-feed__article-wrapper $display_flex_class $display_date_class' href='". $item->get_permalink() ."'>";
				echo "<span class='overlay'></span>";
				echo "<article class='cu-rss-feed'>";
				echo "<div class='cu-rss-feed__inner'>";
				echo "<h2>".$item->get_title()."</h2>";
				if ($display_description == 'true'){ 
					echo "<p class='cu-rss-inner__p'>".wp_strip_all_tags(substr($item->get_description(), 0, 200))."</p>";
				};
				if ($display_date == 'true'){ 
					echo  "<p class='cu-rss-inner__date'>".$item->get_date('F j, Y')."<p>";	
				};
				echo "</div>";
				echo "</article>";
				echo "</a>";

			endforeach;
			echo "</div>";
			echo "</div>";


		}

	}

}
new rssCarousel;