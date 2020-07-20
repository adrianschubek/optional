# Optional
[![Latest Stable Version](https://poser.pugx.org/adrianschubek/optional/v)](//packagist.org/packages/adrianschubek/optional)
[![License](https://poser.pugx.org/adrianschubek/optional/license)](//packagist.org/packages/adrianschubek/optional)   
An optional helper supporting [macros](https://github.com/adrianschubek/macro).
## Installation
```
composer require adrianschubek/optional
```
## Example
```php
// UserRepository::find(123) returns `null`

$balance = optional(UserRepository::find(123))->getBankAccount()->getBalance(); // Ok, no error. returns null

$balance = UserRepository::find(123)->getBankAccount()->getBalance(); // Error
```
