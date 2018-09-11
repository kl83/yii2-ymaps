(function ($) {

    let ymapsReady;

    function source(request, response) {
        let data = [];
        if (ymapsReady) {
            let query = request.term;
            let city = this.element.data('city');
            if (city) {
                query = city + ', ' + query;
            }
            let geocoder = ymaps.geocode(query, {
                results: 10
            });
            geocoder.then(
                function (res) {
                    let items = [];
                    res.geoObjects.each(function (obj) {
                        let kind = obj.properties.get('metaDataProperty.GeocoderMetaData.kind');
                        let name = obj.properties.get('name');
                        if (kind === 'street' && name.toLowerCase().indexOf(request.term.toLowerCase()) >= 0) {
                            items.push(name);
                        }
                    });
                    response($.unique(items));
                },
                function (err) {
                    response([]);
                }
            );
        } else {
            response([]);
        }
    }

    // function city

    $.fn.streetInput = function (cmd, params) {
        if (cmd === 'city') {
            if (params === undefined) {
                return $(this).data('city');
            } else {
                $(this).data('city', params);
            }
        }
    };

    ymaps.ready(function () {
        ymapsReady = true;
    });

    $(document).on('autocompletecreate', '.street-input-widget', function () {
        $(this).autocomplete('option', 'source', source);
    });

})(jQuery);
