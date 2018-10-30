## Getting Started

Run the following commands to get started:

- [composer install].
- [php artisan serve].
- [Now open](http://127.0.0.1:8000/).
- [Click on Score](http://127.0.0.1:8000/score).

## Library

The library file `app/Helpers/EAFF.php` function for loading transaction data from the text file:

```php
public static function txn_data() {
    $data = file_get_contents(public_path('data\txn_data.txt'));
    return $data;
}
```

The library file `app/Helpers/EAFF.php` function for getting scores form the transaction data:

```php
public static function txn_data() {
    $data = file_get_contents(public_path('data\txn_data.txt'));
    return $data;
}
```

## Transaction

Transactions Score:
- [24 is the total score](https://127.0.0.1:8000/transact).

Tests to carry out:
- [PHP Unit Test](https://ravepay.co/).