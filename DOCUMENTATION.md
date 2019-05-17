DOCUMENTATION
=============

1° Breach
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Create a Breach model.
$model = new BreachRequest();
$model->setName("Adobe");

// Call the API and get the response.
$response = $provider->breach($model);

// Handle the response.
foreach($response->getBreaches() as $current) {
    // ...
}
```

2° Breached account
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Create a Breached account model.
$model = new BreachedAccountRequest();
$model->setAccount("john.doe@gmail.com");
$model->setDomain("adobe.com");

// Call the API and get the response.
$response = $provider->breachedAccount($model);

// Handle the response.
foreach($response->getBreaches() as $current) {
    // ...
}
```

3° Breaches
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Create a Breaches model.
$model = new BreachesRequest();
$model->setDomain("adobe.com");

// Call the API and get the response.
$response = $provider->breaches($model);

// Handle the response.
foreach($response->getBreaches() as $current) {
    // ...
}
```

3° Data classes
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Call the API and get the response.
$response = $provider->dataClasses(new DataClassesRequest());

// Handle the response.
foreach($response->getDataClasses() as $current) {
    // ...
}
```

4° Paste account
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Create a Paste account model.
$model = new PasteAccountRequest();
$model->setAccount("john.doe@gmail.com");

// Call the API and get the response.
$response = $provider->pasteAccount($model);

// Handle the response.
foreach($response->getPastes() as $current) {
    // ...
}
```

5° Range
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Create a Range model.
$model = new RangeRequest();
$model->setHash("21BD1");

// Call the API and get the response.
$response = $provider->range($model);

// Handle the response.
foreach($response->getRanges() as $current) {
    // ...
}
```
