This repository contains a client library for LaunchDarkly's REST API. This client was automatically
generated from our [OpenAPI specification](https://app.launchdarkly.com/api/v2/openapi.json) using a [code generation library](https://github.com/launchdarkly/ld-openapi).

This REST API is for custom integrations, data export, or automating your feature flag workflows. *DO NOT* use this client library to include feature flags in your web or mobile application. To integrate feature flags with your application, read the [SDK documentation](https://docs.launchdarkly.com/sdk).

This client library is only compatible with the latest version of our REST API. Previous versions of this client library are compatible with earlier versions of our REST API. When you create an access token, you can set the REST API version associated with the token. By default, API requests you send using the token will use the specified API version. To learn more, read [Versioning](https://apidocs.launchdarkly.com/#section/Overview/Versioning).
# OpenAPIClient-php

This documentation describes LaunchDarkly's REST API.

To access the complete OpenAPI spec directly, use [Get OpenAPI spec](https://launchdarkly.com/docs/api/other/get-openapi-spec).

## Authentication

LaunchDarkly's REST API uses the HTTPS protocol with a minimum TLS version of 1.2.

All REST API resources are authenticated with either [personal or service access tokens](https://launchdarkly.com/docs/home/account/api), or session cookies. Other authentication mechanisms are not supported. You can manage personal access tokens on your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page in the LaunchDarkly UI.

LaunchDarkly also has SDK keys, mobile keys, and client-side IDs that are used by our server-side SDKs, mobile SDKs, and JavaScript-based SDKs, respectively. **These keys cannot be used to access our REST API**. These keys are environment-specific, and can only perform read-only operations such as fetching feature flag settings.

| Auth mechanism                                                                                  | Allowed resources                                                                                     | Use cases                                          |
| ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------- |
| [Personal or service access tokens](https://launchdarkly.com/docs/home/account/api) | Can be customized on a per-token basis                                                                | Building scripts, custom integrations, data export. |
| SDK keys                                                                                        | Can only access read-only resources specific to server-side SDKs. Restricted to a single environment. | Server-side SDKs                     |
| Mobile keys                                                                                     | Can only access read-only resources specific to mobile SDKs, and only for flags marked available to mobile keys. Restricted to a single environment.           | Mobile SDKs                                        |
| Client-side ID                                                                                  | Can only access read-only resources specific to JavaScript-based client-side SDKs, and only for flags marked available to client-side. Restricted to a single environment.           | Client-side JavaScript                             |

> #### Keep your access tokens and SDK keys private
>
> Access tokens should _never_ be exposed in untrusted contexts. Never put an access token in client-side JavaScript, or embed it in a mobile application. LaunchDarkly has special mobile keys that you can embed in mobile apps. If you accidentally expose an access token or SDK key, you can reset it from your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page.
>
> The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.

### Authentication using request header

The preferred way to authenticate with the API is by adding an `Authorization` header containing your access token to your requests. The value of the `Authorization` header must be your access token.

Manage personal access tokens from the [**Authorization**](https://app.launchdarkly.com/settings/authorization) page.

### Authentication using session cookie

For testing purposes, you can make API calls directly from your web browser. If you are logged in to the LaunchDarkly application, the API will use your existing session to authenticate calls.

If you have a [role](https://launchdarkly.com/docs/home/account/built-in-roles) other than Admin, or have a [custom role](https://launchdarkly.com/docs/home/account/custom-roles) defined, you may not have permission to perform some API calls. You will receive a `401` response code in that case.

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

All resources expect and return JSON response bodies. Error responses also send a JSON body. To learn more about the error format of the API, read [Errors](https://launchdarkly.com/docs/api#errors).

In practice this means that you always get a response with a `Content-Type` header set to `application/json`.

In addition, request bodies for `PATCH`, `POST`, and `PUT` requests must be encoded as JSON with a `Content-Type` header set to `application/json`.

### Summary and detailed representations

When you fetch a list of resources, the response includes only the most important attributes of each resource. This is a _summary representation_ of the resource. When you fetch an individual resource, such as a single feature flag, you receive a _detailed representation_ of the resource.

The best way to find a detailed representation is to follow links. Every summary representation includes a link to its detailed representation.

### Expanding responses

Sometimes the detailed representation of a resource does not include all of the attributes of the resource by default. If this is the case, the request method will clearly document this and describe which attributes you can include in an expanded response.

To include the additional attributes, append the `expand` request parameter to your request and add a comma-separated list of the attributes to include. For example, when you append `?expand=members,maintainers` to the [Get team](https://launchdarkly.com/docs/api/teams/get-team) endpoint, the expanded response includes both of these attributes.

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

Resources that accept partial updates use the `PATCH` verb. Most resources support the [JSON patch](https://launchdarkly.com/docs/api#updates-using-json-patch) format. Some resources also support the [JSON merge patch](https://launchdarkly.com/docs/api#updates-using-json-merge-patch) format, and some resources support the [semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch) format, which is a way to specify the modifications to perform as a set of executable instructions. Each resource supports optional [comments](https://launchdarkly.com/docs/api#updates-with-comments) that you can submit with updates. Comments appear in outgoing webhooks, the audit log, and other integrations.

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

Some resources support the semantic patch format. A semantic patch is a way to specify the modifications to perform on a resource as a set of executable instructions.

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

Semantic patches are not applied partially; either all of the instructions are applied or none of them are. If **any** instruction is invalid, the endpoint returns an error and will not change the resource. If all instructions are valid, the request succeeds and the resources are updated if necessary, or left unchanged if they are already in the state you request.

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
| 404  | Invalid resource identifier | The requested resource is not valid. | Ensure that the resource is correctly identified by ID or key. |
| 405  | Method not allowed | The request method is not allowed on this resource. | Ensure that the HTTP verb is correct. |
| 409  | Conflict          | The API request can not be completed because it conflicts with a concurrent API request. | Retry your request.                                              |
| 422  | Unprocessable entity | The API request can not be completed because the update description can not be understood. | Ensure that the request body is correct for the type of patch you are using, either JSON patch or semantic patch.
| 429  | Too many requests | Read [Rate limiting](https://launchdarkly.com/docs/api#rate-limiting).                                               | Wait and try again later.                                        |

## CORS

The LaunchDarkly API supports Cross Origin Resource Sharing (CORS) for AJAX requests from any origin. If an `Origin` header is given in a request, it will be echoed as an explicitly allowed origin. Otherwise the request returns a wildcard, `Access-Control-Allow-Origin: *`. For more information on CORS, read the [CORS W3C Recommendation](http://www.w3.org/TR/cors). Example CORS headers might look like:

```http
Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, Authorization
Access-Control-Allow-Methods: OPTIONS, GET, DELETE, PATCH
Access-Control-Allow-Origin: *
Access-Control-Max-Age: 300
```

You can make authenticated CORS calls just as you would make same-origin calls, using either [token or session-based authentication](https://launchdarkly.com/docs/api#authentication). If you are using session authentication, you should set the `withCredentials` property for your `xhr` request to `true`. You should never expose your access tokens to untrusted entities.

## Rate limiting

We use several rate limiting strategies to ensure the availability of our APIs. Rate-limited calls to our APIs return a `429` status code. Calls to our APIs include headers indicating the current rate limit status. The specific headers returned depend on the API route being called. The limits differ based on the route, authentication mechanism, and other factors. Routes that are not rate limited may not contain any of the headers described below.

> ### Rate limiting and SDKs
>
> LaunchDarkly SDKs are never rate limited and do not use the API endpoints defined here. LaunchDarkly uses a different set of approaches, including streaming/server-sent events and a global CDN, to ensure availability to the routes used by LaunchDarkly SDKs.

### Global rate limits

Authenticated requests are subject to a global limit. This is the maximum number of calls that your account can make to the API per ten seconds. All service and personal access tokens on the account share this limit, so exceeding the limit with one access token will impact other tokens. Calls that are subject to global rate limits may return the headers below:

| Header name                    | Description                                                                      |
| ------------------------------ | -------------------------------------------------------------------------------- |
| `X-Ratelimit-Global-Remaining` | The maximum number of requests the account is permitted to make per ten seconds. |
| `X-Ratelimit-Reset`            | The time at which the current rate limit window resets in epoch milliseconds.    |

We do not publicly document the specific number of calls that can be made globally. This limit may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limit.

### Route-level rate limits

Some authenticated routes have custom rate limits. These also reset every ten seconds. Any service or personal access tokens hitting the same route share this limit, so exceeding the limit with one access token may impact other tokens. Calls that are subject to route-level rate limits return the headers below:

| Header name                   | Description                                                                                           |
| ----------------------------- | ----------------------------------------------------------------------------------------------------- |
| `X-Ratelimit-Route-Remaining` | The maximum number of requests to the current route the account is permitted to make per ten seconds. |
| `X-Ratelimit-Reset`           | The time at which the current rate limit window resets in epoch milliseconds.                         |

A _route_ represents a specific URL pattern and verb. For example, the [Delete environment](https://launchdarkly.com/docs/api/environments/delete-environment) endpoint is considered a single route, and each call to delete an environment counts against your route-level rate limit for that route.

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
> To use this feature, pass in a header including the `LD-API-Version` key with value set to `beta`. Use this header with each call. To learn more, read [Beta resources](https://launchdarkly.com/docs/api#beta-resources).
>
> Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.

### Using beta resources

To use a beta resource, you must include a header in the request. If you call a beta resource without this header, you receive a `403` response.

Use this header:

```
LD-API-Version: beta
```

## Federal environments

The version of LaunchDarkly that is available on domains controlled by the United States government is different from the version of LaunchDarkly available to the general public. If you are an employee or contractor for a United States federal agency and use LaunchDarkly in your work, you likely use the federal instance of LaunchDarkly.

If you are working in the federal instance of LaunchDarkly, the base URI for each request is `https://app.launchdarkly.us`.

To learn more, read [LaunchDarkly in federal environments](https://launchdarkly.com/docs/home/infrastructure/federal).

## Versioning

We try hard to keep our REST API backwards compatible, but we occasionally have to make backwards-incompatible changes in the process of shipping new features. These breaking changes can cause unexpected behavior if you don't prepare for them accordingly.

Updates to our REST API include support for the latest features in LaunchDarkly. We also release a new version of our REST API every time we make a breaking change. We provide simultaneous support for multiple API versions so you can migrate from your current API version to a new version at your own pace.

### Setting the API version per request

You can set the API version on a specific request by sending an `LD-API-Version` header, as shown in the example below:

```
LD-API-Version: 20240415
```

The header value is the version number of the API version you would like to request. The number for each version corresponds to the date the version was released in `yyyymmdd` format. In the example above the version `20240415` corresponds to April 15, 2024.

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

<table>
  <tr>
    <th>Version</th>
    <th>Changes</th>
    <th>End of life (EOL)</th>
  </tr>
  <tr>
    <td>`20240415`</td>
    <td>
      <ul><li>Changed several endpoints from unpaginated to paginated. Use the `limit` and `offset` query parameters to page through the results.</li> <li>Changed the [list access tokens](https://launchdarkly.com/docs/api/access-tokens/get-tokens) endpoint: <ul><li>Response is now paginated with a default limit of `25`</li></ul></li> <li>Changed the [list account members](https://launchdarkly.com/docs/api/account-members/get-members) endpoint: <ul><li>The `accessCheck` filter is no longer available</li></ul></li> <li>Changed the [list custom roles](https://launchdarkly.com/docs/api/custom-roles/get-custom-roles) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `environments` field is now only returned if the request is filtered by environment, using the `filterEnv` query parameter</li><li>The `followerId`, `hasDataExport`, `status`, `contextKindTargeted`, and `segmentTargeted` filters are no longer available</li><li>The `compare` query parameter is no longer available</li></ul></li> <li>Changed the [list segments](https://launchdarkly.com/docs/api/segments/get-segments) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list teams](https://launchdarkly.com/docs/api/teams/get-teams) endpoint: <ul><li>The `expand` parameter no longer supports including `projects` or `roles`</li><li>In paginated results, the maximum page size is now 100</li></ul></li> <li>Changed the [get workflows](https://launchdarkly.com/docs/api/workflows/get-workflows) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `_conflicts` field in the response is no longer available</li></ul></li> </ul>
    </td>
    <td>Current</td>
  </tr>
  <tr>
    <td>`20220603`</td>
    <td>
      <ul><li>Changed the [list projects](https://launchdarkly.com/docs/api/projects/get-projects) return value:<ul><li>Response is now paginated with a default limit of `20`.</li><li>Added support for filter and sort.</li><li>The project `environments` field is now expandable. This field is omitted by default.</li></ul></li><li>Changed the [get project](https://launchdarkly.com/docs/api/projects/get-project) return value:<ul><li>The `environments` field is now expandable. This field is omitted by default.</li></ul></li></ul>
    </td>
    <td>2025-04-15</td>
  </tr>
  <tr>
    <td>`20210729`</td>
    <td>
      <ul><li>Changed the [create approval request](https://launchdarkly.com/docs/api/approvals/post-approval-request) return value. It now returns HTTP Status Code `201` instead of `200`.</li><li> Changed the [get user](https://launchdarkly.com/docs/api/users/get-user) return value. It now returns a user record, not a user. </li><li>Added additional optional fields to environment, segments, flags, members, and segments, including the ability to create big segments. </li><li> Added default values for flag variations when new environments are created. </li><li>Added filtering and pagination for getting flags and members, including `limit`, `number`, `filter`, and `sort` query parameters. </li><li>Added endpoints for expiring user targets for flags and segments, scheduled changes, access tokens, Relay Proxy configuration, integrations and subscriptions, and approvals. </li></ul>
    </td>
    <td>2023-06-03</td>
  </tr>
  <tr>
    <td>`20191212`</td>
    <td>
      <ul><li>[List feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) now defaults to sending summaries of feature flag configurations, equivalent to setting the query parameter `summary=true`. Summaries omit flag targeting rules and individual user targets from the payload. </li><li> Added endpoints for flags, flag status, projects, environments, audit logs, members, users, custom roles, segments, usage, streams, events, and data export. </li></ul>
    </td>
    <td>2022-07-29</td>
  </tr>
  <tr>
    <td>`20160426`</td>
    <td>
      <ul><li>Initial versioning of API. Tokens created before versioning have their version set to this.</li></ul>
    </td>
    <td>2020-12-12</td>
  </tr>
</table>

To learn more about how EOL is determined, read LaunchDarkly's [End of Life (EOL) Policy](https://launchdarkly.com/policies/end-of-life-policy/).


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


$apiInstance = new LaunchDarklyApi\Api\AIConfigsBetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ld_api_version = 'ld_api_version_example'; // string | Version of the endpoint.
$project_key = default; // string
$config_key = 'config_key_example'; // string

try {
    $apiInstance->deleteAIConfig($ld_api_version, $project_key, $config_key);
} catch (Exception $e) {
    echo 'Exception when calling AIConfigsBetaApi->deleteAIConfig: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://app.launchdarkly.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AIConfigsBetaApi* | [**deleteAIConfig**](docs/Api/AIConfigsBetaApi.md#deleteaiconfig) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Delete AI Config
*AIConfigsBetaApi* | [**deleteAIConfigVariation**](docs/Api/AIConfigsBetaApi.md#deleteaiconfigvariation) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Delete AI Config variation
*AIConfigsBetaApi* | [**deleteModelConfig**](docs/Api/AIConfigsBetaApi.md#deletemodelconfig) | **DELETE** /api/v2/projects/{projectKey}/ai-configs/model-configs/{modelConfigKey} | Delete an AI model config
*AIConfigsBetaApi* | [**getAIConfig**](docs/Api/AIConfigsBetaApi.md#getaiconfig) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Get AI Config
*AIConfigsBetaApi* | [**getAIConfigMetrics**](docs/Api/AIConfigsBetaApi.md#getaiconfigmetrics) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/metrics | Get AI Config metrics
*AIConfigsBetaApi* | [**getAIConfigMetricsByVariation**](docs/Api/AIConfigsBetaApi.md#getaiconfigmetricsbyvariation) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/metrics-by-variation | Get AI Config metrics by variation
*AIConfigsBetaApi* | [**getAIConfigVariation**](docs/Api/AIConfigsBetaApi.md#getaiconfigvariation) | **GET** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Get AI Config variation
*AIConfigsBetaApi* | [**getAIConfigs**](docs/Api/AIConfigsBetaApi.md#getaiconfigs) | **GET** /api/v2/projects/{projectKey}/ai-configs | List AI Configs
*AIConfigsBetaApi* | [**getModelConfig**](docs/Api/AIConfigsBetaApi.md#getmodelconfig) | **GET** /api/v2/projects/{projectKey}/ai-configs/model-configs/{modelConfigKey} | Get AI model config
*AIConfigsBetaApi* | [**listModelConfigs**](docs/Api/AIConfigsBetaApi.md#listmodelconfigs) | **GET** /api/v2/projects/{projectKey}/ai-configs/model-configs | List AI model configs
*AIConfigsBetaApi* | [**patchAIConfig**](docs/Api/AIConfigsBetaApi.md#patchaiconfig) | **PATCH** /api/v2/projects/{projectKey}/ai-configs/{configKey} | Update AI Config
*AIConfigsBetaApi* | [**patchAIConfigVariation**](docs/Api/AIConfigsBetaApi.md#patchaiconfigvariation) | **PATCH** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations/{variationKey} | Update AI Config variation
*AIConfigsBetaApi* | [**postAIConfig**](docs/Api/AIConfigsBetaApi.md#postaiconfig) | **POST** /api/v2/projects/{projectKey}/ai-configs | Create new AI Config
*AIConfigsBetaApi* | [**postAIConfigVariation**](docs/Api/AIConfigsBetaApi.md#postaiconfigvariation) | **POST** /api/v2/projects/{projectKey}/ai-configs/{configKey}/variations | Create AI Config variation
*AIConfigsBetaApi* | [**postModelConfig**](docs/Api/AIConfigsBetaApi.md#postmodelconfig) | **POST** /api/v2/projects/{projectKey}/ai-configs/model-configs | Create an AI model config
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
*AccountUsageBetaApi* | [**getDataExportEventsUsage**](docs/Api/AccountUsageBetaApi.md#getdataexporteventsusage) | **GET** /api/v2/usage/data-export-events | Get data export events usage
*AccountUsageBetaApi* | [**getEvaluationsUsage**](docs/Api/AccountUsageBetaApi.md#getevaluationsusage) | **GET** /api/v2/usage/evaluations/{projectKey}/{environmentKey}/{featureFlagKey} | Get evaluations usage
*AccountUsageBetaApi* | [**getEventsUsage**](docs/Api/AccountUsageBetaApi.md#geteventsusage) | **GET** /api/v2/usage/events/{type} | Get events usage
*AccountUsageBetaApi* | [**getExperimentationKeysUsage**](docs/Api/AccountUsageBetaApi.md#getexperimentationkeysusage) | **GET** /api/v2/usage/experimentation-keys | Get experimentation keys usage
*AccountUsageBetaApi* | [**getExperimentationUnitsUsage**](docs/Api/AccountUsageBetaApi.md#getexperimentationunitsusage) | **GET** /api/v2/usage/experimentation-units | Get experimentation units usage
*AccountUsageBetaApi* | [**getMauSdksByType**](docs/Api/AccountUsageBetaApi.md#getmausdksbytype) | **GET** /api/v2/usage/mau/sdks | Get MAU SDKs by type
*AccountUsageBetaApi* | [**getMauUsage**](docs/Api/AccountUsageBetaApi.md#getmauusage) | **GET** /api/v2/usage/mau | Get MAU usage
*AccountUsageBetaApi* | [**getMauUsageByCategory**](docs/Api/AccountUsageBetaApi.md#getmauusagebycategory) | **GET** /api/v2/usage/mau/bycategory | Get MAU usage by category
*AccountUsageBetaApi* | [**getServiceConnectionUsage**](docs/Api/AccountUsageBetaApi.md#getserviceconnectionusage) | **GET** /api/v2/usage/service-connections | Get service connection usage
*AccountUsageBetaApi* | [**getStreamUsage**](docs/Api/AccountUsageBetaApi.md#getstreamusage) | **GET** /api/v2/usage/streams/{source} | Get stream usage
*AccountUsageBetaApi* | [**getStreamUsageBySdkVersion**](docs/Api/AccountUsageBetaApi.md#getstreamusagebysdkversion) | **GET** /api/v2/usage/streams/{source}/bysdkversion | Get stream usage by SDK version
*AccountUsageBetaApi* | [**getStreamUsageSdkversion**](docs/Api/AccountUsageBetaApi.md#getstreamusagesdkversion) | **GET** /api/v2/usage/streams/{source}/sdkversions | Get stream usage SDK versions
*AnnouncementsApi* | [**createAnnouncementPublic**](docs/Api/AnnouncementsApi.md#createannouncementpublic) | **POST** /api/v2/announcements | Create an announcement
*AnnouncementsApi* | [**deleteAnnouncementPublic**](docs/Api/AnnouncementsApi.md#deleteannouncementpublic) | **DELETE** /api/v2/announcements/{announcementId} | Delete an announcement
*AnnouncementsApi* | [**getAnnouncementsPublic**](docs/Api/AnnouncementsApi.md#getannouncementspublic) | **GET** /api/v2/announcements | Get announcements
*AnnouncementsApi* | [**updateAnnouncementPublic**](docs/Api/AnnouncementsApi.md#updateannouncementpublic) | **PATCH** /api/v2/announcements/{announcementId} | Update an announcement
*ApplicationsBetaApi* | [**deleteApplication**](docs/Api/ApplicationsBetaApi.md#deleteapplication) | **DELETE** /api/v2/applications/{applicationKey} | Delete application
*ApplicationsBetaApi* | [**deleteApplicationVersion**](docs/Api/ApplicationsBetaApi.md#deleteapplicationversion) | **DELETE** /api/v2/applications/{applicationKey}/versions/{versionKey} | Delete application version
*ApplicationsBetaApi* | [**getApplication**](docs/Api/ApplicationsBetaApi.md#getapplication) | **GET** /api/v2/applications/{applicationKey} | Get application by key
*ApplicationsBetaApi* | [**getApplicationVersions**](docs/Api/ApplicationsBetaApi.md#getapplicationversions) | **GET** /api/v2/applications/{applicationKey}/versions | Get application versions by application key
*ApplicationsBetaApi* | [**getApplications**](docs/Api/ApplicationsBetaApi.md#getapplications) | **GET** /api/v2/applications | Get applications
*ApplicationsBetaApi* | [**patchApplication**](docs/Api/ApplicationsBetaApi.md#patchapplication) | **PATCH** /api/v2/applications/{applicationKey} | Update application
*ApplicationsBetaApi* | [**patchApplicationVersion**](docs/Api/ApplicationsBetaApi.md#patchapplicationversion) | **PATCH** /api/v2/applications/{applicationKey}/versions/{versionKey} | Update application version
*ApprovalsApi* | [**deleteApprovalRequest**](docs/Api/ApprovalsApi.md#deleteapprovalrequest) | **DELETE** /api/v2/approval-requests/{id} | Delete approval request
*ApprovalsApi* | [**deleteApprovalRequestForFlag**](docs/Api/ApprovalsApi.md#deleteapprovalrequestforflag) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Delete approval request for a flag
*ApprovalsApi* | [**getApprovalForFlag**](docs/Api/ApprovalsApi.md#getapprovalforflag) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Get approval request for a flag
*ApprovalsApi* | [**getApprovalRequest**](docs/Api/ApprovalsApi.md#getapprovalrequest) | **GET** /api/v2/approval-requests/{id} | Get approval request
*ApprovalsApi* | [**getApprovalRequests**](docs/Api/ApprovalsApi.md#getapprovalrequests) | **GET** /api/v2/approval-requests | List approval requests
*ApprovalsApi* | [**getApprovalsForFlag**](docs/Api/ApprovalsApi.md#getapprovalsforflag) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | List approval requests for a flag
*ApprovalsApi* | [**postApprovalRequest**](docs/Api/ApprovalsApi.md#postapprovalrequest) | **POST** /api/v2/approval-requests | Create approval request
*ApprovalsApi* | [**postApprovalRequestApply**](docs/Api/ApprovalsApi.md#postapprovalrequestapply) | **POST** /api/v2/approval-requests/{id}/apply | Apply approval request
*ApprovalsApi* | [**postApprovalRequestApplyForFlag**](docs/Api/ApprovalsApi.md#postapprovalrequestapplyforflag) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/apply | Apply approval request for a flag
*ApprovalsApi* | [**postApprovalRequestForFlag**](docs/Api/ApprovalsApi.md#postapprovalrequestforflag) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests | Create approval request for a flag
*ApprovalsApi* | [**postApprovalRequestReview**](docs/Api/ApprovalsApi.md#postapprovalrequestreview) | **POST** /api/v2/approval-requests/{id}/reviews | Review approval request
*ApprovalsApi* | [**postApprovalRequestReviewForFlag**](docs/Api/ApprovalsApi.md#postapprovalrequestreviewforflag) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/reviews | Review approval request for a flag
*ApprovalsApi* | [**postFlagCopyConfigApprovalRequest**](docs/Api/ApprovalsApi.md#postflagcopyconfigapprovalrequest) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests-flag-copy | Create approval request to copy flag configurations across environments
*ApprovalsBetaApi* | [**patchApprovalRequest**](docs/Api/ApprovalsBetaApi.md#patchapprovalrequest) | **PATCH** /api/v2/approval-requests/{id} | Update approval request
*ApprovalsBetaApi* | [**patchFlagConfigApprovalRequest**](docs/Api/ApprovalsBetaApi.md#patchflagconfigapprovalrequest) | **PATCH** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id} | Update flag approval request
*AuditLogApi* | [**getAuditLogEntries**](docs/Api/AuditLogApi.md#getauditlogentries) | **GET** /api/v2/auditlog | List audit log entries
*AuditLogApi* | [**getAuditLogEntry**](docs/Api/AuditLogApi.md#getauditlogentry) | **GET** /api/v2/auditlog/{id} | Get audit log entry
*AuditLogApi* | [**postAuditLogEntries**](docs/Api/AuditLogApi.md#postauditlogentries) | **POST** /api/v2/auditlog | Search audit log entries
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
*ContextSettingsApi* | [**putContextFlagSetting**](docs/Api/ContextSettingsApi.md#putcontextflagsetting) | **PUT** /api/v2/projects/{projectKey}/environments/{environmentKey}/contexts/{contextKind}/{contextKey}/flags/{featureFlagKey} | Update flag settings for context
*ContextsApi* | [**deleteContextInstances**](docs/Api/ContextsApi.md#deletecontextinstances) | **DELETE** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-instances/{id} | Delete context instances
*ContextsApi* | [**evaluateContextInstance**](docs/Api/ContextsApi.md#evaluatecontextinstance) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/flags/evaluate | Evaluate flags for context instance
*ContextsApi* | [**getContextAttributeNames**](docs/Api/ContextsApi.md#getcontextattributenames) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-attributes | Get context attribute names
*ContextsApi* | [**getContextAttributeValues**](docs/Api/ContextsApi.md#getcontextattributevalues) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-attributes/{attributeName} | Get context attribute values
*ContextsApi* | [**getContextInstances**](docs/Api/ContextsApi.md#getcontextinstances) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-instances/{id} | Get context instances
*ContextsApi* | [**getContextKindsByProjectKey**](docs/Api/ContextsApi.md#getcontextkindsbyprojectkey) | **GET** /api/v2/projects/{projectKey}/context-kinds | Get context kinds
*ContextsApi* | [**getContexts**](docs/Api/ContextsApi.md#getcontexts) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/contexts/{kind}/{key} | Get contexts
*ContextsApi* | [**putContextKind**](docs/Api/ContextsApi.md#putcontextkind) | **PUT** /api/v2/projects/{projectKey}/context-kinds/{key} | Create or update context kind
*ContextsApi* | [**searchContextInstances**](docs/Api/ContextsApi.md#searchcontextinstances) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/context-instances/search | Search for context instances
*ContextsApi* | [**searchContexts**](docs/Api/ContextsApi.md#searchcontexts) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/contexts/search | Search for contexts
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
*DataExportDestinationsApi* | [**postGenerateWarehouseDestinationKeyPair**](docs/Api/DataExportDestinationsApi.md#postgeneratewarehousedestinationkeypair) | **POST** /api/v2/destinations/generate-warehouse-destination-key-pair | Generate Snowflake destination key pair
*EnvironmentsApi* | [**deleteEnvironment**](docs/Api/EnvironmentsApi.md#deleteenvironment) | **DELETE** /api/v2/projects/{projectKey}/environments/{environmentKey} | Delete environment
*EnvironmentsApi* | [**getEnvironment**](docs/Api/EnvironmentsApi.md#getenvironment) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey} | Get environment
*EnvironmentsApi* | [**getEnvironmentsByProject**](docs/Api/EnvironmentsApi.md#getenvironmentsbyproject) | **GET** /api/v2/projects/{projectKey}/environments | List environments
*EnvironmentsApi* | [**patchEnvironment**](docs/Api/EnvironmentsApi.md#patchenvironment) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey} | Update environment
*EnvironmentsApi* | [**postEnvironment**](docs/Api/EnvironmentsApi.md#postenvironment) | **POST** /api/v2/projects/{projectKey}/environments | Create environment
*EnvironmentsApi* | [**resetEnvironmentMobileKey**](docs/Api/EnvironmentsApi.md#resetenvironmentmobilekey) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/mobileKey | Reset environment mobile SDK key
*EnvironmentsApi* | [**resetEnvironmentSDKKey**](docs/Api/EnvironmentsApi.md#resetenvironmentsdkkey) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/apiKey | Reset environment SDK key
*ExperimentsApi* | [**createExperiment**](docs/Api/ExperimentsApi.md#createexperiment) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments | Create experiment
*ExperimentsApi* | [**createIteration**](docs/Api/ExperimentsApi.md#createiteration) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/iterations | Create iteration
*ExperimentsApi* | [**getExperiment**](docs/Api/ExperimentsApi.md#getexperiment) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey} | Get experiment
*ExperimentsApi* | [**getExperimentResults**](docs/Api/ExperimentsApi.md#getexperimentresults) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/metrics/{metricKey}/results | Get experiment results (Deprecated)
*ExperimentsApi* | [**getExperimentResultsForMetricGroup**](docs/Api/ExperimentsApi.md#getexperimentresultsformetricgroup) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey}/metric-groups/{metricGroupKey}/results | Get experiment results for metric group (Deprecated)
*ExperimentsApi* | [**getExperimentationSettings**](docs/Api/ExperimentsApi.md#getexperimentationsettings) | **GET** /api/v2/projects/{projectKey}/experimentation-settings | Get experimentation settings
*ExperimentsApi* | [**getExperiments**](docs/Api/ExperimentsApi.md#getexperiments) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments | Get experiments
*ExperimentsApi* | [**patchExperiment**](docs/Api/ExperimentsApi.md#patchexperiment) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey}/experiments/{experimentKey} | Patch experiment
*ExperimentsApi* | [**putExperimentationSettings**](docs/Api/ExperimentsApi.md#putexperimentationsettings) | **PUT** /api/v2/projects/{projectKey}/experimentation-settings | Update experimentation settings
*FeatureFlagsApi* | [**copyFeatureFlag**](docs/Api/FeatureFlagsApi.md#copyfeatureflag) | **POST** /api/v2/flags/{projectKey}/{featureFlagKey}/copy | Copy feature flag
*FeatureFlagsApi* | [**deleteFeatureFlag**](docs/Api/FeatureFlagsApi.md#deletefeatureflag) | **DELETE** /api/v2/flags/{projectKey}/{featureFlagKey} | Delete feature flag
*FeatureFlagsApi* | [**getExpiringContextTargets**](docs/Api/FeatureFlagsApi.md#getexpiringcontexttargets) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-targets/{environmentKey} | Get expiring context targets for feature flag
*FeatureFlagsApi* | [**getExpiringUserTargets**](docs/Api/FeatureFlagsApi.md#getexpiringusertargets) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for feature flag
*FeatureFlagsApi* | [**getFeatureFlag**](docs/Api/FeatureFlagsApi.md#getfeatureflag) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey} | Get feature flag
*FeatureFlagsApi* | [**getFeatureFlagStatus**](docs/Api/FeatureFlagsApi.md#getfeatureflagstatus) | **GET** /api/v2/flag-statuses/{projectKey}/{environmentKey}/{featureFlagKey} | Get feature flag status
*FeatureFlagsApi* | [**getFeatureFlagStatusAcrossEnvironments**](docs/Api/FeatureFlagsApi.md#getfeatureflagstatusacrossenvironments) | **GET** /api/v2/flag-status/{projectKey}/{featureFlagKey} | Get flag status across environments
*FeatureFlagsApi* | [**getFeatureFlagStatuses**](docs/Api/FeatureFlagsApi.md#getfeatureflagstatuses) | **GET** /api/v2/flag-statuses/{projectKey}/{environmentKey} | List feature flag statuses
*FeatureFlagsApi* | [**getFeatureFlags**](docs/Api/FeatureFlagsApi.md#getfeatureflags) | **GET** /api/v2/flags/{projectKey} | List feature flags
*FeatureFlagsApi* | [**patchExpiringTargets**](docs/Api/FeatureFlagsApi.md#patchexpiringtargets) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-targets/{environmentKey} | Update expiring context targets on feature flag
*FeatureFlagsApi* | [**patchExpiringUserTargets**](docs/Api/FeatureFlagsApi.md#patchexpiringusertargets) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey}/expiring-user-targets/{environmentKey} | Update expiring user targets on feature flag
*FeatureFlagsApi* | [**patchFeatureFlag**](docs/Api/FeatureFlagsApi.md#patchfeatureflag) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey} | Update feature flag
*FeatureFlagsApi* | [**postFeatureFlag**](docs/Api/FeatureFlagsApi.md#postfeatureflag) | **POST** /api/v2/flags/{projectKey} | Create a feature flag
*FeatureFlagsApi* | [**postMigrationSafetyIssues**](docs/Api/FeatureFlagsApi.md#postmigrationsafetyissues) | **POST** /api/v2/projects/{projectKey}/flags/{flagKey}/environments/{environmentKey}/migration-safety-issues | Get migration safety issues
*FeatureFlagsBetaApi* | [**getDependentFlags**](docs/Api/FeatureFlagsBetaApi.md#getdependentflags) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/dependent-flags | List dependent feature flags
*FeatureFlagsBetaApi* | [**getDependentFlagsByEnv**](docs/Api/FeatureFlagsBetaApi.md#getdependentflagsbyenv) | **GET** /api/v2/flags/{projectKey}/{environmentKey}/{featureFlagKey}/dependent-flags | List dependent feature flags by environment
*FlagImportConfigurationsBetaApi* | [**createFlagImportConfiguration**](docs/Api/FlagImportConfigurationsBetaApi.md#createflagimportconfiguration) | **POST** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey} | Create a flag import configuration
*FlagImportConfigurationsBetaApi* | [**deleteFlagImportConfiguration**](docs/Api/FlagImportConfigurationsBetaApi.md#deleteflagimportconfiguration) | **DELETE** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId} | Delete a flag import configuration
*FlagImportConfigurationsBetaApi* | [**getFlagImportConfiguration**](docs/Api/FlagImportConfigurationsBetaApi.md#getflagimportconfiguration) | **GET** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId} | Get a single flag import configuration
*FlagImportConfigurationsBetaApi* | [**getFlagImportConfigurations**](docs/Api/FlagImportConfigurationsBetaApi.md#getflagimportconfigurations) | **GET** /api/v2/integration-capabilities/flag-import | List all flag import configurations
*FlagImportConfigurationsBetaApi* | [**patchFlagImportConfiguration**](docs/Api/FlagImportConfigurationsBetaApi.md#patchflagimportconfiguration) | **PATCH** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId} | Update a flag import configuration
*FlagImportConfigurationsBetaApi* | [**triggerFlagImportJob**](docs/Api/FlagImportConfigurationsBetaApi.md#triggerflagimportjob) | **POST** /api/v2/integration-capabilities/flag-import/{projectKey}/{integrationKey}/{integrationId}/trigger | Trigger a single flag import run
*FlagLinksBetaApi* | [**createFlagLink**](docs/Api/FlagLinksBetaApi.md#createflaglink) | **POST** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey} | Create flag link
*FlagLinksBetaApi* | [**deleteFlagLink**](docs/Api/FlagLinksBetaApi.md#deleteflaglink) | **DELETE** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey}/{id} | Delete flag link
*FlagLinksBetaApi* | [**getFlagLinks**](docs/Api/FlagLinksBetaApi.md#getflaglinks) | **GET** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey} | List flag links
*FlagLinksBetaApi* | [**updateFlagLink**](docs/Api/FlagLinksBetaApi.md#updateflaglink) | **PATCH** /api/v2/flag-links/projects/{projectKey}/flags/{featureFlagKey}/{id} | Update flag link
*FlagTriggersApi* | [**createTriggerWorkflow**](docs/Api/FlagTriggersApi.md#createtriggerworkflow) | **POST** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey} | Create flag trigger
*FlagTriggersApi* | [**deleteTriggerWorkflow**](docs/Api/FlagTriggersApi.md#deletetriggerworkflow) | **DELETE** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Delete flag trigger
*FlagTriggersApi* | [**getTriggerWorkflowById**](docs/Api/FlagTriggersApi.md#gettriggerworkflowbyid) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Get flag trigger by ID
*FlagTriggersApi* | [**getTriggerWorkflows**](docs/Api/FlagTriggersApi.md#gettriggerworkflows) | **GET** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey} | List flag triggers
*FlagTriggersApi* | [**patchTriggerWorkflow**](docs/Api/FlagTriggersApi.md#patchtriggerworkflow) | **PATCH** /api/v2/flags/{projectKey}/{featureFlagKey}/triggers/{environmentKey}/{id} | Update flag trigger
*FollowFlagsApi* | [**deleteFlagFollower**](docs/Api/FollowFlagsApi.md#deleteflagfollower) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers/{memberId} | Remove a member as a follower of a flag in a project and environment
*FollowFlagsApi* | [**getFlagFollowers**](docs/Api/FollowFlagsApi.md#getflagfollowers) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers | Get followers of a flag in a project and environment
*FollowFlagsApi* | [**getFollowersByProjEnv**](docs/Api/FollowFlagsApi.md#getfollowersbyprojenv) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/followers | Get followers of all flags in a given project and environment
*FollowFlagsApi* | [**putFlagFollower**](docs/Api/FollowFlagsApi.md#putflagfollower) | **PUT** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/followers/{memberId} | Add a member as a follower of a flag in a project and environment
*HoldoutsBetaApi* | [**getAllHoldouts**](docs/Api/HoldoutsBetaApi.md#getallholdouts) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts | Get all holdouts
*HoldoutsBetaApi* | [**getHoldout**](docs/Api/HoldoutsBetaApi.md#getholdout) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts/{holdoutKey} | Get holdout
*HoldoutsBetaApi* | [**getHoldoutById**](docs/Api/HoldoutsBetaApi.md#getholdoutbyid) | **GET** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts/id/{holdoutId} | Get Holdout by Id
*HoldoutsBetaApi* | [**patchHoldout**](docs/Api/HoldoutsBetaApi.md#patchholdout) | **PATCH** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts/{holdoutKey} | Patch holdout
*HoldoutsBetaApi* | [**postHoldout**](docs/Api/HoldoutsBetaApi.md#postholdout) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/holdouts | Create holdout
*InsightsChartsBetaApi* | [**getDeploymentFrequencyChart**](docs/Api/InsightsChartsBetaApi.md#getdeploymentfrequencychart) | **GET** /api/v2/engineering-insights/charts/deployments/frequency | Get deployment frequency chart data
*InsightsChartsBetaApi* | [**getFlagStatusChart**](docs/Api/InsightsChartsBetaApi.md#getflagstatuschart) | **GET** /api/v2/engineering-insights/charts/flags/status | Get flag status chart data
*InsightsChartsBetaApi* | [**getLeadTimeChart**](docs/Api/InsightsChartsBetaApi.md#getleadtimechart) | **GET** /api/v2/engineering-insights/charts/lead-time | Get lead time chart data
*InsightsChartsBetaApi* | [**getReleaseFrequencyChart**](docs/Api/InsightsChartsBetaApi.md#getreleasefrequencychart) | **GET** /api/v2/engineering-insights/charts/releases/frequency | Get release frequency chart data
*InsightsChartsBetaApi* | [**getStaleFlagsChart**](docs/Api/InsightsChartsBetaApi.md#getstaleflagschart) | **GET** /api/v2/engineering-insights/charts/flags/stale | Get stale flags chart data
*InsightsDeploymentsBetaApi* | [**createDeploymentEvent**](docs/Api/InsightsDeploymentsBetaApi.md#createdeploymentevent) | **POST** /api/v2/engineering-insights/deployment-events | Create deployment event
*InsightsDeploymentsBetaApi* | [**getDeployment**](docs/Api/InsightsDeploymentsBetaApi.md#getdeployment) | **GET** /api/v2/engineering-insights/deployments/{deploymentID} | Get deployment
*InsightsDeploymentsBetaApi* | [**getDeployments**](docs/Api/InsightsDeploymentsBetaApi.md#getdeployments) | **GET** /api/v2/engineering-insights/deployments | List deployments
*InsightsDeploymentsBetaApi* | [**updateDeployment**](docs/Api/InsightsDeploymentsBetaApi.md#updatedeployment) | **PATCH** /api/v2/engineering-insights/deployments/{deploymentID} | Update deployment
*InsightsFlagEventsBetaApi* | [**getFlagEvents**](docs/Api/InsightsFlagEventsBetaApi.md#getflagevents) | **GET** /api/v2/engineering-insights/flag-events | List flag events
*InsightsPullRequestsBetaApi* | [**getPullRequests**](docs/Api/InsightsPullRequestsBetaApi.md#getpullrequests) | **GET** /api/v2/engineering-insights/pull-requests | List pull requests
*InsightsRepositoriesBetaApi* | [**associateRepositoriesAndProjects**](docs/Api/InsightsRepositoriesBetaApi.md#associaterepositoriesandprojects) | **PUT** /api/v2/engineering-insights/repositories/projects | Associate repositories with projects
*InsightsRepositoriesBetaApi* | [**deleteRepositoryProject**](docs/Api/InsightsRepositoriesBetaApi.md#deleterepositoryproject) | **DELETE** /api/v2/engineering-insights/repositories/{repositoryKey}/projects/{projectKey} | Remove repository project association
*InsightsRepositoriesBetaApi* | [**getInsightsRepositories**](docs/Api/InsightsRepositoriesBetaApi.md#getinsightsrepositories) | **GET** /api/v2/engineering-insights/repositories | List repositories
*InsightsScoresBetaApi* | [**createInsightGroup**](docs/Api/InsightsScoresBetaApi.md#createinsightgroup) | **POST** /api/v2/engineering-insights/insights/group | Create insight group
*InsightsScoresBetaApi* | [**deleteInsightGroup**](docs/Api/InsightsScoresBetaApi.md#deleteinsightgroup) | **DELETE** /api/v2/engineering-insights/insights/groups/{insightGroupKey} | Delete insight group
*InsightsScoresBetaApi* | [**getInsightGroup**](docs/Api/InsightsScoresBetaApi.md#getinsightgroup) | **GET** /api/v2/engineering-insights/insights/groups/{insightGroupKey} | Get insight group
*InsightsScoresBetaApi* | [**getInsightGroups**](docs/Api/InsightsScoresBetaApi.md#getinsightgroups) | **GET** /api/v2/engineering-insights/insights/groups | List insight groups
*InsightsScoresBetaApi* | [**getInsightsScores**](docs/Api/InsightsScoresBetaApi.md#getinsightsscores) | **GET** /api/v2/engineering-insights/insights/scores | Get insight scores
*InsightsScoresBetaApi* | [**patchInsightGroup**](docs/Api/InsightsScoresBetaApi.md#patchinsightgroup) | **PATCH** /api/v2/engineering-insights/insights/groups/{insightGroupKey} | Patch insight group
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
*IntegrationsBetaApi* | [**createIntegrationConfiguration**](docs/Api/IntegrationsBetaApi.md#createintegrationconfiguration) | **POST** /api/v2/integration-configurations/keys/{integrationKey} | Create integration configuration
*IntegrationsBetaApi* | [**deleteIntegrationConfiguration**](docs/Api/IntegrationsBetaApi.md#deleteintegrationconfiguration) | **DELETE** /api/v2/integration-configurations/{integrationConfigurationId} | Delete integration configuration
*IntegrationsBetaApi* | [**getAllIntegrationConfigurations**](docs/Api/IntegrationsBetaApi.md#getallintegrationconfigurations) | **GET** /api/v2/integration-configurations/keys/{integrationKey} | Get all configurations for the integration
*IntegrationsBetaApi* | [**getIntegrationConfiguration**](docs/Api/IntegrationsBetaApi.md#getintegrationconfiguration) | **GET** /api/v2/integration-configurations/{integrationConfigurationId} | Get an integration configuration
*IntegrationsBetaApi* | [**updateIntegrationConfiguration**](docs/Api/IntegrationsBetaApi.md#updateintegrationconfiguration) | **PATCH** /api/v2/integration-configurations/{integrationConfigurationId} | Update integration configuration
*LayersApi* | [**createLayer**](docs/Api/LayersApi.md#createlayer) | **POST** /api/v2/projects/{projectKey}/layers | Create layer
*LayersApi* | [**getLayers**](docs/Api/LayersApi.md#getlayers) | **GET** /api/v2/projects/{projectKey}/layers | Get layers
*LayersApi* | [**updateLayer**](docs/Api/LayersApi.md#updatelayer) | **PATCH** /api/v2/projects/{projectKey}/layers/{layerKey} | Update layer
*MetricsApi* | [**deleteMetric**](docs/Api/MetricsApi.md#deletemetric) | **DELETE** /api/v2/metrics/{projectKey}/{metricKey} | Delete metric
*MetricsApi* | [**getMetric**](docs/Api/MetricsApi.md#getmetric) | **GET** /api/v2/metrics/{projectKey}/{metricKey} | Get metric
*MetricsApi* | [**getMetrics**](docs/Api/MetricsApi.md#getmetrics) | **GET** /api/v2/metrics/{projectKey} | List metrics
*MetricsApi* | [**patchMetric**](docs/Api/MetricsApi.md#patchmetric) | **PATCH** /api/v2/metrics/{projectKey}/{metricKey} | Update metric
*MetricsApi* | [**postMetric**](docs/Api/MetricsApi.md#postmetric) | **POST** /api/v2/metrics/{projectKey} | Create metric
*MetricsBetaApi* | [**createMetricGroup**](docs/Api/MetricsBetaApi.md#createmetricgroup) | **POST** /api/v2/projects/{projectKey}/metric-groups | Create metric group
*MetricsBetaApi* | [**deleteMetricGroup**](docs/Api/MetricsBetaApi.md#deletemetricgroup) | **DELETE** /api/v2/projects/{projectKey}/metric-groups/{metricGroupKey} | Delete metric group
*MetricsBetaApi* | [**getMetricGroup**](docs/Api/MetricsBetaApi.md#getmetricgroup) | **GET** /api/v2/projects/{projectKey}/metric-groups/{metricGroupKey} | Get metric group
*MetricsBetaApi* | [**getMetricGroups**](docs/Api/MetricsBetaApi.md#getmetricgroups) | **GET** /api/v2/projects/{projectKey}/metric-groups | List metric groups
*MetricsBetaApi* | [**patchMetricGroup**](docs/Api/MetricsBetaApi.md#patchmetricgroup) | **PATCH** /api/v2/projects/{projectKey}/metric-groups/{metricGroupKey} | Patch metric group
*OAuth2ClientsApi* | [**createOAuth2Client**](docs/Api/OAuth2ClientsApi.md#createoauth2client) | **POST** /api/v2/oauth/clients | Create a LaunchDarkly OAuth 2.0 client
*OAuth2ClientsApi* | [**deleteOAuthClient**](docs/Api/OAuth2ClientsApi.md#deleteoauthclient) | **DELETE** /api/v2/oauth/clients/{clientId} | Delete OAuth 2.0 client
*OAuth2ClientsApi* | [**getOAuthClientById**](docs/Api/OAuth2ClientsApi.md#getoauthclientbyid) | **GET** /api/v2/oauth/clients/{clientId} | Get client by ID
*OAuth2ClientsApi* | [**getOAuthClients**](docs/Api/OAuth2ClientsApi.md#getoauthclients) | **GET** /api/v2/oauth/clients | Get clients
*OAuth2ClientsApi* | [**patchOAuthClient**](docs/Api/OAuth2ClientsApi.md#patchoauthclient) | **PATCH** /api/v2/oauth/clients/{clientId} | Patch client by ID
*OtherApi* | [**getCallerIdentity**](docs/Api/OtherApi.md#getcalleridentity) | **GET** /api/v2/caller-identity | Identify the caller
*OtherApi* | [**getIps**](docs/Api/OtherApi.md#getips) | **GET** /api/v2/public-ip-list | Gets the public IP list
*OtherApi* | [**getOpenapiSpec**](docs/Api/OtherApi.md#getopenapispec) | **GET** /api/v2/openapi.json | Gets the OpenAPI spec in json
*OtherApi* | [**getRoot**](docs/Api/OtherApi.md#getroot) | **GET** /api/v2 | Root resource
*OtherApi* | [**getVersions**](docs/Api/OtherApi.md#getversions) | **GET** /api/v2/versions | Get version information
*PersistentStoreIntegrationsBetaApi* | [**createBigSegmentStoreIntegration**](docs/Api/PersistentStoreIntegrationsBetaApi.md#createbigsegmentstoreintegration) | **POST** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey} | Create big segment store integration
*PersistentStoreIntegrationsBetaApi* | [**deleteBigSegmentStoreIntegration**](docs/Api/PersistentStoreIntegrationsBetaApi.md#deletebigsegmentstoreintegration) | **DELETE** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey}/{integrationId} | Delete big segment store integration
*PersistentStoreIntegrationsBetaApi* | [**getBigSegmentStoreIntegration**](docs/Api/PersistentStoreIntegrationsBetaApi.md#getbigsegmentstoreintegration) | **GET** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey}/{integrationId} | Get big segment store integration by ID
*PersistentStoreIntegrationsBetaApi* | [**getBigSegmentStoreIntegrations**](docs/Api/PersistentStoreIntegrationsBetaApi.md#getbigsegmentstoreintegrations) | **GET** /api/v2/integration-capabilities/big-segment-store | List all big segment store integrations
*PersistentStoreIntegrationsBetaApi* | [**patchBigSegmentStoreIntegration**](docs/Api/PersistentStoreIntegrationsBetaApi.md#patchbigsegmentstoreintegration) | **PATCH** /api/v2/integration-capabilities/big-segment-store/{projectKey}/{environmentKey}/{integrationKey}/{integrationId} | Update big segment store integration
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
*ReleasePipelinesBetaApi* | [**deleteReleasePipeline**](docs/Api/ReleasePipelinesBetaApi.md#deletereleasepipeline) | **DELETE** /api/v2/projects/{projectKey}/release-pipelines/{pipelineKey} | Delete release pipeline
*ReleasePipelinesBetaApi* | [**getAllReleasePipelines**](docs/Api/ReleasePipelinesBetaApi.md#getallreleasepipelines) | **GET** /api/v2/projects/{projectKey}/release-pipelines | Get all release pipelines
*ReleasePipelinesBetaApi* | [**getAllReleaseProgressionsForReleasePipeline**](docs/Api/ReleasePipelinesBetaApi.md#getallreleaseprogressionsforreleasepipeline) | **GET** /api/v2/projects/{projectKey}/release-pipelines/{pipelineKey}/releases | Get release progressions for release pipeline
*ReleasePipelinesBetaApi* | [**getReleasePipelineByKey**](docs/Api/ReleasePipelinesBetaApi.md#getreleasepipelinebykey) | **GET** /api/v2/projects/{projectKey}/release-pipelines/{pipelineKey} | Get release pipeline by key
*ReleasePipelinesBetaApi* | [**postReleasePipeline**](docs/Api/ReleasePipelinesBetaApi.md#postreleasepipeline) | **POST** /api/v2/projects/{projectKey}/release-pipelines | Create a release pipeline
*ReleasePipelinesBetaApi* | [**putReleasePipeline**](docs/Api/ReleasePipelinesBetaApi.md#putreleasepipeline) | **PUT** /api/v2/projects/{projectKey}/release-pipelines/{pipelineKey} | Update a release pipeline
*ReleasesBetaApi* | [**createReleaseForFlag**](docs/Api/ReleasesBetaApi.md#createreleaseforflag) | **PUT** /api/v2/projects/{projectKey}/flags/{flagKey}/release | Create a new release for flag
*ReleasesBetaApi* | [**deleteReleaseByFlagKey**](docs/Api/ReleasesBetaApi.md#deletereleasebyflagkey) | **DELETE** /api/v2/flags/{projectKey}/{flagKey}/release | Delete a release for flag
*ReleasesBetaApi* | [**getReleaseByFlagKey**](docs/Api/ReleasesBetaApi.md#getreleasebyflagkey) | **GET** /api/v2/flags/{projectKey}/{flagKey}/release | Get release for flag
*ReleasesBetaApi* | [**patchReleaseByFlagKey**](docs/Api/ReleasesBetaApi.md#patchreleasebyflagkey) | **PATCH** /api/v2/flags/{projectKey}/{flagKey}/release | Patch release for flag
*ReleasesBetaApi* | [**updatePhaseStatus**](docs/Api/ReleasesBetaApi.md#updatephasestatus) | **PUT** /api/v2/projects/{projectKey}/flags/{flagKey}/release/phases/{phaseId} | Update phase status for release
*ScheduledChangesApi* | [**deleteFlagConfigScheduledChanges**](docs/Api/ScheduledChangesApi.md#deleteflagconfigscheduledchanges) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Delete scheduled changes workflow
*ScheduledChangesApi* | [**getFeatureFlagScheduledChange**](docs/Api/ScheduledChangesApi.md#getfeatureflagscheduledchange) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Get a scheduled change
*ScheduledChangesApi* | [**getFlagConfigScheduledChanges**](docs/Api/ScheduledChangesApi.md#getflagconfigscheduledchanges) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | List scheduled changes
*ScheduledChangesApi* | [**patchFlagConfigScheduledChange**](docs/Api/ScheduledChangesApi.md#patchflagconfigscheduledchange) | **PATCH** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes/{id} | Update scheduled changes workflow
*ScheduledChangesApi* | [**postFlagConfigScheduledChanges**](docs/Api/ScheduledChangesApi.md#postflagconfigscheduledchanges) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/scheduled-changes | Create scheduled changes workflow
*SegmentsApi* | [**createBigSegmentExport**](docs/Api/SegmentsApi.md#createbigsegmentexport) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/exports | Create big segment export
*SegmentsApi* | [**createBigSegmentImport**](docs/Api/SegmentsApi.md#createbigsegmentimport) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/imports | Create big segment import
*SegmentsApi* | [**deleteSegment**](docs/Api/SegmentsApi.md#deletesegment) | **DELETE** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Delete segment
*SegmentsApi* | [**getBigSegmentExport**](docs/Api/SegmentsApi.md#getbigsegmentexport) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/exports/{exportID} | Get big segment export
*SegmentsApi* | [**getBigSegmentImport**](docs/Api/SegmentsApi.md#getbigsegmentimport) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/imports/{importID} | Get big segment import
*SegmentsApi* | [**getContextInstanceSegmentsMembershipByEnv**](docs/Api/SegmentsApi.md#getcontextinstancesegmentsmembershipbyenv) | **POST** /api/v2/projects/{projectKey}/environments/{environmentKey}/segments/evaluate | List segment memberships for context instance
*SegmentsApi* | [**getExpiringTargetsForSegment**](docs/Api/SegmentsApi.md#getexpiringtargetsforsegment) | **GET** /api/v2/segments/{projectKey}/{segmentKey}/expiring-targets/{environmentKey} | Get expiring targets for segment
*SegmentsApi* | [**getExpiringUserTargetsForSegment**](docs/Api/SegmentsApi.md#getexpiringusertargetsforsegment) | **GET** /api/v2/segments/{projectKey}/{segmentKey}/expiring-user-targets/{environmentKey} | Get expiring user targets for segment
*SegmentsApi* | [**getSegment**](docs/Api/SegmentsApi.md#getsegment) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Get segment
*SegmentsApi* | [**getSegmentMembershipForContext**](docs/Api/SegmentsApi.md#getsegmentmembershipforcontext) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/contexts/{contextKey} | Get big segment membership for context
*SegmentsApi* | [**getSegmentMembershipForUser**](docs/Api/SegmentsApi.md#getsegmentmembershipforuser) | **GET** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/users/{userKey} | Get big segment membership for user
*SegmentsApi* | [**getSegments**](docs/Api/SegmentsApi.md#getsegments) | **GET** /api/v2/segments/{projectKey}/{environmentKey} | List segments
*SegmentsApi* | [**patchExpiringTargetsForSegment**](docs/Api/SegmentsApi.md#patchexpiringtargetsforsegment) | **PATCH** /api/v2/segments/{projectKey}/{segmentKey}/expiring-targets/{environmentKey} | Update expiring targets for segment
*SegmentsApi* | [**patchExpiringUserTargetsForSegment**](docs/Api/SegmentsApi.md#patchexpiringusertargetsforsegment) | **PATCH** /api/v2/segments/{projectKey}/{segmentKey}/expiring-user-targets/{environmentKey} | Update expiring user targets for segment
*SegmentsApi* | [**patchSegment**](docs/Api/SegmentsApi.md#patchsegment) | **PATCH** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey} | Patch segment
*SegmentsApi* | [**postSegment**](docs/Api/SegmentsApi.md#postsegment) | **POST** /api/v2/segments/{projectKey}/{environmentKey} | Create segment
*SegmentsApi* | [**updateBigSegmentContextTargets**](docs/Api/SegmentsApi.md#updatebigsegmentcontexttargets) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/contexts | Update context targets on a big segment
*SegmentsApi* | [**updateBigSegmentTargets**](docs/Api/SegmentsApi.md#updatebigsegmenttargets) | **POST** /api/v2/segments/{projectKey}/{environmentKey}/{segmentKey}/users | Update user context targets on a big segment
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
*WorkflowTemplatesApi* | [**createWorkflowTemplate**](docs/Api/WorkflowTemplatesApi.md#createworkflowtemplate) | **POST** /api/v2/templates | Create workflow template
*WorkflowTemplatesApi* | [**deleteWorkflowTemplate**](docs/Api/WorkflowTemplatesApi.md#deleteworkflowtemplate) | **DELETE** /api/v2/templates/{templateKey} | Delete workflow template
*WorkflowTemplatesApi* | [**getWorkflowTemplates**](docs/Api/WorkflowTemplatesApi.md#getworkflowtemplates) | **GET** /api/v2/templates | Get workflow templates
*WorkflowsApi* | [**deleteWorkflow**](docs/Api/WorkflowsApi.md#deleteworkflow) | **DELETE** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Delete workflow
*WorkflowsApi* | [**getCustomWorkflow**](docs/Api/WorkflowsApi.md#getcustomworkflow) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows/{workflowId} | Get custom workflow
*WorkflowsApi* | [**getWorkflows**](docs/Api/WorkflowsApi.md#getworkflows) | **GET** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Get workflows
*WorkflowsApi* | [**postWorkflow**](docs/Api/WorkflowsApi.md#postworkflow) | **POST** /api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/workflows | Create workflow

## Models

- [AIConfig](docs/Model/AIConfig.md)
- [AIConfigMaintainer](docs/Model/AIConfigMaintainer.md)
- [AIConfigPatch](docs/Model/AIConfigPatch.md)
- [AIConfigPost](docs/Model/AIConfigPost.md)
- [AIConfigVariation](docs/Model/AIConfigVariation.md)
- [AIConfigVariationPatch](docs/Model/AIConfigVariationPatch.md)
- [AIConfigVariationPost](docs/Model/AIConfigVariationPost.md)
- [AIConfigVariationsResponse](docs/Model/AIConfigVariationsResponse.md)
- [AIConfigs](docs/Model/AIConfigs.md)
- [Access](docs/Model/Access.md)
- [AccessAllowedReason](docs/Model/AccessAllowedReason.md)
- [AccessAllowedRep](docs/Model/AccessAllowedRep.md)
- [AccessDenied](docs/Model/AccessDenied.md)
- [AccessDeniedReason](docs/Model/AccessDeniedReason.md)
- [AccessTokenPost](docs/Model/AccessTokenPost.md)
- [ActionInput](docs/Model/ActionInput.md)
- [ActionOutput](docs/Model/ActionOutput.md)
- [AiConfigsAccess](docs/Model/AiConfigsAccess.md)
- [AiConfigsAccessAllowedReason](docs/Model/AiConfigsAccessAllowedReason.md)
- [AiConfigsAccessAllowedRep](docs/Model/AiConfigsAccessAllowedRep.md)
- [AiConfigsAccessDenied](docs/Model/AiConfigsAccessDenied.md)
- [AiConfigsAccessDeniedReason](docs/Model/AiConfigsAccessDeniedReason.md)
- [AiConfigsLink](docs/Model/AiConfigsLink.md)
- [AiConfigsMaintainerTeam](docs/Model/AiConfigsMaintainerTeam.md)
- [AnnouncementAccess](docs/Model/AnnouncementAccess.md)
- [AnnouncementAccessAllowedReason](docs/Model/AnnouncementAccessAllowedReason.md)
- [AnnouncementAccessAllowedRep](docs/Model/AnnouncementAccessAllowedRep.md)
- [AnnouncementAccessDenied](docs/Model/AnnouncementAccessDenied.md)
- [AnnouncementAccessDeniedReason](docs/Model/AnnouncementAccessDeniedReason.md)
- [AnnouncementAccessRep](docs/Model/AnnouncementAccessRep.md)
- [AnnouncementLink](docs/Model/AnnouncementLink.md)
- [AnnouncementPaginatedLinks](docs/Model/AnnouncementPaginatedLinks.md)
- [AnnouncementPatchOperation](docs/Model/AnnouncementPatchOperation.md)
- [AnnouncementResponse](docs/Model/AnnouncementResponse.md)
- [AnnouncementResponseLinks](docs/Model/AnnouncementResponseLinks.md)
- [ApplicationCollectionRep](docs/Model/ApplicationCollectionRep.md)
- [ApplicationFlagCollectionRep](docs/Model/ApplicationFlagCollectionRep.md)
- [ApplicationRep](docs/Model/ApplicationRep.md)
- [ApplicationVersionRep](docs/Model/ApplicationVersionRep.md)
- [ApplicationVersionsCollectionRep](docs/Model/ApplicationVersionsCollectionRep.md)
- [ApprovalRequestResponse](docs/Model/ApprovalRequestResponse.md)
- [ApprovalSettings](docs/Model/ApprovalSettings.md)
- [ApprovalsCapabilityConfig](docs/Model/ApprovalsCapabilityConfig.md)
- [AssignedToRep](docs/Model/AssignedToRep.md)
- [Audience](docs/Model/Audience.md)
- [AudienceConfiguration](docs/Model/AudienceConfiguration.md)
- [AudiencePost](docs/Model/AudiencePost.md)
- [AuditLogEntryListingRep](docs/Model/AuditLogEntryListingRep.md)
- [AuditLogEntryListingRepCollection](docs/Model/AuditLogEntryListingRepCollection.md)
- [AuditLogEntryRep](docs/Model/AuditLogEntryRep.md)
- [AuditLogEventsHookCapabilityConfigPost](docs/Model/AuditLogEventsHookCapabilityConfigPost.md)
- [AuditLogEventsHookCapabilityConfigRep](docs/Model/AuditLogEventsHookCapabilityConfigRep.md)
- [AuthorizedAppDataRep](docs/Model/AuthorizedAppDataRep.md)
- [BayesianBetaBinomialStatsRep](docs/Model/BayesianBetaBinomialStatsRep.md)
- [BayesianNormalStatsRep](docs/Model/BayesianNormalStatsRep.md)
- [BigSegmentStoreIntegration](docs/Model/BigSegmentStoreIntegration.md)
- [BigSegmentStoreIntegrationCollection](docs/Model/BigSegmentStoreIntegrationCollection.md)
- [BigSegmentStoreIntegrationCollectionLinks](docs/Model/BigSegmentStoreIntegrationCollectionLinks.md)
- [BigSegmentStoreIntegrationLinks](docs/Model/BigSegmentStoreIntegrationLinks.md)
- [BigSegmentStoreStatus](docs/Model/BigSegmentStoreStatus.md)
- [BigSegmentTarget](docs/Model/BigSegmentTarget.md)
- [BooleanDefaults](docs/Model/BooleanDefaults.md)
- [BooleanFlagDefaults](docs/Model/BooleanFlagDefaults.md)
- [BranchCollectionRep](docs/Model/BranchCollectionRep.md)
- [BranchRep](docs/Model/BranchRep.md)
- [BulkEditMembersRep](docs/Model/BulkEditMembersRep.md)
- [BulkEditTeamsRep](docs/Model/BulkEditTeamsRep.md)
- [CallerIdentityRep](docs/Model/CallerIdentityRep.md)
- [CapabilityConfigPost](docs/Model/CapabilityConfigPost.md)
- [CapabilityConfigRep](docs/Model/CapabilityConfigRep.md)
- [Clause](docs/Model/Clause.md)
- [Client](docs/Model/Client.md)
- [ClientCollection](docs/Model/ClientCollection.md)
- [ClientSideAvailability](docs/Model/ClientSideAvailability.md)
- [ClientSideAvailabilityPost](docs/Model/ClientSideAvailabilityPost.md)
- [CompletedBy](docs/Model/CompletedBy.md)
- [ConditionInput](docs/Model/ConditionInput.md)
- [ConditionOutput](docs/Model/ConditionOutput.md)
- [Conflict](docs/Model/Conflict.md)
- [ConflictOutput](docs/Model/ConflictOutput.md)
- [ContextAttributeName](docs/Model/ContextAttributeName.md)
- [ContextAttributeNames](docs/Model/ContextAttributeNames.md)
- [ContextAttributeNamesCollection](docs/Model/ContextAttributeNamesCollection.md)
- [ContextAttributeValue](docs/Model/ContextAttributeValue.md)
- [ContextAttributeValues](docs/Model/ContextAttributeValues.md)
- [ContextAttributeValuesCollection](docs/Model/ContextAttributeValuesCollection.md)
- [ContextInstanceEvaluation](docs/Model/ContextInstanceEvaluation.md)
- [ContextInstanceEvaluationReason](docs/Model/ContextInstanceEvaluationReason.md)
- [ContextInstanceEvaluations](docs/Model/ContextInstanceEvaluations.md)
- [ContextInstanceRecord](docs/Model/ContextInstanceRecord.md)
- [ContextInstanceSearch](docs/Model/ContextInstanceSearch.md)
- [ContextInstanceSegmentMembership](docs/Model/ContextInstanceSegmentMembership.md)
- [ContextInstanceSegmentMemberships](docs/Model/ContextInstanceSegmentMemberships.md)
- [ContextInstances](docs/Model/ContextInstances.md)
- [ContextKindRep](docs/Model/ContextKindRep.md)
- [ContextKindsCollectionRep](docs/Model/ContextKindsCollectionRep.md)
- [ContextRecord](docs/Model/ContextRecord.md)
- [ContextSearch](docs/Model/ContextSearch.md)
- [Contexts](docs/Model/Contexts.md)
- [CopiedFromEnv](docs/Model/CopiedFromEnv.md)
- [CoreLink](docs/Model/CoreLink.md)
- [CreateAnnouncementBody](docs/Model/CreateAnnouncementBody.md)
- [CreateApprovalRequestRequest](docs/Model/CreateApprovalRequestRequest.md)
- [CreateCopyFlagConfigApprovalRequestRequest](docs/Model/CreateCopyFlagConfigApprovalRequestRequest.md)
- [CreateFlagConfigApprovalRequestRequest](docs/Model/CreateFlagConfigApprovalRequestRequest.md)
- [CreatePhaseInput](docs/Model/CreatePhaseInput.md)
- [CreateReleaseInput](docs/Model/CreateReleaseInput.md)
- [CreateReleasePipelineInput](docs/Model/CreateReleasePipelineInput.md)
- [CreateWorkflowTemplateInput](docs/Model/CreateWorkflowTemplateInput.md)
- [CredibleIntervalRep](docs/Model/CredibleIntervalRep.md)
- [CustomProperty](docs/Model/CustomProperty.md)
- [CustomRole](docs/Model/CustomRole.md)
- [CustomRolePost](docs/Model/CustomRolePost.md)
- [CustomRoles](docs/Model/CustomRoles.md)
- [CustomWorkflowInput](docs/Model/CustomWorkflowInput.md)
- [CustomWorkflowMeta](docs/Model/CustomWorkflowMeta.md)
- [CustomWorkflowOutput](docs/Model/CustomWorkflowOutput.md)
- [CustomWorkflowStageMeta](docs/Model/CustomWorkflowStageMeta.md)
- [CustomWorkflowsListingOutput](docs/Model/CustomWorkflowsListingOutput.md)
- [DefaultClientSideAvailability](docs/Model/DefaultClientSideAvailability.md)
- [DefaultClientSideAvailabilityPost](docs/Model/DefaultClientSideAvailabilityPost.md)
- [Defaults](docs/Model/Defaults.md)
- [DependentExperimentRep](docs/Model/DependentExperimentRep.md)
- [DependentFlag](docs/Model/DependentFlag.md)
- [DependentFlagEnvironment](docs/Model/DependentFlagEnvironment.md)
- [DependentFlagsByEnvironment](docs/Model/DependentFlagsByEnvironment.md)
- [DependentMetricGroupRep](docs/Model/DependentMetricGroupRep.md)
- [DependentMetricGroupRepWithMetrics](docs/Model/DependentMetricGroupRepWithMetrics.md)
- [DependentMetricOrMetricGroupRep](docs/Model/DependentMetricOrMetricGroupRep.md)
- [DeploymentCollectionRep](docs/Model/DeploymentCollectionRep.md)
- [DeploymentRep](docs/Model/DeploymentRep.md)
- [Destination](docs/Model/Destination.md)
- [DestinationPost](docs/Model/DestinationPost.md)
- [Destinations](docs/Model/Destinations.md)
- [Distribution](docs/Model/Distribution.md)
- [DynamicOptions](docs/Model/DynamicOptions.md)
- [DynamicOptionsParser](docs/Model/DynamicOptionsParser.md)
- [Endpoint](docs/Model/Endpoint.md)
- [Environment](docs/Model/Environment.md)
- [EnvironmentPost](docs/Model/EnvironmentPost.md)
- [EnvironmentSummary](docs/Model/EnvironmentSummary.md)
- [Environments](docs/Model/Environments.md)
- [Error](docs/Model/Error.md)
- [EvaluationReason](docs/Model/EvaluationReason.md)
- [EvaluationsSummary](docs/Model/EvaluationsSummary.md)
- [ExecutionOutput](docs/Model/ExecutionOutput.md)
- [ExpandableApprovalRequestResponse](docs/Model/ExpandableApprovalRequestResponse.md)
- [ExpandableApprovalRequestsResponse](docs/Model/ExpandableApprovalRequestsResponse.md)
- [ExpandedFlagRep](docs/Model/ExpandedFlagRep.md)
- [ExpandedResourceRep](docs/Model/ExpandedResourceRep.md)
- [Experiment](docs/Model/Experiment.md)
- [ExperimentAllocationRep](docs/Model/ExperimentAllocationRep.md)
- [ExperimentBayesianResultsRep](docs/Model/ExperimentBayesianResultsRep.md)
- [ExperimentCollectionRep](docs/Model/ExperimentCollectionRep.md)
- [ExperimentEnabledPeriodRep](docs/Model/ExperimentEnabledPeriodRep.md)
- [ExperimentEnvironmentSettingRep](docs/Model/ExperimentEnvironmentSettingRep.md)
- [ExperimentInfoRep](docs/Model/ExperimentInfoRep.md)
- [ExperimentPatchInput](docs/Model/ExperimentPatchInput.md)
- [ExperimentPost](docs/Model/ExperimentPost.md)
- [ExpiringTarget](docs/Model/ExpiringTarget.md)
- [ExpiringTargetError](docs/Model/ExpiringTargetError.md)
- [ExpiringTargetGetResponse](docs/Model/ExpiringTargetGetResponse.md)
- [ExpiringTargetPatchResponse](docs/Model/ExpiringTargetPatchResponse.md)
- [ExpiringUserTargetGetResponse](docs/Model/ExpiringUserTargetGetResponse.md)
- [ExpiringUserTargetItem](docs/Model/ExpiringUserTargetItem.md)
- [ExpiringUserTargetPatchResponse](docs/Model/ExpiringUserTargetPatchResponse.md)
- [Export](docs/Model/Export.md)
- [Extinction](docs/Model/Extinction.md)
- [ExtinctionCollectionRep](docs/Model/ExtinctionCollectionRep.md)
- [FailureReasonRep](docs/Model/FailureReasonRep.md)
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
- [FlagConfigEvaluation](docs/Model/FlagConfigEvaluation.md)
- [FlagConfigMigrationSettingsRep](docs/Model/FlagConfigMigrationSettingsRep.md)
- [FlagCopyConfigEnvironment](docs/Model/FlagCopyConfigEnvironment.md)
- [FlagCopyConfigPost](docs/Model/FlagCopyConfigPost.md)
- [FlagDefaultsRep](docs/Model/FlagDefaultsRep.md)
- [FlagEventCollectionRep](docs/Model/FlagEventCollectionRep.md)
- [FlagEventExperiment](docs/Model/FlagEventExperiment.md)
- [FlagEventExperimentCollection](docs/Model/FlagEventExperimentCollection.md)
- [FlagEventExperimentIteration](docs/Model/FlagEventExperimentIteration.md)
- [FlagEventImpactRep](docs/Model/FlagEventImpactRep.md)
- [FlagEventMemberRep](docs/Model/FlagEventMemberRep.md)
- [FlagEventRep](docs/Model/FlagEventRep.md)
- [FlagFollowersByProjEnvGetRep](docs/Model/FlagFollowersByProjEnvGetRep.md)
- [FlagFollowersGetRep](docs/Model/FlagFollowersGetRep.md)
- [FlagImportConfigurationPost](docs/Model/FlagImportConfigurationPost.md)
- [FlagImportIntegration](docs/Model/FlagImportIntegration.md)
- [FlagImportIntegrationCollection](docs/Model/FlagImportIntegrationCollection.md)
- [FlagImportIntegrationCollectionLinks](docs/Model/FlagImportIntegrationCollectionLinks.md)
- [FlagImportIntegrationLinks](docs/Model/FlagImportIntegrationLinks.md)
- [FlagImportStatus](docs/Model/FlagImportStatus.md)
- [FlagInput](docs/Model/FlagInput.md)
- [FlagLinkCollectionRep](docs/Model/FlagLinkCollectionRep.md)
- [FlagLinkMember](docs/Model/FlagLinkMember.md)
- [FlagLinkPost](docs/Model/FlagLinkPost.md)
- [FlagLinkRep](docs/Model/FlagLinkRep.md)
- [FlagListingRep](docs/Model/FlagListingRep.md)
- [FlagMigrationSettingsRep](docs/Model/FlagMigrationSettingsRep.md)
- [FlagPrerequisitePost](docs/Model/FlagPrerequisitePost.md)
- [FlagReferenceCollectionRep](docs/Model/FlagReferenceCollectionRep.md)
- [FlagReferenceRep](docs/Model/FlagReferenceRep.md)
- [FlagRep](docs/Model/FlagRep.md)
- [FlagScheduledChangesInput](docs/Model/FlagScheduledChangesInput.md)
- [FlagSempatch](docs/Model/FlagSempatch.md)
- [FlagStatusRep](docs/Model/FlagStatusRep.md)
- [FlagSummary](docs/Model/FlagSummary.md)
- [FlagTriggerInput](docs/Model/FlagTriggerInput.md)
- [FollowFlagMember](docs/Model/FollowFlagMember.md)
- [FollowersPerFlag](docs/Model/FollowersPerFlag.md)
- [ForbiddenErrorRep](docs/Model/ForbiddenErrorRep.md)
- [FormVariable](docs/Model/FormVariable.md)
- [GenerateWarehouseDestinationKeyPairPostRep](docs/Model/GenerateWarehouseDestinationKeyPairPostRep.md)
- [GetAnnouncementsPublic200Response](docs/Model/GetAnnouncementsPublic200Response.md)
- [HMACSignature](docs/Model/HMACSignature.md)
- [HeaderItems](docs/Model/HeaderItems.md)
- [HoldoutDetailRep](docs/Model/HoldoutDetailRep.md)
- [HoldoutPatchInput](docs/Model/HoldoutPatchInput.md)
- [HoldoutPostRequest](docs/Model/HoldoutPostRequest.md)
- [HoldoutRep](docs/Model/HoldoutRep.md)
- [HoldoutsCollectionRep](docs/Model/HoldoutsCollectionRep.md)
- [HunkRep](docs/Model/HunkRep.md)
- [Import](docs/Model/Import.md)
- [InitiatorRep](docs/Model/InitiatorRep.md)
- [InsightGroup](docs/Model/InsightGroup.md)
- [InsightGroupCollection](docs/Model/InsightGroupCollection.md)
- [InsightGroupCollectionMetadata](docs/Model/InsightGroupCollectionMetadata.md)
- [InsightGroupCollectionScoreMetadata](docs/Model/InsightGroupCollectionScoreMetadata.md)
- [InsightGroupScores](docs/Model/InsightGroupScores.md)
- [InsightGroupsCountByIndicator](docs/Model/InsightGroupsCountByIndicator.md)
- [InsightPeriod](docs/Model/InsightPeriod.md)
- [InsightScores](docs/Model/InsightScores.md)
- [InsightsChart](docs/Model/InsightsChart.md)
- [InsightsChartBounds](docs/Model/InsightsChartBounds.md)
- [InsightsChartMetadata](docs/Model/InsightsChartMetadata.md)
- [InsightsChartMetric](docs/Model/InsightsChartMetric.md)
- [InsightsChartSeries](docs/Model/InsightsChartSeries.md)
- [InsightsChartSeriesDataPoint](docs/Model/InsightsChartSeriesDataPoint.md)
- [InsightsChartSeriesMetadata](docs/Model/InsightsChartSeriesMetadata.md)
- [InsightsChartSeriesMetadataAxis](docs/Model/InsightsChartSeriesMetadataAxis.md)
- [InsightsMetricIndicatorRange](docs/Model/InsightsMetricIndicatorRange.md)
- [InsightsMetricScore](docs/Model/InsightsMetricScore.md)
- [InsightsMetricTierDefinition](docs/Model/InsightsMetricTierDefinition.md)
- [InsightsRepository](docs/Model/InsightsRepository.md)
- [InsightsRepositoryCollection](docs/Model/InsightsRepositoryCollection.md)
- [InsightsRepositoryProject](docs/Model/InsightsRepositoryProject.md)
- [InsightsRepositoryProjectCollection](docs/Model/InsightsRepositoryProjectCollection.md)
- [InsightsRepositoryProjectMappings](docs/Model/InsightsRepositoryProjectMappings.md)
- [InstructionUserRequest](docs/Model/InstructionUserRequest.md)
- [Integration](docs/Model/Integration.md)
- [IntegrationConfigurationCollectionRep](docs/Model/IntegrationConfigurationCollectionRep.md)
- [IntegrationConfigurationPost](docs/Model/IntegrationConfigurationPost.md)
- [IntegrationConfigurationsRep](docs/Model/IntegrationConfigurationsRep.md)
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
- [IterationInput](docs/Model/IterationInput.md)
- [IterationRep](docs/Model/IterationRep.md)
- [LastSeenMetadata](docs/Model/LastSeenMetadata.md)
- [LayerCollectionRep](docs/Model/LayerCollectionRep.md)
- [LayerConfigurationRep](docs/Model/LayerConfigurationRep.md)
- [LayerPatchInput](docs/Model/LayerPatchInput.md)
- [LayerPost](docs/Model/LayerPost.md)
- [LayerRep](docs/Model/LayerRep.md)
- [LayerReservationRep](docs/Model/LayerReservationRep.md)
- [LayerSnapshotRep](docs/Model/LayerSnapshotRep.md)
- [LeadTimeStagesRep](docs/Model/LeadTimeStagesRep.md)
- [LegacyExperimentRep](docs/Model/LegacyExperimentRep.md)
- [Link](docs/Model/Link.md)
- [MaintainerMember](docs/Model/MaintainerMember.md)
- [MaintainerRep](docs/Model/MaintainerRep.md)
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
- [Message](docs/Model/Message.md)
- [MethodNotAllowedErrorRep](docs/Model/MethodNotAllowedErrorRep.md)
- [MetricByVariation](docs/Model/MetricByVariation.md)
- [MetricCollectionRep](docs/Model/MetricCollectionRep.md)
- [MetricEventDefaultRep](docs/Model/MetricEventDefaultRep.md)
- [MetricGroupCollectionRep](docs/Model/MetricGroupCollectionRep.md)
- [MetricGroupPost](docs/Model/MetricGroupPost.md)
- [MetricGroupRep](docs/Model/MetricGroupRep.md)
- [MetricGroupResultsRep](docs/Model/MetricGroupResultsRep.md)
- [MetricInGroupRep](docs/Model/MetricInGroupRep.md)
- [MetricInGroupResultsRep](docs/Model/MetricInGroupResultsRep.md)
- [MetricInMetricGroupInput](docs/Model/MetricInMetricGroupInput.md)
- [MetricInput](docs/Model/MetricInput.md)
- [MetricListingRep](docs/Model/MetricListingRep.md)
- [MetricPost](docs/Model/MetricPost.md)
- [MetricRep](docs/Model/MetricRep.md)
- [MetricSeen](docs/Model/MetricSeen.md)
- [MetricV2Rep](docs/Model/MetricV2Rep.md)
- [Metrics](docs/Model/Metrics.md)
- [MigrationSafetyIssueRep](docs/Model/MigrationSafetyIssueRep.md)
- [MigrationSettingsPost](docs/Model/MigrationSettingsPost.md)
- [ModelConfig](docs/Model/ModelConfig.md)
- [ModelConfigPost](docs/Model/ModelConfigPost.md)
- [Modification](docs/Model/Modification.md)
- [MultiEnvironmentDependentFlag](docs/Model/MultiEnvironmentDependentFlag.md)
- [MultiEnvironmentDependentFlags](docs/Model/MultiEnvironmentDependentFlags.md)
- [NamingConvention](docs/Model/NamingConvention.md)
- [NewMemberForm](docs/Model/NewMemberForm.md)
- [NotFoundErrorRep](docs/Model/NotFoundErrorRep.md)
- [OauthClientPost](docs/Model/OauthClientPost.md)
- [OptionsArray](docs/Model/OptionsArray.md)
- [PaginatedLinks](docs/Model/PaginatedLinks.md)
- [ParameterDefault](docs/Model/ParameterDefault.md)
- [ParameterRep](docs/Model/ParameterRep.md)
- [ParentAndSelfLinks](docs/Model/ParentAndSelfLinks.md)
- [ParentLink](docs/Model/ParentLink.md)
- [ParentResourceRep](docs/Model/ParentResourceRep.md)
- [PatchFailedErrorRep](docs/Model/PatchFailedErrorRep.md)
- [PatchFlagsRequest](docs/Model/PatchFlagsRequest.md)
- [PatchOperation](docs/Model/PatchOperation.md)
- [PatchSegmentExpiringTargetInputRep](docs/Model/PatchSegmentExpiringTargetInputRep.md)
- [PatchSegmentExpiringTargetInstruction](docs/Model/PatchSegmentExpiringTargetInstruction.md)
- [PatchSegmentInstruction](docs/Model/PatchSegmentInstruction.md)
- [PatchSegmentRequest](docs/Model/PatchSegmentRequest.md)
- [PatchUsersRequest](docs/Model/PatchUsersRequest.md)
- [PatchWithComment](docs/Model/PatchWithComment.md)
- [PermissionGrantInput](docs/Model/PermissionGrantInput.md)
- [Phase](docs/Model/Phase.md)
- [PhaseInfo](docs/Model/PhaseInfo.md)
- [PostApprovalRequestApplyRequest](docs/Model/PostApprovalRequestApplyRequest.md)
- [PostApprovalRequestReviewRequest](docs/Model/PostApprovalRequestReviewRequest.md)
- [PostDeploymentEventInput](docs/Model/PostDeploymentEventInput.md)
- [PostFlagScheduledChangesInput](docs/Model/PostFlagScheduledChangesInput.md)
- [PostInsightGroupParams](docs/Model/PostInsightGroupParams.md)
- [Prerequisite](docs/Model/Prerequisite.md)
- [Project](docs/Model/Project.md)
- [ProjectPost](docs/Model/ProjectPost.md)
- [ProjectRep](docs/Model/ProjectRep.md)
- [ProjectSummary](docs/Model/ProjectSummary.md)
- [ProjectSummaryCollection](docs/Model/ProjectSummaryCollection.md)
- [Projects](docs/Model/Projects.md)
- [PullRequestCollectionRep](docs/Model/PullRequestCollectionRep.md)
- [PullRequestLeadTimeRep](docs/Model/PullRequestLeadTimeRep.md)
- [PullRequestRep](docs/Model/PullRequestRep.md)
- [PutBranch](docs/Model/PutBranch.md)
- [RandomizationSettingsPut](docs/Model/RandomizationSettingsPut.md)
- [RandomizationSettingsRep](docs/Model/RandomizationSettingsRep.md)
- [RandomizationUnitInput](docs/Model/RandomizationUnitInput.md)
- [RandomizationUnitRep](docs/Model/RandomizationUnitRep.md)
- [RateLimitedErrorRep](docs/Model/RateLimitedErrorRep.md)
- [RecentTriggerBody](docs/Model/RecentTriggerBody.md)
- [ReferenceRep](docs/Model/ReferenceRep.md)
- [RelatedExperimentRep](docs/Model/RelatedExperimentRep.md)
- [RelativeDifferenceRep](docs/Model/RelativeDifferenceRep.md)
- [RelayAutoConfigCollectionRep](docs/Model/RelayAutoConfigCollectionRep.md)
- [RelayAutoConfigPost](docs/Model/RelayAutoConfigPost.md)
- [RelayAutoConfigRep](docs/Model/RelayAutoConfigRep.md)
- [Release](docs/Model/Release.md)
- [ReleaseAudience](docs/Model/ReleaseAudience.md)
- [ReleaseGuardianConfiguration](docs/Model/ReleaseGuardianConfiguration.md)
- [ReleaseGuardianConfigurationInput](docs/Model/ReleaseGuardianConfigurationInput.md)
- [ReleasePhase](docs/Model/ReleasePhase.md)
- [ReleasePipeline](docs/Model/ReleasePipeline.md)
- [ReleasePipelineCollection](docs/Model/ReleasePipelineCollection.md)
- [ReleaseProgression](docs/Model/ReleaseProgression.md)
- [ReleaseProgressionCollection](docs/Model/ReleaseProgressionCollection.md)
- [ReleaserAudienceConfigInput](docs/Model/ReleaserAudienceConfigInput.md)
- [RepositoryCollectionRep](docs/Model/RepositoryCollectionRep.md)
- [RepositoryPost](docs/Model/RepositoryPost.md)
- [RepositoryRep](docs/Model/RepositoryRep.md)
- [ResourceAccess](docs/Model/ResourceAccess.md)
- [ResourceIDResponse](docs/Model/ResourceIDResponse.md)
- [ResourceId](docs/Model/ResourceId.md)
- [ReviewOutput](docs/Model/ReviewOutput.md)
- [ReviewResponse](docs/Model/ReviewResponse.md)
- [Rollout](docs/Model/Rollout.md)
- [RootResponse](docs/Model/RootResponse.md)
- [Rule](docs/Model/Rule.md)
- [RuleClause](docs/Model/RuleClause.md)
- [SdkListRep](docs/Model/SdkListRep.md)
- [SdkVersionListRep](docs/Model/SdkVersionListRep.md)
- [SdkVersionRep](docs/Model/SdkVersionRep.md)
- [SegmentBody](docs/Model/SegmentBody.md)
- [SegmentMetadata](docs/Model/SegmentMetadata.md)
- [SegmentTarget](docs/Model/SegmentTarget.md)
- [SegmentUserList](docs/Model/SegmentUserList.md)
- [SegmentUserState](docs/Model/SegmentUserState.md)
- [Series](docs/Model/Series.md)
- [SeriesIntervalsRep](docs/Model/SeriesIntervalsRep.md)
- [SeriesListRep](docs/Model/SeriesListRep.md)
- [SimpleHoldoutRep](docs/Model/SimpleHoldoutRep.md)
- [SlicedResultsRep](docs/Model/SlicedResultsRep.md)
- [SourceEnv](docs/Model/SourceEnv.md)
- [SourceFlag](docs/Model/SourceFlag.md)
- [StageInput](docs/Model/StageInput.md)
- [StageOutput](docs/Model/StageOutput.md)
- [Statement](docs/Model/Statement.md)
- [StatementPost](docs/Model/StatementPost.md)
- [StatisticCollectionRep](docs/Model/StatisticCollectionRep.md)
- [StatisticRep](docs/Model/StatisticRep.md)
- [StatisticsRoot](docs/Model/StatisticsRoot.md)
- [StatusConflictErrorRep](docs/Model/StatusConflictErrorRep.md)
- [StatusResponse](docs/Model/StatusResponse.md)
- [StatusServiceUnavailable](docs/Model/StatusServiceUnavailable.md)
- [StoreIntegrationError](docs/Model/StoreIntegrationError.md)
- [SubjectDataRep](docs/Model/SubjectDataRep.md)
- [SubscriptionPost](docs/Model/SubscriptionPost.md)
- [TagsCollection](docs/Model/TagsCollection.md)
- [TagsLink](docs/Model/TagsLink.md)
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
- [Teams](docs/Model/Teams.md)
- [TeamsPatchInput](docs/Model/TeamsPatchInput.md)
- [TimestampRep](docs/Model/TimestampRep.md)
- [Token](docs/Model/Token.md)
- [TokenSummary](docs/Model/TokenSummary.md)
- [Tokens](docs/Model/Tokens.md)
- [TreatmentInput](docs/Model/TreatmentInput.md)
- [TreatmentParameterInput](docs/Model/TreatmentParameterInput.md)
- [TreatmentRep](docs/Model/TreatmentRep.md)
- [TreatmentResultRep](docs/Model/TreatmentResultRep.md)
- [TriggerPost](docs/Model/TriggerPost.md)
- [TriggerWorkflowCollectionRep](docs/Model/TriggerWorkflowCollectionRep.md)
- [TriggerWorkflowRep](docs/Model/TriggerWorkflowRep.md)
- [UnauthorizedErrorRep](docs/Model/UnauthorizedErrorRep.md)
- [UpdatePhaseStatusInput](docs/Model/UpdatePhaseStatusInput.md)
- [UpdateReleasePipelineInput](docs/Model/UpdateReleasePipelineInput.md)
- [UpsertContextKindPayload](docs/Model/UpsertContextKindPayload.md)
- [UpsertFlagDefaultsPayload](docs/Model/UpsertFlagDefaultsPayload.md)
- [UpsertPayloadRep](docs/Model/UpsertPayloadRep.md)
- [UpsertResponseRep](docs/Model/UpsertResponseRep.md)
- [UrlPost](docs/Model/UrlPost.md)
- [User](docs/Model/User.md)
- [UserAttributeNamesRep](docs/Model/UserAttributeNamesRep.md)
- [UserFlagSetting](docs/Model/UserFlagSetting.md)
- [UserFlagSettings](docs/Model/UserFlagSettings.md)
- [UserRecord](docs/Model/UserRecord.md)
- [UserSegment](docs/Model/UserSegment.md)
- [UserSegmentRule](docs/Model/UserSegmentRule.md)
- [UserSegments](docs/Model/UserSegments.md)
- [Users](docs/Model/Users.md)
- [UsersRep](docs/Model/UsersRep.md)
- [ValidationFailedErrorRep](docs/Model/ValidationFailedErrorRep.md)
- [ValuePut](docs/Model/ValuePut.md)
- [Variation](docs/Model/Variation.md)
- [VariationEvalSummary](docs/Model/VariationEvalSummary.md)
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
    - Package version: `17.2.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
