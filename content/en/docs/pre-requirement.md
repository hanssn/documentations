---
title: Pre Requiremnt
description: Before using {brand} Payment Gateway
---

## Pre Requirement Provide by Provider

1. Server info & A PI URL
2. Credential API : `api_key`, `secret_key`, `merchant_code`
3. Credential BO : username, password

## Pre-Requirement Provide by Operator

1. API Callback URL (mandatory). Used to forward transaction status
2. Callback `success url page` (optional).
3. Callback `failed url page` (optional)

## Security

1. Token and transaction key (Need to create token and key for each transaction). More about generate token encrypt /
   decript function
2. IP White list for Back Office login
