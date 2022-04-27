<?php get_header(); ?>
    <style>
        .wp-pagenavi span, .wp-pagenavi a {
            text-decoration: none;
            border: 1px solid #BFBFBF;
            padding: 3px 5px;
            margin: 2px;
        }
        .wp-pagenavi .current{
            font-weight: bold;;
        }
        .wp-pagenavi a:hover, .wp-pagenavi span.current {
            border-color: #000;
          }
    </style>
    <div class="bg_ttl bg_ttl_service">
         <div class="site_wrapper">
             <h1 class="ja">MiRAKUUバックナンバー</h1>
             <h1 class="en">BACKNUMBER</h1>
         </div>
     </div>
     <p>　</p>
     <p>　</p>
     <p>　</p>

         <?php
               $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
               $showposts = 12;
               $args = [
                    'post_type'  => 'mirakuu',
                    'numberposts' => $showposts,
                    'paged'      => $paged,
                    'meta_key'=> 'volid',
                    'orderby' =>'meta_value_num',
                    'order' => 'DESC',

               ];

               $posts = get_posts($args);
               // echo "<pre>"; var_dump($posts); die();
               $total_posts_count = wp_count_posts('mirakuu');
               $total_posts = $total_posts_count->publish;
               $total_pages = ceil($total_posts / $showposts);
         ?>
        <?php if ($posts) : ?>
        <div class="site_wrapper sp_indent15_lr" id="backnumber">
          <ul class="col_3_sp_2 fix">
            <?php foreach($posts as $post): ?>
                <li class="matchHeight relative">
                    <a href="https://www.mirakuupremium.com/mirakuu/mirakuu<?php echo the_field('volid'); ?>" target="_blank">
                        <?php // echo "<pre>"; var_dump($post);?>
                        <div class="fix col_1_1">
                            <div class="left_area">
                                <figure><img width="233" height="330" src="<?php echo the_field('image_left'); ?>" class="attachment-large size-large" alt="" loading="lazy" /></figure>
                            </div>
                            <div class="right_area">
                                <figure><img width="233" height="330" src="<?php echo the_field('image_right'); ?>" class="attachment-large size-large" alt="" loading="lazy" /></figure>
                            </div>
                          </div>
                          <div class="box_text">
                              <p class="f_20 f_bold f_green mb10">
                                MiRAKUU Vol.<?php echo the_field('volid'); ?> </p>
                              <p class="mb10"><?php echo the_field('date'); ?></p>
                              <?php
                                  $category_terms = wp_get_object_terms( $post->ID,  'category' );

                                  if ( ! empty( $category_terms ) ) {
                                      if ( ! is_wp_error( $category_terms ) ) {
                                              foreach( $category_terms as $term ) {
                                                  echo '<p class="f_bold">'.$term->name.'</p>';
                                              }
                                      }
                                  }
                              ?>
                              <div class="f_12">
                                  <?php echo the_field('mirakuu_content'); ?>
                              </div>
                          </div>
                    </a>
                </li>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
       <?php else : ?>
          <p><?php __('No Post'); ?></p>
       <?php endif; ?>

        <div class="mb50 fix">
            <?php if($total_pages > 1 ) : ?>
                <div class='wp-pagenavi' role='navigation'>
                    <span class='pages'><?php echo "$paged / $total_pages" ?></span>
                    <?php if($paged > 1) : ?>
                        <a href="<?php echo '?paged=' . ($paged -1); ?>">&laquo;</a>
                    <?php endif ?>
                    <?php for($i=1; $i<=$total_pages; $i++) : ?>
                        <?php if ($paged == $i) : ?>
                            <span aria-current='page' class='current'><?php echo $i; ?></span>
                        <?php else : ?>
                            <a class="page larger inactive"  href="<?php echo '?paged=' . $i; ?>"><?php echo $i;?></a>
                        <?php endif ?>
                    <?php endfor ?>
                    <?php if ($paged < $total_pages) : ?>
                        <a aria-label="Next Page"  href="<?php echo '?paged=' . ($paged + 1); ?>">&raquo;</a>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </div>
    </div>


     <div class="bg_contact">
         <div class="site_wrapper indent_content">

             <div class="fix col_2">

               <div class="right_area">
                 <div class="pc_w_80">
                   <div class="t_center">
                     <h2 class="ttl_04 f_42">お問い合わせ</h2>
                   </div>
                   <p class="t_center con_tel_box"></p>
                   <div class="mail_side t_center"><a href="<?php echo site_url('/contact'); ?>">
                       <p class="ls_2">ネットからのお問い合わせ</p>
                       <p class="f_26 f_bold ls_2">CONTACT FORM</p>
                     </a></div>
                   <p class="t_right ls_2 mb30">受付時間8:30～17:30（土日祝定休）</p>
                 </div>
               </div>
             </div>
       </div>
   </div>             <!-- brandsIntro -->
   <div id="brandsIntro">
       <div class="container">
           <ul class="row brandBox">
               <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="//www.kosodatedays.com/" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_kosodatedays.png" alt="こそだてDAYS" class="img-responsive"></a>
               </li>
               <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="//www.okoranai.com/" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_shimazu.png" alt="怒らない伝道師" class="img-responsive"></a>
               </li>
               <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="//www.wel.ne.jp/doc/feature/koudan/index.html" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_orine.png" alt="女流講談師" class="img-responsive"></a>
               </li>
               <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="//www.wel.ne.jp/" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_wel.png" alt="ウェル" class="img-responsive"></a>
               </li>
               <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="https://www.jinriki.info/" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_jinriki.png" alt="人力" class="img-responsive"></a>
               </li>
               <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="https://www.mukashi.info/" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_mukashi.png" alt="昔話絵巻" class="img-responsive"></a>
               </li>
               <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="http://www.miraiku.co.jp/" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_mirakuu.png" alt="MiRAKUU" class="img-responsive"></a>
               </li>
                 <li class="col-xs-6 col-sm-3 col-md-15">
                   <a href="http://ehondanshi.com/" target="_blank"><img src="https://www.evoinf.co.jp/assets/img/brand_ehondanshi.png" alt="絵本男子" class="img-responsive"></a>
               </li>
             </ul>
           <p class="footerCopy">Evolved Information 進化した情報の提供</p>
       </div>
   </div>
   <!-- //brandsIntro -->
<?php get_footer(); ?>
