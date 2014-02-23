function add_submap(name,desc,alias,callback){
	var url="/submap";
	post_submap("POST",url,name,desc,alias,callback);
}

function add_place(name,desc,latitude,longitude,user_id,submap_id,callback){
	var url='/place';
 	post_place("POST",url,name,desc,latitude,longitude,user_id,submap_id,callback)
}

function update_place_x(id,data){
	var url='/place/'+id;
 	post_place_x("POST",url,data)
}
function update_place_valimeter(id,value){
	post_place_x(id,{valimeter:value});
}
function update_place(id,name,desc,latitude,longitude,user_id,submap_id,callback){
 	var url='/place/'+id;
 	post_place("POST",url,name,desc,latitude,longitude,user_id,submap_id,callback)
}
function update_submap(id,name,desc,alias,callback){
	var url="/submap/"+id;
	post_submap("POST",url,name,desc,alias,callback);
}

function delete_submap(id,callback){
	var url="/submap/"+id;
	delete_url(url,callback);
}

function delete_place(id,callback){
	var url="/place/"+id;
	delete_url(url,callback);
}

function delete_url(url,callback){
	$.ajax({
		type: "DELETE",
		url: url,
		success: callback
	});
}


function post_place(method,url,name,desc,latitude,longitude,user_id,submap_id,callback){
	$.ajax({
		type: method,
		url: url,
		data: {
			name:name,
		 	desc: desc,
		 	latitude:latitude,
		 	longitude:longitude,
		 	user_id:user_id,
		 	submap_id:submap_id
		},
		success:callback
	});
}

function post_place_x(method,url,data){
	$.ajax({
		type: method,
		url: url,
		data: data,
		success:callback
	});
}

function post_submap(method,url,name,desc,alias,callback){
	$.ajax({
		type: method,
		url: url,
		data: {
			name:name,
		 	desc: desc,
		 	alias: alias,
		 	success:callback
		}
	});
}