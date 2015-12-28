<?php	foreach ($_POST as $key => $value) {$$key = $value;} ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Youtube Downloader</title>
</head>
<body>


	<form action="index.php" method="post">
	Video Url = <input style="width: 500px;" type="text" name="video_link" value="<?php if(isset($video_link)){echo $video_link;}?>">
	<input type="submit" value="Check Available Dowloads">
	</form>

	Right Click - Save link as to Download video with proper filename.
	<br><br>

	<?php

		if(isset($video_link)){
			https://www.youtube.com/watch?v=bMZo3SBrLUU
			$code = str_replace("https://www.youtube.com/watch?v=","",$video_link);

			$video_info = file_get_contents("https://www.youtube.com/get_video_info?video_id={$code}");
			parse_str($video_info);
			echo "Name : ".$title;
			echo "<br>Available Downloads are:<br><br>";
			$videos = explode(',',$url_encoded_fmt_stream_map);

			foreach ($videos as $video){
				parse_str($video,$video_array);
				if(strstr($video_array['type'],';',true) !== false)
					$parsedtype = strstr($video_array['type'],';',true);
				else $parsedtype = $video_array['type'];
				echo "Type: {$parsedtype}<br>Qualtiy = {$video_array['quality']}<br><a href=\"{$video_array['url']}\" download=\"{$title}_{$parsedtype}_{$video_array['quality']}\">{$title}_{$parsedtype}_{$video_array['quality']}</a>";
				echo "<br><br>";
			}
		}

	?>
	
</body>
</html>
