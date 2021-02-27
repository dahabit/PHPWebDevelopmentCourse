<?php  
$attributes = array('class' => '', 'id' => 'function_search_form');
echo form_open('search/result', $attributes); ?>

<div><input type="text" name="search" id="search"
	size="40" title="بحث" maxlength="255" dir="rtl" value="<?php echo set_value('search'); ?>"  /> <br />
<br />
<input name="submit" type="submit" id="submit" value="بحث">
<div id="autocomplete_choices" class="autocomplete"></div>
</div>
<?php echo form_close(); ?>
<p>
<?php echo form_error('search'); ?>
