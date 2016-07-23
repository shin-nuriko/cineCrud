const MAX_ITEMS_DISPLAY = 6;
const RELOAD_INTERVAL = 10000;
const BASE_IMAGE_URL = 'http://localhost/Sites/_ci/cineCrud//images/';
const SOURCE_FOR_UPDATES = 'http://localhost/Sites/_ci/cineCrud/index.php/display/getDisplayJson' 


var getCountData = function() {
	var ctr = 0;
	var orig_list = $("#origlist").text();
  	ctrlist = JSON.parse(orig_list);
  	ctr = (ctrlist.length < MAX_ITEMS_DISPLAY) ? ctrlist.length : MAX_ITEMS_DISPLAY;
  	return (ctr);
}

var checkForUpdate = function() {
	var orig_list = $("#origlist").text();
	original = JSON.parse(orig_list);
 	$.get(SOURCE_FOR_UPDATES, function(data, status){
 			newlist = data;
            origlist = JSON.parse(orig_list);

            for (i = 0; i < getCountData(); i++) {
	            if ( newlist[i].id != original[i].id || 
	            	 newlist[i].title != original[i].title ||
	            	 newlist[i].poster != original[i].poster || 
	            	 newlist[i].description != original[i].description )
	            {
	            	//update local copies
					$("#hiddenlist").text(JSON.stringify(newlist));
					$("#origlist").text(JSON.stringify(newlist));
					break;
	            }
        	}
        }
    )
}
var rotateList = function() {
	var newlist = {};
	var next = max = 0;
	var max_count = getCountData();

  	var hidden_list = $("#hiddenlist").text();
  	cinelist = JSON.parse(hidden_list);

	for (i = 0; i < max_count; i++) {
		if ( 0 == i ){
			cinelist[max_count] = list[0];
		} 
		cinelist[i] = cinelist[i + 1];	
	}

	//save list
	hidden_list = JSON.stringify(cinelist);
	$("#hiddenlist").text(hidden_list);
}

var reloadCineList = function() {
  	var hidden_list = $("#hiddenlist").text();
  	list = JSON.parse(hidden_list);

	var poster = '<img class="img-responsive" id="cine0" src="' + BASE_IMAGE_URL + list[0].poster + '">';

  	$("#left img").remove();
	$("#right div").remove();
	$("#left").fadeTo(1, 0.0);
	$("#right div").fadeTo(1, 0.0);
	$("#left").html(poster).fadeIn();

   	for (i = 1; i < getCountData(); i++) {
   		image_slot = 'cine' + i;
   		image_src  = BASE_IMAGE_URL + list[i].poster;
   		poster = image_slot + " = '" + image_src + "'";
   		poster = '<div class="row poster"><img class="img-responsive" id="' + image_slot + '" src="' + image_src + '"></div>';
		$("#right").append(poster).fadeIn();
   	}
   	$("#left").fadeTo(1000, 1);
   	$("#right").fadeTo(1000, 0.8);

   	updateTicker();
   	rotateList();

};

var updateTicker = function() {
	var tickerText = '';
	var ticker = '';
	var hidden_list = $("#hiddenlist").text();
  	list = JSON.parse(hidden_list);

  	$(".ticker div").remove();
  	tickerText = '<b>' + list[0].title + '</b> -- ' + list[0].description + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
  	ticker = '<div>' + tickerText + tickerText + tickerText + tickerText + tickerText + '</div>';
	$(".ticker").append(ticker);
}

//rotateList();
//reloadCineList();
setInterval('reloadCineList()', RELOAD_INTERVAL);
setInterval('checkForUpdate()', RELOAD_INTERVAL);