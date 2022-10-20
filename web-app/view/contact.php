<?php
include 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Comments</h1>
        </div>
    </div>
   <?php
   		if(isset($no_comment) AND $no_comment == true){
   			echo '<center> No comment found. </center>';

   		}
   		else{
   			include 'includes/forms/allContact.php';
   		}
echo '</div>';
include 'includes/footer.php';
   ?>