<!DOCTYPE html>
<html>
<head>
	<title></title>
<link href='../assets/fullcalendar.css' rel='stylesheet' />
<link href='../assets/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../assets/lib/moment.min.js'></script>
<script src='../assets/lib/jquery.min.js'></script>
<script src='../assets/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2015-09-24',
			editable: false,
			eventLimit: true,
       // allow "more" link when too many events
			events: {
        url: 'get-events.php'
        },
      eventClick: function(calEvent, jsEvent, view) {
        //alert('Event id: ' + calEvent.id);
        window.open('viewevent.php?eventid='+calEvent.id,'_blank');

    }
		});
		
	});

</script>
<style>

	body 
  {
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
    background-color: #eee;
	}

	#calendar 
  {
		max-width: 900px;
		margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 3px;
	}
</style>
</head>
<body>
<div id="calendar"></div>
</body>
</html>