var lib = new localStorageDB("heartBeats", localStorage);
var debug = false;

if( lib.isNew() ) {

	if(debug == true){
		console.log('Nieuwe database!');
	}
	
    // create the "teams" table
	lib.createTable("info", ["id", "key", "value", "create_date", "timestamp"]);
	lib.createTable("style", ["id", "key", "value", "create_date", "timestamp"]);
	lib.createTable("teams", ["id", "name", "image", "create_date", "timestamp"]);
	lib.createTable("trainers", ["id","member_id","team_id","function","year","create_date","timestamp"]);
	lib.createTable("matches", ["id","team_id","date","time","type","against","team_goals","match_goals","create_date","timestamp"]);
	lib.createTable("news", ["id","title","short_description","long_description","image","user","create_date","timestamp"]);
	lib.createTable("players", ["id","member_id","team_id","function","year","create_date","timestamp"]);
	lib.createTable("members", ["id","name","bondsnummer","birthdate","facebook","twitter","hyves","linkedin","image","create_date","timestamp"]);
	
	//APP nummer opslaan in database voor het ophalen van de gegevens
		lib.insert("info", {id: 0, key: 'app_id', value: 1, create_date: '2013-10-28 12:00:00', timestamp: '20131028120000'});
    
    // commit the database to localStorage
		lib.commit();
	
	if(debug == true){
		console.log('Database aangemaakt!');
	}
}

var app_id = lib.query("info", {id: 0, key: 'app_id'});

if(debug == true){
	console.log('APP nummer:'+app_id);
}

function syncAllTables(){

	if(debug == true){
		console.log('start alltables sync');
	}
	
	$.getJSON("json/update.json",function(result){
		$.each(result.update.items, function(i, field){
			if(field.type == 'teams'){
				syncTeams(field.object,field.action);
			}else if(field.type == 'trainers'){
				syncTrainers(field.object,field.action);
			}else if(field.type == 'matches'){
				syncMatches(field.object,field.action);
			}else if(field.type == 'news'){
				syncNews(field.object,field.action);
			}else if(field.type == 'players'){
				syncPlayers(field.object,field.action);
			}else if(field.type == 'members'){
				syncMembers(field.object,field.action);
			}
			
		});
		
		//Nieuwe rijen toevoegen
			lib.commit();
	});
	
	if(debug == true){
		console.log('end alltables sync');
	}

}

function syncTeams(field,action){

	var table = 'teams';
	
	var temp = lib.query(table, {id: field.id});

	if(action == 'insert' && temp.length == 0 || action == 'update' && temp.length == 0){
		lib.insert(table, {id: field.id, name: field.name, image: field.image, create_date: field.create_date, timestamp: field.timestamp});
	}else if(action == 'update' && temp.length != 0 || temp.length != 0 && action == 'insert'){
		lib.update(table, {id: field.id}, function(row) {
			row.name = field.name;
			row.image = field.image;
			row.create_date = field.create_date;
			row.timestamp = field.timestamp;
			return row;
		});
	}else if(action == 'delete'){
		lib.deleteRows(table, {id: field.id});
	}
	
	lib.commit();

}

function syncTrainers(field,action){
	var table = 'trainers';
	
	var temp = lib.query(table, {id: field.id});
	
	//"id","member_id","team_id","function","year","create_date","timestamp"

	if(action == 'insert' && temp.length == 0 || action == 'update' && temp.length == 0){
		lib.insert(table, {id: field.id, member_id: field.member_id, team_id: field.team_id, function:field.function, year: field.year, create_date: field.create_date, timestamp: field.timestamp});
	}else if(action == 'update' && temp.length != 0 || temp.length != 0 && action == 'insert'){
		lib.update(table, {id: field.id}, function(row) {
			row.member_id = field.member_id;
			row.team_id = field.team_id;
			row.function = field.function;
			row.year = field.year;
			row.create_date = field.create_date;
			row.timestamp = field.timestamp;
			return row;
		});
	}else if(action == 'delete'){
		lib.deleteRows(table, {id: field.id});
	}
	
	lib.commit();
}

