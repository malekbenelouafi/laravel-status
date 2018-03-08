# Laravel Status

[![License](https://poser.pugx.org/malekbenelouafi/laravel-status/license)](LICENSE.md)
[![Latest Stable Version](https://poser.pugx.org/malekbenelouafi/laravel-status/version)](https://packagist.org/packages/malekbenelouafi/laravel-status)
[![Total Downloads](https://poser.pugx.org/malekbenelouafi/laravel-status/downloads)](https://packagist.org/packages/malekbenelouafi/laravel-status)
[![Latest Unstable Version](https://poser.pugx.org/malekbenelouafi/laravel-status/v/unstable)](//packagist.org/packages/malekbenelouafi/laravel-status)
[![License](https://poser.pugx.org/malekbenelouafi/laravel-status/license)](https://packagist.org/packages/malekbenelouafi/laravel-status)
[![composer.lock available](https://poser.pugx.org/malekbenelouafi/laravel-status/composerlock)](https://packagist.org/packages/malekbenelouafi/laravel-status)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/malekbenelouafi/laravel-status/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Build Status](https://scrutinizer-ci.com/g/malekbenelouafi/laravel-status/badges/build.png?b=master)](https://scrutinizer-ci.com/g/malekbenelouafi/laravel-status/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/malekbenelouafi/laravel-status/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/malekbenelouafi/laravel-status/?branch=master)

A simple, automatic Status check for any model based on Laravel 4.* - 5.*


### What are the benefits?

You can check the status of any module with sample way.

## Installation

To get started, require this package

- Via Composer

``` bash
 composer require malekbenelouafi/laravel-status
```

- Via composer.json file

Add the following to the `require` section of your projects `composer.json` file.
``` php
"malekbenelouafi/laravel-status": "1.*",
```

Run composer update to download the package

``` bash
 composer update
```

## Usage

#### Migrations


When using the migration you should add new column`status`.

``` php
$table->tinyInteger('status')->comment('0: inactive; 1: active');
```
it's will create column status name inside of our database schema, To be ready to receive check the model.



> Simply, the schema seems something like this.

``` php
Schema::create('users', function (Blueprint $table) {

  $table->increments('id');
  $table->tinyInteger('status')->comment('0: inactive; 1: active');
  ....
  ....
  $table->timestamps();
});
```


#### Models

Use this trait in any model.

To set up a model to using Uuid, simply use the HasStatus trait:

``` php
use Illuminate\Database\Eloquent\Model;
use Malekbenelouafi\LaravelStatus\HasStatus;

class ExampleModel extends Model
{
  use HasStatus;
  ....
}
```

#### Controller

When you create a new instance of a model which uses Status, our package will automatically by deafult get only active items also you can uses this scope methods:

- `ExampleModel::withInactive()`: to get all element together ( all ) 
- `ExampleModel::withoutInactive()`: to get items Without inactive element ( only active ) => by default
- `ExampleModel::onlyInactive()`: to get only inactive element

## Support

If you are having general issues with this package, feel free to contact me [malekbelouafi@gmail.com](malekbelouafi@gmail.com).

If you believe you have found an issue, please report it using the [GitHub issue tracker](https://github.com/Malekbenelouafi/laravel-status/issues), or better yet, fork the repository and submit a pull request.

If you're using this package, I'd love to hear your thoughts. Thanks!



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Malekbenelouafi/laravel-status.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Malekbenelouafi/laravel-status/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Malekbenelouafi/laravel-status.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Malekbenelouafi/laravel-status.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Malekbenelouafi/laravel-status.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Malekbenelouafi/laravel-status
[link-travis]: https://travis-ci.org/Malekbenelouafi/laravel-status
[link-scrutinizer]: https://scrutinizer-ci.com/g/Malekbenelouafi/laravel-status/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Malekbenelouafi/laravel-status
[link-downloads]: https://packagist.org/packages/Malekbenelouafi/laravel-status
[link-author]: https://github.com/Malekbenelouafi
[link-contributors]: ../../contributors
