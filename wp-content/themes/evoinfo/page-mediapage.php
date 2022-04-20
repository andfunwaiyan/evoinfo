<?php get_header(); ?>
  <section class="bg_green_round">
      <div class="site_wrapper indent_content">
       <!--//globalNav-->
       <div class="fix col_2 mb40">

           <div class="left_area sp_mb15">
               <div class="line_dot">
                   <p class="f_green">OurService 01</p>
                   <p class="f_32 f_bold ls_2 f_green">MiRAKUU</p>
               </div>
               <p class="f_20 f_bold mb15">保育園・幼稚園の魅力が満載の専門誌＆情報サイト</p>
               <p class="lh_2 mb15">1都3県にある保育園・幼稚園約12,000施設に配布している業界誌です。<br>
                   保育科のある専門学校にも配布しています。<br>
                   イケメン俳優の1日保育士体験・著名人との対談・保育園・幼稚園取材・先生に役立つ記事・保育を支えている企業の紹介など様々な情報を園向けに発信しています。<br>
                   また、保育園・幼稚園の園長先生へ貴社の商品やサービスを広告や記事を用いてPRすることが出来ます。
               </p>
               <p class="seminar_btn t_right"><a href="/media/mirakuu.php" class="f_green">MORE
                       →</a></p>
           </div>
           <div class="right_area">
               <p><img src="wp-content/themes/template03/img/top/img_03.jpg" alt="MiRAKUU"></p>
           </div>
       </div>
       <div class="mb80">
           <ul class="col_4 fix mb10" id="backnumber">
              <?php
                  $the_query = new WP_Query( [
                     'post_type' => 'mirakuu',
                      'posts_per_page' => 4,
                   ]);
              ?>
              <?php if ( $the_query->have_posts()) : ?>
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                      <li class="matchHeight">
                          <a href="https://www.mirakuupremium.com/mirakuu/mirakuu<?php echo get_field('volid'); ?>" target="_blank">
                                <div class="fix col_1_1 mb20">
                                    <div class="left_area">
                                        <figure><img width="233" height="330" src="/media/wp-content/uploads/MIRAIKU_vol<?php echo get_field('volid'); ?>.jpg" class="attachment-large size-large" alt="" loading="lazy" /></figure>
                                    </div>
                                    <div class="right_area">
                                        <figure><img width="233" height="330" src="/media/wp-content/uploads/MIRAIKU_vol<?php echo get_field('volid'); ?>-guest.jpg" class="attachment-large size-large" alt="" loading="lazy" /></figure>
                                    </div>
                                </div>
                                <p class="f_20 f_bold f_green mb10">
                                    MiRAKUU Vol.<?php echo get_field('volid'); ?> </p>
                                <p class="mb10"><?php echo get_field('date'); ?></p>
                                <p class="f_bold"> <?php the_taxonomies(); ?></p>
                                <div class="f_12">
                                    <?php echo get_field('content'); ?>
                                </div>
                          </a>
                      </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
              <?php else : ?>
                  <p><?php __('No Post'); ?></p>
              <?php endif; ?>

           </ul>

           <p class="btn_01"><a href="content">MiRAKUUバックナンバー 一覧</a></p>
       </div>


       <div class="fix col_2 mb80">
           <div class="right_area sp_mb15">
               <div class="line_dot">
                   <p class="f_green">OurService 02</p>
                   <p class="f_32 f_bold ls_2 f_green">MiRAKUUぷれみあむ</p>
               </div>
               <p class="f_20 f_bold ls_1 mb15">保育園経営者向けポータルサイト</p>
               <p class="lh_2 mb15">
                   保育業界は企業からの情報が届きづらく、商品・サービスに目を向ける機会がなかなかありません。しかし、団体・企業を積極的に活用することで園の煩雑な業務が軽減され、保育士が子どもに向き合う時間が増え、結果として保育の質の向上につながります。
                   保育業界全体の質の向上のために、保育園、幼稚園を運営・経営している園長、施設長の「欲しい！」を集めました。</p>
               <p class="seminar_btn t_right"><a href="/media/mirakuu.php#premium" class="f_green">MORE→</a></p>
           </div>
           <div class="left_area">
               <p><img src="/media/wp-content/themes/template03/img/top/img_04.jpg?12" alt=""></p>
           </div>
       </div>
       <div class="fix col_2 mb80">
           <div class="right_area sp_mb15">
               <div class="line_dot">
                   <p class="f_green">OurService 03</p>
                   <p class="f_32 f_bold ls_2 f_green">絵本男子</p>
               </div>
               <p class="f_20 f_bold ls_1 mb15">イケメン絵本男子の読み聞かせ＆手遊び</p>
               <p class="lh_2 mb15">公式サイトでの動画配信をはじめ、各地に絵本男子が出張して、店舗やショッピングセンターでのイベント企画を行います。
                   また、企業とのコラボレーションや企業様の想いを込めたオリジナル絵本を企画・制作し、絵本男子の読み聞かせ動画配信＆リアルイベントや保育園・幼稚園へのキャラバン活動で子どもたちに直接配布しています。
               </p>
               <p class="seminar_btn t_right"><a href="ehondanshi.php" class="f_green">MORE→</a></p>
           </div>
           <div class="left_area">
               <p><img src="/media/wp-content/themes/template03/img/top/img_02.jpg" alt=""></p>
           </div>
       </div>
      </div>
      </section>


    <div class="bg_contact">
   <div class="site_wrapper indent_content">

     <div class="fix col_2">

       <div class="right_area">
         <div class="pc_w_80">
           <div class="t_center">
             <h2 class="ttl_04 f_42">お問い合わせ</h2>
           </div>
           <p class="t_center con_tel_box"></p>
           <div class="mail_side t_center"><a href="https://www.evoinf.co.jp/contact.php">
               <p class="ls_2">ネットからのお問い合わせ</p>
               <p class="f_26 f_bold ls_2">CONTACT FORM</p>
             </a></div>
           <p class="t_right ls_2 mb30">受付時間8:30～17:30（土日祝定休）</p>
         </div>
       </div>
     </div>
   </div>
 </div>            	<!-- brandsIntro -->
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
