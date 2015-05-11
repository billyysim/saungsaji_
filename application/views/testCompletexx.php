<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Auto Suggesstion Demo</title>
  <!-- we need jquery library and jquery ui library and jquery css to run this sciprt-->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	<script>
	$(document).ready(function(){
		$( "#suggestionbox" ).autocomplete({
			source: "<?=$base?>/index.php/home/suggestions"  
		});
	})
	</script>
</head>
<body>
<div class="ui-widget">
  <label for="suggestionbox">Keyword: </label>
  <input id="suggestionbox"  />
</div>
</body>
</html>