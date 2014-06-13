
function ajaxContentLoader(contentId, url, timeout){
    console.log("index.php?mode=api&ext=contentDisplay\\ajaxContentLoader&action=get&page="+url);
    $.getJSON("index.php?mode=api&ext=contentDisplay\\ajaxContentLoader&action=get&page="+url, function( data ) {
        console.log(data);
        console.log("#"+contentId);
        var mainContainer = $("#"+contentId);
        mainContainer.html(data.content);
    });

    if(timeout != undefined && timeout > 0){
        setTimeout(function(){
            ajaxContentLoader(contentId, url,  timeout);
        }, timeout)
    }
}