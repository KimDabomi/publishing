<div id="kboard-default-latest" style="display: flex; flex-wrap:nowrap; width: 80%; margin:auto;">
	<div class="notice_title" style="
		border:2px solid #a18ed7;
		border-radius: 20px;
		background-color: #e4cbf6;
		text-align: center;
		width: 85%;
		height:200px;
		margin-right: 2%;
		padding-top: 50px;
		font-size: 36px;
		font-weight: bold;
		color: black;
	">공지사항<br />
	<a href="https://xn--bp2b020c.com/notice" aria-label="go_notice" style="font-size: 20px; text-decoration:underline; color: black;">더보기 &#10095;</a></div>
	<div class="swiper mySwiper" style="padding:0; margin:0;">
		<div class="swiper-wrapper" style="width:75%;">
			<?php while($content = $list->hasNext()):?>
				<div class="swiper-slide" style="
					border:2px solid #a18ed7; border-radius: 20px; background-color: #e4cbf6; text-align: center; width: 33%; height: 150px; padding-top: 50px; ">
					<a href="https://xn--bp2b020c.com/notice" aria-label="go_notice" style="color: black;">
					<h4 style="margin-bottom: 40px;"><?php echo $content->title?></h4></a>

					<a href="https://xn--bp2b020c.com/notice" aria-label="go_notice" style="color: black;"><p><?php echo $content->content?></p></a>
				</div>
				<!-- <?php echo print_r($content) ?> -->
			<?php endwhile?>		
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 20,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
</script> 