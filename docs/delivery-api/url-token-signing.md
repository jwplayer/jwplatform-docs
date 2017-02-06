# Protecting your content with URL Token Signing

Delivery API includes a security feature that allows you to restrict public access to videos or to videos plus players. This feature is enabled in the dashboard. When enabled, content can only be requested by constructing so-called signed links. These links will expire after a short time, preventing unauthorized sharing or leeching of your content.

## Enabling Signing Enforcement

You can require URL token signing for assets related to your account through the Management API [/accounts/update](https://developer.jwplayer.com/jw-platform/reference/v1/methods/accounts/update.html) call using the `allow_downloads` and `allow_embeds` parameters or via the dashboard as documented in the [support article](https://support.jwplayer.com/customer/en/portal/articles/1433647-jw-player-url-signing).

!!!warning
Please make sure you start to use signing on your site before changing this security setting! Unsigned videos and/or players will **drop dead** the instant you change this setting.
!!!

## JWT Tokenized Links

Delivery API /v2/ endpoints take advantage of standardized token signing using JSON Web Tokens (JWTs). You can learn more about the specific construction, formatting and security of these tokens via [RFC 7519](https://tools.ietf.org/html/rfc7519). Discussion, tools and links to open source libraries are available at [jwt.io](https://jwt.io)

JWTs consist of three sections:

* A *header* specifying the cryptographic algorithm and token type.
* A *payload* containing *claims* in JSON format
* A *signature* that can be used to verify the token

### JWT Header for JW Platform Requests

At this time, JW Platform only supports a single algorithm and token type thus all headers should be based on:

```javascript
    {
      "alg": "HS256",
      "typ": "JWT"
    }```

### JWT Payload for Delivery API Requests

The payload consists of claims that specify a resource being requested, an expiration time, and any parameters the endpoint accepts.

```javascript
{
  "resource": "/v2/playlists/bmBpP4x4",
  "exp": 1481580000
}```

**Required Claims:** All JW Platform JWTs MUST include the following claims.

```resource```

* The resource that is being requested. (e.g. /v2/playlists/K2oeSn8M) this ensures that generated tokens cannot be applied to unintended resources.

```exp```

* The expiration date of the token, as a UNIX timestamp (e.g. *1577836800*). Typically, generated URLs should be valid between a minute and a few hours.
  * The shorter you make the expiration dates, the more you lock down your content. If a link has expired, even download tools will not be able to grab the content. However, overly quick expirations can result in bad user experience dues to small discrepancies in server time or delays in clients requesting resources at the expiring links.
  * If you have a high-volume website, the extra signature generation step might be a performance issue. In that case, you could cache signed URLs with an interval of e.g. 5 minutes. Signed requests do not have to be unique.

**Additional Claims:** JWTs can also contain additional claims to specify additional query parameters that are applicable to that resource. Specific query parameters can be found in the Delivery API reference.

### JWT Signature for JW Platform Requests

The signature portion is generated using an HMAC 256 hash of the preceding sections and the API Secret of the property for the content you are requesting. The specific details can be found in [RFC 7519](https://tools.ietf.org/html/rfc7519) but we recommend using a well supported [open source library](https://jwt.io/#libraries) in the language of your choice.

!!!warning
Because URL tokens use the property's API secret, it is inappropriate to generate them client-side as you would be exposing your secret to end users.
!!!

## Constructing URLs with tokens

To construct a URL with the JWT you created, simply include it as a single query parameter named `token` for the resource you are requesting.
For example, this [link](https://cdn.jwplayer.com/v2/playlists/K2oeSn8M?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXNvdXJjZSI6Ii92Mi9wbGF5bGlzdHMvSzJvZVNuOE0iLCJleHAiOjE1Nzc4MzY4MDAsInJlbGF0ZWRfbWVkaWFfaWQiOiI4WVpvSFI3VCJ9.bauVrH5MC-qFZHrpLtK5j5nAGW7wJ0l1XA0qclTuS8o) corresponds to the parameters described above.

If you would like to get started playing with JWTs manually, jwt.io offers nice debugging tool. [This link](https://jwt.io/#debugger?&id_token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXNvdXJjZSI6Ii92Mi9wbGF5bGlzdHMvSzJvZVNuOE0iLCJleHAiOjE1Nzc4MzY4MDAsInJlbGF0ZWRfbWVkaWFfaWQiOiI4WVpvSFI3VCJ9.bauVrH5MC-qFZHrpLtK5j5nAGW7wJ0l1XA0qclTuS8o) will get you started with the token above; you will need to change the payload and secret to reflect a assets and the secret of your property.


## Error handling

When unsigned content is requested while signing is enabled, the Delivery API will return a **403 Forbidden** HTTP Status.

When incorrectly signed content is requested, the content service will also return a **403 Forbidden** HTTP Status. Signed URLs can be incorrect due to a wrong signature or due to an already expired timestamp.

Note that incorrectly signed URLs will always return a 403. Correctly signed, unexpired URLs will always work. Use this to test your signing mechanism and start using it across your site before enabling the security enforcement in the dashboard.
