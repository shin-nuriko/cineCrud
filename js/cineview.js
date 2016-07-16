const MAX_ITEMS_DISPLAY = 4;
const RELOAD_INTERVAL = 10000;
const BASE_IMAGE_URL = 'http://localhost/Sites/_ci/cineCrud//images/';

var rotateList = function() {
	var newlist = {};
	var next = max = 0;

  	var hidden_list = $("#hiddenlist").text();
  	list = JSON.parse(hidden_list);

	for (i = 0; i < MAX_ITEMS_DISPLAY; i++) {
		if ( 0 == i ){
			list[MAX_ITEMS_DISPLAY] = list[0];
		} 
		list[i] = list[i + 1];	
	}

	//save list
	hidden_list = JSON.stringify(list);
	$("#hiddenlist").text(hidden_list);
}

var reloadCineList = function() {
  	var hidden_list = $("#hiddenlist").text();
  	list = JSON.parse(hidden_list);

	var poster = '<img id="cine0" src="' + BASE_IMAGE_URL + list[0].poster + '">';

  	$("#left img").remove();
	$("#right ul li").remove();
	$("#left").fadeTo(1, 0.0);
	$("#right ul").fadeTo(1, 0.0);
	$("#left").html(poster).fadeIn();

   	for (i = 1; i < MAX_ITEMS_DISPLAY; i++) {
   		image_slot = 'cine' + i;
   		image_src  = BASE_IMAGE_URL + list[i].poster;
   		poster = image_slot + " = '" + image_src + "'";
   		poster = '<li><img id="' + image_slot + '" src="' + image_src + '"></li>';
		$("#right ul").append(poster).fadeIn();
   	}
   	$("#left").fadeTo(1000, 1);
   	$("#right ul").fadeTo(1000, 1);

   	updateTicker();
   	rotateList();

};

var updateTicker = function() {
	var tickerText = '';
	var hidden_list = $("#hiddenlist").text();
  	list = JSON.parse(hidden_list);

  	tickerText = list[0].title + ' -- ' + list[0].description;
	$(".ticker").text(tickerText);
}

rotateList();
reloadCineList();
setInterval('reloadCineList()', RELOAD_INTERVAL);

