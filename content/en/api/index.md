---
title: Introduction
description: Intro
---

To be able to make S88pay via API, the operator has to create a URL that contains the token and parameter. you can
clearly look at **API function** documentation for URL and parameters.

Refer to security on pre-requirement, the parameter is usually using key with encrypt function. you can look at the
[encrypt / decrypt](/api-reference/encrypt-decrypt).

## Make a request

Let's say we want to make payment request, the enpoint must be dopayment. And we look at the parameters required

<x-steps>

### Combine all parameters into one string, separated by `&` character

for example, to make request in our services.

```php
$str =
merchant_code=xxx&merchant_api_key=xxx&transaction_code=xxx&transaction_timestamp=xxx&payment_code=xxx&transaction_amount=xxx&user_id=xxx&currency_code=xxx
```

### Encrypt using encrypt_decrypt

Learn more about [encrypt_decrypt ](/api-reference/encrypt-decrypt)

Encryption sample:

```php
$key = encrypt_decrypt('encrypt', $str, '{your_api_key}', '{your_secret_key}')
```

### Done

So, the request will be:

</x-steps>
