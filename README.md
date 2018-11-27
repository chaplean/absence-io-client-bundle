# absence-io-client-bundle

[![build status](https://git.chaplean.coop/open-source/bundle/absence-io-client-bundle/badges/master/build.svg)](https://git.chaplean.coop/open-source/bundle/absence-io-client-bundle/commits/master)
[![build status](https://git.chaplean.coop/open-source/bundle/absence-io-client-bundle/badges/master/coverage.svg)](https://git.chaplean.coop/open-source/bundle/absence-io-client-bundle/commits/master)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/chaplean/absence-io-client-bundle/issues)

This bundle allows you to use the [absence-io api](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis) easily from your php code.

## Table of content

* [Installation](#Installation)
* [Configuration](#Configuration)
* [Usage](#Usage)
* [Versioning](#Versioning)
* [Contributing](#Contributing)
* [Hacking](#Hacking)
* [License](#License)

## Installation

This bundle requires at least Symfony 3.0.

You can use [composer](https://getcomposer.org) to install absence-io-client-bundle:
```bash
composer require chaplean/absence-io-client-bundle
```

Then add to your AppKernel.php:

```php
new Chaplean\Bundle\AbsenceIoClientBundle\ChapleanAbsenceIoClientBundle(),
```

## Configuration

First you will need to import the bundle configuration.

config.yml:
```yaml
imports:
    - { resource: '@ChapleanAbsenceIoClientBundle/Resources/config/config.yml' }
```

You must also create some parameters.

parameters.yml:
```yaml
parameters:
    chaplean_absence_io_client.hawk_id: 'your hawk id'
    chaplean_absence_io_client.hawk_key: 'your hawk key'
```

For more information about hawk see https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#authentication.

## Usage

See the rest-client-bundle's [usage documentation](https://github.com/chaplean/rest-client-bundle#using-a-bundle-based-on-rest-client-bundle).

### Available functions:

* [Absences](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#12d2056f-21e8-20b0-e89b-5b5e0b8e0616)
    * [getAbsence()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#191890ad-7f0d-3c2d-11d8-ed91e6193944)
    * [postSearchAbsence()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#72b55ac7-c4bc-30dc-8cd8-6ac1e15f2639)
    * [postAbsence()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#f7548ccc-b114-46f8-493c-dc86b659dbbc)
    * [putAbsence()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#f6f7f6a0-4520-f550-6132-610076d58a91)

* [Allowance Types](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#7e86c7f2-ff48-acba-76ae-a401c957f9e3)
    * [getAllowanceType()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#ae42d612-c1ae-52da-0804-3fe77ba1a6fe)
    * [postAllowanceType()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#ddea0e36-bd15-1ed0-0b56-bd4c480d7cce)

* [Departments](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#4552e2f0-39de-52ec-58d4-76848393e2c9)
    * [getDepartement()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#a9c45164-59e5-3daf-93f2-4c64f6cc52f0)
    * [postDepartement()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#d596a243-9bc4-cb5f-dbc5-456c46437d09)

* [Locations](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#78cee65c-8f25-bee0-e985-502725a1f248)
    * [getLocation()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#11905bb3-ce8d-80b4-656b-4b9097e35825)
    * [postLocation()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#641bf728-23a1-538d-511f-5d1f69f15ba9)

* [Reasons](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#a9a86a1a-74f9-4891-b006-ffa804d80f18)
    * [getReason()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#2829e308-b906-3b27-10f7-52827f34dfdd)
    * [postReason()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#cd901260-489c-7437-aaff-65c14cb8e91e)

* [Teams](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#213ba0ba-11f2-f38c-693d-d1e5c250468b)
    * [getTeam()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#08486bf6-c138-5808-7c1d-7ead5c8b1aee)
    * [postTeam()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#ec24e740-47e6-3daa-5698-040f99ac9dfd)

* [Users](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#e5ed728e-a273-11da-b559-3c975acdfa84)
    * [getUser()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#3e128ded-9395-246f-6057-6c9cc6534a35)
    * [postUser()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#de1af2e7-9508-1492-d698-7079d93cf60a)
    * [putUser()](https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#9bfdfa67-5391-d0ee-04e7-20b5c1b7a04d)

## Versioning

absence-io-client-bundle follows [semantic versioning](https://semver.org/). In short the scheme is MAJOR.MINOR.PATCH where
1. MAJOR is bumped when there is a breaking change,
2. MINOR is bumped when a new feature is added in a backward-compatible way,
3. PATCH is bumped when a bug is fixed in a backward-compatible way.

Versions bellow 1.0.0 are considered experimental and breaking changes may occur at any time.

## Contributing

Contributions are welcomed! There are many ways to contribute, and we appreciate all of them. Here are some of the major ones:

* [Bug Reports](https://github.com/chaplean/absence-io-client-bundle/issues): While we strive for quality software, bugs can happen and we can't fix issues we're not aware of. So please report even if you're not sure about it or just want to ask a question. If anything the issue might indicate that the documentation can still be improved!
* [Feature Request](https://github.com/chaplean/absence-io-client-bundle/issues): You have a use case not covered by the current api? Want to suggest a change or add something? We'd be glad to read about it and start a discussion to try to find the best possible solution.
* [Pull Request](https://github.com/chaplean/absence-io-client-bundle/pulls): Want to contribute code or documentation? We'd love that! If you need help to get started, GitHub as [documentation](https://help.github.com/articles/about-pull-requests/) on pull requests. We use the ["fork and pull model"](https://help.github.com/articles/about-collaborative-development-models/) were contributors push changes to their personnal fork and then create pull requests to the main repository. Please make your pull requests against the `master` branch.

As a reminder, all contributors are expected to follow our [Code of Conduct](CODE_OF_CONDUCT.md).

## Hacking

You might find the following commands usefull when hacking on this project:

```bash
# Install dependencies
composer install

# Run tests
bin/phpunit
```

## License

absence-io-client-bundle is distributed under the terms of the MIT license.

See [LICENSE](LICENSE.md) for details.
