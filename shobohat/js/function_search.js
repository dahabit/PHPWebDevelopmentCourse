window.onload = function () {
	new Ajax.Autocompleter("search", "autocomplete_choices", base_url+"index.php/search/ajaxsearch/", {});	
}