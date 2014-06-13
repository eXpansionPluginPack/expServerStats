
function serverInfoFetch(id){
    $.getJSON("index.php?mode=api&ext=Maniaplanet\\\\ServerConnection&action=get&id='.$this->id.'", function( data ) {
        console.log(data);
        var mainContainer = $("#overview-server-"+id);        
        mainContainer.find(".server-name").html(data.servers[id].name);
    });
}