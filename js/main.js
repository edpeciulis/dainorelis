function testing() { //check to see if localStorage is working
	try {
	  return ('localStorage' in window) && window.localStorage !== null;
	} catch(e) {
	  return false;
	}
};	
console.log('localStorage is working: ' + testing()) ;
$(function() { //initialize the page
    $("#main").on("click", ".favoriteSong", favoriteHandler);
    $("#main").on("click", ".unfavoriteSong", unfavoriteHandler);
	showSongsList();
});
function favoriteHandler(e) { 
    e.preventDefault(); console.log('favoriteHandler called'); 
	var selectedSong = $(this).closest('.daina'); 
	var favorites = JSON.parse(localStorage.getItem('dainorelis-megstamiausios')) || {};
	var title = $(selectedSong).find('h3').text().slice(0, -28); console.log(title);
	$(selectedSong).find('.ui-collapsible-content').find('.favoriteSong').fadeOut(1500).remove();
	var lyrics = $(selectedSong).find('.ui-collapsible-content').html(); //console.log(lyrics);
	if ($.isEmptyObject(favorites[title]))
	{	
		console.log('song is not in the favorites object yet');
		favorites[title] = {};
		favorites[title].title = title;
		favorites[title].lyrics = lyrics;
		localStorage.setItem('dainorelis-megstamiausios', JSON.stringify(favorites)); 
	}
	var faveList = constructSongsList(favorites); 
	$('#megstamiausiosDainos').hide().html(faveList).trigger( "create" ).fadeIn(1000);
	$('#megstamiausios').find('.favoriteSong').removeClass('favoriteSong').addClass('unfavoriteSong');
}
function unfavoriteHandler(e) { 
    e.preventDefault(); console.log('unfavoriteHandler called'); //console.log($(this));	
	var selectedSong = $(this).closest('.daina'); //console.log($(selectedSong).html());
	var favorites = JSON.parse(localStorage.getItem('dainorelis-megstamiausios'));
	var title = $(selectedSong).find('h3').text().slice(0, -28); console.log(title);
	delete favorites[title];
	localStorage.setItem('dainorelis-megstamiausios', JSON.stringify(favorites)); 
	$(selectedSong).fadeOut(1500).remove();
	var faveList = constructSongsList(favorites); 
	$('#megstamiausiosDainos').hide().html(faveList).trigger( "create" ).fadeIn(1000);
	$('#megstamiausios').find('.favoriteSong').removeClass('favoriteSong').addClass('unfavoriteSong');
}
function showSongsList() {
	if (!(localStorage.getItem('dainorelis-visosdainos')))
	{
		console.log('no dainorelis songs list in localStorage so we need to ajax');
		updateSongsList();
	} 
	else
	{	
		var songsList = JSON.parse(localStorage.getItem('dainorelis-visosdainos')); 
		var favorites = JSON.parse(localStorage.getItem('dainorelis-megstamiausios')); 
		if (favorites) 
		{ 
			// console.log('there are ' + Object.size(favorites) + ' songs stored in favorites');
			var faveList = constructSongsList(favorites); 
			$('#megstamiausiosDainos').hide().html(faveList).trigger( "create" ).fadeIn(1000);
			$('#megstamiausios').find('.favoriteSong').removeClass('favoriteSong').addClass('unfavoriteSong');
		}
		$('#visosDainos').hide().html(songsList).trigger( "create" ).fadeIn(100, function(){
			$('#loadingSongs').html('A&#269;i&#363;!').fadeOut(1000, function(){
				$( "#main" ).trigger( "expand" );	
			});
		});
	}
}
function updateSongsList(){ 
	getSongsList(function(response) {
		if (response.status == 0 || response.slice(0,4) != "true")
		{ 
			console.log('the file was not found (status = 0) or did not return true, so we are offline'); 
			console.log(response); 
		}
		else
		{
			var songsListRaw = JSON.parse(response.substr(4)); 
			var songsList = constructSongsList(songsListRaw); 
			$('#visosDainos').hide().html(songsList).trigger( "create" ).fadeIn(100, function(){
				$('#loadingSongs').html('A&#269;i&#363;!').fadeOut(1000, function(){
					$( "#main" ).trigger( "expand" );	
				});
			});
			localStorage.setItem('dainorelis-visosdainos', JSON.stringify(songsList)); 
		}
	});
}
function getSongsList(callback) {
	$.ajax({
		type: 'GET',
	    url: 'getsongs.php',
		dataType: 'text',
		data: {},
		success: callback, 
		error: callback
	});
}
function constructSongsList(songsList) {
	var songs = '<div data-role="collapsible-set">'; 
	var limit = Object.size(songsList); //console.log('number of songs is ' + limit);
	for (var x in songsList)
	{
		songs += '<div data-role="collapsible" class="daina" name="' + songsList[x]['title'] + '"><h3>';
		songs += songsList[x]['title'] + '</h3>' + songsList[x]['lyrics'] + '<img src="css/images/img_trans.gif" class="favoriteSong"></div>';
	}
	songs += '</div>';
	return songs;
}
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};