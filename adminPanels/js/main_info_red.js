function show_all(list_class_name, link_id, show_message, hide_message, default_height = '500px'){
	var dl = document.getElementsByClassName(list_class_name)[0];
	var sad = document.getElementById(link_id);
	if( dl.style.maxHeight == "100%" ) {
		dl.style.maxHeight = default_height;
		sad.innerHTML = show_message;
	} else {
		dl.style.maxHeight = "100%";
		sad.innerHTML = hide_message;
	}
}