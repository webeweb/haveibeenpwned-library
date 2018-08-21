haveibeenpwned-library
======================

[![Build Status](https://travis-ci.com/webeweb/haveibeenpwned-library.svg?branch=master)](https://travis-ci.com/webeweb/haveibeenpwned-library) [![Coverage Status](https://coveralls.io/repos/github/webeweb/haveibeenpwned-library/badge.svg?branch=master)](https://coveralls.io/github/webeweb/haveibeenpwned-library?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webeweb/haveibeenpwned-library/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webeweb/haveibeenpwned-library/?branch=master) [![Latest Stable Version](https://poser.pugx.org/webeweb/haveibeenpwned-library/v/stable)](https://packagist.org/packages/webeweb/haveibeenpwned-library) [![Latest Unstable Version](https://poser.pugx.org/webeweb/haveibeenpwned-library/v/unstable)](https://packagist.org/packages/webeweb/haveibeenpwned-library) [![License](https://poser.pugx.org/webeweb/haveibeenpwned-library/license)](https://packagist.org/packages/webeweb/haveibeenpwned-library) [![composer.lock](https://poser.pugx.org/webeweb/haveibeenpwned-library/composerlock)](https://packagist.org/packages/webeweb/haveibeenpwned-library)

Integrate HaveIBeenPwned API with your projects.

> IMPORTANT NOTICE: This package is still under development. Any changes will be
> done without prior notice to consumers of this package. Of course this code
> will become stable at a certain point, but for now, use at your own risk.

---

## Compatibility

[![PHP](https://img.shields.io/badge/PHP-%5E5.6%7C%5E7.0-blue.svg)](http://php.net) [![HHVM](https://img.shields.io/badge/HHVM-ready-orange.svg)](https://hhvm.com/)

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/haveibeenpwned-library "^1.0"
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

---

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ mkdir haveibeenpwned-library
$ cd haveibeenpwned-library
$ git clone git@github.com:webeweb/haveibeenpwned-library.git .
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

---

## License

haveibeenpwned-library is released under the LGPL License. See the bundled [LICENSE](LICENSE)
file for details.
