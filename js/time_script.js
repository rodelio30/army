(function() {
'use strict';

document.addEventListener('DOMContentLoaded',function(){
		var c = document.getElementById('current-time');
		
		setInterval(updateTime, 1000);
		
		function updateTime() {
			var d = new Date ();
				document.getElementById("dates").innerHTML=d.toDateString();
			var hours= d.getHours(),
				minutes= d.getMinutes(),
				ampm ='AM';
			if(hours > 12) {
				hours = hours -12;
				ampm = "PM";
			} else if (hours == 0) {
				hours= 12;
			}
			if (minutes<10) {
				minutes= '0' + minutes;
			}
			
			var sep=':';
			if ( d.getSeconds() % 2 == 1) {
				sep = ' ';
			}
			
		c.innerHTML = hours + sep + d.getMinutes() + ' ' + d.getSeconds() +' ' + ampm;;
		}
});

})();