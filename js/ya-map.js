jQuery(function($){
	var $mapWrapper = $('#ya-map-wrapper'),
		$map = $('#ya-map');

	ymaps.ready(yaMapInit);

	function yaMapInit() {
		var myMap = new ymaps.Map($map[0], {
			center: [46.959118, 142.738068],
			zoom: 9,
			controls: []
		});

		myMap.controls.add(new ymaps.control.ZoomControl, {
			position: {
				top: 160,
				left: 15
			}
		});

		myMap.geoObjects.events.add('add', function(){
			setTimeout(function(){
				$mapWrapper.removeClass('map_loading');
				$map.css({ visibility: 'visible' });
			}, 1000);
		});

		yaMapGeocode(ymaps, myMap, 'Южно-Сахалинск, Коммунистический пр., 72');

		$('.js-geoquery').click(function(){
			var query = $(this).text();

			yaMapGeocode(ymaps, myMap, query);
		});
	}

	function yaMapGeocode(ymaps, mapObject, geocode){
		ymaps.geocode(geocode, { results: 1 })
			.then(function(response){
				yaMapResponseCallback(mapObject, response);
			});
	}

	function yaMapResponseCallback(mapObj, response){
		var firstGeoObject = response.geoObjects.get(0), // Выбираем первый результат геокодирования
			coords = firstGeoObject.geometry.getCoordinates(), // Координаты геообъекта
			bounds = firstGeoObject.properties.get('boundedBy'); // Область видимости геообъекта

		mapObj.setCenter(coords);
		mapObj.geoObjects.add(firstGeoObject); // Добавляем первый найденный геообъект на карту

		// Масштабируем карту на область видимости геообъекта
		// и проверяем наличие тайлов на данном масштабе
		mapObj.setBounds(bounds, { checkZoomRange: true });
	}
});