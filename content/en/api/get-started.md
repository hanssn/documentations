---
title: Get started with the {brand} API
description: Send your first API request.
toc: true
---

Every call to a {brand} API must include an API secret key. After you create a {brand} account, we generate two pairs of API keys for you – a publishable client-side key and a secret server-side key – for both test and live modes. To start moving real money with your live-mode keys, you need to activate your account.

---

## Before you begin
First, create a {brand} account or sign in.

This guide walks you through a simple interaction with the {brand} API: creating a customer. For a fuller view of the API objects and how they fit together, take a tour of the API or visit the API reference documentation.

## Send your first API request

To be able to make request to {brand} API, the operator has to create a URL that contains the token and parameter. you can
clearly look at **API function** Section for URL and parameters.

Let's say we want to make payment, so we use the [Payment Enpoint]('/api/payment') to make request. And we look at the parameters required.

<x-steps>

### Combine all parameters into one string, separated by `&` character

for example, to make request in our services.

```php
$str = "merchant_code=xxx&'
    .'merchant_api_key=xxx&'
    .'transaction_code=xxx&'
    .'transaction_timestamp=xxx&'
    .'payment_code=xxx&'
    .'transaction_amount=xxx&'
    .'user_id=xxx&'
    .'currency_code=xxx"
```

### Encrypt using encrypt_decrypt

Refer to security on pre-requirement, the attribute to send is usually just using **one key** with encrypted parameters. for more info please read more [Authentication & Security]('/api/authentication')

Encryption sample:

```php
$key = encrypt_decrypt('encrypt', $str, '{your_api_key}', '{your_secret_key}')
```

### Done

So, the request will look like: 

```
https://{base_url}/{merchant_code}/v2/dopayment?key=3eX%2Bf%2BMoVECXxSkKqV7aBRYIbyWg3DxdPdgZyG%2B377a7dR1OBBDNnU%2B%2Fvtn7hUyjP7WWdZ7gCsPF0J%2BJOiSxb1BFueIyRX3rxbSMa%2B%2FAyFvhz4L%2F2wJmSJKcNQn4whIL1sc1cfj7E1smQFAiYjfLXdY1Ev6Pnoit8Vouex3%2BupnZjJS8t44XRx5wugB5GuybZWPtlPhiN%2FP7P4uJW3RlFlo%2BtYrnHQ6GwqwRkoLrdv3qZXUzaatT8EWdztr973KWFDof2rVD%2B56SMAVrRHQZcYICU8RcjpyvJUaCtXpOKKg%3D 
```

</x-steps>
