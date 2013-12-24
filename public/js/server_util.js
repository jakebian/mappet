
function post_place(url,name,desc,latitude,longitude,user_id,submap_id){
	$.ajax({
		type: "POST",
		url: url,
		data: {
			name:name,
		 	desc: desc,
		 	latitude:latitude,
		 	longitude:longitude,
		 	user_id:user_id,
		 	submap_id:submap_id
		}
	});
}

function post_submap(url,name,desc){
	$.ajax({
		type: "POST",
		url: url,
		data: {
			name:name,
		 	desc: desc,
		}
	});
}
function add_submap(name,desc){
	var url="/submap"
	post_submap(url,name,desc);
}

function add_place(name,desc,latitude,longitude,user_id,submap_id){
	var url='/place';
 	post_submap(url,name,desc,latitude,longitude,user_id,submap_id)
}

function update_submap(id,name,desc,latitude,longitude,user_id,submap_id){
 	var url='/place/'+id+'/edit';
 	post_submap(url,name,desc,latitude,longitude,user_id,submap_id)
}
function update_place(id,name,desc){
	var url="/submap/"+id+'/edit';
	post_submap(url,name,desc);
}

function delete_submap(id){
	var url="/submap/"+id+'/delete';
	delete_url(url);
}
function delete_place(id){
	var url="/place/"+id+'/delete';
	delete_url(url);
}

function delete_url(url){
	$.ajax({
		type: "DELETE",
		url: url,
	});
}