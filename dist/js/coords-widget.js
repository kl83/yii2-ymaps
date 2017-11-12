var kl83YMapsInitializeCoordsWidget = function ( $, o ) {
    var rootEl = $('#'+o.id);
    var mapId = o.id + '-map';
    var mapEl = $('#'+mapId);
    var map;
    var placemark;
    var input = rootEl.find('[type="hidden"]');
    var coordsJson = input.val();
    if ( coordsJson ) {
        var coords = JSON.parse(coordsJson);
    } else {
        var coords = [55.76, 37.64];
    }
    ymaps.ready(function(){
        map = new ymaps.Map(mapId, {
            center: coords,
            zoom: 14,
            controls: [ 'fullscreenControl', 'searchControl' ]
        });
        placemark = new ymaps.Placemark(coords, {}, {
            draggable: true
        });
        placemark.events.add('dragend', function(){
            input.val(JSON.stringify(placemark.geometry._coordinates));
        });
        map.geoObjects.add(placemark);
    });
};
