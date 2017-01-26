		      <!-- This is launched by get_search_form(); in header.php 
				   Helpful:
				   https://cybmeta.com/como-anadir-filtros-de-busqueda-a-wordpress
				   https://codex.wordpress.org/Creating_a_Search_Page
		      -->

		      <form class="search-form navbar-form navbar-right" role="search" method="get"  action="<?php echo home_url( '/' ); ?>">
		        <div class="form-group">
		          <input type="search" class=" search-field form-control" placeholder="<?php echo esc_attr_x( 'Zer aurkitu nahi dezu?', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
		        </div>  
		        <button type="submit" class="search-submit btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">Bilatu</button>
		      </form>