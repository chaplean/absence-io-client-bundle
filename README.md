# ChapleanAbsenceIoClientBundle

![Codeship Status for chaplean/absence-io-client-bundle](https://app.codeship.com/projects/1ca4a5e0-97d2-0135-385d-161fd251d857/status?branch=master)

# Prerequisites

This version of the bundle requires Symfony 2.8+.

# Installation

## 1. Composer

```bash
composer require chaplean/absence-io-client-bundle
```


## 2. AppKernel.php

Add
```php
new Chaplean\Bundle\AbsenceIoClientBundle\ChapleanAbsenceIoClientBundle(),
```


# Configuration

## 1. config.yml
```yml
imports:
    - { resource: '@ChapleanAbsenceIoClientBundle/Resources/config/config.yml' }
```

## 2. paramters.yml

For more information about hawk see https://documenter.getpostman.com/view/799228/absenceio-api-documentation/2Fwbis#authentication.

```yml
chaplean_absence_io_client.hawk_id: 'your hawk id'
chaplean_absence_io_client.hawk_key: 'your hawk key'
```
