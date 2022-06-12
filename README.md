# FoxPost stations bundle

FoxPost pickup client for PHP.

## Installation

* install with Composer

```
composer require git@github.com:answear/fos-post-parcel.git
```

## Setup

No setup needed.

## Usage

### Get list of parcel shops

```php
/** @var \Answear\FoxPostParcel\Command\GetParcelShops $getParcelShopsCommand **/
$getParcelShopsCommand->getParcelShops();
```

### Error handling

- `Answear\FoxPostParcel\Exception\ServiceUnavailable` for all `GuzzleException`
- `Answear\FoxPostParcel\Exception\MalformedResponse` for incorrect responses

Final notes
------------

Feel free to open pull requests with new features, improvements or bug fixes. The Answear team will be grateful for any comments.
