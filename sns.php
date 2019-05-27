<?php
/**
 * MonochromeのSNSボタン.
 *
 * 投稿ページの関連記事の直後に置く.
 *
 * @package WordPress
 * @subpackage Monochrome
 */

?>

<?php
$url_encode   = urlencode( get_permalink() );
$title_encode = urlencode( get_the_title() ) . '｜' . get_bloginfo( 'name' );
?>

<div class="sns-share">
  <ul>
	<!--Facebook-->
	<li class="facebook">
	  <a href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode; ?>&t=<?php echo $title_encode; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
		<i class="fab fa-facebook-f"></i><span> Facebook</span>
	  </a>
	</li>
	<!--Twitter-->
	<li class="tweet">
	  <a href="//twitter.com/intent/tweet?url=<?php echo $url_encode; ?>&text=<?php echo $title_encode; ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
		<i class="fab fa-twitter"></i><span> Twitter</span>
	  </a>
	</li>
	<!--Pocket-->
	<li class="pocket">
	  <a href="https://getpocket.com/save" class="pocket-btn" data-lang="en" data-save-url="<?php get_permalink(); ?>" data-pocket-count="vertical" data-pocket-align="left" >
		<i class="fab fa-get-pocket"></i><span> Pocket</span>
	  </a>
	</li>
	<!--はてなブックマーク-->
	<li class="hatena">
	  <a href="//b.hatena.ne.jp/entry/<?php echo $url_encode; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;">
		<i class="fa fa-hatena"></i><span> はてブ</span>
	 </a>
	</li>
  </ul>
</div>
