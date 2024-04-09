---
title: Get Balance
description: Check balance amount for a specific merchant.
method: GET
label: /api/v1/balance/{merchant_code}
toc: false
---

<x-row>
<x-col>

## Check balance amount

This API is used to check the merchant balance amount. It requires 1 post parameter `key`, which is included by
`merchant_code`

### Query Parameters

<x-properties>
  <x-property name="key" type="string" required>
    Key generated from parameters
  </x-property>
</x-properties>

### Parameters

<x-properties>
  <x-property name="merchant_code" type="string" required>
      The merchant code.
  </x-property>
</x-properties>

</x-col>

<x-col class="order-first md:order-last">

```bash
curl --request GET \
--url https://staging.s88pay.net/api/v1/balance/{merchant_code}
```

```json
{
    "balance": 100000,
    "currency_code": "INR",
    "currency_name": "India Rupee"
}
```

</x-col>
</x-row>
