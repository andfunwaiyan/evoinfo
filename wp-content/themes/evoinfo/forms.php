<?php /* Template Name: forms */ ?>
<?php get_header(); ?>
  <div>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <nav id="bc">
              <nav id="bc">
                  <div class="container">
                      <ol class="breadcrumb">
                          <li><a href="/">HOME</a></li>
                          <li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
                          <li class="active"><?php the_title(); ?></li>
                      </ol>
                  </div>
              </nav>
          </nav>
          <div class="pageVisualWrapper visualContact">
              <div class="container">
                  <h1>Contact</h1>
                  <p><?php the_title(); ?></p>
              </div>
          </div>
          <section class="contactWrapper">
            <div class="container">
                <div class="col-xs-12 evo_input">
					          <h2><?php the_title(); ?></h2>
                    <hr class="hrWhite" />
                    <p class="lead pCenter">下記フォームに必要事項を入力の上送信してください。</p>
                    <p class="pCenter">お問い合わせ頂いた内容につきましては、後ほど、担当者よりご連絡をさせていただきます。      <br>なお、お問い合わせいただいた内容によっては、ご連絡までお時間がかかるものがございます。<br>あらかじめご了承ください。</p>
                     <?php the_content(); ?>
                </div>
				        <div class="col-xs-12 evo_output">
                    <h2><?php the_title(); ?> &nbsp;&nbsp;送信完了</h2>
                    <hr class="hrWhite" />
                    <p class="lead pCenter">お問い合わせ頂きありがとうございます。</p>
                    <p class="pCenter">後ほど、担当者よりご連絡をさせていただきます。<br>今しばらくお待ちくださいますようよろしくお願い申し上げます。<br><br>
                    なお、お問い合わせいただいた内容によっては、ご連絡までお時間がかかるものがございます。予めご了承ください。</p>
                </div>
            </div>
          </section>
          <!--office -->
          <section id="office">
              <div class="container">
                  <h2>地図</h2>
                  <div class="row">
                      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                          <div id="maparea3" class="officeMap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.3563548088227!2d139.75475361454784!3d35.66822653829389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bebfa08873b%3A0xbf073f6f3983fab0!2z44CSMTA1LTAwMDQg5p2x5Lqs6YO95riv5Yy65paw5qmL77yR5LiB55uu77yR77yW4oiS77yUIOOCiuOBneOBquaWsOapi-ODk-ODqw!5e0!3m2!1sja!2sjp!4v1644797255606!5m2!1sja!2sjp" width="565" height="240" frameborder="0" style="border:0" allowfullscree></iframe></div>
                          <p>TEL: 03-5537-7437<br>FAX: 03-5537-7435</p>
                      </div>
                  </div>
              </div>
          </section>


          <!--//office -->
          <!-- brandsIntro -->
          <div id="brandsIntro">
              <div class="container">
                  <ul class="row brandBox">
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="//www.kosodatedays.com/" target="_blank"><img src="/assets/img/brand_kosodatedays.png" alt="こそだてDAYS" class="img-responsive"></a>
                      </li>
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="//www.okoranai.com/" target="_blank"><img src="/assets/img/brand_shimazu.png" alt="怒らない伝道師" class="img-responsive"></a>
                      </li>
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="//www.wel.ne.jp/doc/feature/koudan/index.html" target="_blank"><img src="/assets/img/brand_orine.png" alt="女流講談師" class="img-responsive"></a>
                      </li>
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="//www.wel.ne.jp/" target="_blank"><img src="/assets/img/brand_wel.png" alt="ウェル" class="img-responsive"></a>
                      </li>
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="//www.jinriki.info/" target="_blank"><img src="/assets/img/brand_jinriki.png" alt="人力" class="img-responsive"></a>
                      </li>
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="//www.mukashi.info/" target="_blank"><img src="/assets/img/brand_mukashi.png" alt="昔話絵巻" class="img-responsive"></a>
                      </li>
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="http://www.miraiku.co.jp/" target="_blank"><img src="/assets/img/brand_mirakuu.png" alt="MiRAKUU" class="img-responsive"></a>
                      </li>
                      <li class="col-xs-6 col-sm-3 col-md-15">
                          <a href="http://ehondanshi.com/" target="_blank"><img src="/assets/img/brand_ehondanshi.png" alt="絵本男子" class="img-responsive"></a>
                      </li>
                  </ul>
                  <p class="footerCopy">Evolved Information 進化した情報の提供</p>
              </div>
          </div>
          <!-- //brandsIntro -->

      <?php endwhile; ?>
      <?php endif; ?>
  </div>
<?php get_footer(); ?>
<script>
     $(document).ready(function() {
          $('.evo_output').hide();
     });
	  document.addEventListener( 'wpcf7mailsent', function( event ) {
		  document.querySelectorAll("form.wpcf7-form > :not(.wpcf7-response-output)").forEach(el => {
				 $('.evo_input').hide();
				 $('.evo_output').show();
				 $('#office').hide();

			});
	  }, false );
	
	setInterval(add_date, 1000);    
    function add_date() {   
		var today = new Date();
		var yyyy = today.getFullYear();
		var mm = String(today.getMonth() + 1).padStart(2, '0');
		var dd = String(today.getDate()).padStart(2, '0');
		var date = yyyy + '/' + mm + '/' + dd;
		//var date = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
		var H = String(today.getHours()).padStart(2, '0');
		var i = String(today.getMinutes()).padStart(2, '0');
		var s = String(today.getSeconds()).padStart(2, '0');
		//var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
		var time = H + ':' + i + ':' + s;
		var dateTime = date+' '+time;
		jQuery('input#submissiondate').val(dateTime); 
	}
	
	
</script>

