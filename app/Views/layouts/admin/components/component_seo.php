<?php
if(!isset($row)){
	$row = null;
}
$data = array('row' => $row);
?>
<?php echo get_components_admin('input_h1_seo', $data); ?>
<?php echo get_components_admin('input_title_seo', $data); ?>
<?php echo get_components_admin('textarea_description', $data); ?>
<?php echo get_components_admin('textarea_keywords', $data); ?>
<?php echo get_components_admin('textarea_other_seo', $data); ?>