function syncMatches(field,action){
	
	var table = 'matches';
	
	var temp = lib.query(table, {id: field.id});
	
	//"id","team_id","date","time","type","against","team_goals","match_goals","create_date","timestamp"

	if(action == 'insert' && temp.length == 0 || action == 'update' && temp.length == 0){
		lib.insert(table, {id: field.id, team_id: field.team_id, date: field.date, time:field.time, type: field.type, against: field.against, team_goals: field.team_goals, match_goals: field.match_goals, create_date: field.create_date, timestamp: field.timestamp});
	}else if(action == 'update' && temp.length != 0 || temp.length != 0 && action == 'insert'){
		lib.update(table, {id: field.id}, function(row) {
			row.team_id = field.team_id;
			row.date = field.date;
			row.time = field.time;
			row.type = field.type;
			row.against = field.against;
			row.team_goals = field.team_goals;
			row.match_goals = field.match_goals;
			row.create_date = field.create_date;
			row.timestamp = field.timestamp;
			return row;
		});
	}else if(action == 'delete'){
		lib.deleteRows(table, {id: field.id});
	}
	
	lib.commit();
	
}

function syncNews(field,action){
	
	var table = 'news';
	
	var temp = lib.query(table, {id: field.id});
	
	//"id","title","short_description","long_description","image","user","create_date","timestamp"

	if(action == 'insert' && temp.length == 0 || action == 'update' && temp.length == 0){
		lib.insert(table, {id: field.id, title: field.title, short_description: field.short_description, long_description:field.long_description, image: field.image, user: field.user, create_date: field.create_date, timestamp: field.timestamp});
	}else if(action == 'update' && temp.length != 0 || temp.length != 0 && action == 'insert'){
		lib.update(table, {id: field.id}, function(row) {
			row.title = field.title;
			row.short_description = field.short_description;
			row.long_description = field.long_description;
			row.image = field.image;
			row.user = field.user;
			row.create_date = field.create_date;
			row.timestamp = field.timestamp;
			return row;
		});
	}else if(action == 'delete'){
		lib.deleteRows(table, {id: field.id});
	}
	
	lib.commit();
	
}

function syncPlayers(field,action){

	var table = 'players';
	
	var temp = lib.query(table, {id: field.id});
	
	//"id","member_id","team_id","function","year","create_date","timestamp"

	if(action == 'insert' && temp.length == 0 || action == 'update' && temp.length == 0){
		lib.insert(table, {id: field.id, member_id: field.member_id, team_id: field.team_id, function:field.function, year: field.year, create_date: field.create_date, timestamp: field.timestamp});
	}else if(action == 'update' && temp.length != 0 || temp.length != 0 && action == 'insert'){
		lib.update(table, {id: field.id}, function(row) {
			row.member_id = field.member_id;
			row.team_id = field.team_id;
			row.function = field.function;
			row.year = field.year;
			row.create_date = field.create_date;
			row.timestamp = field.timestamp;
			return row;
		});
	}else if(action == 'delete'){
		lib.deleteRows(table, {id: field.id});
	}
	
	lib.commit();

}

function syncMembers(field,action){

	var table = 'members';
	
	var temp = lib.query(table, {id: field.id});
	
	//"id","name","bondsnummer","birthdate","facebook","twitter","hyves","linkedin","image","create_date","timestamp"

	if(action == 'insert' && temp.length == 0 || action == 'update' && temp.length == 0){
		lib.insert(table, {id: field.id, member_id: field.member_id, team_id: field.team_id, function:field.function, year: field.year, create_date: field.create_date, timestamp: field.timestamp});
	}else if(action == 'update' && temp.length != 0 || temp.length != 0 && action == 'insert'){
		lib.update(table, {id: field.id}, function(row) {
			row.name = field.name;
			row.bondsnummer = field.bondsnummer;
			row.birthdate = field.birthdate;
			row.facebook = field.facebook;
			row.user = field.user;
			row.twitter = field.twitter;
			row.hyves = field.hyves;
			row.linkedin = field.linkedin;
			row.image = field.image;
			row.create_date = field.create_date;
			row.timestamp = field.timestamp;
			return row;
		});
	}else if(action == 'delete'){
		lib.deleteRows(table, {id: field.id});
	}
	
	lib.commit();

}

function capitalize (text) {
    return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}

