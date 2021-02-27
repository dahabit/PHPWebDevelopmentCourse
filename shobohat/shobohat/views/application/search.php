<?php
$this->load->view("header");
?>
    <h2><?php echo $title;?></h2>

    <div id="function_description"> 
	<?php echo $search_results;?>
	</div>

<?php
$this->load->view("footer");
?>