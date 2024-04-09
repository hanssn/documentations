---
title: Deposit Callback (Operator)
toc: false
---

<x-row>
<x-col class="md:max-w-lg">

After the operator sends a payment request to dopayment / deposit, the provider will process it. Once the provider
receives the transaction status ( success or failure ), the provider will call this API to forward the transaction
status.

For key, you need to decrypt with `api_key` and `api_secret`. Besides the key, we also send the transaction code in the `transaction_code` parameter and the transaction number in the `transaction_no` parameter, which is not encrypted.

</x-col>
<x-col>

```bash cURL
curl --request POST \
--url https://s88pay.net/api/v1/transaction/resend-callback/SKU20210909025705 \
--header 'Content-Type: application/json' \
--data '{
    "key": "<string>",
    "transaction_code": "<string>",
    "transaction_no": "<string>"
}'
```
</x-col>
</x-row>

After decrypting the parameters, you will find that the parameters are:

## Parameters
<x-row>
<x-col>        
  <x-properties>
    <x-property name="transaction_code" type="string">
        The transaction code that is sent by the operator on dopayment.
    </x-property>
    <x-property name="transaction_status" type="integer">
        The status of the deposit transaction.
    </x-property>
    <x-property name="transaction_amount" type="double">
        The amount of the transaction.
    </x-property>
    <x-property name="transaction_fee" type="double">
        The amount of fee transaction.
    </x-property>
    <x-property name="currency_code" type="string">
        Currency Code, please refer to currency list.
    </x-property>
    <x-property name="transaction_no" type="string">
        The transaction code on the provider’s database.
    </x-property>
    <x-property name="transaction_actual_amount" type="double">
        The actual amount paid by the member.
    </x-property>
  </x-properties>
</x-col>
<x-col>
  
  ```json
  {
      "transaction_code": "",
      "transaction_status": "",
      "transaction_amount": "",
      "transaction_fee": "",
      "currency_code": "",
      "transaction_no": "",
      "transaction_actual_amount": ""
  }
  ```
</x-col>
</x-row>