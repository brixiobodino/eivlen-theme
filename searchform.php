




<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="field has-addons">
  <div class="control is-expanded">
    <input type="search" class="search-field input" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'eivlen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
  </div>
  <div class="control">
    <button type="submit" class="search-submit button is-info"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'eivlen' ); ?></span>Search</button>
  </div>
</div>
</form>