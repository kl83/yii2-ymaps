(function ($) {

    $.fn.mapWidget = function (method) {
        if (typeof method === 'object') {
            return methods.init.apply(this, arguments);
        } else {
            return methods[method].apply(
                this,
                Array.prototype.slice.call(arguments, 1)
            );
        }
    };

    let methods = {};

    methods.init = function (o) {
        let $this = this;
        ymaps.ready(function () {
            let map = new ymaps.Map($this.get(0).id, o.state, o.options);
            $this.data('map', map);
            for (let i in o.placemarks) {
                let placemark = new ymaps.Placemark(
                    o.placemarks[i][0],
                    o.placemarks[i][1],
                    o.placemarks[i][2]
                );
                map.geoObjects.add(placemark);
            }
        });
    };

})(jQuery);
