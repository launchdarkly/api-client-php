This repository contains a client library for LaunchDarkly's REST API. This client was automatically
generated from our [OpenAPI specification](https://app.launchdarkly.com/api/v2/openapi.json) using a [code generation library](https://github.com/launchdarkly/ld-openapi). View our [sample code](#getting-started) for example usage.

This REST API is for custom integrations, data export, or automating your feature flag workflows. *DO NOT* use this client library to include feature flags in your web or mobile application. To integrate feature flags with your application, read the [SDK documentation](https://docs.launchdarkly.com/sdk).

This client library is only compatible with the latest version of our REST API, version `20220603`. Previous versions of this client library, prior to version 10.0.0, are only compatible with earlier versions of our REST API. When you create an access token, you can set the REST API version associated with the token. By default, API requests you send using the token will use the specified API version. To learn more, read [Versioning](https://apidocs.launchdarkly.com/#section/Overview/Versioning).
# OpenAPIClient-php

# Overview

## Authentication

All REST API resources are authenticated with either [personal or service access tokens](https://docs.launchdarkly.com/home/account-security/api-access-tokens), or session cookies. Other authentication mechanisms are not supported. You can manage personal access tokens on your [**Account settings**](https://app.launchdarkly.com/settings/tokens) page.

LaunchDarkly also has SDK keys, mobile keys, and client-side IDs that are used by our server-side SDKs, mobile SDKs, and JavaScript-based SDKs, respectively. **These keys cannot be used to access our REST API**. These keys are environment-specific, and can only perform read-only operations such as fetching feature flag settings.

| Auth mechanism                                                                                  | Allowed resources                                                                                     | Use cases                                          |
| ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------- |
| [Personal or service access tokens](https://docs.launchdarkly.com/home/account-security/api-access-tokens) | Can be customized on a per-token basis                                                                | Building scripts, custom integrations, data export. |
| SDK keys                                                                                        | Can only access read-only resources specific to server-side SDKs. Restricted to a single environment. | Server-side SDKs                     |
| Mobile keys                                                                                     | Can only access read-only resources specific to mobile SDKs, and only for flags marked available to mobile keys. Restricted to a single environment.           | Mobile SDKs                                        |
| Client-side ID                                                                                  | Can only access read-only resources specific to JavaScript-based client-side SDKs, and only for flags marked available to client-side. Restricted to a single environment.           | Client-side JavaScript                             |

> #### Keep your access tokens and SDK keys private
>
> Access tokens should _never_ be exposed in untrusted contexts. Never put an access token in client-side JavaScript, or embed it in a mobile application. LaunchDarkly has special mobile keys that you can embed in mobile apps. If you accidentally expose an access token or SDK key, you can reset it from your [**Account settings**](https://app.launchdarkly.com/settings/tokens) page.
>
> The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.

### Authentication using request header

The preferred way to authenticate with the API is by adding an `Authorization` header containing your access token to your requests. The value of the `Authorization` header must be your access token.

Manage personal access tokens from the [**Account settings**](https://app.launchdarkly.com/settings/tokens) page.

### Authentication using session cookie

For testing purposes, you can make API calls directly from your web browser. If you are logged in to the LaunchDarkly application, the API will use your existing session to authenticate calls.

If you have a [role](https://docs.launchdarkly.com/home/team/built-in-roles) other than Admin, or have a [custom role](https://docs.launchdarkly.com/home/team/custom-roles) defined, you may not have permission to perform some API calls. You will receive a `401` response code in that case.

> ### Modifying the Origin header causes an error
>
> LaunchDarkly validates that the Origin header for any API request authenticated by a session cookie matches the expected Origin header. The expected Origin header is `https://app.launchdarkly.com`.
>
> If the Origin header does not match what's expected, LaunchDarkly returns an error. This error can prevent the LaunchDarkly app from working correctly.
>
> Any browser extension that intentionally changes the Origin header can cause this problem. For example, the `Allow-Control-Allow-Origin: *` Chrome extension changes the Origin header to `http://evil.com` and causes the app to fail.
>
> To prevent this error, do not modify your Origin header.
>
> LaunchDarkly does not require origin matching when authenticating with an access token, so this issue does not affect normal API usage.

## Representations

All resources expect and return JSON response bodies. Error responses also send a JSON body. To learn more about the error format of the API, read [Errors](/#section/Overview/Errors).

In practice this means that you always get a response with a `Content-Type` header set to `application/json`.

In addition, request bodies for `PATCH`, `POST`, `PUT`, and `REPORT` requests must be encoded as JSON with a `Content-Type` header set to `application/json`.

### Summary and detailed representations

When you fetch a list of resources, the response includes only the most important attributes of each resource. This is a _summary representation_ of the resource. When you fetch an individual resource, such as a single feature flag, you receive a _detailed representation_ of the resource.

The best way to find a detailed representation is to follow links. Every summary representation includes a link to its detailed representation.

### Expanding responses

Sometimes the detailed representation of a resource does not include all of the attributes of the resource by default. If this is the case, the request method will clearly document this and describe which attributes you can include in an expanded response.

To include the additional attributes, append the `expand` request parameter to your request and add a comma-separated list of the attributes to include. For example, when you append `?expand=members,roles` to the [Get team](/tag/Teams#operation/getTeam) endpoint, the expanded response includes both of these attributes.

### Links and addressability

The best way to navigate the API is by following links. These are attributes in representations that link to other resources. The API always uses the same format for links:

- Links to other resources within the API are encapsulated in a `_links` object
- If the resource has a corresponding link to HTML content on the site, it is stored in a special `_site` link

Each link has two attributes:

- An `href`, which contains the URL
- A `type`, which describes the content type

For example, a feature resource might return the following:

```json
{
  \"_links\": {
    \"parent\": {
      \"href\": \"/api/features\",
      \"type\": \"application/json\"
    },
    \"self\": {
      \"href\": \"/api/features/sort.order\",
      \"type\": \"application/json\"
    }
  },
  \"_site\": {
    \"href\": \"/features/sort.order\",
    \"type\": \"text/html\"
  }
}
```

From this, you can navigate to the parent collection of features by following the `parent` link, or navigate to the site page for the feature by following the `_site` link.

Collections are always represented as a JSON object with an `items` attribute containing an array of representations. Like all other representations, collections have `_links` defined at the top level.

Paginated collections include `first`, `last`, `next`, and `prev` links containing a URL with the respective set of elements in the collection.

## Updates

Resources that accept partial updates use the `PATCH` verb. Most resources support the [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) format. Some resources also support the [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) format, and some resources support the [semantic patch](/reference#updates-using-semantic-patch) format, which is a way to specify the modifications to perform as a set of executable instructions. Each resource supports optional [comments](/reference#updates-with-comments) that you can submit with updates. Comments appear in outgoing webhooks, the audit log, and other integrations.

When a resource supports both JSON patch and semantic patch, we document both in the request method. However, the specific request body fields and descriptions included in our documentation only match one type of patch or the other.

### Updates using JSON patch

[JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) is a way to specify the modifications to perform on a resource. JSON patch uses paths and a limited set of operations to describe how to transform the current state of the resource into a new state. JSON patch documents are always arrays, where each element contains an operation, a path to the field to update, and the new value.

For example, in this feature flag representation:

```json
{
    \"name\": \"New recommendations engine\",
    \"key\": \"engine.enable\",
    \"description\": \"This is the description\",
    ...
}
```
You can change the feature flag's description with the following patch document:

```json
[{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"This is the new description\" }]
```

You can specify multiple modifications to perform in a single request. You can also test that certain preconditions are met before applying the patch:

```json
[
  { \"op\": \"test\", \"path\": \"/version\", \"value\": 10 },
  { \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" }
]
```

The above patch request tests whether the feature flag's `version` is `10`, and if so, changes the feature flag's description.

Attributes that are not editable, such as a resource's `_links`, have names that start with an underscore.

### Updates using JSON merge patch

[JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) is another format for specifying the modifications to perform on a resource. JSON merge patch is less expressive than JSON patch. However, in many cases it is simpler to construct a merge patch document. For example, you can change a feature flag's description with the following merge patch document:

```json
{
  \"description\": \"New flag description\"
}
```

### Updates using semantic patch

The API also supports the semantic patch format. A semantic patch is a way to specify the modifications to perform on a resource as a set of executable instructions.

Semantic patch allows you to be explicit about intent using precise, custom instructions. In many cases, you can define semantic patch instructions independently of the current state of the resource. This can be useful when defining a change that may be applied at a future date.

To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header.

Here's how:

```
Content-Type: application/json; domain-model=launchdarkly.semanticpatch
```

If you call a semantic patch resource without this header, you will receive a `400` response because your semantic patch will be interpreted as a JSON patch.

The body of a semantic patch request takes the following properties:

* `comment` (string): (Optional) A description of the update.
* `environmentKey` (string): (Required for some resources only) The environment key.
* `instructions` (array): (Required) A list of actions the update should perform. Each action in the list must be an object with a `kind` property that indicates the instruction. If the instruction requires parameters, you must include those parameters as additional fields in the object. The documentation for each resource that supports semantic patch includes the available instructions and any additional parameters.

For example:

```json
{
  \"comment\": \"optional comment\",
  \"instructions\": [ {\"kind\": \"turnFlagOn\"} ]
}
```

If any instruction in the patch encounters an error, the endpoint returns an error and will not change the resource. In general, each instruction silently does nothing if the resource is already in the state you request.

### Updates with comments

You can submit optional comments with `PATCH` changes.

To submit a comment along with a JSON patch document, use the following format:

```json
{
  \"comment\": \"This is a comment string\",
  \"patch\": [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" }]
}
```

To submit a comment along with a JSON merge patch document, use the following format:

```json
{
  \"comment\": \"This is a comment string\",
  \"merge\": { \"description\": \"New flag description\" }
}
```

To submit a comment along with a semantic patch, use the following format:

```json
{
  \"comment\": \"This is a comment string\",
  \"instructions\": [ {\"kind\": \"turnFlagOn\"} ]
}
```

## Errors

The API always returns errors in a common format. Here's an example:

```json
{
  \"code\": \"invalid_request\",
  \"message\": \"A feature with that key already exists\",
  \"id\": \"30ce6058-87da-11e4-b116-123b93f75cba\"
}
```

The `code` indicates the general class of error. The `message` is a human-readable explanation of what went wrong. The `id` is a unique identifier. Use it when you're working with LaunchDarkly Support to debug a problem with a specific API call.

### HTTP status error response codes

| Code | Definition        | Description                                                                                       | Possible Solution                                                |
| ---- | ----------------- | ------------------------------------------------------------------------------------------- | ---------------------------------------------------------------- |
| 400  | Invalid request       | The request cannot be understood.                                    | Ensure JSON syntax in request body is correct.                   |
| 401  | Invalid access token      | Requestor is unauthorized or does not have permission for this API call.                                                | Ensure your API access token is valid and has the appropriate permissions.                                     |
| 403  | Forbidden         | Requestor does not have access to this resource.                                                | Ensure that the account member or access token has proper permissions set. |
| 404  | Invalid resource identifier | The requested resource is not valid. | Ensure that the resource is correctly identified by id or key. |
| 405  | Method not allowed | The request method is not allowed on this resource. | Ensure that the HTTP verb is correct. |
| 409  | Conflict          | The API request can not be completed because it conflicts with a concurrent API request. | Retry your request.                                              |
| 422  | Unprocessable entity | The API request can not be completed because the update description can not be understood. | Ensure that the request body is correct for the type of patch you are using, either JSON patch or semantic patch.
| 429  | Too many requests | Read [Rate limiting](/#section/Overview/Rate-limiting).                                               | Wait and try again later.                                        |

## CORS

The LaunchDarkly API supports Cross Origin Resource Sharing (CORS) for AJAX requests from any origin. If an `Origin` header is given in a request, it will be echoed as an explicitly allowed origin. Otherwise the request returns a wildcard, `Access-Control-Allow-Origin: *`. For more information on CORS, read the [CORS W3C Recommendation](http://www.w3.org/TR/cors). Example CORS headers might look like:

```http
Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, Authorization
Access-Control-Allow-Methods: OPTIONS, GET, DELETE, PATCH
Access-Control-Allow-Origin: *
Access-Control-Max-Age: 300
```

You can make authenticated CORS calls just as you would make same-origin calls, using either [token or session-based authentication](/#section/Overview/Authentication). If you are using session authentication, you should set the `withCredentials` property for your `xhr` request to `true`. You should never expose your access tokens to untrusted users.

## Rate limiting

We use several rate limiting strategies to ensure the availability of our APIs. Rate-limited calls to our APIs return a `429` status code. Calls to our APIs include headers indicating the current rate limit status. The specific headers returned depend on the API route being called. The limits differ based on the route, authentication mechanism, and other factors. Routes that are not rate limited may not contain any of the headers described below.

> ### Rate limiting and SDKs
>
> LaunchDarkly SDKs are never rate limited and do not use the API endpoints defined here. LaunchDarkly uses a different set of approaches, including streaming/server-sent events and a global CDN, to ensure availability to the routes used by LaunchDarkly SDKs.

### Global rate limits

Authenticated requests are subject to a global limit. This is the maximum number of calls that your account can make to the API per ten seconds. All personal access tokens on the account share this limit, so exceeding the limit with one access token will impact other tokens. Calls that are subject to global rate limits return the headers below:

| Header name                    | Description                                                                      |
| ------------------------------ | -------------------------------------------------------------------------------- |
| `X-Ratelimit-Global-Remaining` | The maximum number of requests the account is permitted to make per ten seconds. |
| `X-Ratelimit-Reset`            | The time at which the current rate limit window resets in epoch milliseconds.    |

We do not publicly document the specific number of calls that can be made globally. This limit may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limit.

### Route-level rate limits

Some authenticated routes have custom rate limits. These also reset every ten seconds. Any access tokens hitting the same route share this limit, so exceeding the limit with one access token may impact other tokens. Calls that are subject to route-level rate limits return the headers below:

| Header name                   | Description                                                                                           |
| ----------------------------- | ----------------------------------------------------------------------------------------------------- |
| `X-Ratelimit-Route-Remaining` | The maximum number of requests to the current route the account is permitted to make per ten seconds. |
| `X-Ratelimit-Reset`           | The time at which the current rate limit window resets in epoch milliseconds.                         |

A _route_ represents a specific URL pattern and verb. For example, the [Delete environment](/tag/Environments#operation/deleteEnvironment) endpoint is considered a single route, and each call to delete an environment counts against your route-level rate limit for that route.

We do not publicly document the specific number of calls that an account can make to each endpoint per ten seconds. These limits may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limits.

### IP-based rate limiting

We also employ IP-based rate limiting on some API routes. If you hit an IP-based rate limit, your API response will include a `Retry-After` header indicating how long to wait before re-trying the call. Clients must wait at least `Retry-After` seconds before making additional calls to our API, and should employ jitter and backoff strategies to avoid triggering rate limits again.

## OpenAPI (Swagger) and client libraries

We have a [complete OpenAPI (Swagger) specification](https://app.launchdarkly.com/api/v2/openapi.json) for our API.

We auto-generate multiple client libraries based on our OpenAPI specification. To learn more, visit the [collection of client libraries on GitHub](https://github.com/search?q=topic%3Alaunchdarkly-api+org%3Alaunchdarkly&type=Repositories). You can also use this specification to generate client libraries to interact with our REST API in your language of choice.

Our OpenAPI specification is supported by several API-based tools such as Postman and Insomnia. In many cases, you can directly import our specification to explore our APIs.

## Method overriding

Some firewalls and HTTP clients restrict the use of verbs other than `GET` and `POST`. In those environments, our API endpoints that use `DELETE`, `PATCH`, and `PUT` verbs are inaccessible.

To avoid this issue, our API supports the `X-HTTP-Method-Override` header, allowing clients to \"tunnel\" `DELETE`, `PATCH`, and `PUT` requests using a `POST` request.

For example, to call a `PATCH` endpoint using a `POST` request, you can include `X-HTTP-Method-Override:PATCH` as a header.

## Beta resources

We sometimes release new API resources in **beta** status before we release them with general availability.

Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.

We try to promote resources into general availability as quickly as possible. This happens after sufficient testing and when we're satisfied that we no longer need to make backwards-incompatible changes.

We mark beta resources with a \"Beta\" callout in our documentation, pictured below:

> ### This feature is in beta
>
> To use this feature, pass in a header including the `LD-API-Version` key with value set to `beta`. Use this header with each call. To learn more, read [Beta resources](/#section/Overview/Beta-resources).
>
> Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.

### Using beta resources

To use a beta resource, you must include a header in the request. If you call a beta resource without this header, you receive a `403` response.

Use this header:

```
LD-API-Version: beta
```

## Versioning

We try hard to keep our REST API backwards compatible, but we occasionally have to make backwards-incompatible changes in the process of shipping new features. These breaking changes can cause unexpected behavior if you don't prepare for them accordingly.

Updates to our REST API include support for the latest features in LaunchDarkly. We also release a new version of our REST API every time we make a breaking change. We provide simultaneous support for multiple API versions so you can migrate from your current API version to a new version at your own pace.

### Setting the API version per request

You can set the API version on a specific request by sending an `LD-API-Version` header, as shown in the example below:

```
LD-API-Version: 20220603
```

The header value is the version number of the API version you would like to request. The number for each version corresponds to the date the version was released in `yyyymmdd` format. In the example above the version `20220603` corresponds to June 03, 2022.

### Setting the API version per access token

When you create an access token, you must specify a specific version of the API to use. This ensures that integrations using this token cannot be broken by version changes.

Tokens created before versioning was released have their version set to `20160426`, which is the version of the API that existed before the current versioning scheme, so that they continue working the same way they did before versioning.

If you would like to upgrade your integration to use a new API version, you can explicitly set the header described above.

> ### Best practice: Set the header for every client or integration
>
> We recommend that you set the API version header explicitly in any client or integration you build.
>
> Only rely on the access token API version during manual testing.

### API version changelog

|<div style=\"width:75px\">Version</div> | Changes | End of life (EOL)
|---|---|---|
| `20220603` | <ul><li>Changed the [list projects](/tag/Projects#operation/getProjects) return value:<ul><li>Response is now paginated with a default limit of `20`.</li><li>Added support for filter and sort.</li><li>The project `environments` field is now expandable. This field is omitted by default.</li></ul></li><li>Changed the [get project](/tag/Projects#operation/getProject) return value:<ul><li>The `environments` field is now expandable. This field is omitted by default.</li></ul></li></ul> | Current |
| `20210729` | <ul><li>Changed the [create approval request](/tag/Approvals#operation/postApprovalRequest) return value. It now returns HTTP Status Code `201` instead of `200`.</li><li> Changed the [get users](/tag/Users#operation/getUser) return value. It now returns a user record, not a user. </li><li>Added additional optional fields to environment, segments, flags, members, and segments, including the ability to create Big Segments. </li><li> Added default values for flag variations when new environments are created. </li><li>Added filtering and pagination for getting flags and members, including `limit`, `number`, `filter`, and `sort` query parameters. </li><li>Added endpoints for expiring user targets for flags and segments, scheduled changes, access tokens, Relay Proxy configuration, integrations and subscriptions, and approvals. </li></ul> | 2023-06-03 |
| `20191212` | <ul><li>[List feature flags](/tag/Feature-flags#operation/getFeatureFlags) now defaults to sending summaries of feature flag configurations, equivalent to setting the query parameter `summary=true`. Summaries omit flag targeting rules and individual user targets from the payload. </li><li> Added endpoints for flags, flag status, projects, environments, users, audit logs, members, users, custom roles, segments, usage, streams, events, and data export. </li></ul> | 2022-07-29 |
| `20160426` | <ul><li>Initial versioning of API. Tokens created before versioning have their version set to this.</li></ul> | 2020-12-12 |


For more information, please visit [https://support.launchdarkly.com](https://support.launchdarkly.com).

## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/launchdarkly/api-client-php.git"
    }
  ],
  "require": {
    "launchdarkly/api-client-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: ApiKey
$config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = LaunchDarklyApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new LaunchDarklyApi\Api\AccessTokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the access token to update

try {
    $apiInstance->deleteToken($id);
} catch (Exception $e) {
    echo 'Exception when calling AccessTokensApi->deleteToken: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://app.launchdarkly.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccessTokensApi* | [**deleteToken**](docs/Api/AccessTokensApi.md#deletetoken) | **DELETE** /api/v2/tokens/{id} | Delete access token
*AccessTokensApi* | [**getToken**](docs/Api/AccessTokensApi.md#gettoken) | **GET** /api/v2/tokens/{id} | Get access token
*AccessTokensApi* | [**getTokens**](docs/Api/AccessTokensApi.md#gettokens) | **GET** /api/v2/tokens | List access tokens
*AccessTokensApi* | [**patchToken**](docs/Api/AccessTokensApi.md#patchtoken) | **PATCH** /api/v2/tokens/{id} | Patch access token
*AccessTokensApi* | [**postToken**](docs/Api/AccessTokensApi.md#posttoken) | **POST** /api/v2/tokens | Create access token
*AccessTokensApi* | [**resetToken**](docs/Api/AccessTokensApi.md#resettoken) | **POST** /api/v2/tokens/{id}/reset | Reset access token
*AccountMembersApi* | [**deleteMember**](docs/Api/AccountMembersApi.md#deletemember) | **DELETE** /api/v2/members/{id} | Delete account member
*AccountMembersApi* | [**getMember**](docs/Api/AccountMembersApi.md#getmember) | **GET** /api/v2/members/{id} | Get account member
*AccountMembersApi* | [**getMembers**](docs/Api/AccountMembersApi.md#getmembers) | **GET** /api/v2/members | List account members
*AccountMembersApi* | [**patchMember**](docs/Api/AccountMembersApi.md#patchmember) | **PATCH** /api/v2/members/{id} | Modify an account member
*AccountMembersApi* | [**postMemberTeams**](docs/Api/AccountMembersApi.md#postmemberteams) | **POST** /api/v2/members/{id}/teams | Add a member to teams
*AccountMembersApi* | [**postMembers**](docs/Api/AccountMembersApi.md#postmembers) | **POST** /api/v2/members | Invite new members
*AccountMembersBetaApi* | [**patchMembers**](docs/Api/AccountMembersBetaApi.md#patchmembers) | **PATCH** /api/v2/members | Modify account members
*AccountUsageBetaApi* | [**getEvaluationsUsage**](docs/Api/AccountUsageBetaApi.md#getevaluationsusage) | **GET** /api/v2/usage/evaluations/{projectKey}/{environmentKey}/{featureFlagKey} | Get evaluations usage
*AccountUsageBetaApi* | [**getEventsUsage**](docs/Api/AccountUsageBetaApi.md#geteventsusage) | **GET** /api/v2/usage/events/{type} | Get events usage
*AccountUsageBetaApi* | [**getMauSdksByType**](docs/Api/AccountUsageBetaApi.md#getmausdksbytype) | **GET** /api/v2/usage/mau/sdks | Get MAU SDKs by type
*AccountUsageBetaApi* | [**getMauUsage**](docs/Api/AccountUsageBetaApi.md#getmauusage) | **GET** /api/v2/usage/mau | Get MAU usage
*AccountUsageBetaApi* | [**getMauUsageByCategory**](docs/Api/AccountUsageBetaApi.md#getmauusagebycategory) | **GET** /api/v2/usage/mau/bycategory | Get MAU usage by category
*AccountUsageBetaApi* | [**getStreamUsage**](docs/Api/AccountUsageBetaApi.md#getstreamusage) | **GET** /api/v2/usage/streams/{source} | Get stream usage
*AccountUsageBetaApi* | [**getStreamUsageBySdkVersion**](docs/Api/AccountUsageBetaApi.md#getstreamusagebysdkversion) | **GET** /api/v2/usage/streams/{source}/bysdkversion | Get stream usage by SDK version
*AccountUsageBetaApi* | [**getStreamUsageSdkversion**](docs/Api/AccountUsageBetaApi.md#getstreamusagesdkversion) | **GET** /api/v2/usage/streams/{source}/sdkversions | Get stream usage SDK versions
*ApprovalsApi* | [**deleteApprovalRequest**](docs/Api/ApprovalsApi.md#deleteapprovalrequest) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Delete approval request
*ApprovalsApi* | [**getApprovalForFlag**](docs/Api/ApprovalsApi.md#getapprovalforflag) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Get approval request for a flag
*ApprovalsApi* | [**getApprovalsForFlag**](docs/Api/ApprovalsApi.md#getapprovalsforflag) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | List approval requests for a flag
*ApprovalsApi* | [**postApprovalRequest**](docs/Api/ApprovalsApi.md#postapprovalrequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | Create approval request
*ApprovalsApi* | [**postApprovalRequestApplyRequest**](docs/Api/ApprovalsApi.md#postapprovalrequestapplyrequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/apply | Apply approval request
*ApprovalsApi* | [**postApprovalRequestReview**](docs/Api/ApprovalsApi.md#postapprovalrequestreview) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/reviews | Review approval request
*ApprovalsApi* | [**postFlagCopyConfigApprovalRequest**](docs/Api/ApprovalsApi.md#postflagcopyconfigapprovalrequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests-flag-copy | Create approval request to copy flag configurations across environments
*AuditLogApi* | [**getAuditLogEntries**](docs/Api/AuditLogApi.md#getauditlogentries) | **GET** /api/v2/auditlog | List audit log feature flag entries
*AuditLogApi* | [**getAuditLogEntry**](docs/Api/AuditLogApi.md#getauditlogentry) | **GET** /api/v2/auditlog/{id} | Get audit log entry
*CodeReferencesApi* | [**deleteBranches**](docs/Api/CodeReferencesApi.md#deletebranches) | **POST** /api/v2/code-refs/repositories/{repo}/branch-delete-tasks | Delete branches
*CodeReferencesApi* | [**deleteRepository**](docs/Api/CodeReferencesApi.md#deleterepository) | **DELETE** /api/v2/code-refs/repositories/{repo} | Delete repository
*CodeReferencesApi* | [**getBranch**](docs/Api/CodeReferencesApi.md#getbranch) | **GET** /api/v2/code-refs/repositories/{repo}/branches/{branch} | Get branch
*CodeReferencesApi* | [**getBranches**](docs/Api/CodeReferencesApi.md#getbranches) | **GET** /api/v2/code-refs/repositories/{repo}/branches | List branches
*CodeReferencesApi* | [**getExtinctions**](docs/Api/CodeReferencesApi.md#getextinctions) | **GET** /api/v2/code-refs/extinctions | List extinctions
*CodeReferencesApi* | [**getRepositories**](docs/Api/CodeReferencesApi.md#getrepositories) | **GET** /api/v2/code-refs/repositories | List repositories
*CodeReferencesApi* | [**getRepository**](docs/Api/CodeReferencesApi.md#getrepository) | **GET** /api/v2/code-refs/repositories/{repo} | Get repository
*CodeReferencesApi* | [**getRootStatistic**](docs/Api/CodeReferencesApi.md#getrootstatistic) | **GET** /api/v2/code-refs/statistics | Get links to code reference repositories for each project
*CodeReferencesApi* | [**getStatistics**](docs/Api/CodeReferencesApi.md#getstatistics) | **GET** /api/v2/code-refs/statistics/{projectKey} | Get code references statistics for flags
*CodeReferencesApi* | [**patchRepository**](docs/Api/CodeReferencesApi.md#patchrepository) | **PATCH** /api/v2/code-refs/repositories/{repo} | Update repository
*CodeReferencesApi* | [**postExtinction**](docs/Api/CodeReferencesApi.md#postextinction) | **POST** /api/v2/code-refs/repositories/{repo}/branches/{branch}/extinction-events | Create extinction
*CodeReferencesApi* | [**postRepository**](docs/Api/CodeReferencesApi.md#postrepository) | **POST** /api/v2/code-refs/repositories | Create repository
*CodeReferencesApi* | [**putBranch**](docs/Api/CodeReferencesApi.md#putbranch) | **PUT** /api/v2/code-refs/repositories/{repo}/branches/{branch} | Upsert branch
*CustomRolesApi* | [**deleteCustomRole**](docs/Api/CustomRolesApi.md#deletecustomrole) | **DELETE** /api/v2/roles/{customRoleKey} | Delete custom role
*CustomRolesApi* | [**getCustomRole**](docs/Api/CustomRolesApi.md#getcustomrole) | **GET** /api/v2/roles/{customRoleKey} | Get custom role
*CustomRolesApi* | [**getCustomRoles**](docs/Api/CustomRolesApi.md#getcustomroles) | **GET** /api/v2/roles | List custom roles
*CustomRolesApi* | [**patchCustomRole**](docs/Api/CustomRolesApi.md#patchcustomrole) | **PATCH** /api/v2/roles/{customRoleKey} | Update custom role
*CustomRolesApi* | [**postCustomRole**](docs/Api/CustomRolesApi.md#postcustomrole) | **POST** /api/v2/roles | Create custom role
*DataExportDestinationsApi* | [**deleteDestination**](docs/Api/DataExportDestinationsApi.md#deletedestination) | **DELETE** /api/v2/destinations/{projectKey}/{environmentKey}/{id} | Delete Data Export destination
*DataExportDestinationsApi* | [**getDestination**](docs/Api/DataExportDestinationsApi.md#getdestination) | **GET** /api/v2/destinations/{projectKey}/{environmentKey}/{id} | Get destination
*DataExportDestinationsApi* | [**getDestinations**](docs/Api/DataExportDestinationsApi.md#getdestinations) | **GET** /api/v2/destinations | List destinations
*DataExportDestinationsApi* | [**patchDestination**](docs/Api/DataExportDestinationsApi.md#patchdestination) | **PATCH** /api/v2/destinations/{projectKey}/{environmentKey}/{id} | Update Data Export destination
*DataExportDestinationsApi* | [**postDestination**](docs/Api/DataExportDestinationsApi.md#postdestination) | **POST** /api/v2/destinations/{projectKey}/{environmentKey} | Create Data Export destination
*EnvironmentsApi* | [**deleteEnvironment**](docs/Api/EnvironmentsApi.md#deleteenvironment) | **DELETE** /api/v2/projects/{projectKey}/environments/{environmentKey} | Delete environment
*EnvironmentsApi* | [**getEnvironment**](docs/Api/EnvironmentsApi.md#getenvironment) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey} | Get environment
*EnvironmentsApi* | [**getEnvironmentsByProject**](docs/Api/EnvironmentsApi.md#getenvironmentsbyproject) | **GET** /api/v2/projects/{projectKey}/environments | List environments
*EnvironmentsApi* | [**patchEnvironment**](docs/Api/EnvironmentsApi.md#patchenvironment) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey} | Update environment
*EnvironmentsApi* | [**postEnvironment**](docs/Api/EnvironmentsApi.md#postenvironment) | **POST** /api/v2/projects/{projectKey}/environments | Create environment
*EnvironmentsApi* | [**resetEnvironmentMobileKey**](docs/Api/EnvironmentsApi.md#resetenvironmentmobilekey) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/mobileKey | Reset environment mobile SDK key
*EnvironmentsApi* | [**resetEnvironmentSDKKey**](docs/Api/EnvironmentsApi.md#resetenvironmentsdkkey) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/apiKey | Reset environment SDK key
*ExperimentsBetaApi* | [**createExperiment**](docs/Api/ExperimentsBetaApi.md#createexperiment) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments | Create experiment
*ExperimentsBetaApi* | [**createIteration**](docs/Api/ExperimentsBetaApi.md#createiteration) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/iterations | Create iteration
*ExperimentsBetaApi* | [**getExperiment**](docs/Api/ExperimentsBetaApi.md#getexperiment) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey} | Get experiment
*ExperimentsBetaApi* | [**getExperimentResults**](docs/Api/ExperimentsBetaApi.md#getexperimentresults) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/metrics/{metricKey}/results | Get experiment results
*ExperimentsBetaApi* | [**getExperiments**](docs/Api/ExperimentsBetaApi.md#getexperiments) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments | Get experiments
*ExperimentsBetaApi* | [**getLegacyExperimentResults**](docs/Api/ExperimentsBetaApi.md#getlegacyexperimentresults) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/experiments/{environmentKey}/{metricKey} | Get legacy experiment results (deprecated)
*ExperimentsBetaApi* | [**patchExperiment**](docs/Api/ExperimentsBetaApi.md#patchexperiment) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey} | Patch experiment
*ExperimentsBetaApi* | [**resetExperiment**](docs/Api/ExperimentsBetaApi.md#resetexperiment) | **DELETE** /api/v2/flags/{projectKey}/{featureFlagKey}/experiments/{environmentKey}/{metricKey}/results | Reset experiment results
*FeatureFlagsApi* | [**copyFeatureFlag**](docs/Api/FeatureFlagsApi.md#copyfeatureflag) | **POST** /api/v2/flags/{projectKey}/{featureFlagKey}/copy | Copy feature flag
*FeatureFlagsApi* | [**deleteFeatureFlag**](docs/Api/FeatureFlagsApi.md#deletefeatureflag) | **DELETE** /api/v2/flags/{projectKey}/{featureFlagKey} | Delete feature flag
*FeatureFlagsApi* | [**getExpiringUserTargets**](docs/Api/FeatureFlagsApi.md#getexpiringusertargets) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for feature flag
*FeatureFlagsApi* | [**getFeatureFlag**](docs/Api/FeatureFlagsApi.md#getfeatureflag) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey} | Get feature flag
*FeatureFlagsApi* | [**getFeatureFlagStatus**](docs/Api/FeatureFlagsApi.md#getfeatureflagstatus) | **GET** /api/v2/flag-statuses/{projectKey}/{environmentKey}/{featureFlagKey} | Get feature flag status
*FeatureFlagsApi* | [**getFeatureFlagStatusAcrossEnvironments**](docs/Api/FeatureFlagsApi.md#getfeatureflagstatusacrossenvironments) | **GET** /api/v2/flag-status/{projectKey}/{featureFlagKey} | Get flag status across environments
*FeatureFlagsApi* | [**getFeatureFlagStatuses**](docs/Api/FeatureFlagsApi.md#getfeatureflagstatuses) | **GET** /api/v2/flag-statuses/{projectKey}/{environmentKey} | List feature flag statuses
*FeatureFlagsApi* | [**getFeatureFlags**](docs/Api/FeatureFlagsApi.md#getfeatureflags) | **GET** /api/v2/flags/{projectKey} | List feature flags
*FeatureFlagsApi* | [**patchExpiringUserTargets**](docs/Api/FeatureFlagsApi.md#patchexpiringusertargets) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Update expiring user targets on feature flag
*FeatureFlagsApi* | [**patchFeatureFlag**](docs/Api/FeatureFlagsApi.md#patchfeatureflag) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey} | Update feature flag
*FeatureFlagsApi* | [**postFeatureFlag**](docs/Api/FeatureFlagsApi.md#postfeatureflag) | **POST** /api/v2/flags/{projectKey} | Create a feature flag
*FeatureFlagsBetaApi* | [**getDependentFlags**](docs/Api/FeatureFlagsBetaApi.md#getdependentflags) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/dependent-flags | List dependent feature flags
*FeatureFlagsBetaApi* | [**getDependentFlagsByEnv**](docs/Api/FeatureFlagsBetaApi.md#getdependentflagsbyenv) | **GET** /api/v2/flags/{projectKey}/{environmentKey}/{featureFlagKey}/dependent-flags | List dependent feature flags by environment
*FlagLinksBetaApi* | [**createFlagLink**](docs/Api/FlagLinksBetaApi.md#createflaglink) | **POST** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey} | Create flag link
*FlagLinksBetaApi* | [**deleteFlagLink**](docs/Api/FlagLinksBetaApi.md#deleteflaglink) | **DELETE** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey}/{id} | Delete flag link
*FlagLinksBetaApi* | [**getFlagLinks**](docs/Api/FlagLinksBetaApi.md#getflaglinks) | **GET** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey} | List flag links
*FlagLinksBetaApi* | [**updateFlagLink**](docs/Api/FlagLinksBetaApi.md#updateflaglink) | **PATCH** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey}/{id} | Update flag link
*FlagTriggersApi* | [**createTriggerWorkflow**](docs/Api/FlagTriggersApi.md#createtriggerworkflow) | **POST** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey} | Create flag trigger
*FlagTriggersApi* | [**deleteTriggerWorkflow**](docs/Api/FlagTriggersApi.md#deletetriggerworkflow) | **DELETE** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Delete flag trigger
*FlagTriggersApi* | [**getTriggerWorkflowById**](docs/Api/FlagTriggersApi.md#gettriggerworkflowbyid) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Get flag trigger by ID
*FlagTriggersApi* | [**getTriggerWorkflows**](docs/Api/FlagTriggersApi.md#gettriggerworkflows) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey} | List flag triggers
*FlagTriggersApi* | [**patchTriggerWorkflow**](docs/Api/FlagTriggersApi.md#patchtriggerworkflow) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Update flag trigger
*FollowFlagsApi* | [**deleteFlagFollowers**](docs/Api/FollowFlagsApi.md#deleteflagfollowers) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers/{memberId} | Remove a member as a follower of a flag in a project and environment
*FollowFlagsApi* | [**getFlagFollowers**](docs/Api/FollowFlagsApi.md#getflagfollowers) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers | Get followers of a flag in a project and environment
*FollowFlagsApi* | [**getFollowersByProjEnv**](docs/Api/FollowFlagsApi.md#getfollowersbyprojenv) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/followers | Get followers of all flags in a given project and environment
*FollowFlagsApi* | [**putFlagFollowers**](docs/Api/FollowFlagsApi.md#putflagfollowers) | **PUT** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers/{memberId} | Add a member as a follower of a flag in a project and environment
*IntegrationAuditLogSubscriptionsApi* | [**createSubscription**](docs/Api/IntegrationAuditLogSubscriptionsApi.md#createsubscription) | **POST** /api/v2/integrations/{integrationKey} | Create audit log subscription
*IntegrationAuditLogSubscriptionsApi* | [**deleteSubscription**](docs/Api/IntegrationAuditLogSubscriptionsApi.md#deletesubscription) | **DELETE** /api/v2/integrations/{integrationKey}/{id} | Delete audit log subscription
*IntegrationAuditLogSubscriptionsApi* | [**getSubscriptionByID**](docs/Api/IntegrationAuditLogSubscriptionsApi.md#getsubscriptionbyid) | **GET** /api/v2/integrations/{integrationKey}/{id} | Get audit log subscription by ID
*IntegrationAuditLogSubscriptionsApi* | [**getSubscriptions**](docs/Api/IntegrationAuditLogSubscriptionsApi.md#getsubscriptions) | **GET** /api/v2/integrations/{integrationKey} | Get audit log subscriptions by integration
*IntegrationAuditLogSubscriptionsApi* | [**updateSubscription**](docs/Api/IntegrationAuditLogSubscriptionsApi.md#updatesubscription) | **PATCH** /api/v2/integrations/{integrationKey}/{id} | Update audit log subscription
*IntegrationDeliveryConfigurationsBetaApi* | [**createIntegrationDeliveryConfiguration**](docs/Api/IntegrationDeliveryConfigurationsBetaApi.md#createintegrationdeliveryconfiguration) | **POST** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey} | Create delivery configuration
*IntegrationDeliveryConfigurationsBetaApi* | [**deleteIntegrationDeliveryConfiguration**](docs/Api/IntegrationDeliveryConfigurationsBetaApi.md#deleteintegrationdeliveryconfiguration) | **DELETE** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id} | Delete delivery configuration
*IntegrationDeliveryConfigurationsBetaApi* | [**getIntegrationDeliveryConfigurationByEnvironment**](docs/Api/IntegrationDeliveryConfigurationsBetaApi.md#getintegrationdeliveryconfigurationbyenvironment) | **GET** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey} | Get delivery configurations by environment
*IntegrationDeliveryConfigurationsBetaApi* | [**getIntegrationDeliveryConfigurationById**](docs/Api/IntegrationDeliveryConfigurationsBetaApi.md#getintegrationdeliveryconfigurationbyid) | **GET** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id} | Get delivery configuration by ID
*IntegrationDeliveryConfigurationsBetaApi* | [**getIntegrationDeliveryConfigurations**](docs/Api/IntegrationDeliveryConfigurationsBetaApi.md#getintegrationdeliveryconfigurations) | **GET** /api/v2/integration-capabilities/featureStore | List all delivery configurations
*IntegrationDeliveryConfigurationsBetaApi* | [**patchIntegrationDeliveryConfiguration**](docs/Api/IntegrationDeliveryConfigurationsBetaApi.md#patchintegrationdeliveryconfiguration) | **PATCH** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id} | Update delivery configuration
*IntegrationDeliveryConfigurationsBetaApi* | [**validateIntegrationDeliveryConfiguration**](docs/Api/IntegrationDeliveryConfigurationsBetaApi.md#validateintegrationdeliveryconfiguration) | **POST** /api/v2/integration-capabilities/featureStore/{projectKey}/{environmentKey}/{integrationKey}/{id}/validate | Validate delivery configuration
*MetricsApi* | [**deleteMetric**](docs/Api/MetricsApi.md#deletemetric) | **DELETE** /api/v2/metrics/{projectKey}/{metricKey} | Delete metric
*MetricsApi* | [**getMetric**](docs/Api/MetricsApi.md#getmetric) | **GET** /api/v2/metrics/{projectKey}/{metricKey} | Get metric
*MetricsApi* | [**getMetrics**](docs/Api/MetricsApi.md#getmetrics) | **GET** /api/v2/metrics/{projectKey} | List metrics
*MetricsApi* | [**patchMetric**](docs/Api/MetricsApi.md#patchmetric) | **PATCH** /api/v2/metrics/{projectKey}/{metricKey} | Update metric
*MetricsApi* | [**postMetric**](docs/Api/MetricsApi.md#postmetric) | **POST** /api/v2/metrics/{projectKey} | Create metric
*OAuth2ClientsBetaApi* | [**createOAuth2Client**](docs/Api/OAuth2ClientsBetaApi.md#createoauth2client) | **POST** /api/v2/oauth/clients | Create a LaunchDarkly OAuth 2.0 client
*OAuth2ClientsBetaApi* | [**deleteOAuthClient**](docs/Api/OAuth2ClientsBetaApi.md#deleteoauthclient) | **DELETE** /api/v2/oauth/clients/{clientId} | Delete OAuth 2.0 client
*OAuth2ClientsBetaApi* | [**getOAuthClientById**](docs/Api/OAuth2ClientsBetaApi.md#getoauthclientbyid) | **GET** /api/v2/oauth/clients/{clientId} | Get client by ID
*OAuth2ClientsBetaApi* | [**getOAuthClients**](docs/Api/OAuth2ClientsBetaApi.md#getoauthclients) | **GET** /api/v2/oauth/clients | Get clients
*OAuth2ClientsBetaApi* | [**patchOAuthClient**](docs/Api/OAuth2ClientsBetaApi.md#patchoauthclient) | **PATCH** /api/v2/oauth/clients/{clientId} | Patch client by ID
*OtherApi* | [**getIps**](docs/Api/OtherApi.md#getips) | **GET** /api/v2/public-ip-list | Gets the public IP list
*OtherApi* | [**getOpenapiSpec**](docs/Api/OtherApi.md#getopenapispec) | **GET** /api/v2/openapi.json | Gets the OpenAPI spec in json
*OtherApi* | [**getRoot**](docs/Api/OtherApi.md#getroot) | **GET** /api/v2 | Root resource
*OtherApi* | [**getVersions**](docs/Api/OtherApi.md#getversions) | **GET** /api/v2/versions | Get version information
*ProjectsApi* | [**deleteProject**](docs/Api/ProjectsApi.md#deleteproject) | **DELETE** /api/v2/projects/{projectKey} | Delete project
*ProjectsApi* | [**getFlagDefaultsByProject**](docs/Api/ProjectsApi.md#getflagdefaultsbyproject) | **GET** /api/v2/projects/{projectKey}/flag-defaults | Get flag defaults for project
*ProjectsApi* | [**getProject**](docs/Api/ProjectsApi.md#getproject) | **GET** /api/v2/projects/{projectKey} | Get project
*ProjectsApi* | [**getProjects**](docs/Api/ProjectsApi.md#getprojects) | **GET** /api/v2/projects | List projects
*ProjectsApi* | [**patchFlagDefaultsByProject**](docs/Api/ProjectsApi.md#patchflagdefaultsbyproject) | **PATCH** /api/v2/projects/{projectKey}/flag-defaults | Update flag default for project
*ProjectsApi* | [**patchProject**](docs/Api/ProjectsApi.md#patchproject) | **PATCH** /api/v2/projects/{projectKey} | Update project
*ProjectsApi* | [**postProject**](docs/Api/ProjectsApi.md#postproject) | **POST** /api/v2/projects | Create project
*ProjectsApi* | [**putFlagDefaultsByProject**](docs/Api/ProjectsApi.md#putflagdefaultsbyproject) | **PUT** /api/v2/projects/{projectKey}/flag-defaults | Create or update flag defaults for project
*RelayProxyConfigurationsApi* | [**deleteRelayAutoConfig**](docs/Api/RelayProxyConfigurationsApi.md#deleterelayautoconfig) | **DELETE** /api/v2/account/relay-auto-configs/{id} | Delete Relay Proxy config by ID
*RelayProxyConfigurationsApi* | [**getRelayProxyConfig**](docs/Api/RelayProxyConfigurationsApi.md#getrelayproxyconfig) | **GET** /api/v2/account/relay-auto-configs/{id} | Get Relay Proxy config
*RelayProxyConfigurationsApi* | [**getRelayProxyConfigs**](docs/Api/RelayProxyConfigurationsApi.md#getrelayproxyconfigs) | **GET** /api/v2/account/relay-auto-configs | List Relay Proxy configs
*RelayProxyConfigurationsApi* | [**patchRelayAutoConfig**](docs/Api/RelayProxyConfigurationsApi.md#patchrelayautoconfig) | **PATCH** /api/v2/account/relay-auto-configs/{id} | Update a Relay Proxy config
*RelayProxyConfigurationsApi* | [**postRelayAutoConfig**](docs/Api/RelayProxyConfigurationsApi.md#postrelayautoconfig) | **POST** /api/v2/account/relay-auto-configs | Create a new Relay Proxy config
*RelayProxyConfigurationsApi* | [**resetRelayAutoConfig**](docs/Api/RelayProxyConfigurationsApi.md#resetrelayautoconfig) | **POST** /api/v2/account/relay-auto-configs/{id}/reset | Reset Relay Proxy configuration key
*ScheduledChangesApi* | [**deleteFlagConfigScheduledChanges**](docs/Api/ScheduledChangesApi.md#deleteflagconfigscheduledchanges) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Delete scheduled changes workflow
*ScheduledChangesApi* | [**getFeatureFlagScheduledChange**](docs/Api/ScheduledChangesApi.md#getfeatureflagscheduledchange) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Get a scheduled change
*ScheduledChangesApi* | [**getFlagConfigScheduledChanges**](docs/Api/ScheduledChangesApi.md#getflagconfigscheduledchanges) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | List scheduled changes
*ScheduledChangesApi* | [**patchFlagConfigScheduledChange**](docs/Api/ScheduledChangesApi.md#patchflagconfigscheduledchange) | **PATCH** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Update scheduled changes workflow
*ScheduledChangesApi* | [**postFlagConfigScheduledChanges**](docs/Api/ScheduledChangesApi.md#postflagconfigscheduledchanges) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | Create scheduled changes workflow
*SegmentsApi* | [**deleteSegment**](docs/Api/SegmentsApi.md#deletesegment) | **DELETE** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Delete segment
*SegmentsApi* | [**getExpiringUserTargetsForSegment**](docs/Api/SegmentsApi.md#getexpiringusertargetsforsegment) | **GET** /api/v2/segments/{projectKey}/{segmentKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for segment
*SegmentsApi* | [**getSegment**](docs/Api/SegmentsApi.md#getsegment) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Get segment
*SegmentsApi* | [**getSegmentMembershipForUser**](docs/Api/SegmentsApi.md#getsegmentmembershipforuser) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/users/{userKey} | Get Big Segment membership for user
*SegmentsApi* | [**getSegments**](docs/Api/SegmentsApi.md#getsegments) | **GET** /api/v2/segments/{projectKey}/{environmentKey} | List segments
*SegmentsApi* | [**patchExpiringUserTargetsForSegment**](docs/Api/SegmentsApi.md#patchexpiringusertargetsforsegment) | **PATCH** /api/v2/segments/{projectKey}/{segmentKey}/expiring-user-targets/{environmentKey} | Update expiring user targets for segment
*SegmentsApi* | [**patchSegment**](docs/Api/SegmentsApi.md#patchsegment) | **PATCH** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Patch segment
*SegmentsApi* | [**postSegment**](docs/Api/SegmentsApi.md#postsegment) | **POST** /api/v2/segments/{projectKey}/{environmentKey} | Create segment
*SegmentsApi* | [**updateBigSegmentTargets**](docs/Api/SegmentsApi.md#updatebigsegmenttargets) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/users | Update targets on a Big Segment
*SegmentsBetaApi* | [**createBigSegmentExport**](docs/Api/SegmentsBetaApi.md#createbigsegmentexport) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/exports | Create Big Segment export
*SegmentsBetaApi* | [**createBigSegmentImport**](docs/Api/SegmentsBetaApi.md#createbigsegmentimport) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/imports | Create Big Segment import
*SegmentsBetaApi* | [**getBigSegmentExport**](docs/Api/SegmentsBetaApi.md#getbigsegmentexport) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/exports/{exportID} | Get Big Segment export
*SegmentsBetaApi* | [**getBigSegmentImport**](docs/Api/SegmentsBetaApi.md#getbigsegmentimport) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/imports/{importID} | Get Big Segment import
*TagsApi* | [**getTags**](docs/Api/TagsApi.md#gettags) | **GET** /api/v2/tags | List tags
*TeamsApi* | [**deleteTeam**](docs/Api/TeamsApi.md#deleteteam) | **DELETE** /api/v2/teams/{teamKey} | Delete team
*TeamsApi* | [**getTeam**](docs/Api/TeamsApi.md#getteam) | **GET** /api/v2/teams/{teamKey} | Get team
*TeamsApi* | [**getTeamMaintainers**](docs/Api/TeamsApi.md#getteammaintainers) | **GET** /api/v2/teams/{teamKey}/maintainers | Get team maintainers
*TeamsApi* | [**getTeamRoles**](docs/Api/TeamsApi.md#getteamroles) | **GET** /api/v2/teams/{teamKey}/roles | Get team custom roles
*TeamsApi* | [**getTeams**](docs/Api/TeamsApi.md#getteams) | **GET** /api/v2/teams | List teams
*TeamsApi* | [**patchTeam**](docs/Api/TeamsApi.md#patchteam) | **PATCH** /api/v2/teams/{teamKey} | Update team
*TeamsApi* | [**postTeam**](docs/Api/TeamsApi.md#postteam) | **POST** /api/v2/teams | Create team
*TeamsApi* | [**postTeamMembers**](docs/Api/TeamsApi.md#postteammembers) | **POST** /api/v2/teams/{teamKey}/members | Add multiple members to team
*TeamsBetaApi* | [**patchTeams**](docs/Api/TeamsBetaApi.md#patchteams) | **PATCH** /api/v2/teams | Update teams
*UserSettingsApi* | [**getExpiringFlagsForUser**](docs/Api/UserSettingsApi.md#getexpiringflagsforuser) | **GET** /api/v2/users/{projectKey}/{userKey}/expiring-user-targets/{environmentKey} | Get expiring dates on flags for user
*UserSettingsApi* | [**getUserFlagSetting**](docs/Api/UserSettingsApi.md#getuserflagsetting) | **GET** /api/v2/users/{projectKey}/{environmentKey}/{userKey}/flags/{featureFlagKey} | Get flag setting for user
*UserSettingsApi* | [**getUserFlagSettings**](docs/Api/UserSettingsApi.md#getuserflagsettings) | **GET** /api/v2/users/{projectKey}/{environmentKey}/{userKey}/flags | List flag settings for user
*UserSettingsApi* | [**patchExpiringFlagsForUser**](docs/Api/UserSettingsApi.md#patchexpiringflagsforuser) | **PATCH** /api/v2/users/{projectKey}/{userKey}/expiring-user-targets/{environmentKey} | Update expiring user target for flags
*UserSettingsApi* | [**putFlagSetting**](docs/Api/UserSettingsApi.md#putflagsetting) | **PUT** /api/v2/users/{projectKey}/{environmentKey}/{userKey}/flags/{featureFlagKey} | Update flag settings for user
*UsersApi* | [**deleteUser**](docs/Api/UsersApi.md#deleteuser) | **DELETE** /api/v2/users/{projectKey}/{environmentKey}/{userKey} | Delete user
*UsersApi* | [**getSearchUsers**](docs/Api/UsersApi.md#getsearchusers) | **GET** /api/v2/user-search/{projectKey}/{environmentKey} | Find users
*UsersApi* | [**getUser**](docs/Api/UsersApi.md#getuser) | **GET** /api/v2/users/{projectKey}/{environmentKey}/{userKey} | Get user
*UsersApi* | [**getUsers**](docs/Api/UsersApi.md#getusers) | **GET** /api/v2/users/{projectKey}/{environmentKey} | List users
*UsersBetaApi* | [**getUserAttributeNames**](docs/Api/UsersBetaApi.md#getuserattributenames) | **GET** /api/v2/user-attributes/{projectKey}/{environmentKey} | Get user attribute names
*WebhooksApi* | [**deleteWebhook**](docs/Api/WebhooksApi.md#deletewebhook) | **DELETE** /api/v2/webhooks/{id} | Delete webhook
*WebhooksApi* | [**getAllWebhooks**](docs/Api/WebhooksApi.md#getallwebhooks) | **GET** /api/v2/webhooks | List webhooks
*WebhooksApi* | [**getWebhook**](docs/Api/WebhooksApi.md#getwebhook) | **GET** /api/v2/webhooks/{id} | Get webhook
*WebhooksApi* | [**patchWebhook**](docs/Api/WebhooksApi.md#patchwebhook) | **PATCH** /api/v2/webhooks/{id} | Update webhook
*WebhooksApi* | [**postWebhook**](docs/Api/WebhooksApi.md#postwebhook) | **POST** /api/v2/webhooks | Creates a webhook
*WorkflowTemplatesBetaApi* | [**createWorkflowTemplate**](docs/Api/WorkflowTemplatesBetaApi.md#createworkflowtemplate) | **POST** /api/v2/templates | Create workflow template
*WorkflowTemplatesBetaApi* | [**deleteWorkflowTemplate**](docs/Api/WorkflowTemplatesBetaApi.md#deleteworkflowtemplate) | **DELETE** /api/v2/templates/{templateKey} | Delete workflow template
*WorkflowTemplatesBetaApi* | [**getWorkflowTemplates**](docs/Api/WorkflowTemplatesBetaApi.md#getworkflowtemplates) | **GET** /api/v2/templates | Get workflow templates
*WorkflowsBetaApi* | [**deleteWorkflow**](docs/Api/WorkflowsBetaApi.md#deleteworkflow) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Delete workflow
*WorkflowsBetaApi* | [**getCustomWorkflow**](docs/Api/WorkflowsBetaApi.md#getcustomworkflow) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Get custom workflow
*WorkflowsBetaApi* | [**getWorkflows**](docs/Api/WorkflowsBetaApi.md#getworkflows) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Get workflows
*WorkflowsBetaApi* | [**postWorkflow**](docs/Api/WorkflowsBetaApi.md#postworkflow) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Create workflow

## Models

- [Access](docs/Model/Access.md)
- [AccessAllowedReason](docs/Model/AccessAllowedReason.md)
- [AccessAllowedRep](docs/Model/AccessAllowedRep.md)
- [AccessDenied](docs/Model/AccessDenied.md)
- [AccessDeniedReason](docs/Model/AccessDeniedReason.md)
- [AccessTokenPost](docs/Model/AccessTokenPost.md)
- [ActionInput](docs/Model/ActionInput.md)
- [ActionOutput](docs/Model/ActionOutput.md)
- [ApprovalConditionInput](docs/Model/ApprovalConditionInput.md)
- [ApprovalConditionOutput](docs/Model/ApprovalConditionOutput.md)
- [ApprovalSettings](docs/Model/ApprovalSettings.md)
- [AuditLogEntryListingRep](docs/Model/AuditLogEntryListingRep.md)
- [AuditLogEntryListingRepCollection](docs/Model/AuditLogEntryListingRepCollection.md)
- [AuditLogEntryRep](docs/Model/AuditLogEntryRep.md)
- [AuthorizedAppDataRep](docs/Model/AuthorizedAppDataRep.md)
- [BigSegmentTarget](docs/Model/BigSegmentTarget.md)
- [BooleanDefaults](docs/Model/BooleanDefaults.md)
- [BooleanFlagDefaults](docs/Model/BooleanFlagDefaults.md)
- [BranchCollectionRep](docs/Model/BranchCollectionRep.md)
- [BranchRep](docs/Model/BranchRep.md)
- [BulkEditMembersRep](docs/Model/BulkEditMembersRep.md)
- [BulkEditTeamsRep](docs/Model/BulkEditTeamsRep.md)
- [Clause](docs/Model/Clause.md)
- [Client](docs/Model/Client.md)
- [ClientCollection](docs/Model/ClientCollection.md)
- [ClientSideAvailability](docs/Model/ClientSideAvailability.md)
- [ClientSideAvailabilityPost](docs/Model/ClientSideAvailabilityPost.md)
- [ConditionBaseOutput](docs/Model/ConditionBaseOutput.md)
- [ConditionInput](docs/Model/ConditionInput.md)
- [ConditionOutput](docs/Model/ConditionOutput.md)
- [ConfidenceIntervalRep](docs/Model/ConfidenceIntervalRep.md)
- [Conflict](docs/Model/Conflict.md)
- [ConflictOutput](docs/Model/ConflictOutput.md)
- [CopiedFromEnv](docs/Model/CopiedFromEnv.md)
- [CreateCopyFlagConfigApprovalRequestRequest](docs/Model/CreateCopyFlagConfigApprovalRequestRequest.md)
- [CreateFlagConfigApprovalRequestRequest](docs/Model/CreateFlagConfigApprovalRequestRequest.md)
- [CreateWorkflowTemplateInput](docs/Model/CreateWorkflowTemplateInput.md)
- [CredibleIntervalRep](docs/Model/CredibleIntervalRep.md)
- [CustomProperty](docs/Model/CustomProperty.md)
- [CustomRole](docs/Model/CustomRole.md)
- [CustomRolePost](docs/Model/CustomRolePost.md)
- [CustomRolePostData](docs/Model/CustomRolePostData.md)
- [CustomRoles](docs/Model/CustomRoles.md)
- [CustomWorkflowInput](docs/Model/CustomWorkflowInput.md)
- [CustomWorkflowMeta](docs/Model/CustomWorkflowMeta.md)
- [CustomWorkflowOutput](docs/Model/CustomWorkflowOutput.md)
- [CustomWorkflowStageMeta](docs/Model/CustomWorkflowStageMeta.md)
- [CustomWorkflowsListingOutput](docs/Model/CustomWorkflowsListingOutput.md)
- [Database](docs/Model/Database.md)
- [DefaultClientSideAvailability](docs/Model/DefaultClientSideAvailability.md)
- [DefaultClientSideAvailabilityPost](docs/Model/DefaultClientSideAvailabilityPost.md)
- [Defaults](docs/Model/Defaults.md)
- [DependentExperimentRep](docs/Model/DependentExperimentRep.md)
- [DependentFlag](docs/Model/DependentFlag.md)
- [DependentFlagEnvironment](docs/Model/DependentFlagEnvironment.md)
- [DependentFlagsByEnvironment](docs/Model/DependentFlagsByEnvironment.md)
- [Destination](docs/Model/Destination.md)
- [DestinationPost](docs/Model/DestinationPost.md)
- [Destinations](docs/Model/Destinations.md)
- [Environment](docs/Model/Environment.md)
- [EnvironmentPost](docs/Model/EnvironmentPost.md)
- [Environments](docs/Model/Environments.md)
- [EvaluationReason](docs/Model/EvaluationReason.md)
- [ExecutionOutput](docs/Model/ExecutionOutput.md)
- [Experiment](docs/Model/Experiment.md)
- [ExperimentAllocationRep](docs/Model/ExperimentAllocationRep.md)
- [ExperimentBayesianResultsRep](docs/Model/ExperimentBayesianResultsRep.md)
- [ExperimentCollectionRep](docs/Model/ExperimentCollectionRep.md)
- [ExperimentEnabledPeriodRep](docs/Model/ExperimentEnabledPeriodRep.md)
- [ExperimentEnvironmentSettingRep](docs/Model/ExperimentEnvironmentSettingRep.md)
- [ExperimentExpandableProperties](docs/Model/ExperimentExpandableProperties.md)
- [ExperimentInfoRep](docs/Model/ExperimentInfoRep.md)
- [ExperimentMetadataRep](docs/Model/ExperimentMetadataRep.md)
- [ExperimentPatchInput](docs/Model/ExperimentPatchInput.md)
- [ExperimentPost](docs/Model/ExperimentPost.md)
- [ExperimentResults](docs/Model/ExperimentResults.md)
- [ExperimentStatsRep](docs/Model/ExperimentStatsRep.md)
- [ExperimentTimeSeriesSlice](docs/Model/ExperimentTimeSeriesSlice.md)
- [ExperimentTimeSeriesVariationSlice](docs/Model/ExperimentTimeSeriesVariationSlice.md)
- [ExperimentTotalsRep](docs/Model/ExperimentTotalsRep.md)
- [ExpiringTargetError](docs/Model/ExpiringTargetError.md)
- [ExpiringUserTargetGetResponse](docs/Model/ExpiringUserTargetGetResponse.md)
- [ExpiringUserTargetItem](docs/Model/ExpiringUserTargetItem.md)
- [ExpiringUserTargetPatchResponse](docs/Model/ExpiringUserTargetPatchResponse.md)
- [Export](docs/Model/Export.md)
- [Extinction](docs/Model/Extinction.md)
- [ExtinctionCollectionRep](docs/Model/ExtinctionCollectionRep.md)
- [FeatureFlag](docs/Model/FeatureFlag.md)
- [FeatureFlagBody](docs/Model/FeatureFlagBody.md)
- [FeatureFlagConfig](docs/Model/FeatureFlagConfig.md)
- [FeatureFlagScheduledChange](docs/Model/FeatureFlagScheduledChange.md)
- [FeatureFlagScheduledChanges](docs/Model/FeatureFlagScheduledChanges.md)
- [FeatureFlagStatus](docs/Model/FeatureFlagStatus.md)
- [FeatureFlagStatusAcrossEnvironments](docs/Model/FeatureFlagStatusAcrossEnvironments.md)
- [FeatureFlagStatuses](docs/Model/FeatureFlagStatuses.md)
- [FeatureFlags](docs/Model/FeatureFlags.md)
- [FileRep](docs/Model/FileRep.md)
- [FlagConfigApprovalRequestResponse](docs/Model/FlagConfigApprovalRequestResponse.md)
- [FlagConfigApprovalRequestsResponse](docs/Model/FlagConfigApprovalRequestsResponse.md)
- [FlagCopyConfigEnvironment](docs/Model/FlagCopyConfigEnvironment.md)
- [FlagCopyConfigPost](docs/Model/FlagCopyConfigPost.md)
- [FlagDefaults](docs/Model/FlagDefaults.md)
- [FlagDefaultsApiBaseRep](docs/Model/FlagDefaultsApiBaseRep.md)
- [FlagDefaultsRep](docs/Model/FlagDefaultsRep.md)
- [FlagFollowersByProjEnvGetRep](docs/Model/FlagFollowersByProjEnvGetRep.md)
- [FlagFollowersGetRep](docs/Model/FlagFollowersGetRep.md)
- [FlagGlobalAttributesRep](docs/Model/FlagGlobalAttributesRep.md)
- [FlagInput](docs/Model/FlagInput.md)
- [FlagLinkCollectionRep](docs/Model/FlagLinkCollectionRep.md)
- [FlagLinkMember](docs/Model/FlagLinkMember.md)
- [FlagLinkPost](docs/Model/FlagLinkPost.md)
- [FlagLinkRep](docs/Model/FlagLinkRep.md)
- [FlagListingRep](docs/Model/FlagListingRep.md)
- [FlagRep](docs/Model/FlagRep.md)
- [FlagScheduledChangesInput](docs/Model/FlagScheduledChangesInput.md)
- [FlagStatusRep](docs/Model/FlagStatusRep.md)
- [FlagSummary](docs/Model/FlagSummary.md)
- [FlagTriggerInput](docs/Model/FlagTriggerInput.md)
- [FollowFlagMember](docs/Model/FollowFlagMember.md)
- [FollowersPerFlag](docs/Model/FollowersPerFlag.md)
- [ForbiddenErrorRep](docs/Model/ForbiddenErrorRep.md)
- [HunkRep](docs/Model/HunkRep.md)
- [Import](docs/Model/Import.md)
- [InitiatorRep](docs/Model/InitiatorRep.md)
- [InstructionUserRequest](docs/Model/InstructionUserRequest.md)
- [Integration](docs/Model/Integration.md)
- [IntegrationDeliveryConfiguration](docs/Model/IntegrationDeliveryConfiguration.md)
- [IntegrationDeliveryConfigurationCollection](docs/Model/IntegrationDeliveryConfigurationCollection.md)
- [IntegrationDeliveryConfigurationCollectionLinks](docs/Model/IntegrationDeliveryConfigurationCollectionLinks.md)
- [IntegrationDeliveryConfigurationLinks](docs/Model/IntegrationDeliveryConfigurationLinks.md)
- [IntegrationDeliveryConfigurationPost](docs/Model/IntegrationDeliveryConfigurationPost.md)
- [IntegrationDeliveryConfigurationResponse](docs/Model/IntegrationDeliveryConfigurationResponse.md)
- [IntegrationMetadata](docs/Model/IntegrationMetadata.md)
- [IntegrationStatus](docs/Model/IntegrationStatus.md)
- [IntegrationStatusRep](docs/Model/IntegrationStatusRep.md)
- [IntegrationSubscriptionStatusRep](docs/Model/IntegrationSubscriptionStatusRep.md)
- [Integrations](docs/Model/Integrations.md)
- [InvalidRequestErrorRep](docs/Model/InvalidRequestErrorRep.md)
- [IpList](docs/Model/IpList.md)
- [IterationExpandableProperties](docs/Model/IterationExpandableProperties.md)
- [IterationInput](docs/Model/IterationInput.md)
- [IterationRep](docs/Model/IterationRep.md)
- [LastSeenMetadata](docs/Model/LastSeenMetadata.md)
- [LegacyExperimentRep](docs/Model/LegacyExperimentRep.md)
- [Link](docs/Model/Link.md)
- [MaintainerTeam](docs/Model/MaintainerTeam.md)
- [Member](docs/Model/Member.md)
- [MemberDataRep](docs/Model/MemberDataRep.md)
- [MemberImportItem](docs/Model/MemberImportItem.md)
- [MemberPermissionGrantSummaryRep](docs/Model/MemberPermissionGrantSummaryRep.md)
- [MemberSummary](docs/Model/MemberSummary.md)
- [MemberTeamSummaryRep](docs/Model/MemberTeamSummaryRep.md)
- [MemberTeamsPostInput](docs/Model/MemberTeamsPostInput.md)
- [Members](docs/Model/Members.md)
- [MembersPatchInput](docs/Model/MembersPatchInput.md)
- [MethodNotAllowedErrorRep](docs/Model/MethodNotAllowedErrorRep.md)
- [MetricCollectionRep](docs/Model/MetricCollectionRep.md)
- [MetricInput](docs/Model/MetricInput.md)
- [MetricListingRep](docs/Model/MetricListingRep.md)
- [MetricListingRepExpandableProperties](docs/Model/MetricListingRepExpandableProperties.md)
- [MetricPost](docs/Model/MetricPost.md)
- [MetricRep](docs/Model/MetricRep.md)
- [MetricRepExpandableProperties](docs/Model/MetricRepExpandableProperties.md)
- [MetricSeen](docs/Model/MetricSeen.md)
- [MetricV2Rep](docs/Model/MetricV2Rep.md)
- [Modification](docs/Model/Modification.md)
- [MultiEnvironmentDependentFlag](docs/Model/MultiEnvironmentDependentFlag.md)
- [MultiEnvironmentDependentFlags](docs/Model/MultiEnvironmentDependentFlags.md)
- [NewMemberForm](docs/Model/NewMemberForm.md)
- [NotFoundErrorRep](docs/Model/NotFoundErrorRep.md)
- [OauthClientPost](docs/Model/OauthClientPost.md)
- [ParameterDefault](docs/Model/ParameterDefault.md)
- [ParameterDefaultInput](docs/Model/ParameterDefaultInput.md)
- [ParameterRep](docs/Model/ParameterRep.md)
- [ParentResourceRep](docs/Model/ParentResourceRep.md)
- [PatchFailedErrorRep](docs/Model/PatchFailedErrorRep.md)
- [PatchFlagsRequest](docs/Model/PatchFlagsRequest.md)
- [PatchOperation](docs/Model/PatchOperation.md)
- [PatchSegmentInstruction](docs/Model/PatchSegmentInstruction.md)
- [PatchSegmentRequest](docs/Model/PatchSegmentRequest.md)
- [PatchUsersRequest](docs/Model/PatchUsersRequest.md)
- [PatchWithComment](docs/Model/PatchWithComment.md)
- [PermissionGrantInput](docs/Model/PermissionGrantInput.md)
- [PostApprovalRequestApplyRequest](docs/Model/PostApprovalRequestApplyRequest.md)
- [PostApprovalRequestReviewRequest](docs/Model/PostApprovalRequestReviewRequest.md)
- [PostFlagScheduledChangesInput](docs/Model/PostFlagScheduledChangesInput.md)
- [Prerequisite](docs/Model/Prerequisite.md)
- [Project](docs/Model/Project.md)
- [ProjectListingRep](docs/Model/ProjectListingRep.md)
- [ProjectPost](docs/Model/ProjectPost.md)
- [ProjectRep](docs/Model/ProjectRep.md)
- [ProjectSummary](docs/Model/ProjectSummary.md)
- [Projects](docs/Model/Projects.md)
- [PubNubDetailRep](docs/Model/PubNubDetailRep.md)
- [PutBranch](docs/Model/PutBranch.md)
- [RateLimitedErrorRep](docs/Model/RateLimitedErrorRep.md)
- [RecentTriggerBody](docs/Model/RecentTriggerBody.md)
- [ReferenceRep](docs/Model/ReferenceRep.md)
- [RelativeDifferenceRep](docs/Model/RelativeDifferenceRep.md)
- [RelayAutoConfigCollectionRep](docs/Model/RelayAutoConfigCollectionRep.md)
- [RelayAutoConfigPost](docs/Model/RelayAutoConfigPost.md)
- [RelayAutoConfigRep](docs/Model/RelayAutoConfigRep.md)
- [RepositoryCollectionRep](docs/Model/RepositoryCollectionRep.md)
- [RepositoryPost](docs/Model/RepositoryPost.md)
- [RepositoryRep](docs/Model/RepositoryRep.md)
- [ResolvedContext](docs/Model/ResolvedContext.md)
- [ResolvedImage](docs/Model/ResolvedImage.md)
- [ResolvedTitle](docs/Model/ResolvedTitle.md)
- [ResolvedUIBlockElement](docs/Model/ResolvedUIBlockElement.md)
- [ResolvedUIBlocks](docs/Model/ResolvedUIBlocks.md)
- [ResourceAccess](docs/Model/ResourceAccess.md)
- [ResourceIDResponse](docs/Model/ResourceIDResponse.md)
- [ReviewOutput](docs/Model/ReviewOutput.md)
- [ReviewResponse](docs/Model/ReviewResponse.md)
- [Rollout](docs/Model/Rollout.md)
- [Rule](docs/Model/Rule.md)
- [RuleClause](docs/Model/RuleClause.md)
- [ScheduleConditionInput](docs/Model/ScheduleConditionInput.md)
- [ScheduleConditionOutput](docs/Model/ScheduleConditionOutput.md)
- [SdkListRep](docs/Model/SdkListRep.md)
- [SdkVersionListRep](docs/Model/SdkVersionListRep.md)
- [SdkVersionRep](docs/Model/SdkVersionRep.md)
- [SegmentBody](docs/Model/SegmentBody.md)
- [SegmentMetadata](docs/Model/SegmentMetadata.md)
- [SegmentUserList](docs/Model/SegmentUserList.md)
- [SegmentUserState](docs/Model/SegmentUserState.md)
- [SeriesListRep](docs/Model/SeriesListRep.md)
- [SourceEnv](docs/Model/SourceEnv.md)
- [SourceFlag](docs/Model/SourceFlag.md)
- [StageInput](docs/Model/StageInput.md)
- [StageOutput](docs/Model/StageOutput.md)
- [Statement](docs/Model/Statement.md)
- [StatementPost](docs/Model/StatementPost.md)
- [StatementPostData](docs/Model/StatementPostData.md)
- [StatisticCollectionRep](docs/Model/StatisticCollectionRep.md)
- [StatisticRep](docs/Model/StatisticRep.md)
- [StatisticsRep](docs/Model/StatisticsRep.md)
- [StatisticsRoot](docs/Model/StatisticsRoot.md)
- [StatusConflictErrorRep](docs/Model/StatusConflictErrorRep.md)
- [SubjectDataRep](docs/Model/SubjectDataRep.md)
- [SubscriptionPost](docs/Model/SubscriptionPost.md)
- [TagCollection](docs/Model/TagCollection.md)
- [Target](docs/Model/Target.md)
- [TargetResourceRep](docs/Model/TargetResourceRep.md)
- [Team](docs/Model/Team.md)
- [TeamCustomRole](docs/Model/TeamCustomRole.md)
- [TeamCustomRoles](docs/Model/TeamCustomRoles.md)
- [TeamImportsRep](docs/Model/TeamImportsRep.md)
- [TeamMaintainers](docs/Model/TeamMaintainers.md)
- [TeamMembers](docs/Model/TeamMembers.md)
- [TeamPatchInput](docs/Model/TeamPatchInput.md)
- [TeamPostInput](docs/Model/TeamPostInput.md)
- [TeamProjects](docs/Model/TeamProjects.md)
- [TeamRepExpandableProperties](docs/Model/TeamRepExpandableProperties.md)
- [Teams](docs/Model/Teams.md)
- [TeamsPatchInput](docs/Model/TeamsPatchInput.md)
- [TimestampRep](docs/Model/TimestampRep.md)
- [TitleRep](docs/Model/TitleRep.md)
- [Token](docs/Model/Token.md)
- [TokenDataRep](docs/Model/TokenDataRep.md)
- [Tokens](docs/Model/Tokens.md)
- [TreatmentInput](docs/Model/TreatmentInput.md)
- [TreatmentParameterInput](docs/Model/TreatmentParameterInput.md)
- [TreatmentRep](docs/Model/TreatmentRep.md)
- [TreatmentResultRep](docs/Model/TreatmentResultRep.md)
- [TriggerPost](docs/Model/TriggerPost.md)
- [TriggerWorkflowCollectionRep](docs/Model/TriggerWorkflowCollectionRep.md)
- [TriggerWorkflowRep](docs/Model/TriggerWorkflowRep.md)
- [UnauthorizedErrorRep](docs/Model/UnauthorizedErrorRep.md)
- [UpsertFlagDefaultsPayload](docs/Model/UpsertFlagDefaultsPayload.md)
- [UpsertPayloadRep](docs/Model/UpsertPayloadRep.md)
- [UrlPost](docs/Model/UrlPost.md)
- [User](docs/Model/User.md)
- [UserAttributeNamesRep](docs/Model/UserAttributeNamesRep.md)
- [UserFlagSetting](docs/Model/UserFlagSetting.md)
- [UserFlagSettings](docs/Model/UserFlagSettings.md)
- [UserRecord](docs/Model/UserRecord.md)
- [UserRecordRep](docs/Model/UserRecordRep.md)
- [UserSegment](docs/Model/UserSegment.md)
- [UserSegmentRule](docs/Model/UserSegmentRule.md)
- [UserSegments](docs/Model/UserSegments.md)
- [Users](docs/Model/Users.md)
- [UsersRep](docs/Model/UsersRep.md)
- [ValuePut](docs/Model/ValuePut.md)
- [Variate](docs/Model/Variate.md)
- [Variation](docs/Model/Variation.md)
- [VariationOrRolloutRep](docs/Model/VariationOrRolloutRep.md)
- [VariationSummary](docs/Model/VariationSummary.md)
- [VersionsRep](docs/Model/VersionsRep.md)
- [Webhook](docs/Model/Webhook.md)
- [WebhookPost](docs/Model/WebhookPost.md)
- [Webhooks](docs/Model/Webhooks.md)
- [WeightedVariation](docs/Model/WeightedVariation.md)
- [WorkflowTemplateMetadata](docs/Model/WorkflowTemplateMetadata.md)
- [WorkflowTemplateOutput](docs/Model/WorkflowTemplateOutput.md)
- [WorkflowTemplateParameter](docs/Model/WorkflowTemplateParameter.md)
- [WorkflowTemplateParameterInput](docs/Model/WorkflowTemplateParameterInput.md)
- [WorkflowTemplatesListingOutputRep](docs/Model/WorkflowTemplatesListingOutputRep.md)

## Authorization

### ApiKey

- **Type**: API key
- **API key parameter name**: Authorization
- **Location**: HTTP header


## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

support@launchdarkly.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `2.0`
    - Package version: `11.0.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
