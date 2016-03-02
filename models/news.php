<?php
		class News 
	{
		public static function 	getNewsItemById($id)
		{
			
			$db = Db::getDb();
			$sql = "SELECT * FROM `rublica` WHERE id IN(".$id.")";
			$res = mysqli_query($db,$sql);
			$newsItem = mysqli_fetch_assoc($res);
			
			return $newsItem;
		}
		public static function getNewsList()
		{
			$db = Db::getDb();
			$sql = "SELECT * FROM  `rublica` LIMIT 10";
			$res = mysqli_query($db,$sql);
			while($row = mysqli_fetch_assoc($res)) {
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['name'] = $row['name'];
				$newsList[$i]['text'] = $row['text'];
				$newsList[$i]['content'] = $row['content'];
				$i++;
			}
			return $newsList;
			
		}
		
	}