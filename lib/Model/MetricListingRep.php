<?php
/**
 * MetricListingRep
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * LaunchDarkly REST API
 *
 * This documentation describes LaunchDarkly's REST API.  To access the complete OpenAPI spec directly, use [Get OpenAPI spec](https://launchdarkly.com/docs/api/other/get-openapi-spec).  ## Authentication  LaunchDarkly's REST API uses the HTTPS protocol with a minimum TLS version of 1.2.  All REST API resources are authenticated with either [personal or service access tokens](https://launchdarkly.com/docs/home/account/api), or session cookies. Other authentication mechanisms are not supported. You can manage personal access tokens on your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page in the LaunchDarkly UI.  LaunchDarkly also has SDK keys, mobile keys, and client-side IDs that are used by our server-side SDKs, mobile SDKs, and JavaScript-based SDKs, respectively. **These keys cannot be used to access our REST API**. These keys are environment-specific, and can only perform read-only operations such as fetching feature flag settings.  | Auth mechanism                                                                                  | Allowed resources                                                                                     | Use cases                                          | | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------- | | [Personal or service access tokens](https://launchdarkly.com/docs/home/account/api) | Can be customized on a per-token basis                                                                | Building scripts, custom integrations, data export. | | SDK keys                                                                                        | Can only access read-only resources specific to server-side SDKs. Restricted to a single environment. | Server-side SDKs                     | | Mobile keys                                                                                     | Can only access read-only resources specific to mobile SDKs, and only for flags marked available to mobile keys. Restricted to a single environment.           | Mobile SDKs                                        | | Client-side ID                                                                                  | Can only access read-only resources specific to JavaScript-based client-side SDKs, and only for flags marked available to client-side. Restricted to a single environment.           | Client-side JavaScript                             |  > #### Keep your access tokens and SDK keys private > > Access tokens should _never_ be exposed in untrusted contexts. Never put an access token in client-side JavaScript, or embed it in a mobile application. LaunchDarkly has special mobile keys that you can embed in mobile apps. If you accidentally expose an access token or SDK key, you can reset it from your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page. > > The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.  ### Authentication using request header  The preferred way to authenticate with the API is by adding an `Authorization` header containing your access token to your requests. The value of the `Authorization` header must be your access token.  Manage personal access tokens from the [**Authorization**](https://app.launchdarkly.com/settings/authorization) page.  ### Authentication using session cookie  For testing purposes, you can make API calls directly from your web browser. If you are logged in to the LaunchDarkly application, the API will use your existing session to authenticate calls.  If you have a [role](https://launchdarkly.com/docs/home/account/built-in-roles) other than Admin, or have a [custom role](https://launchdarkly.com/docs/home/account/custom-roles) defined, you may not have permission to perform some API calls. You will receive a `401` response code in that case.  > ### Modifying the Origin header causes an error > > LaunchDarkly validates that the Origin header for any API request authenticated by a session cookie matches the expected Origin header. The expected Origin header is `https://app.launchdarkly.com`. > > If the Origin header does not match what's expected, LaunchDarkly returns an error. This error can prevent the LaunchDarkly app from working correctly. > > Any browser extension that intentionally changes the Origin header can cause this problem. For example, the `Allow-Control-Allow-Origin: *` Chrome extension changes the Origin header to `http://evil.com` and causes the app to fail. > > To prevent this error, do not modify your Origin header. > > LaunchDarkly does not require origin matching when authenticating with an access token, so this issue does not affect normal API usage.  ## Representations  All resources expect and return JSON response bodies. Error responses also send a JSON body. To learn more about the error format of the API, read [Errors](https://launchdarkly.com/docs/api#errors).  In practice this means that you always get a response with a `Content-Type` header set to `application/json`.  In addition, request bodies for `PATCH`, `POST`, and `PUT` requests must be encoded as JSON with a `Content-Type` header set to `application/json`.  ### Summary and detailed representations  When you fetch a list of resources, the response includes only the most important attributes of each resource. This is a _summary representation_ of the resource. When you fetch an individual resource, such as a single feature flag, you receive a _detailed representation_ of the resource.  The best way to find a detailed representation is to follow links. Every summary representation includes a link to its detailed representation.  ### Expanding responses  Sometimes the detailed representation of a resource does not include all of the attributes of the resource by default. If this is the case, the request method will clearly document this and describe which attributes you can include in an expanded response.  To include the additional attributes, append the `expand` request parameter to your request and add a comma-separated list of the attributes to include. For example, when you append `?expand=members,maintainers` to the [Get team](https://launchdarkly.com/docs/api/teams/get-team) endpoint, the expanded response includes both of these attributes.  ### Links and addressability  The best way to navigate the API is by following links. These are attributes in representations that link to other resources. The API always uses the same format for links:  - Links to other resources within the API are encapsulated in a `_links` object - If the resource has a corresponding link to HTML content on the site, it is stored in a special `_site` link  Each link has two attributes:  - An `href`, which contains the URL - A `type`, which describes the content type  For example, a feature resource might return the following:  ```json {   \"_links\": {     \"parent\": {       \"href\": \"/api/features\",       \"type\": \"application/json\"     },     \"self\": {       \"href\": \"/api/features/sort.order\",       \"type\": \"application/json\"     }   },   \"_site\": {     \"href\": \"/features/sort.order\",     \"type\": \"text/html\"   } } ```  From this, you can navigate to the parent collection of features by following the `parent` link, or navigate to the site page for the feature by following the `_site` link.  Collections are always represented as a JSON object with an `items` attribute containing an array of representations. Like all other representations, collections have `_links` defined at the top level.  Paginated collections include `first`, `last`, `next`, and `prev` links containing a URL with the respective set of elements in the collection.  ## Updates  Resources that accept partial updates use the `PATCH` verb. Most resources support the [JSON patch](https://launchdarkly.com/docs/api#updates-using-json-patch) format. Some resources also support the [JSON merge patch](https://launchdarkly.com/docs/api#updates-using-json-merge-patch) format, and some resources support the [semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch) format, which is a way to specify the modifications to perform as a set of executable instructions. Each resource supports optional [comments](https://launchdarkly.com/docs/api#updates-with-comments) that you can submit with updates. Comments appear in outgoing webhooks, the audit log, and other integrations.  When a resource supports both JSON patch and semantic patch, we document both in the request method. However, the specific request body fields and descriptions included in our documentation only match one type of patch or the other.  ### Updates using JSON patch  [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) is a way to specify the modifications to perform on a resource. JSON patch uses paths and a limited set of operations to describe how to transform the current state of the resource into a new state. JSON patch documents are always arrays, where each element contains an operation, a path to the field to update, and the new value.  For example, in this feature flag representation:  ```json {     \"name\": \"New recommendations engine\",     \"key\": \"engine.enable\",     \"description\": \"This is the description\",     ... } ``` You can change the feature flag's description with the following patch document:  ```json [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"This is the new description\" }] ```  You can specify multiple modifications to perform in a single request. You can also test that certain preconditions are met before applying the patch:  ```json [   { \"op\": \"test\", \"path\": \"/version\", \"value\": 10 },   { \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" } ] ```  The above patch request tests whether the feature flag's `version` is `10`, and if so, changes the feature flag's description.  Attributes that are not editable, such as a resource's `_links`, have names that start with an underscore.  ### Updates using JSON merge patch  [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) is another format for specifying the modifications to perform on a resource. JSON merge patch is less expressive than JSON patch. However, in many cases it is simpler to construct a merge patch document. For example, you can change a feature flag's description with the following merge patch document:  ```json {   \"description\": \"New flag description\" } ```  ### Updates using semantic patch  Some resources support the semantic patch format. A semantic patch is a way to specify the modifications to perform on a resource as a set of executable instructions.  Semantic patch allows you to be explicit about intent using precise, custom instructions. In many cases, you can define semantic patch instructions independently of the current state of the resource. This can be useful when defining a change that may be applied at a future date.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header.  Here's how:  ``` Content-Type: application/json; domain-model=launchdarkly.semanticpatch ```  If you call a semantic patch resource without this header, you will receive a `400` response because your semantic patch will be interpreted as a JSON patch.  The body of a semantic patch request takes the following properties:  * `comment` (string): (Optional) A description of the update. * `environmentKey` (string): (Required for some resources only) The environment key. * `instructions` (array): (Required) A list of actions the update should perform. Each action in the list must be an object with a `kind` property that indicates the instruction. If the instruction requires parameters, you must include those parameters as additional fields in the object. The documentation for each resource that supports semantic patch includes the available instructions and any additional parameters.  For example:  ```json {   \"comment\": \"optional comment\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  Semantic patches are not applied partially; either all of the instructions are applied or none of them are. If **any** instruction is invalid, the endpoint returns an error and will not change the resource. If all instructions are valid, the request succeeds and the resources are updated if necessary, or left unchanged if they are already in the state you request.  ### Updates with comments  You can submit optional comments with `PATCH` changes.  To submit a comment along with a JSON patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"patch\": [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" }] } ```  To submit a comment along with a JSON merge patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"merge\": { \"description\": \"New flag description\" } } ```  To submit a comment along with a semantic patch, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  ## Errors  The API always returns errors in a common format. Here's an example:  ```json {   \"code\": \"invalid_request\",   \"message\": \"A feature with that key already exists\",   \"id\": \"30ce6058-87da-11e4-b116-123b93f75cba\" } ```  The `code` indicates the general class of error. The `message` is a human-readable explanation of what went wrong. The `id` is a unique identifier. Use it when you're working with LaunchDarkly Support to debug a problem with a specific API call.  ### HTTP status error response codes  | Code | Definition        | Description                                                                                       | Possible Solution                                                | | ---- | ----------------- | ------------------------------------------------------------------------------------------- | ---------------------------------------------------------------- | | 400  | Invalid request       | The request cannot be understood.                                    | Ensure JSON syntax in request body is correct.                   | | 401  | Invalid access token      | Requestor is unauthorized or does not have permission for this API call.                                                | Ensure your API access token is valid and has the appropriate permissions.                                     | | 403  | Forbidden         | Requestor does not have access to this resource.                                                | Ensure that the account member or access token has proper permissions set. | | 404  | Invalid resource identifier | The requested resource is not valid. | Ensure that the resource is correctly identified by ID or key. | | 405  | Method not allowed | The request method is not allowed on this resource. | Ensure that the HTTP verb is correct. | | 409  | Conflict          | The API request can not be completed because it conflicts with a concurrent API request. | Retry your request.                                              | | 422  | Unprocessable entity | The API request can not be completed because the update description can not be understood. | Ensure that the request body is correct for the type of patch you are using, either JSON patch or semantic patch. | 429  | Too many requests | Read [Rate limiting](https://launchdarkly.com/docs/api#rate-limiting).                                               | Wait and try again later.                                        |  ## CORS  The LaunchDarkly API supports Cross Origin Resource Sharing (CORS) for AJAX requests from any origin. If an `Origin` header is given in a request, it will be echoed as an explicitly allowed origin. Otherwise the request returns a wildcard, `Access-Control-Allow-Origin: *`. For more information on CORS, read the [CORS W3C Recommendation](http://www.w3.org/TR/cors). Example CORS headers might look like:  ```http Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, Authorization Access-Control-Allow-Methods: OPTIONS, GET, DELETE, PATCH Access-Control-Allow-Origin: * Access-Control-Max-Age: 300 ```  You can make authenticated CORS calls just as you would make same-origin calls, using either [token or session-based authentication](https://launchdarkly.com/docs/api#authentication). If you are using session authentication, you should set the `withCredentials` property for your `xhr` request to `true`. You should never expose your access tokens to untrusted entities.  ## Rate limiting  We use several rate limiting strategies to ensure the availability of our APIs. Rate-limited calls to our APIs return a `429` status code. Calls to our APIs include headers indicating the current rate limit status. The specific headers returned depend on the API route being called. The limits differ based on the route, authentication mechanism, and other factors. Routes that are not rate limited may not contain any of the headers described below.  > ### Rate limiting and SDKs > > LaunchDarkly SDKs are never rate limited and do not use the API endpoints defined here. LaunchDarkly uses a different set of approaches, including streaming/server-sent events and a global CDN, to ensure availability to the routes used by LaunchDarkly SDKs.  ### Global rate limits  Authenticated requests are subject to a global limit. This is the maximum number of calls that your account can make to the API per ten seconds. All service and personal access tokens on the account share this limit, so exceeding the limit with one access token will impact other tokens. Calls that are subject to global rate limits may return the headers below:  | Header name                    | Description                                                                      | | ------------------------------ | -------------------------------------------------------------------------------- | | `X-Ratelimit-Global-Remaining` | The maximum number of requests the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`            | The time at which the current rate limit window resets in epoch milliseconds.    |  We do not publicly document the specific number of calls that can be made globally. This limit may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limit.  ### Route-level rate limits  Some authenticated routes have custom rate limits. These also reset every ten seconds. Any service or personal access tokens hitting the same route share this limit, so exceeding the limit with one access token may impact other tokens. Calls that are subject to route-level rate limits return the headers below:  | Header name                   | Description                                                                                           | | ----------------------------- | ----------------------------------------------------------------------------------------------------- | | `X-Ratelimit-Route-Remaining` | The maximum number of requests to the current route the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`           | The time at which the current rate limit window resets in epoch milliseconds.                         |  A _route_ represents a specific URL pattern and verb. For example, the [Delete environment](https://launchdarkly.com/docs/api/environments/delete-environment) endpoint is considered a single route, and each call to delete an environment counts against your route-level rate limit for that route.  We do not publicly document the specific number of calls that an account can make to each endpoint per ten seconds. These limits may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limits.  ### IP-based rate limiting  We also employ IP-based rate limiting on some API routes. If you hit an IP-based rate limit, your API response will include a `Retry-After` header indicating how long to wait before re-trying the call. Clients must wait at least `Retry-After` seconds before making additional calls to our API, and should employ jitter and backoff strategies to avoid triggering rate limits again.  ## OpenAPI (Swagger) and client libraries  We have a [complete OpenAPI (Swagger) specification](https://app.launchdarkly.com/api/v2/openapi.json) for our API.  We auto-generate multiple client libraries based on our OpenAPI specification. To learn more, visit the [collection of client libraries on GitHub](https://github.com/search?q=topic%3Alaunchdarkly-api+org%3Alaunchdarkly&type=Repositories). You can also use this specification to generate client libraries to interact with our REST API in your language of choice.  Our OpenAPI specification is supported by several API-based tools such as Postman and Insomnia. In many cases, you can directly import our specification to explore our APIs.  ## Method overriding  Some firewalls and HTTP clients restrict the use of verbs other than `GET` and `POST`. In those environments, our API endpoints that use `DELETE`, `PATCH`, and `PUT` verbs are inaccessible.  To avoid this issue, our API supports the `X-HTTP-Method-Override` header, allowing clients to \"tunnel\" `DELETE`, `PATCH`, and `PUT` requests using a `POST` request.  For example, to call a `PATCH` endpoint using a `POST` request, you can include `X-HTTP-Method-Override:PATCH` as a header.  ## Beta resources  We sometimes release new API resources in **beta** status before we release them with general availability.  Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  We try to promote resources into general availability as quickly as possible. This happens after sufficient testing and when we're satisfied that we no longer need to make backwards-incompatible changes.  We mark beta resources with a \"Beta\" callout in our documentation, pictured below:  > ### This feature is in beta > > To use this feature, pass in a header including the `LD-API-Version` key with value set to `beta`. Use this header with each call. To learn more, read [Beta resources](https://launchdarkly.com/docs/api#beta-resources). > > Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  ### Using beta resources  To use a beta resource, you must include a header in the request. If you call a beta resource without this header, you receive a `403` response.  Use this header:  ``` LD-API-Version: beta ```  ## Federal environments  The version of LaunchDarkly that is available on domains controlled by the United States government is different from the version of LaunchDarkly available to the general public. If you are an employee or contractor for a United States federal agency and use LaunchDarkly in your work, you likely use the federal instance of LaunchDarkly.  If you are working in the federal instance of LaunchDarkly, the base URI for each request is `https://app.launchdarkly.us`.  To learn more, read [LaunchDarkly in federal environments](https://launchdarkly.com/docs/home/infrastructure/federal).  ## Versioning  We try hard to keep our REST API backwards compatible, but we occasionally have to make backwards-incompatible changes in the process of shipping new features. These breaking changes can cause unexpected behavior if you don't prepare for them accordingly.  Updates to our REST API include support for the latest features in LaunchDarkly. We also release a new version of our REST API every time we make a breaking change. We provide simultaneous support for multiple API versions so you can migrate from your current API version to a new version at your own pace.  ### Setting the API version per request  You can set the API version on a specific request by sending an `LD-API-Version` header, as shown in the example below:  ``` LD-API-Version: 20240415 ```  The header value is the version number of the API version you would like to request. The number for each version corresponds to the date the version was released in `yyyymmdd` format. In the example above the version `20240415` corresponds to April 15, 2024.  ### Setting the API version per access token  When you create an access token, you must specify a specific version of the API to use. This ensures that integrations using this token cannot be broken by version changes.  Tokens created before versioning was released have their version set to `20160426`, which is the version of the API that existed before the current versioning scheme, so that they continue working the same way they did before versioning.  If you would like to upgrade your integration to use a new API version, you can explicitly set the header described above.  > ### Best practice: Set the header for every client or integration > > We recommend that you set the API version header explicitly in any client or integration you build. > > Only rely on the access token API version during manual testing.  ### API version changelog  <table>   <tr>     <th>Version</th>     <th>Changes</th>     <th>End of life (EOL)</th>   </tr>   <tr>     <td>`20240415`</td>     <td>       <ul><li>Changed several endpoints from unpaginated to paginated. Use the `limit` and `offset` query parameters to page through the results.</li> <li>Changed the [list access tokens](https://launchdarkly.com/docs/api/access-tokens/get-tokens) endpoint: <ul><li>Response is now paginated with a default limit of `25`</li></ul></li> <li>Changed the [list account members](https://launchdarkly.com/docs/api/account-members/get-members) endpoint: <ul><li>The `accessCheck` filter is no longer available</li></ul></li> <li>Changed the [list custom roles](https://launchdarkly.com/docs/api/custom-roles/get-custom-roles) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `environments` field is now only returned if the request is filtered by environment, using the `filterEnv` query parameter</li><li>The `followerId`, `hasDataExport`, `status`, `contextKindTargeted`, and `segmentTargeted` filters are no longer available</li><li>The `compare` query parameter is no longer available</li></ul></li> <li>Changed the [list segments](https://launchdarkly.com/docs/api/segments/get-segments) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list teams](https://launchdarkly.com/docs/api/teams/get-teams) endpoint: <ul><li>The `expand` parameter no longer supports including `projects` or `roles`</li><li>In paginated results, the maximum page size is now 100</li></ul></li> <li>Changed the [get workflows](https://launchdarkly.com/docs/api/workflows/get-workflows) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `_conflicts` field in the response is no longer available</li></ul></li> </ul>     </td>     <td>Current</td>   </tr>   <tr>     <td>`20220603`</td>     <td>       <ul><li>Changed the [list projects](https://launchdarkly.com/docs/api/projects/get-projects) return value:<ul><li>Response is now paginated with a default limit of `20`.</li><li>Added support for filter and sort.</li><li>The project `environments` field is now expandable. This field is omitted by default.</li></ul></li><li>Changed the [get project](https://launchdarkly.com/docs/api/projects/get-project) return value:<ul><li>The `environments` field is now expandable. This field is omitted by default.</li></ul></li></ul>     </td>     <td>2025-04-15</td>   </tr>   <tr>     <td>`20210729`</td>     <td>       <ul><li>Changed the [create approval request](https://launchdarkly.com/docs/api/approvals/post-approval-request) return value. It now returns HTTP Status Code `201` instead of `200`.</li><li> Changed the [get user](https://launchdarkly.com/docs/api/users/get-user) return value. It now returns a user record, not a user. </li><li>Added additional optional fields to environment, segments, flags, members, and segments, including the ability to create big segments. </li><li> Added default values for flag variations when new environments are created. </li><li>Added filtering and pagination for getting flags and members, including `limit`, `number`, `filter`, and `sort` query parameters. </li><li>Added endpoints for expiring user targets for flags and segments, scheduled changes, access tokens, Relay Proxy configuration, integrations and subscriptions, and approvals. </li></ul>     </td>     <td>2023-06-03</td>   </tr>   <tr>     <td>`20191212`</td>     <td>       <ul><li>[List feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) now defaults to sending summaries of feature flag configurations, equivalent to setting the query parameter `summary=true`. Summaries omit flag targeting rules and individual user targets from the payload. </li><li> Added endpoints for flags, flag status, projects, environments, audit logs, members, users, custom roles, segments, usage, streams, events, and data export. </li></ul>     </td>     <td>2022-07-29</td>   </tr>   <tr>     <td>`20160426`</td>     <td>       <ul><li>Initial versioning of API. Tokens created before versioning have their version set to this.</li></ul>     </td>     <td>2020-12-12</td>   </tr> </table>  To learn more about how EOL is determined, read LaunchDarkly's [End of Life (EOL) Policy](https://launchdarkly.com/policies/end-of-life-policy/).
 *
 * The version of the OpenAPI document: 2.0
 * Contact: support@launchdarkly.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace LaunchDarklyApi\Model;

use \ArrayAccess;
use \LaunchDarklyApi\ObjectSerializer;

/**
 * MetricListingRep Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class MetricListingRep implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'MetricListingRep';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'experiment_count' => 'int',
        'metric_group_count' => 'int',
        '_id' => 'string',
        '_version_id' => 'string',
        'key' => 'string',
        'name' => 'string',
        'kind' => 'string',
        '_attached_flag_count' => 'int',
        '_links' => 'array<string,\LaunchDarklyApi\Model\Link>',
        '_site' => '\LaunchDarklyApi\Model\Link',
        '_access' => '\LaunchDarklyApi\Model\Access',
        'tags' => 'string[]',
        '_creation_date' => 'int',
        'last_modified' => '\LaunchDarklyApi\Model\Modification',
        'maintainer_id' => 'string',
        '_maintainer' => '\LaunchDarklyApi\Model\MemberSummary',
        'description' => 'string',
        'category' => 'string',
        'is_numeric' => 'bool',
        'success_criteria' => 'string',
        'unit' => 'string',
        'event_key' => 'string',
        'randomization_units' => 'string[]',
        'unit_aggregation_type' => 'string',
        'analysis_type' => 'string',
        'percentile_value' => 'int',
        'event_default' => '\LaunchDarklyApi\Model\MetricEventDefaultRep'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'experiment_count' => null,
        'metric_group_count' => null,
        '_id' => null,
        '_version_id' => null,
        'key' => null,
        'name' => null,
        'kind' => null,
        '_attached_flag_count' => null,
        '_links' => null,
        '_site' => null,
        '_access' => null,
        'tags' => null,
        '_creation_date' => 'int64',
        'last_modified' => null,
        'maintainer_id' => null,
        '_maintainer' => null,
        'description' => null,
        'category' => null,
        'is_numeric' => null,
        'success_criteria' => null,
        'unit' => null,
        'event_key' => null,
        'randomization_units' => null,
        'unit_aggregation_type' => null,
        'analysis_type' => null,
        'percentile_value' => null,
        'event_default' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'experiment_count' => 'experimentCount',
        'metric_group_count' => 'metricGroupCount',
        '_id' => '_id',
        '_version_id' => '_versionId',
        'key' => 'key',
        'name' => 'name',
        'kind' => 'kind',
        '_attached_flag_count' => '_attachedFlagCount',
        '_links' => '_links',
        '_site' => '_site',
        '_access' => '_access',
        'tags' => 'tags',
        '_creation_date' => '_creationDate',
        'last_modified' => 'lastModified',
        'maintainer_id' => 'maintainerId',
        '_maintainer' => '_maintainer',
        'description' => 'description',
        'category' => 'category',
        'is_numeric' => 'isNumeric',
        'success_criteria' => 'successCriteria',
        'unit' => 'unit',
        'event_key' => 'eventKey',
        'randomization_units' => 'randomizationUnits',
        'unit_aggregation_type' => 'unitAggregationType',
        'analysis_type' => 'analysisType',
        'percentile_value' => 'percentileValue',
        'event_default' => 'eventDefault'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'experiment_count' => 'setExperimentCount',
        'metric_group_count' => 'setMetricGroupCount',
        '_id' => 'setId',
        '_version_id' => 'setVersionId',
        'key' => 'setKey',
        'name' => 'setName',
        'kind' => 'setKind',
        '_attached_flag_count' => 'setAttachedFlagCount',
        '_links' => 'setLinks',
        '_site' => 'setSite',
        '_access' => 'setAccess',
        'tags' => 'setTags',
        '_creation_date' => 'setCreationDate',
        'last_modified' => 'setLastModified',
        'maintainer_id' => 'setMaintainerId',
        '_maintainer' => 'setMaintainer',
        'description' => 'setDescription',
        'category' => 'setCategory',
        'is_numeric' => 'setIsNumeric',
        'success_criteria' => 'setSuccessCriteria',
        'unit' => 'setUnit',
        'event_key' => 'setEventKey',
        'randomization_units' => 'setRandomizationUnits',
        'unit_aggregation_type' => 'setUnitAggregationType',
        'analysis_type' => 'setAnalysisType',
        'percentile_value' => 'setPercentileValue',
        'event_default' => 'setEventDefault'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'experiment_count' => 'getExperimentCount',
        'metric_group_count' => 'getMetricGroupCount',
        '_id' => 'getId',
        '_version_id' => 'getVersionId',
        'key' => 'getKey',
        'name' => 'getName',
        'kind' => 'getKind',
        '_attached_flag_count' => 'getAttachedFlagCount',
        '_links' => 'getLinks',
        '_site' => 'getSite',
        '_access' => 'getAccess',
        'tags' => 'getTags',
        '_creation_date' => 'getCreationDate',
        'last_modified' => 'getLastModified',
        'maintainer_id' => 'getMaintainerId',
        '_maintainer' => 'getMaintainer',
        'description' => 'getDescription',
        'category' => 'getCategory',
        'is_numeric' => 'getIsNumeric',
        'success_criteria' => 'getSuccessCriteria',
        'unit' => 'getUnit',
        'event_key' => 'getEventKey',
        'randomization_units' => 'getRandomizationUnits',
        'unit_aggregation_type' => 'getUnitAggregationType',
        'analysis_type' => 'getAnalysisType',
        'percentile_value' => 'getPercentileValue',
        'event_default' => 'getEventDefault'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const KIND_PAGEVIEW = 'pageview';
    public const KIND_CLICK = 'click';
    public const KIND_CUSTOM = 'custom';
    public const SUCCESS_CRITERIA_HIGHER_THAN_BASELINE = 'HigherThanBaseline';
    public const SUCCESS_CRITERIA_LOWER_THAN_BASELINE = 'LowerThanBaseline';
    public const UNIT_AGGREGATION_TYPE_AVERAGE = 'average';
    public const UNIT_AGGREGATION_TYPE_SUM = 'sum';
    public const ANALYSIS_TYPE_MEAN = 'mean';
    public const ANALYSIS_TYPE_PERCENTILE = 'percentile';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getKindAllowableValues()
    {
        return [
            self::KIND_PAGEVIEW,
            self::KIND_CLICK,
            self::KIND_CUSTOM,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSuccessCriteriaAllowableValues()
    {
        return [
            self::SUCCESS_CRITERIA_HIGHER_THAN_BASELINE,
            self::SUCCESS_CRITERIA_LOWER_THAN_BASELINE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getUnitAggregationTypeAllowableValues()
    {
        return [
            self::UNIT_AGGREGATION_TYPE_AVERAGE,
            self::UNIT_AGGREGATION_TYPE_SUM,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAnalysisTypeAllowableValues()
    {
        return [
            self::ANALYSIS_TYPE_MEAN,
            self::ANALYSIS_TYPE_PERCENTILE,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['experiment_count'] = $data['experiment_count'] ?? null;
        $this->container['metric_group_count'] = $data['metric_group_count'] ?? null;
        $this->container['_id'] = $data['_id'] ?? null;
        $this->container['_version_id'] = $data['_version_id'] ?? null;
        $this->container['key'] = $data['key'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['kind'] = $data['kind'] ?? null;
        $this->container['_attached_flag_count'] = $data['_attached_flag_count'] ?? null;
        $this->container['_links'] = $data['_links'] ?? null;
        $this->container['_site'] = $data['_site'] ?? null;
        $this->container['_access'] = $data['_access'] ?? null;
        $this->container['tags'] = $data['tags'] ?? null;
        $this->container['_creation_date'] = $data['_creation_date'] ?? null;
        $this->container['last_modified'] = $data['last_modified'] ?? null;
        $this->container['maintainer_id'] = $data['maintainer_id'] ?? null;
        $this->container['_maintainer'] = $data['_maintainer'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['category'] = $data['category'] ?? null;
        $this->container['is_numeric'] = $data['is_numeric'] ?? null;
        $this->container['success_criteria'] = $data['success_criteria'] ?? null;
        $this->container['unit'] = $data['unit'] ?? null;
        $this->container['event_key'] = $data['event_key'] ?? null;
        $this->container['randomization_units'] = $data['randomization_units'] ?? null;
        $this->container['unit_aggregation_type'] = $data['unit_aggregation_type'] ?? null;
        $this->container['analysis_type'] = $data['analysis_type'] ?? null;
        $this->container['percentile_value'] = $data['percentile_value'] ?? null;
        $this->container['event_default'] = $data['event_default'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['_id'] === null) {
            $invalidProperties[] = "'_id' can't be null";
        }
        if ($this->container['_version_id'] === null) {
            $invalidProperties[] = "'_version_id' can't be null";
        }
        if ($this->container['key'] === null) {
            $invalidProperties[] = "'key' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['kind'] === null) {
            $invalidProperties[] = "'kind' can't be null";
        }
        $allowedValues = $this->getKindAllowableValues();
        if (!is_null($this->container['kind']) && !in_array($this->container['kind'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'kind', must be one of '%s'",
                $this->container['kind'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['_links'] === null) {
            $invalidProperties[] = "'_links' can't be null";
        }
        if ($this->container['tags'] === null) {
            $invalidProperties[] = "'tags' can't be null";
        }
        if ($this->container['_creation_date'] === null) {
            $invalidProperties[] = "'_creation_date' can't be null";
        }
        $allowedValues = $this->getSuccessCriteriaAllowableValues();
        if (!is_null($this->container['success_criteria']) && !in_array($this->container['success_criteria'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'success_criteria', must be one of '%s'",
                $this->container['success_criteria'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getUnitAggregationTypeAllowableValues();
        if (!is_null($this->container['unit_aggregation_type']) && !in_array($this->container['unit_aggregation_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'unit_aggregation_type', must be one of '%s'",
                $this->container['unit_aggregation_type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAnalysisTypeAllowableValues();
        if (!is_null($this->container['analysis_type']) && !in_array($this->container['analysis_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'analysis_type', must be one of '%s'",
                $this->container['analysis_type'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets experiment_count
     *
     * @return int|null
     */
    public function getExperimentCount()
    {
        return $this->container['experiment_count'];
    }

    /**
     * Sets experiment_count
     *
     * @param int|null $experiment_count The number of experiments using this metric
     *
     * @return self
     */
    public function setExperimentCount($experiment_count)
    {
        $this->container['experiment_count'] = $experiment_count;

        return $this;
    }

    /**
     * Gets metric_group_count
     *
     * @return int|null
     */
    public function getMetricGroupCount()
    {
        return $this->container['metric_group_count'];
    }

    /**
     * Sets metric_group_count
     *
     * @param int|null $metric_group_count The number of metric groups using this metric
     *
     * @return self
     */
    public function setMetricGroupCount($metric_group_count)
    {
        $this->container['metric_group_count'] = $metric_group_count;

        return $this;
    }

    /**
     * Gets _id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['_id'];
    }

    /**
     * Sets _id
     *
     * @param string $_id The ID of this metric
     *
     * @return self
     */
    public function setId($_id)
    {
        $this->container['_id'] = $_id;

        return $this;
    }

    /**
     * Gets _version_id
     *
     * @return string
     */
    public function getVersionId()
    {
        return $this->container['_version_id'];
    }

    /**
     * Sets _version_id
     *
     * @param string $_version_id The version ID of the metric
     *
     * @return self
     */
    public function setVersionId($_version_id)
    {
        $this->container['_version_id'] = $_version_id;

        return $this;
    }

    /**
     * Gets key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->container['key'];
    }

    /**
     * Sets key
     *
     * @param string $key A unique key to reference the metric
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->container['key'] = $key;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name A human-friendly name for the metric
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->container['kind'];
    }

    /**
     * Sets kind
     *
     * @param string $kind The kind of event the metric tracks
     *
     * @return self
     */
    public function setKind($kind)
    {
        $allowedValues = $this->getKindAllowableValues();
        if (!in_array($kind, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'kind', must be one of '%s'",
                    $kind,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['kind'] = $kind;

        return $this;
    }

    /**
     * Gets _attached_flag_count
     *
     * @return int|null
     */
    public function getAttachedFlagCount()
    {
        return $this->container['_attached_flag_count'];
    }

    /**
     * Sets _attached_flag_count
     *
     * @param int|null $_attached_flag_count The number of feature flags currently attached to this metric
     *
     * @return self
     */
    public function setAttachedFlagCount($_attached_flag_count)
    {
        $this->container['_attached_flag_count'] = $_attached_flag_count;

        return $this;
    }

    /**
     * Gets _links
     *
     * @return array<string,\LaunchDarklyApi\Model\Link>
     */
    public function getLinks()
    {
        return $this->container['_links'];
    }

    /**
     * Sets _links
     *
     * @param array<string,\LaunchDarklyApi\Model\Link> $_links The location and content type of related resources
     *
     * @return self
     */
    public function setLinks($_links)
    {
        $this->container['_links'] = $_links;

        return $this;
    }

    /**
     * Gets _site
     *
     * @return \LaunchDarklyApi\Model\Link|null
     */
    public function getSite()
    {
        return $this->container['_site'];
    }

    /**
     * Sets _site
     *
     * @param \LaunchDarklyApi\Model\Link|null $_site _site
     *
     * @return self
     */
    public function setSite($_site)
    {
        $this->container['_site'] = $_site;

        return $this;
    }

    /**
     * Gets _access
     *
     * @return \LaunchDarklyApi\Model\Access|null
     */
    public function getAccess()
    {
        return $this->container['_access'];
    }

    /**
     * Sets _access
     *
     * @param \LaunchDarklyApi\Model\Access|null $_access _access
     *
     * @return self
     */
    public function setAccess($_access)
    {
        $this->container['_access'] = $_access;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return string[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string[] $tags Tags for the metric
     *
     * @return self
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets _creation_date
     *
     * @return int
     */
    public function getCreationDate()
    {
        return $this->container['_creation_date'];
    }

    /**
     * Sets _creation_date
     *
     * @param int $_creation_date _creation_date
     *
     * @return self
     */
    public function setCreationDate($_creation_date)
    {
        $this->container['_creation_date'] = $_creation_date;

        return $this;
    }

    /**
     * Gets last_modified
     *
     * @return \LaunchDarklyApi\Model\Modification|null
     */
    public function getLastModified()
    {
        return $this->container['last_modified'];
    }

    /**
     * Sets last_modified
     *
     * @param \LaunchDarklyApi\Model\Modification|null $last_modified last_modified
     *
     * @return self
     */
    public function setLastModified($last_modified)
    {
        $this->container['last_modified'] = $last_modified;

        return $this;
    }

    /**
     * Gets maintainer_id
     *
     * @return string|null
     */
    public function getMaintainerId()
    {
        return $this->container['maintainer_id'];
    }

    /**
     * Sets maintainer_id
     *
     * @param string|null $maintainer_id The ID of the member who maintains this metric
     *
     * @return self
     */
    public function setMaintainerId($maintainer_id)
    {
        $this->container['maintainer_id'] = $maintainer_id;

        return $this;
    }

    /**
     * Gets _maintainer
     *
     * @return \LaunchDarklyApi\Model\MemberSummary|null
     */
    public function getMaintainer()
    {
        return $this->container['_maintainer'];
    }

    /**
     * Sets _maintainer
     *
     * @param \LaunchDarklyApi\Model\MemberSummary|null $_maintainer _maintainer
     *
     * @return self
     */
    public function setMaintainer($_maintainer)
    {
        $this->container['_maintainer'] = $_maintainer;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Description of the metric
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string|null
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string|null $category The category of the metric
     *
     * @return self
     */
    public function setCategory($category)
    {
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets is_numeric
     *
     * @return bool|null
     */
    public function getIsNumeric()
    {
        return $this->container['is_numeric'];
    }

    /**
     * Sets is_numeric
     *
     * @param bool|null $is_numeric For custom metrics, whether to track numeric changes in value against a baseline (<code>true</code>) or to track a conversion when an end user takes an action (<code>false</code>).
     *
     * @return self
     */
    public function setIsNumeric($is_numeric)
    {
        $this->container['is_numeric'] = $is_numeric;

        return $this;
    }

    /**
     * Gets success_criteria
     *
     * @return string|null
     */
    public function getSuccessCriteria()
    {
        return $this->container['success_criteria'];
    }

    /**
     * Sets success_criteria
     *
     * @param string|null $success_criteria For custom metrics, the success criteria
     *
     * @return self
     */
    public function setSuccessCriteria($success_criteria)
    {
        $allowedValues = $this->getSuccessCriteriaAllowableValues();
        if (!is_null($success_criteria) && !in_array($success_criteria, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'success_criteria', must be one of '%s'",
                    $success_criteria,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['success_criteria'] = $success_criteria;

        return $this;
    }

    /**
     * Gets unit
     *
     * @return string|null
     */
    public function getUnit()
    {
        return $this->container['unit'];
    }

    /**
     * Sets unit
     *
     * @param string|null $unit For numeric custom metrics, the unit of measure
     *
     * @return self
     */
    public function setUnit($unit)
    {
        $this->container['unit'] = $unit;

        return $this;
    }

    /**
     * Gets event_key
     *
     * @return string|null
     */
    public function getEventKey()
    {
        return $this->container['event_key'];
    }

    /**
     * Sets event_key
     *
     * @param string|null $event_key For custom metrics, the event key to use in your code
     *
     * @return self
     */
    public function setEventKey($event_key)
    {
        $this->container['event_key'] = $event_key;

        return $this;
    }

    /**
     * Gets randomization_units
     *
     * @return string[]|null
     */
    public function getRandomizationUnits()
    {
        return $this->container['randomization_units'];
    }

    /**
     * Sets randomization_units
     *
     * @param string[]|null $randomization_units An array of randomization units allowed for this metric
     *
     * @return self
     */
    public function setRandomizationUnits($randomization_units)
    {
        $this->container['randomization_units'] = $randomization_units;

        return $this;
    }

    /**
     * Gets unit_aggregation_type
     *
     * @return string|null
     */
    public function getUnitAggregationType()
    {
        return $this->container['unit_aggregation_type'];
    }

    /**
     * Sets unit_aggregation_type
     *
     * @param string|null $unit_aggregation_type The method by which multiple unit event values are aggregated
     *
     * @return self
     */
    public function setUnitAggregationType($unit_aggregation_type)
    {
        $allowedValues = $this->getUnitAggregationTypeAllowableValues();
        if (!is_null($unit_aggregation_type) && !in_array($unit_aggregation_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'unit_aggregation_type', must be one of '%s'",
                    $unit_aggregation_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['unit_aggregation_type'] = $unit_aggregation_type;

        return $this;
    }

    /**
     * Gets analysis_type
     *
     * @return string|null
     */
    public function getAnalysisType()
    {
        return $this->container['analysis_type'];
    }

    /**
     * Sets analysis_type
     *
     * @param string|null $analysis_type The method for analyzing metric events
     *
     * @return self
     */
    public function setAnalysisType($analysis_type)
    {
        $allowedValues = $this->getAnalysisTypeAllowableValues();
        if (!is_null($analysis_type) && !in_array($analysis_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'analysis_type', must be one of '%s'",
                    $analysis_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['analysis_type'] = $analysis_type;

        return $this;
    }

    /**
     * Gets percentile_value
     *
     * @return int|null
     */
    public function getPercentileValue()
    {
        return $this->container['percentile_value'];
    }

    /**
     * Sets percentile_value
     *
     * @param int|null $percentile_value The percentile for the analysis method. An integer denoting the target percentile between 0 and 100. Required when <code>analysisType</code> is <code>percentile</code>.
     *
     * @return self
     */
    public function setPercentileValue($percentile_value)
    {
        $this->container['percentile_value'] = $percentile_value;

        return $this;
    }

    /**
     * Gets event_default
     *
     * @return \LaunchDarklyApi\Model\MetricEventDefaultRep|null
     */
    public function getEventDefault()
    {
        return $this->container['event_default'];
    }

    /**
     * Sets event_default
     *
     * @param \LaunchDarklyApi\Model\MetricEventDefaultRep|null $event_default event_default
     *
     * @return self
     */
    public function setEventDefault($event_default)
    {
        $this->container['event_default'] = $event_default;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


