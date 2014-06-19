<?php if( strpos(get_the_content(), '<span id="more-') ) : ?>
  <div class="before-more">
  <?php global $more; $more=0; the_content(''); $more=1; ?>
  </div>
<?php endif; ?>     
<?php the_content('', true); ?>