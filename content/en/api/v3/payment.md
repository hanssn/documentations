---
title: Payment Request
description: Make payment request for INR, BDT, VND, JPY, BRL.
method: POST
label: /api/{merchant_code}/v3/dopayment
toc: false
---

<x-row>
<x-col class="md:max-w-lg">

## Make Payment Request

This API is used to create payment requests. This API requires 1 `key` parameter, which contains a combination of parameters separated by the `&` character and then encrypted using the encrypt_decrypt algorithm.

### Request Body

<x-properties>
  <x-property name="key" type="string" required>
  
  Key generated from [parameters](#parameters) with API key and API secret encryption.
  </x-property>
</x-properties>

</x-col>
<x-col sticky>

```bash title="cURL"
curl --request POST \
  --url https://staging.s88pay.net/api/{merchant_code}/v3/dopayment \
  --header 'Content-Type: application/json' \
  --data '{
      "key": "<string>"
    }'
```

</x-col>
</x-row>

---

<x-row>
<x-col class="md:max-w-lg">

### Parameters

<x-properties>
  <x-property name="merchant_code" type="string" required>
    Provide by Provider.
  </x-property>
  <x-property name="merchant_api_key" type="string" required>
    Provide by Provider.
  </x-property>
  <x-property name="transaction_code" type="string" required>
    Generated by the operator. Must be unique for each transaction.
  </x-property>
  <x-property name="transaction_timestamp" type="integer" required>
  Generate by the operator. 
  
  This parameter describes the transaction request
  TimeRanges. The more detailed information regardings timestamps, please visit https://www.epochconverter.com/.

  Please note that we only process the timestamp on these limit.

  `min`: 1 hour before now

  `max`: 5 minutes after now
  </x-property>
  <x-property name="transaction_amount" type="double" required>
    The amount of of the transaction.
  </x-property>
  <x-property name="payment_code" type="string" required>
    Example `P001`. Please contact the administrator to get your payment code.
  </x-property>
  <x-property name="user_id" type="string" required>
  </x-property>
  <x-property name="currency_code" type="string" required>
    Please refer to [currency list](/docs/currency).
  </x-property>
  <x-property name="bank_code" type="double" required>
    Required just on  [BDT](/docs/bank/bdt), [VND](/docs/bank/vnd), [THB](/docs/bank/thb), [IDR](/docs/bank/idr), [MYR](/docs/bank/myr), and [PHP](/docs/bank/php) online bank payment PaymentMethodChangeEvent.
  </x-property>
  <x-property name="deposit_name" type="string" required>
    Deposit name (mandatory for KRW).
  </x-property>
</x-properties>

</x-col>
<x-col sticky>

```json title="Parameters Object"
{
  "merchant_code": "kode_merchant_dari_provider",
  "merchant_api_key": "api_key_merchant_dari_provider",
  "transaction_code": "kode_unik_untuk_transaksi_ini",
  "transaction_timestamp": 1649767200, 
  "transaction_amount": 99.99,
  "payment_code": "P001",
  "user_id": "id_pengguna",
  "currency_code": "USD",
  "bank_code": "001", 
  "deposit_name": "nama_deposit" 
}
```

These parameters must be [encrypted](/api/authentication) before being sent through the [key](#request-body) body.

</x-col>
</x-row>

---

<x-row>
<x-col class="lg:max-w-md">

### Return

Returns a transaction status object. This call returns an [error](/api/errors) if an error occurs.

</x-col>
<x-col sticky>


```json title="Response INR"
{
 "status": "success",
 "message": "Submit Transaction Success!",
 "transaction_no": "DP16873387xxxxx",
 "transaction_code": "TEST-DP-16873xxxxx",
 "amount": "510.00",
 "upi_id": "example@upi",
 "qr":"https://s88pay.net/imageencoded=true&url=aHR0cHM6Ly9hcGkucGF5cHJvc3R1ZG
  vLmNvbS9hc3NldC91cGkvY2FjaGVkLzgzMmE1NmZlLTBkYzktNDc0Ni05NDhkLWFlYmY
  3E5NDlkMw==",
 "expired_at":"2023-06-22 15:06:04",
 "expired_timezone":"GMT+05:30",
}
```
```json title="Response BDT"
{
  "status": "success",
  "message": "Submit Transaction Success!",
  "transaction_no": "DP16873387xxxxx",
  "transaction_code": "TEST-DP-16873xxxxx",
  "amount": "510.00",
  "wallet_number": "01861843585",
  "wallet_number_type": "Agent",
  "wallet_name": "rocket",
  "wallet_code": "1001",
  "expired_at": "2023-06-22 15:06:04",
  "expired_timezone": "GMT+05:30"
}
```

```json title="Response VND"
{
  "status": "success",
  "message": "Submit Transaction Success!",
  "transaction_no": "DP16873387xxxxx",
  "transaction_code": "TEST-DP-16873xxxxx",
  "amount": "510.00",
  "wallet_number": "0797748156",
  "wallet_name": "Pham Chi Cuong",
  "wallet_code": "momo",
  "match_code": "685532",
  "expired_at": "2023-06-22 15:06:04",
  "expired_timezone": "GMT+05:30"
}
```

```json title="Response JPY"
{
  "status": "success",
  "message": "Submit Transaction Success!",
  "transaction_no": "DP1697771160414",
  "transaction_code": "TEST-DP-1697771160",
  "amount": "11111.00",
  "wallet_number": "カ）クレラル",
  "wallet_number_type": null,
  "wallet_name": "7276005",
  "wallet_code": "",
  "expired_at": "2023-10-20 12:21:00",
  "expired_timezone": "GMT+05:30"
}
```

</x-col>
</x-row>
