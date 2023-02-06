DOCUMENTATION
=============

Have I Been Pwned offers 3 different versions of its API. Also, this package
includes a provider by API version:

- APIv1Provider
- APIv2Provider
- APIv3Provider

APIv1Provider provides:

- `Breached account`

APIv2Provider and APIv3Provider provide:

- `Breach`
- `Breached account`
- `Breaches`
- `Data classes`
- `Paste account`
- `Range`

The rest of this documentation uses version 2, For version 3, just insert your
API key in the provider constructor like this:

```php
use WBW\Library\HaveIBeenPwned\Provider\APIv3Provider;

// Create the API provider.
$provider = new APIv3Provider("YOUR_API_KEY");
```

Then you can use the provider in the same way as the version 2.

> IMPORTANT NOTICE: Each API provider can be used with a debug flag and/or a
> logger with the following code:

```php
use Psr\Log\LoggerInterface;
use WBW\Library\HaveIBeenPwned\Provider\APIv1Provider;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Provider\APIv3Provider;

/** @var LoggerInterface $logger */
// $logger = ...

// Create the API provider.
$provider3 = new APIv3Provider("YOUR_API_KEY", $logger);
$provider3->setDebug(true);

$provider2 = new APIv2Provider($logger);
$provider2->setDebug(true);

$provider1 = new APIv1Provider($logger);
$provider1->setDebug(true);
```

---

Breach

```php
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;

// Create the API provider.
$provider = new APIv2Provider();

// Create a Breach request.
$request = new BreachRequest();
$request->setName("Adobe");

/** @var BreachesResponse $response */
$response = $provider->sendRequest($request);

// Handle the response.
/** @var Breach $current */
foreach($response->getBreaches() as $current) {

    $current->getAddedDate();
    $current->getBreachDate();
    $current->getDataClasses();
    $current->getDomain();
    $current->getAddedDate();
    $current->getName();
    $current->getPwnCount();
    $current->getRetired();
    $current->getSensitive();
    $current->getSpamList();
    $current->getTitle();
    $current->getVerified();
}
```

Breached account

```php
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachedAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;

// Create the API provider.
$provider = new APIv2Provider();

// Create a Breached account request.
$request = new BreachedAccountRequest();
$request->setAccount("john.doe@gmail.com");
$request->setDomain("adobe.com");

/** @var BreachesResponse $response */
$response = $provider->sendRequest($request);

// Handle the response (same as breach).
// ...
```

Breaches

```php
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;
use WBW\Library\HaveIBeenPwned\Response\BreachesResponse;

// Create the API provider.
$provider = new APIv2Provider();

// Create a Breaches request.
$request = new BreachesRequest();
$request->setDomain("adobe.com");

/** @var BreachesResponse $response */
$response = $provider->sendRequest($request);

// Handle the response (same as breach).
// ...
```

Data classes

```php
use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\DataClassesRequest;
use WBW\Library\HaveIBeenPwned\Response\DataClassesResponse;

// Create the API provider.
$provider = new APIv2Provider();

/** @var DataClassesResponse $response */
$response = $provider->sendRequest(new DataClassesRequest());

// Handle the response.
/** @var DataClass $current */
foreach($response->getDataClasses() as $current) {
    
    $current->getName();
}
```

Paste account

```php
use WBW\Library\HaveIBeenPwned\Model\Paste;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\PasteAccountRequest;
use WBW\Library\HaveIBeenPwned\Response\PastesResponse;

// Create the API provider.
$provider = new APIv2Provider();

// Create a Paste account request.
$request = new PasteAccountRequest();
$request->setAccount("john.doe@gmail.com");

/** @var PastesResponse $response */
$response = $provider->sendRequest($request);

// Handle the response.
/** @var Paste $current */
foreach($response->getPastes() as $current) {

    $current->getDate();
    $current->getEmailCount();
    $current->getId();
    $current->getSource();
    $current->getTitle();
}
```

Range

```php
use WBW\Library\HaveIBeenPwned\Model\Range;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\RangeRequest;
use WBW\Library\HaveIBeenPwned\Response\RangesResponse;

// Create the API provider.
$provider = new APIv2Provider();

// Create a Range request.
$request = new RangeRequest();
$request->setHash("21BD1");

/** @var RangesResponse $response */
$response = $provider->sendRequest($request);

// Handle the response.
/** @var Range $current */
foreach($response->getRanges() as $current) {
    
    $current->getCount();
    $current->getHash();
}
```
