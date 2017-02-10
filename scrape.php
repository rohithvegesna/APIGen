<?php
// URL location of your feed
$feedUrl = "http://feeds.feedburner.com/NDTV-LatestNews/?feed=xml"; $feedContent = "";

// Fetch feed from URL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $feedUrl);
curl_setopt($curl, CURLOPT_TIMEOUT, 3);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

// FeedBurner requires a proper USER-AGENT...
curl_setopt($curl, CURL_HTTP_VERSION_1_1, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip, deflate");
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3");

$feedContent = curl_exec($curl);
curl_close($curl);

// Did we get feed content?
if($feedContent && !empty($feedContent)){
	$feedXml = @simplexml_load_string($feedContent);
		if($feedXml){
			foreach($feedXml->channel->item as $item){
				$conn = mysqli_connect('localhost','root','sazx2356', 'news');
				$db   = $conn;
				$time = time();
				$id = $item->guid;
				$title = $item->title;
				$link = $item->link;
				$date = $item->pubDate;
				$img = $item->StoryImage;
				$cat = $item->category;
				$des = $item->description;
				$sql = "CREATE TABLE IF NOT EXISTS news ( ID INT NOT NULL AUTO_INCREMENT, Guid TEXT, Title TEXT, Link TEXT, Pubdate TEXT, Storyimage TEXT, Cat TEXT, Des TEXT, Doe TEXT, PRIMARY KEY (ID) )";
				$qury = mysqli_query($conn, $sql);
				if(!$qury) echo "Database Error<br />";

				$sql = "INSERT into news (`Guid`, `Title`, `Link`, `Pubdate`, `Storyimage`, `Cat`, `Des`, `Doe`) VALUES ('$id', '$title', '$link', '$date', '$img', '$cat', '$des', '$time')";
				$qury = mysqli_query($conn, $sql);
				if(!$qury) echo "Database Error<br />";
				mysqli_close( $conn );
			}
		}
	}
?>