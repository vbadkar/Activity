function getSelectedValue(){
    let select = document.querySelector(".lang").value;
    if(select == "en"){
        document.cookie = "lang_code=en; path=/";
        window.location.reload();
    }else if(select == "hi"){
        document.cookie = "lang_code=hi; path=/";
        window.location.reload();
    }
    
}
                