function syncInfo(){
	
	if(debug == true){
		console.log('start APP sync');
	}
	
	$.getJSON("json/appinfo.json",function(result){
		$.each(result.info.items, function(i, field){
			//Kijken of hij bestaat
			var temp = lib.query("info", {id: field.id});
			//console.log(temp.length);
			if(temp.length == 0){
				lib.insert("info", {id: field.id, key: field.key, value: field.value, create_date: field.create_date, timestamp: field.timestamp});
				if(debug == true){
					console.log(field.id + ' is nieuw!');
				}
			}else{
				if(debug == true){
					console.log('APP info bestaat!');
					console.log(temp);
				}
			}
		});
		
		//Nieuwe rijen toevoegen
			lib.commit();
	});
	
	if(debug == true){
		console.log('end APP sync');
	}
	
}

function updateDatabase(){
	
	//syncNieuws();
	syncAllTables();
	
}

function getDatabase(){
	
	if(debug == true){
		console.log('start get database');
	}
	
	//getNieuws();
	//getTeams();
	
	if(debug == true){
		console.log('End get database');
	}
	
}

function syncNieuws(){
	
	if(debug == true){
		console.log('start news sync');
	}
	
	$.getJSON("json/nieuws.json",function(result){
		$.each(result.nieuws.items, function(i, field){
			//Kijken of hij bestaat
			var temp = lib.query("news", {id: field.id});
			//console.log(temp.length);
			if(temp.length == 0){
				lib.insert("news", {id: field.id, title: field.title, short_description: field.short_description, long_description: field.long_description, image: field.image, user: field.user, create_date: field.create_date, timestamp: field.timestamp});
				if(debug == true){
					console.log(field.id + ' is nieuw!');
				}
			}
		});
		
		//Nieuwe rijen toevoegen
			lib.commit();
	});
	
	if(debug == true){
		console.log('end news sync');
	}
	
}

function getNieuws(){
	
	if(debug == true){
		console.log('start Nieuws getter');
	}
	
	//Leeg maken nieuws div
		//$('#nieuwsoverzicht').empty();
		
	//Haal nieuwsberichten op
		var Nieuwsberichten = lib.query("news");
		//Nieuwsberichten.reverse();
	
		if(debug == true){
			console.log(Nieuwsberichten);
		}
		
		$.each(Nieuwsberichten, function(i, field){
			if($('#news-page-'+field.id).length == 0){
				$('#nieuwsoverzicht').prepend("<div class=\"nieuws-item\" onclick=\"loadPage('news-page-"+field.id+"');\"><img src=\"data:image/png;base64,"+field.image+"\" /><h2>"+field.title+"</h2><p>"+field.create_date+"</p></div>");
				$('#main').append("<div class=\"news-page\" id=\"news-page-"+field.id+"\"><div class=\"news-page-content\"><h2>"+field.title+"</h2><i>"+field.create_date+"</i><b> door: "+field.user+"</b><br/><img src=\"data:image/png;base64,"+field.image+"\" /><p style=\"font-weight:bold;\">"+field.short_description+"</p><p>"+field.long_description+"</p></div></div>");
			}
		});
	
	if(debug == true){
		console.log('end Nieuws getter');
	}
	
}

function getTeams(){
	
	if(debug == true){
		console.log('start Teams getter');
	}
	
	//Leeg maken nieuws div
		//$('#teams').empty();
		//$('#main > .teams-page').remove();
		
	//Haal nieuwsberichten op
		var teams = lib.query("teams");
		//teams.reverse();
	
		if(debug == true){
			console.log(teams);
		}
		
		$.each(teams, function(i, field){
			if($('#team-page-'+field.id).length == 0){
				$('#teams').prepend("<div class=\"teams-item\" onclick=\"loadPage('team-page-"+field.id+"');\"><h2>"+field.name+"</h2></div>");
				$('#main').append("<div class=\"teams-page\" id=\"team-page-"+field.id+"\"><div class=\"team-page-content\"><img src=\"data:image/png;base64,"+field.image+"\" /><h2>"+field.name+"</h2></div><div class=\"team-page-members\"></div></div>");
			}
		});
	
	if(debug == true){
		console.log('end Teams getter');
	}
	
}