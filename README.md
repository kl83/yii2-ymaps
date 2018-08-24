# Yii2 toolset for working with Yandex Map

Widgets list:
- CoordsInput: selection of coordinates on the map;
- StreetInput: jui autocomplete with street names of specified city.

## Installation
The preferred way to install this extension is through [composer](https://getcomposer.org/).

Either run
```
php composer.phar require kl83/yii2-ymaps @dev
```
or add
```
"kl83/yii2-ymaps": "@dev"
```
to the require section of your composer.json file.

## Usage

### CoordsInput

``` php
<?= $form->field($model, 'coords')->widget('kl83\ymaps\CoordsInput', [
  'options' => [], // Html-attributes of container
  'ymapsClientOptions' => [], // Yandex map JS settings
  'placemarkClientProperties' => [], // Placemark JS properties
  'placemarkClientOptions' => [], // Placemark JS options
]) ?>
```

### StreetInput

``` php
<?= $form->field($model, 'street')->widget('kl83\ymaps\StreetInput', [
  'options' => [], // Html-attributes
  'city' => '', // Search streets in specified city
]) ?>
```

## Interactivity

### CoordsInput

Finds the specified address on the map, and moves the placemark to it.
``` js
$('.widget').coordsInput('search', 'Some address');
```

### StreetInput

Get or set the city to search on.
``` js
$('.widget').streetInput('city'); // Get
$('.widget').streetInput('city', 'Some city'); // Set
```

## License
MIT License
