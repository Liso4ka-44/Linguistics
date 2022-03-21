function place_underscope(el_id) {
	var underscope = document.getElementById("us");
	var all_nav = document.querySelector(".nav_l");
	
	var sc_elem = document.getElementById(el_id);
	var elem_pos = sc_elem.offsetLeft - all_nav.offsetLeft;
	var elem_width = sc_elem.offsetWidth;
	underscope.style.opacity = "1";
	underscope.style.marginLeft = elem_pos + "px";
	underscope.style.width = elem_width + "px";
}
function hide_underscope() {
	var underscope = document.getElementById("us");
	underscope.style.opacity = "0";
}