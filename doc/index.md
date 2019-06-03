DOCUMENTATION
=============

Breach
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

// Handle the response (same as breach).
// ...
```

Breaches
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Create a Breaches model.
$model = new BreachesRequest();
$model->setDomain("adobe.com");

// Call the API and get the response.
$response = $provider->breaches($model);

// Handle the response (same as breach).
// ...
```

Data classes
---

```php
// Create the API provider.
$provider = new APIProviderV2();

// Call the API and get the response.
$response = $provider->dataClasses(new DataClassesRequest());

// Handle the response.
foreach($response->getDataClasses() as $current) {
    
    $current->getName();
}
```

Paste account
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

    $current->getDate();
    $current->getEmailCount();
    $current->getId();
    $current->getSource();
    $current->getTitle();
}
```

Range
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
    
    $current->getCount();
    $current->getHash();
}
```
