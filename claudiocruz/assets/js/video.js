var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
// Mudar video aqui
var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('depo1', {
        height: '640',
        width: '360',
        videoId: '_WAoFVYeHl4',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
    player = new YT.Player('depo2', {
        height: '640',
        width: '360',
        videoId: 'VUueH0HHxgI',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
    player = new YT.Player('depo3', {
        height: '640',
        width: '360',
        videoId: 'gA6YqF3CFwU',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
    player = new YT.Player('depo4', {
        height: '640',
        width: '360',
        videoId: '9EgDDf6XlBg',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
    player = new YT.Player('depo5', {
        height: '640',
        width: '360',
        videoId: 'fkjPROOpx0Y',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
    player = new YT.Player('depo6', {
        height: '640',
        width: '360',
        videoId: 'EfZctNSQbwo',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    event.target.stopVideo();
}

var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        done = true;
    }
}
function stopVideo() {
    player.stopVideo();
}