DOCUMENTATION
=============

1° Breach
---

```php
// Creates the API provider.
$provider = new APIProviderV2();

// Creates a Breach model.
$model = new BreachRequest();
$model->setName("Adobe");

// Calls the API and get the response.
$response = $provider->breachRequest($model);

// Handle the response.
foreach($response->getBreaches() as $current) {
    // ...
}
```

2° Breached account
---

```php
// Creates the API provider.
$provider = new APIProviderV2();

// Creates a Breached account model.
$model = new BreachedAccountRequest();
$model->setAccount("john.doe@gmail.com");
$model->setDomain("adobe.com");

// Calls the API and get the response.
$response = $provider->breachedAccountRequest($model);

// Handle the response.
foreach($response->getBreaches() as $current) {
    // ...
}
```

3° Breaches
---

```php
// Creates the API provider.
$provider = new APIProviderV2();

// Creates a Breaches model.
$model = new BreachesRequest();
$model->setDomain("adobe.com");

// Calls the API and get the response.
$response = $provider->breachesRequest($model);

// Handle the response.
foreach($response->getBreaches() as $current) {
    // ...
}
```

3° Data classes
---

```php
// Creates the API provider.
$provider = new APIProviderV2();

// Calls the API and get the response.
$response = $provider->dataClassesRequest(new DataClassesRequest());

// Handle the response.
foreach($response->getDataClasses() as $current) {
    // ...
}
```

4° Paste account
---

```php
// Creates the API provider.
$provider = new APIProviderV2();

// Creates a Paste account model.
$model = new PasteAccountRequest();
$model->setAccount("john.doe@gmail.com");

// Calls the API and get the response.
$response = $provider->dataClassesRequest($model);

// Handle the response.
foreach($response->getPastes() as $current) {
    // ...
}
```

5° Range
---

```php
// Creates the API provider.
$provider = new APIProviderV2();

// Creates a Range model.
$model = new RangeRequest();
$model->setHash("21BD1");

// Calls the API and get the response.
$response = $provider->dataClassesRequest($model);

// Handle the response.
foreach($response->getRanges() as $current) {
    // ...
}
```
