<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<?php
				$song_count = 5678;
		?>

		
		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			I love music.
			I have <?=$song_count?> total songs,
			which is over <?= (int) $song_count/10?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
		
			<ol>
					<?php
					$news_pages =$_GET["newspages"] ;
					if ($news_pages==0){
							$news_pages =5;
					}?>
					<?php for ($i=0; $i <$news_pages ; $i++) { ?>
						<li><a href="https://www.billboard.com/archive/article/2019<?= sprintf("%02d",11-$i)?>">2019-<?=  sprintf("%02d",11-$i)?></a></li>
					<?php }?>
			   
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
			<?php
				$favorite_artists = file("favorite.txt");
				for ($i =0; $i<count($favorite_artists);$i++){				
			?>
			<li><a href="http://en.wikipedia.org/wiki/<?=$favorite_artists[$i]?>"><?=$favorite_artists[$i]?></a></li>
				<?php }?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
			<?php
					$music_list = glob("lab5/musicPHP/songs/*.mp3");
					$music_list_key_by_size = array();
					foreach ($music_list as $value) {
						$music_list_key_by_size[filesize($value)] = $value;
					}
					krsort($music_list_key_by_size);
					foreach ($music_list_key_by_size as $value) {
				?>
				<li class="mp3item">
					<a href="<?= $value?>"><?= explode("/",$value)[3]?></a>
					(<?= (int)(filesize($value)/1024)?> KB)
				</li>
				
			
				<?php }?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php 
					$play_list = glob("lab5/musicPHP/songs/*.m3u");
					rsort($play_list);
					foreach ($play_list as $value) {
				?>
				
				<li class="playlistitem"><?=explode("/",$value)[3]?>:
					<ul>
					<?php $pl_list = file("$value");
					shuffle($pl_list);
					foreach ($pl_list as $value) {
						if(!(strpos($value,"#")===0)){
					?>
						<li><?= $value?></li>
					<?php }}?>
					</ul>
				</li>
				<?php }?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>