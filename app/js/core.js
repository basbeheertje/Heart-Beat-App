var connection = 0;

$( document ).ready(function() {
	checkOnline();
	setInterval(function(){checkOnline()},1000);
	setInterval(function(){updateDatabase()},60000);
	setInterval(function(){getDatabase()},5000);
	setTimeout(function(){loaded()},1000);
	updateDatabase();
	getDatabase();
	loadPage('alert');
	
});

function checkOnline(){
	if(navigator.onLine){
		connection = 1;
	}else{
		connection = 0;
	}
}

function loaded(){
	$('#splashscreen').css('display','none');
	$('#main-screen').css('display','inline-block');
}

function loadPage(identifier){
	
	$('#main > div').css('display','none');
	$('#main > #'+identifier).css('display','inline-block');
	closeMenu();
	
}

function closeMenu(){

	$('#menu').css('left','-70%');
	setTimeout(function(){$('#menu').css('visibility','hidden');},1000);
	$('#main').css('left','0%');
	$('#go-back').css('display','table');

}

function toggleMenu(){

	console.log($('#menu').css('visibility'));
	if($('#menu').css('visibility') == 'hidden'){
		$('#menu').css('left','0%');
		$('#menu').css('visibility','visible');
		$('#main').css('left','70%');
		$('#go-back').css('display','none');
	}else{
		$('#menu').css('left','-70%');
		setTimeout(function(){$('#menu').css('visibility','hidden');},1000);
		$('#main').css('left','0%');
		$('#go-back').css('display','table');
	}

}