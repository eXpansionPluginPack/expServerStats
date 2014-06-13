
function serverOverview(id) {
    $.getJSON("index.php?mode=api&ext=Maniaplanet\\\\ServerConnection&action=get&id=" + id, function(data) {
        console.log(data);
        var mainContainer = $("#overview-server-" + id);
        mainContainer.find(".serverName").html(genServer(data.server));
        var ladder = (data.server.ladderServerLimitMin / 1000) + " - " + (data.server.ladderServerLimitMax / 1000) + "k";
        mainContainer.find(".ladder").html(ladder);
        mainContainer.find(".players").html(genPlayers(data));
        mainContainer.find(".spectators").html(genSpec(data));
        mainContainer.find(".mapCount").html(countObj(data.maps));
        mainContainer.find(".currentMap").html(parseColors(data.currentMap.name) + " by " + data.currentMap.author);

    });
}


function countObj(obj) {
    var count = 0;
    for (var i in obj) {
        count++;
    }
    return count;
}

function genServer(server) {
    return parseColors(server.name);
}
function genPlayers(data) {
    var total = countObj(data.players);
    if (total == undefined) {
        total = 0;
    }
    return  total + "/" + data.server.currentMaxPlayers;
}

function genSpec(data) {
    var total = countObj(data.spectators);
    if (total == undefined) {
        total = 0;
    }
    return total + "/" + data.server.currentMaxSpectators;
}
