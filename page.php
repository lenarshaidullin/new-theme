<?php

if(! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

?>

<div class="section">
  <div class="container">
  	<h1><?php the_title(); ?></h1>
	  <div class=""><?php the_content(); ?></div>
  </div>
</div>

<?php

get_footer();

?>
