> # Common codebase
>
> Based on [don’t repeat yourself](https://en.wikipedia.org/wiki/Don%27t_repeat_yourself) principle.

## [Tips and Tricks](docs/TipsAndTricks.md)

## [Documentation](http://kamilsk.github.io/Common/)

## Installation

### Git (development)

[Fork it before](https://github.com/kamilsk/Common/fork).

```bash
$ git clone git@github.com:<your github account>/Common.git
$ cd Common && composer install
$ git remote add upstream git@github.com:kamilsk/Common.git
```

#### Mirror

```bash
$ git remote add mirror git@bitbucket.org:kamilsk/common.git
```

### Composer (production)

```bash
$ composer require kamilsk/common:~2.3
```

## Pulse of repository

| Version / PHP | 5.5 | 5.6 | 7.0 | HHVM | Support                                           |
|:-------------:|:---:|:---:|:---:|:----:|:--------------------------------------------------|
| 2.2.x         | +   | +   | +   | +    | Security support and bug fixing until 10 Jul 2016 |
| 2.3.x LTS     | -   | +   | +   | +    | Security support and bug fixing until 31 Dec 2018 |
| 3.x           | -   | -   | +   | +    | Active support and new features until 3 Dec 2017  |

### [Changelog](CHANGELOG.md)

### General information

[![Build status](https://travis-ci.org/kamilsk/Common.svg)](https://travis-ci.org/kamilsk/Common)
[![Tests status](http://php-eye.com/badge/kamilsk/common/tested.svg)](http://php-eye.com/package/kamilsk/common)
[![Latest stable version](https://poser.pugx.org/kamilsk/common/v/stable.png)](https://packagist.org/packages/kamilsk/common)
[![License](https://poser.pugx.org/kamilsk/common/license.png)](https://packagist.org/packages/kamilsk/common)

### Code quality

[![Code coverage](https://scrutinizer-ci.com/g/kamilsk/Common/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kamilsk/Common/?branch=master)
[![Scrutinizer code quality](https://scrutinizer-ci.com/g/kamilsk/Common/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kamilsk/Common/?branch=master)
[![Code Climate code quality](https://codeclimate.com/github/kamilsk/Common/badges/gpa.svg)](https://codeclimate.com/github/kamilsk/Common)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/37088460-5995-43cd-9dcb-920ca502984d/big.png)](https://insight.sensiolabs.com/projects/37088460-5995-43cd-9dcb-920ca502984d)

### Stats

[![Total downloads](https://poser.pugx.org/kamilsk/common/downloads.png)](https://packagist.org/packages/kamilsk/common)
[![Monthly downloads](https://poser.pugx.org/kamilsk/common/d/monthly.png)](https://packagist.org/packages/kamilsk/common)
[![Daily downloads](https://poser.pugx.org/kamilsk/common/d/daily.png)](https://packagist.org/packages/kamilsk/common)
[![Total references](https://www.versioneye.com/php/kamilsk:common/reference_badge.svg)](https://www.versioneye.com/php/kamilsk:common/references)

### Feedback

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/kamilsk/small-tools?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)
[![@ikamilsk](https://img.shields.io/badge/author-%40ikamilsk-blue.svg)](https://twitter.com/ikamilsk)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email feedback@octolab.org instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
