# php-sdk
ToS;DR PHP SDK to interact with our API

## Installation

```bash
composer require tosdr/php-sdk
```

## Usage

### Get a Service

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use tosdr\api\Service;

$Service = Service::get(182); # Facebook

echo $Service->getName(); # Facebook
echo $Service->getSlug(); # facebook
echo $Service->getPoints(); # array of points

```

