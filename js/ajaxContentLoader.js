
function ajaxContentLoader(contentId, url, timeout){
    $.getJSON("index.php?mode=api&ext=contentDisplay\\ajaxContentLoader&action=get&page="+url, function( data ) {
        var mainContainer = $("#"+contentId);
        mainContainer.html(data.content);
    });

    if(timeout != undefined && timeout > 0){
        setTimeout(function(){
            ajaxContentLoader(contentId, url,  timeout);
        }, timeout)
    }
}