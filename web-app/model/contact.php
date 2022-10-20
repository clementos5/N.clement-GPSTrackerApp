<?php
	function ViewSiteComment(){
		global $link;
		$allComments 	     =	mysqli_query($link, 'SELECT * FROM contact ORDER BY id DESC');
		return $allComments;
}
?>