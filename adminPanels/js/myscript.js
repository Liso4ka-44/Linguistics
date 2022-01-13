'use strict';

$(document).ready(function() {
    $("#videoadd").click(function() {

        let video = document.querySelector('#video');

        let div = document.createElement("div");
        div.setAttribute('class',"col-md-12");

        let formgroup = document.createElement("div");
        formgroup.setAttribute('class',"form-group");

      

        let url = document.createElement("input");
        url.setAttribute('class',"form-control");
        url.name = "mass[]";
        url.type = "text";

       
        div.appendChild(formgroup);
        
        formgroup.appendChild(url);
        video.insertAdjacentElement('beforeend', div);
    });

    $("#humanaddd").click(function(){
        
    });
});
