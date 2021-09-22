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

Breach

```php
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachRequest;

// Create the API provider.
$provider = new APIv2Provider();

// Create a Breach request.
$request = new BreachRequest();
$request->setName("Adobe");

// Call the API and get the response.
$response = $provider->breach($request);

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

// Create the API provider.
$provider = new APIv2Provider();

// Create a Breached account request.
$request = new BreachedAccountRequest();
$request->setAccount("john.doe@gmail.com");
$request->setDomain("adobe.com");

// Call the API and get the response.
$response = $provider->breachedAccount($request);

// Handle the response (same as breach).
// ...
```

Breaches

```php
use WBW\Library\HaveIBeenPwned\Model\Breach;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\BreachesRequest;

// Create the API provider.
$provider = new APIv2Provider();

// Create a Breaches request.
$request = new BreachesRequest();
$request->setDomain("adobe.com");

// Call the API and get the response.
$response = $provider->breaches($request);

// Handle the response (same as breach).
// ...
```

Data classes

```php
use WBW\Library\HaveIBeenPwned\Model\DataClass;
use WBW\Library\HaveIBeenPwned\Provider\APIv2Provider;
use WBW\Library\HaveIBeenPwned\Request\DataClassesRequest;

// Create the API provider.
$provider = new APIv2Provider();

// Call the API and get the response.
$response = $provider->dataClasses(new DataClassesRequest());

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

// Create the API provider.
$provider = new APIv2Provider();

// Create a Paste account request.
$request = new PasteAccountRequest();
$request->setAccount("john.doe@gmail.com");

// Call the API and get the response.
$response = $provider->pasteAccount($request);

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

// Create the API provider.
$provider = new APIv2Provider();

// Create a Range request.
$request = new RangeRequest();
$request->setHash("21BD1");

// Call the API and get the response.
$response = $provider->range($request);

// Handle the response.
/** @var Range $current */
foreach($response->getRanges() as $current) {
    
    $current->getCount();
    $current->getHash();
}
```
