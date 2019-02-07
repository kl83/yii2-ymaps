(function ($) {

    /**
     * Placemark drag event handler.
     */
    var placemarkMove = function () {
        this.updateInputs(this.placemark.geometry._coordinates);
    };

    /**
     * Main widget object.
     * @param rootEl
     * @constructor
     */
    function Widget(rootEl) {
        this.rootEl = rootEl;
        this.latInput = rootEl.find('.coords-lat');
        this.lngInput = rootEl.find('.coords-lng');
        this.coords = [this.latInput.val() || 55.76, this.lngInput.val() || 37.64];
        this.map = this.createMap();
        this.placemark = this.createPlacemark();
        setTimeout(function(){
            rootEl.trigger('coords-ready', {
                map: this.map,
                placemark: this.placemark
            });
        }, 1);
    }

    /**
     * Creates Yandex map.
     * @returns {ymaps.Map}
     */
    Widget.prototype.createMap = function () {
        var mapElId = this.rootEl.find('.ymaps-map').attr('id');
        var options = this.rootEl.data('map');
        options.center = this.coords;
        return new ymaps.Map(mapElId, options);
    };

    /**
     * Creates and adds a placemark to the map.
     * @returns {ymaps.Placemark}
     */
    Widget.prototype.createPlacemark = function () {
        var placemark = new ymaps.Placemark(
            this.coords,
            this.rootEl.data('pm-prop'),
            this.rootEl.data('pm-opt')
        );
        this.map.geoObjects.add(placemark);
        placemark.geometry.events.add('change', placemarkMove, this);
        return placemark;
    };

    /**
     * Updates inputs with new values.
     * @param coords
     */
    Widget.prototype.updateInputs = function (coords) {
        this.latInput.val(coords[0]);
        this.lngInput.val(coords[1]);
    };

    $.fn.coordsInput = function (cmd, params) {
        var widget = $(this).data('coords-input');
        if (cmd === 'search') {
            var geocoder = ymaps.geocode(params, {
                results: 1
            });
            geocoder.then(
                function (res) {
                    var coords = res.geoObjects.get(0).geometry.getCoordinates();
                    widget.placemark.geometry.setCoordinates(coords);
                    widget.map.panTo(coords);
                }
            );
        }
    };

    /**
     * Yandex maps initialized.
     */
    $(function () {
        ymaps.ready(function () {
            $('.coords-input').each(function () {
                $(this).data('coords-input', new Widget($(this)));
            });
        });
    });

})(jQuery);
