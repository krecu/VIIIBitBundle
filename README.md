## 8Bit examination

#### Install

Add to composer.json repositories "krecu/VIIIBitBundle": "dev-master"
```json
{
    "repositories": [
            {
                "type": "vcs",
                "url":  "git@github.com:krecu/VIIIBitBundle.git"
            }
    ]
}
```

Add to AppKernel.php
```php
new VIIIBitBundle\VIIIBitBundle()
```

Add parameters to parameters.yml
```yml
viibit:
  transport: CURL #CURL,AMPQ
  uri:       http://127.0.0.1:9001/api/data #default host
```

Add route controller to routing.yml
```yml
viii_bit:
    resource: "@VIIIBitBundle/Resources/config/routing.yml"
    prefix:   /
```

Run install in you symfony project

```bash
composer install
bin/console server:start 127.0.0.1:9001
```


#### Using service VIIbitService

methods:
    get - return yield (sequential scan, why not save memory :))

Service provide demo route
- /api/data - return 200 and good schema
- /api/error - return 500 and bad json schema

```php
/** @var VIIbitService $_viibit*/
$items = $_viibit->get('http://api_uri');
foreach ($items as $item) {
    // do somesing
}

```

Bundle implement fabric interface Transport - it was boring...

#### Run tests or command

```bash
phpunit .
bin/console 8bit:run
```