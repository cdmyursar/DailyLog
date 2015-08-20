<style>
.clockStyle {
	background-color:transparent;
	font-family:"Arial Black", Gadget, sans-serif;
        font-size:45px;
        font-weight:bold;
	letter-spacing: 2px;
        text-align: center;
        width:100%;
        color:white;
}
</style>
<div id="clockDisplay" class="clockStyle centered"></div>
<script>
function renderTime() {
	var currentTime = new Date();
	var diem = "AM";
	var h = currentTime.getHours();
	var m = currentTime.getMinutes();
    var s = currentTime.getSeconds();
	setTimeout('renderTime()',1000);
    if (h == 0) {
		h = 12;
	} else if (h > 12) { 
		h = h - 12;
		diem="PM";
	}
	if (h < 10) {
		h = "0" + h;
	}
	if (m < 10) {
		m = "0" + m;
	}
	
    var myClock = document.getElementById('clockDisplay');
	myClock.textContent = h + ":" + m + " " + diem;
	myClock.innerText = h + ":" + m + " " + diem;
}
renderTime();
</script>   