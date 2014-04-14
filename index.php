<?php

$screens = glob("screens/thumbs/*.png");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ScreenTrack</title>

	<!-- Bootstrap -->
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/st.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<section id="control-bar-region">hi</section>
	<section id="screenshots-region">there</section>



	<div class="shots"></div>

	<!-- LIBRARIES -->
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="bower_components/momentjs/moment.js"></script>
	<script src="bower_components/underscore/underscore.js"></script>
	<script src="bower_components/backbone/backbone.js"></script>
	<!--
	<script src="bower_components/backbone.babysitter/lib/backbone.babysitter.js"></script>
	<script src="bower_components/backbone.wreqr/lib/backbone.wreqr.js"></script>
-->
	<script src="bower_components/marionette/lib/backbone.marionette.js"></script>


	<!-- APP CODE -->
	<!-- MODELS / COLLECTIONS / VIEWS -->
	<script src="js/app.js"></script>
	<script src="js/models/screenshot.js"></script>
	<script src="js/views/screenshot.js"></script>
	<script>
		$(function(){
			//ST.init(<?php echo json_encode($screens); ?>);
			ST.start({
				imgs: <?php echo json_encode($screens); ?>
			});
		});
	</script>

	<!-- templates -->
	<!-- Modal -->
	<div class="modal fade" id="image-zoom" tabindex="-1" role="dialog" aria-labelledby="image zoom modal" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!--
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			-->
			<div class="modal-body">
				<span class="spinner"><i class="icon-spin icon-refresh"></i></span>
				<span class="glyphicon glyphicon-refresh glyphicon-spin"></span>
			</div>
		</div>
	  </div>
	</div>
	<!-- end Modal -->

	<script type="text/template" id="screenshot-view">
		<img src="<%= src %>" title="<%= moment.calendar() %>" />
	</script>

	<script type="text/template" id="screenshot-group-view">
		<header><%= label %></header>
		<section class="shots"></section>
	</script>



</body>
</html>