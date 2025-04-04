<?php
/**
 * TreatmentResultRep
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
 * TreatmentResultRep Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class TreatmentResultRep implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'TreatmentResultRep';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'treatment_id' => 'string',
        'treatment_name' => 'string',
        'mean' => 'float',
        'data_mean' => 'float',
        'data_std_dev' => 'float',
        'credible_interval' => '\LaunchDarklyApi\Model\CredibleIntervalRep',
        'p_best' => 'float',
        'relative_differences' => '\LaunchDarklyApi\Model\RelativeDifferenceRep[]',
        'units' => 'int',
        'traffic' => 'int',
        'event_values_sum' => 'float',
        'distribution' => '\LaunchDarklyApi\Model\Distribution',
        'correlation' => 'float',
        'standard_deviation_ratio' => 'float',
        'covariate_imbalance' => 'float',
        'variance_reduction' => 'float',
        'model' => 'string',
        'bayesian_normal' => '\LaunchDarklyApi\Model\BayesianNormalStatsRep',
        'bayesian_beta' => '\LaunchDarklyApi\Model\BayesianBetaBinomialStatsRep'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'treatment_id' => null,
        'treatment_name' => null,
        'mean' => null,
        'data_mean' => null,
        'data_std_dev' => null,
        'credible_interval' => null,
        'p_best' => null,
        'relative_differences' => null,
        'units' => 'int64',
        'traffic' => 'int64',
        'event_values_sum' => null,
        'distribution' => null,
        'correlation' => null,
        'standard_deviation_ratio' => null,
        'covariate_imbalance' => null,
        'variance_reduction' => null,
        'model' => null,
        'bayesian_normal' => null,
        'bayesian_beta' => null
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
        'treatment_id' => 'treatmentId',
        'treatment_name' => 'treatmentName',
        'mean' => 'mean',
        'data_mean' => 'dataMean',
        'data_std_dev' => 'dataStdDev',
        'credible_interval' => 'credibleInterval',
        'p_best' => 'pBest',
        'relative_differences' => 'relativeDifferences',
        'units' => 'units',
        'traffic' => 'traffic',
        'event_values_sum' => 'eventValuesSum',
        'distribution' => 'distribution',
        'correlation' => 'correlation',
        'standard_deviation_ratio' => 'standardDeviationRatio',
        'covariate_imbalance' => 'covariateImbalance',
        'variance_reduction' => 'varianceReduction',
        'model' => 'model',
        'bayesian_normal' => 'bayesianNormal',
        'bayesian_beta' => 'bayesianBeta'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'treatment_id' => 'setTreatmentId',
        'treatment_name' => 'setTreatmentName',
        'mean' => 'setMean',
        'data_mean' => 'setDataMean',
        'data_std_dev' => 'setDataStdDev',
        'credible_interval' => 'setCredibleInterval',
        'p_best' => 'setPBest',
        'relative_differences' => 'setRelativeDifferences',
        'units' => 'setUnits',
        'traffic' => 'setTraffic',
        'event_values_sum' => 'setEventValuesSum',
        'distribution' => 'setDistribution',
        'correlation' => 'setCorrelation',
        'standard_deviation_ratio' => 'setStandardDeviationRatio',
        'covariate_imbalance' => 'setCovariateImbalance',
        'variance_reduction' => 'setVarianceReduction',
        'model' => 'setModel',
        'bayesian_normal' => 'setBayesianNormal',
        'bayesian_beta' => 'setBayesianBeta'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'treatment_id' => 'getTreatmentId',
        'treatment_name' => 'getTreatmentName',
        'mean' => 'getMean',
        'data_mean' => 'getDataMean',
        'data_std_dev' => 'getDataStdDev',
        'credible_interval' => 'getCredibleInterval',
        'p_best' => 'getPBest',
        'relative_differences' => 'getRelativeDifferences',
        'units' => 'getUnits',
        'traffic' => 'getTraffic',
        'event_values_sum' => 'getEventValuesSum',
        'distribution' => 'getDistribution',
        'correlation' => 'getCorrelation',
        'standard_deviation_ratio' => 'getStandardDeviationRatio',
        'covariate_imbalance' => 'getCovariateImbalance',
        'variance_reduction' => 'getVarianceReduction',
        'model' => 'getModel',
        'bayesian_normal' => 'getBayesianNormal',
        'bayesian_beta' => 'getBayesianBeta'
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

    public const MODEL_BAYESIAN_NORMAL = 'bayesianNormal';
    public const MODEL_BAYESIAN_BETA = 'bayesianBeta';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getModelAllowableValues()
    {
        return [
            self::MODEL_BAYESIAN_NORMAL,
            self::MODEL_BAYESIAN_BETA,
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
        $this->container['treatment_id'] = $data['treatment_id'] ?? null;
        $this->container['treatment_name'] = $data['treatment_name'] ?? null;
        $this->container['mean'] = $data['mean'] ?? null;
        $this->container['data_mean'] = $data['data_mean'] ?? null;
        $this->container['data_std_dev'] = $data['data_std_dev'] ?? null;
        $this->container['credible_interval'] = $data['credible_interval'] ?? null;
        $this->container['p_best'] = $data['p_best'] ?? null;
        $this->container['relative_differences'] = $data['relative_differences'] ?? null;
        $this->container['units'] = $data['units'] ?? null;
        $this->container['traffic'] = $data['traffic'] ?? null;
        $this->container['event_values_sum'] = $data['event_values_sum'] ?? null;
        $this->container['distribution'] = $data['distribution'] ?? null;
        $this->container['correlation'] = $data['correlation'] ?? null;
        $this->container['standard_deviation_ratio'] = $data['standard_deviation_ratio'] ?? null;
        $this->container['covariate_imbalance'] = $data['covariate_imbalance'] ?? null;
        $this->container['variance_reduction'] = $data['variance_reduction'] ?? null;
        $this->container['model'] = $data['model'] ?? null;
        $this->container['bayesian_normal'] = $data['bayesian_normal'] ?? null;
        $this->container['bayesian_beta'] = $data['bayesian_beta'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getModelAllowableValues();
        if (!is_null($this->container['model']) && !in_array($this->container['model'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'model', must be one of '%s'",
                $this->container['model'],
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
     * Gets treatment_id
     *
     * @return string|null
     */
    public function getTreatmentId()
    {
        return $this->container['treatment_id'];
    }

    /**
     * Sets treatment_id
     *
     * @param string|null $treatment_id The ID of the treatment
     *
     * @return self
     */
    public function setTreatmentId($treatment_id)
    {
        $this->container['treatment_id'] = $treatment_id;

        return $this;
    }

    /**
     * Gets treatment_name
     *
     * @return string|null
     */
    public function getTreatmentName()
    {
        return $this->container['treatment_name'];
    }

    /**
     * Sets treatment_name
     *
     * @param string|null $treatment_name The name of the treatment
     *
     * @return self
     */
    public function setTreatmentName($treatment_name)
    {
        $this->container['treatment_name'] = $treatment_name;

        return $this;
    }

    /**
     * Gets mean
     *
     * @return float|null
     */
    public function getMean()
    {
        return $this->container['mean'];
    }

    /**
     * Sets mean
     *
     * @param float|null $mean The average value of the variation in this sample. It doesn’t capture the uncertainty in the measurement, so it should not be the only measurement you use to make decisions.
     *
     * @return self
     */
    public function setMean($mean)
    {
        $this->container['mean'] = $mean;

        return $this;
    }

    /**
     * Gets data_mean
     *
     * @return float|null
     */
    public function getDataMean()
    {
        return $this->container['data_mean'];
    }

    /**
     * Sets data_mean
     *
     * @param float|null $data_mean The mean of the data, with no priors effecting the result.
     *
     * @return self
     */
    public function setDataMean($data_mean)
    {
        $this->container['data_mean'] = $data_mean;

        return $this;
    }

    /**
     * Gets data_std_dev
     *
     * @return float|null
     */
    public function getDataStdDev()
    {
        return $this->container['data_std_dev'];
    }

    /**
     * Sets data_std_dev
     *
     * @param float|null $data_std_dev The standard deviation of the data, with no priors effecting the result.
     *
     * @return self
     */
    public function setDataStdDev($data_std_dev)
    {
        $this->container['data_std_dev'] = $data_std_dev;

        return $this;
    }

    /**
     * Gets credible_interval
     *
     * @return \LaunchDarklyApi\Model\CredibleIntervalRep|null
     */
    public function getCredibleInterval()
    {
        return $this->container['credible_interval'];
    }

    /**
     * Sets credible_interval
     *
     * @param \LaunchDarklyApi\Model\CredibleIntervalRep|null $credible_interval credible_interval
     *
     * @return self
     */
    public function setCredibleInterval($credible_interval)
    {
        $this->container['credible_interval'] = $credible_interval;

        return $this;
    }

    /**
     * Gets p_best
     *
     * @return float|null
     */
    public function getPBest()
    {
        return $this->container['p_best'];
    }

    /**
     * Sets p_best
     *
     * @param float|null $p_best The likelihood that this variation has the biggest effect on the primary metric. The variation with the highest probability is likely the best of the variations you're testing
     *
     * @return self
     */
    public function setPBest($p_best)
    {
        $this->container['p_best'] = $p_best;

        return $this;
    }

    /**
     * Gets relative_differences
     *
     * @return \LaunchDarklyApi\Model\RelativeDifferenceRep[]|null
     */
    public function getRelativeDifferences()
    {
        return $this->container['relative_differences'];
    }

    /**
     * Sets relative_differences
     *
     * @param \LaunchDarklyApi\Model\RelativeDifferenceRep[]|null $relative_differences Estimates of the relative difference between this treatment's mean and the mean of each other treatment
     *
     * @return self
     */
    public function setRelativeDifferences($relative_differences)
    {
        $this->container['relative_differences'] = $relative_differences;

        return $this;
    }

    /**
     * Gets units
     *
     * @return int|null
     */
    public function getUnits()
    {
        return $this->container['units'];
    }

    /**
     * Sets units
     *
     * @param int|null $units The number of units exposed to this treatment that have event values, including those that are configured to default to 0
     *
     * @return self
     */
    public function setUnits($units)
    {
        $this->container['units'] = $units;

        return $this;
    }

    /**
     * Gets traffic
     *
     * @return int|null
     */
    public function getTraffic()
    {
        return $this->container['traffic'];
    }

    /**
     * Sets traffic
     *
     * @param int|null $traffic The number of units exposed to this treatment.
     *
     * @return self
     */
    public function setTraffic($traffic)
    {
        $this->container['traffic'] = $traffic;

        return $this;
    }

    /**
     * Gets event_values_sum
     *
     * @return float|null
     */
    public function getEventValuesSum()
    {
        return $this->container['event_values_sum'];
    }

    /**
     * Sets event_values_sum
     *
     * @param float|null $event_values_sum The sum of the event values for the units exposed to this treatment.
     *
     * @return self
     */
    public function setEventValuesSum($event_values_sum)
    {
        $this->container['event_values_sum'] = $event_values_sum;

        return $this;
    }

    /**
     * Gets distribution
     *
     * @return \LaunchDarklyApi\Model\Distribution|null
     */
    public function getDistribution()
    {
        return $this->container['distribution'];
    }

    /**
     * Sets distribution
     *
     * @param \LaunchDarklyApi\Model\Distribution|null $distribution distribution
     *
     * @return self
     */
    public function setDistribution($distribution)
    {
        $this->container['distribution'] = $distribution;

        return $this;
    }

    /**
     * Gets correlation
     *
     * @return float|null
     */
    public function getCorrelation()
    {
        return $this->container['correlation'];
    }

    /**
     * Sets correlation
     *
     * @param float|null $correlation The outcome-covariate correlation
     *
     * @return self
     */
    public function setCorrelation($correlation)
    {
        $this->container['correlation'] = $correlation;

        return $this;
    }

    /**
     * Gets standard_deviation_ratio
     *
     * @return float|null
     */
    public function getStandardDeviationRatio()
    {
        return $this->container['standard_deviation_ratio'];
    }

    /**
     * Sets standard_deviation_ratio
     *
     * @param float|null $standard_deviation_ratio The ratio of the outcome SD to covariate SD
     *
     * @return self
     */
    public function setStandardDeviationRatio($standard_deviation_ratio)
    {
        $this->container['standard_deviation_ratio'] = $standard_deviation_ratio;

        return $this;
    }

    /**
     * Gets covariate_imbalance
     *
     * @return float|null
     */
    public function getCovariateImbalance()
    {
        return $this->container['covariate_imbalance'];
    }

    /**
     * Sets covariate_imbalance
     *
     * @param float|null $covariate_imbalance The imbalance between the covariate mean for the arm and the covariate mean for the experiment
     *
     * @return self
     */
    public function setCovariateImbalance($covariate_imbalance)
    {
        $this->container['covariate_imbalance'] = $covariate_imbalance;

        return $this;
    }

    /**
     * Gets variance_reduction
     *
     * @return float|null
     */
    public function getVarianceReduction()
    {
        return $this->container['variance_reduction'];
    }

    /**
     * Sets variance_reduction
     *
     * @param float|null $variance_reduction The reduction in variance resulting from CUPED
     *
     * @return self
     */
    public function setVarianceReduction($variance_reduction)
    {
        $this->container['variance_reduction'] = $variance_reduction;

        return $this;
    }

    /**
     * Gets model
     *
     * @return string|null
     */
    public function getModel()
    {
        return $this->container['model'];
    }

    /**
     * Sets model
     *
     * @param string|null $model The model used to calculate the results. Parameters specific to this model will be defined under the field under the same name
     *
     * @return self
     */
    public function setModel($model)
    {
        $allowedValues = $this->getModelAllowableValues();
        if (!is_null($model) && !in_array($model, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'model', must be one of '%s'",
                    $model,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['model'] = $model;

        return $this;
    }

    /**
     * Gets bayesian_normal
     *
     * @return \LaunchDarklyApi\Model\BayesianNormalStatsRep|null
     */
    public function getBayesianNormal()
    {
        return $this->container['bayesian_normal'];
    }

    /**
     * Sets bayesian_normal
     *
     * @param \LaunchDarklyApi\Model\BayesianNormalStatsRep|null $bayesian_normal bayesian_normal
     *
     * @return self
     */
    public function setBayesianNormal($bayesian_normal)
    {
        $this->container['bayesian_normal'] = $bayesian_normal;

        return $this;
    }

    /**
     * Gets bayesian_beta
     *
     * @return \LaunchDarklyApi\Model\BayesianBetaBinomialStatsRep|null
     */
    public function getBayesianBeta()
    {
        return $this->container['bayesian_beta'];
    }

    /**
     * Sets bayesian_beta
     *
     * @param \LaunchDarklyApi\Model\BayesianBetaBinomialStatsRep|null $bayesian_beta bayesian_beta
     *
     * @return self
     */
    public function setBayesianBeta($bayesian_beta)
    {
        $this->container['bayesian_beta'] = $bayesian_beta;

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


