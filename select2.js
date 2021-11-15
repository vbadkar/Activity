$(document).ready(function(){
    $("#sel_user").select2();
    $("#sel_user").select2({
    minimumResultsForSearch: Infinity,
    placeholder: "Select a Language"
    });
});