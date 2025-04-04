<?php
/**
 * AccountUsageBetaApi
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

namespace LaunchDarklyApi\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use LaunchDarklyApi\ApiException;
use LaunchDarklyApi\Configuration;
use LaunchDarklyApi\HeaderSelector;
use LaunchDarklyApi\ObjectSerializer;

/**
 * AccountUsageBetaApi Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AccountUsageBetaApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getDataExportEventsUsage
     *
     * Get data export events usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable
     */
    public function getDataExportEventsUsage($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        list($response) = $this->getDataExportEventsUsageWithHttpInfo($from, $to, $project_key, $environment_key);
        return $response;
    }

    /**
     * Operation getDataExportEventsUsageWithHttpInfo
     *
     * Get data export events usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDataExportEventsUsageWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $request = $this->getDataExportEventsUsageRequest($from, $to, $project_key, $environment_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesIntervalsRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatusServiceUnavailable', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesIntervalsRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusServiceUnavailable',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDataExportEventsUsageAsync
     *
     * Get data export events usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDataExportEventsUsageAsync($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        return $this->getDataExportEventsUsageAsyncWithHttpInfo($from, $to, $project_key, $environment_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDataExportEventsUsageAsyncWithHttpInfo
     *
     * Get data export events usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDataExportEventsUsageAsyncWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
        $request = $this->getDataExportEventsUsageRequest($from, $to, $project_key, $environment_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getDataExportEventsUsage'
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDataExportEventsUsageRequest($from = null, $to = null, $project_key = null, $environment_key = null)
    {

        $resourcePath = '/api/v2/usage/data-export-events';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $project_key,
            'projectKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $environment_key,
            'environmentKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getEvaluationsUsage
     *
     * Get evaluations usage
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getEvaluationsUsage($project_key, $environment_key, $feature_flag_key, $from = null, $to = null, $tz = null)
    {
        list($response) = $this->getEvaluationsUsageWithHttpInfo($project_key, $environment_key, $feature_flag_key, $from, $to, $tz);
        return $response;
    }

    /**
     * Operation getEvaluationsUsageWithHttpInfo
     *
     * Get evaluations usage
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getEvaluationsUsageWithHttpInfo($project_key, $environment_key, $feature_flag_key, $from = null, $to = null, $tz = null)
    {
        $request = $this->getEvaluationsUsageRequest($project_key, $environment_key, $feature_flag_key, $from, $to, $tz);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\LaunchDarklyApi\Model\NotFoundErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\NotFoundErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\NotFoundErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getEvaluationsUsageAsync
     *
     * Get evaluations usage
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getEvaluationsUsageAsync($project_key, $environment_key, $feature_flag_key, $from = null, $to = null, $tz = null)
    {
        return $this->getEvaluationsUsageAsyncWithHttpInfo($project_key, $environment_key, $feature_flag_key, $from, $to, $tz)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getEvaluationsUsageAsyncWithHttpInfo
     *
     * Get evaluations usage
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getEvaluationsUsageAsyncWithHttpInfo($project_key, $environment_key, $feature_flag_key, $from = null, $to = null, $tz = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
        $request = $this->getEvaluationsUsageRequest($project_key, $environment_key, $feature_flag_key, $from, $to, $tz);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getEvaluationsUsage'
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getEvaluationsUsageRequest($project_key, $environment_key, $feature_flag_key, $from = null, $to = null, $tz = null)
    {
        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling getEvaluationsUsage'
            );
        }
        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling getEvaluationsUsage'
            );
        }
        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling getEvaluationsUsage'
            );
        }

        $resourcePath = '/api/v2/usage/evaluations/{projectKey}/{environmentKey}/{featureFlagKey}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $tz,
            'tz', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($project_key !== null) {
            $resourcePath = str_replace(
                '{' . 'projectKey' . '}',
                ObjectSerializer::toPathValue($project_key),
                $resourcePath
            );
        }
        // path params
        if ($environment_key !== null) {
            $resourcePath = str_replace(
                '{' . 'environmentKey' . '}',
                ObjectSerializer::toPathValue($environment_key),
                $resourcePath
            );
        }
        // path params
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getEventsUsage
     *
     * Get events usage
     *
     * @param  string $type The type of event to retrieve. Must be either &#x60;received&#x60; or &#x60;published&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getEventsUsage($type, $from = null, $to = null)
    {
        list($response) = $this->getEventsUsageWithHttpInfo($type, $from, $to);
        return $response;
    }

    /**
     * Operation getEventsUsageWithHttpInfo
     *
     * Get events usage
     *
     * @param  string $type The type of event to retrieve. Must be either &#x60;received&#x60; or &#x60;published&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getEventsUsageWithHttpInfo($type, $from = null, $to = null)
    {
        $request = $this->getEventsUsageRequest($type, $from, $to);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\LaunchDarklyApi\Model\NotFoundErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\NotFoundErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\NotFoundErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getEventsUsageAsync
     *
     * Get events usage
     *
     * @param  string $type The type of event to retrieve. Must be either &#x60;received&#x60; or &#x60;published&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getEventsUsageAsync($type, $from = null, $to = null)
    {
        return $this->getEventsUsageAsyncWithHttpInfo($type, $from, $to)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getEventsUsageAsyncWithHttpInfo
     *
     * Get events usage
     *
     * @param  string $type The type of event to retrieve. Must be either &#x60;received&#x60; or &#x60;published&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getEventsUsageAsyncWithHttpInfo($type, $from = null, $to = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
        $request = $this->getEventsUsageRequest($type, $from, $to);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getEventsUsage'
     *
     * @param  string $type The type of event to retrieve. Must be either &#x60;received&#x60; or &#x60;published&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getEventsUsageRequest($type, $from = null, $to = null)
    {
        // verify the required parameter 'type' is set
        if ($type === null || (is_array($type) && count($type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $type when calling getEventsUsage'
            );
        }

        $resourcePath = '/api/v2/usage/events/{type}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($type !== null) {
            $resourcePath = str_replace(
                '{' . 'type' . '}',
                ObjectSerializer::toPathValue($type),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getExperimentationKeysUsage
     *
     * Get experimentation keys usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable
     */
    public function getExperimentationKeysUsage($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        list($response) = $this->getExperimentationKeysUsageWithHttpInfo($from, $to, $project_key, $environment_key);
        return $response;
    }

    /**
     * Operation getExperimentationKeysUsageWithHttpInfo
     *
     * Get experimentation keys usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable, HTTP status code, HTTP response headers (array of strings)
     */
    public function getExperimentationKeysUsageWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $request = $this->getExperimentationKeysUsageRequest($from, $to, $project_key, $environment_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesIntervalsRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatusServiceUnavailable', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesIntervalsRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusServiceUnavailable',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getExperimentationKeysUsageAsync
     *
     * Get experimentation keys usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExperimentationKeysUsageAsync($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        return $this->getExperimentationKeysUsageAsyncWithHttpInfo($from, $to, $project_key, $environment_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getExperimentationKeysUsageAsyncWithHttpInfo
     *
     * Get experimentation keys usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExperimentationKeysUsageAsyncWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
        $request = $this->getExperimentationKeysUsageRequest($from, $to, $project_key, $environment_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getExperimentationKeysUsage'
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getExperimentationKeysUsageRequest($from = null, $to = null, $project_key = null, $environment_key = null)
    {

        $resourcePath = '/api/v2/usage/experimentation-keys';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $project_key,
            'projectKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $environment_key,
            'environmentKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getExperimentationUnitsUsage
     *
     * Get experimentation units usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable
     */
    public function getExperimentationUnitsUsage($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        list($response) = $this->getExperimentationUnitsUsageWithHttpInfo($from, $to, $project_key, $environment_key);
        return $response;
    }

    /**
     * Operation getExperimentationUnitsUsageWithHttpInfo
     *
     * Get experimentation units usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable, HTTP status code, HTTP response headers (array of strings)
     */
    public function getExperimentationUnitsUsageWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $request = $this->getExperimentationUnitsUsageRequest($from, $to, $project_key, $environment_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesIntervalsRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatusServiceUnavailable', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesIntervalsRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusServiceUnavailable',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getExperimentationUnitsUsageAsync
     *
     * Get experimentation units usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExperimentationUnitsUsageAsync($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        return $this->getExperimentationUnitsUsageAsyncWithHttpInfo($from, $to, $project_key, $environment_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getExperimentationUnitsUsageAsyncWithHttpInfo
     *
     * Get experimentation units usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExperimentationUnitsUsageAsyncWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
        $request = $this->getExperimentationUnitsUsageRequest($from, $to, $project_key, $environment_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getExperimentationUnitsUsage'
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getExperimentationUnitsUsageRequest($from = null, $to = null, $project_key = null, $environment_key = null)
    {

        $resourcePath = '/api/v2/usage/experimentation-units';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $project_key,
            'projectKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $environment_key,
            'environmentKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMauSdksByType
     *
     * Get MAU SDKs by type
     *
     * @param  string $from The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000. (optional)
     * @param  string $to The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000. (optional)
     * @param  string $sdktype The type of SDK with monthly active users (MAU) to list. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SdkListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getMauSdksByType($from = null, $to = null, $sdktype = null)
    {
        list($response) = $this->getMauSdksByTypeWithHttpInfo($from, $to, $sdktype);
        return $response;
    }

    /**
     * Operation getMauSdksByTypeWithHttpInfo
     *
     * Get MAU SDKs by type
     *
     * @param  string $from The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000. (optional)
     * @param  string $to The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000. (optional)
     * @param  string $sdktype The type of SDK with monthly active users (MAU) to list. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SdkListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMauSdksByTypeWithHttpInfo($from = null, $to = null, $sdktype = null)
    {
        $request = $this->getMauSdksByTypeRequest($from, $to, $sdktype);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SdkListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SdkListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SdkListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SdkListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SdkListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMauSdksByTypeAsync
     *
     * Get MAU SDKs by type
     *
     * @param  string $from The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000. (optional)
     * @param  string $to The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000. (optional)
     * @param  string $sdktype The type of SDK with monthly active users (MAU) to list. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMauSdksByTypeAsync($from = null, $to = null, $sdktype = null)
    {
        return $this->getMauSdksByTypeAsyncWithHttpInfo($from, $to, $sdktype)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMauSdksByTypeAsyncWithHttpInfo
     *
     * Get MAU SDKs by type
     *
     * @param  string $from The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000. (optional)
     * @param  string $to The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000. (optional)
     * @param  string $sdktype The type of SDK with monthly active users (MAU) to list. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMauSdksByTypeAsyncWithHttpInfo($from = null, $to = null, $sdktype = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SdkListRep';
        $request = $this->getMauSdksByTypeRequest($from, $to, $sdktype);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMauSdksByType'
     *
     * @param  string $from The data returned starts from this timestamp. Defaults to seven days ago. The timestamp is in Unix milliseconds, for example, 1656694800000. (optional)
     * @param  string $to The data returned ends at this timestamp. Defaults to the current time. The timestamp is in Unix milliseconds, for example, 1657904400000. (optional)
     * @param  string $sdktype The type of SDK with monthly active users (MAU) to list. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getMauSdksByTypeRequest($from = null, $to = null, $sdktype = null)
    {

        $resourcePath = '/api/v2/usage/mau/sdks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sdktype,
            'sdktype', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMauUsage
     *
     * Get MAU usage
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $project A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects. (optional)
     * @param  string $environment An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project. (optional)
     * @param  string $sdktype An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server (optional)
     * @param  string $sdk An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK. (optional)
     * @param  string $anonymous If specified, filters results to either anonymous or nonanonymous users. (optional)
     * @param  string $groupby If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId (optional)
     * @param  string $aggregation_type If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental (optional)
     * @param  string $context_kind Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getMauUsage($from = null, $to = null, $project = null, $environment = null, $sdktype = null, $sdk = null, $anonymous = null, $groupby = null, $aggregation_type = null, $context_kind = null)
    {
        list($response) = $this->getMauUsageWithHttpInfo($from, $to, $project, $environment, $sdktype, $sdk, $anonymous, $groupby, $aggregation_type, $context_kind);
        return $response;
    }

    /**
     * Operation getMauUsageWithHttpInfo
     *
     * Get MAU usage
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $project A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects. (optional)
     * @param  string $environment An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project. (optional)
     * @param  string $sdktype An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server (optional)
     * @param  string $sdk An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK. (optional)
     * @param  string $anonymous If specified, filters results to either anonymous or nonanonymous users. (optional)
     * @param  string $groupby If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId (optional)
     * @param  string $aggregation_type If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental (optional)
     * @param  string $context_kind Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMauUsageWithHttpInfo($from = null, $to = null, $project = null, $environment = null, $sdktype = null, $sdk = null, $anonymous = null, $groupby = null, $aggregation_type = null, $context_kind = null)
    {
        $request = $this->getMauUsageRequest($from, $to, $project, $environment, $sdktype, $sdk, $anonymous, $groupby, $aggregation_type, $context_kind);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMauUsageAsync
     *
     * Get MAU usage
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $project A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects. (optional)
     * @param  string $environment An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project. (optional)
     * @param  string $sdktype An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server (optional)
     * @param  string $sdk An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK. (optional)
     * @param  string $anonymous If specified, filters results to either anonymous or nonanonymous users. (optional)
     * @param  string $groupby If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId (optional)
     * @param  string $aggregation_type If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental (optional)
     * @param  string $context_kind Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMauUsageAsync($from = null, $to = null, $project = null, $environment = null, $sdktype = null, $sdk = null, $anonymous = null, $groupby = null, $aggregation_type = null, $context_kind = null)
    {
        return $this->getMauUsageAsyncWithHttpInfo($from, $to, $project, $environment, $sdktype, $sdk, $anonymous, $groupby, $aggregation_type, $context_kind)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMauUsageAsyncWithHttpInfo
     *
     * Get MAU usage
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $project A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects. (optional)
     * @param  string $environment An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project. (optional)
     * @param  string $sdktype An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server (optional)
     * @param  string $sdk An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK. (optional)
     * @param  string $anonymous If specified, filters results to either anonymous or nonanonymous users. (optional)
     * @param  string $groupby If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId (optional)
     * @param  string $aggregation_type If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental (optional)
     * @param  string $context_kind Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMauUsageAsyncWithHttpInfo($from = null, $to = null, $project = null, $environment = null, $sdktype = null, $sdk = null, $anonymous = null, $groupby = null, $aggregation_type = null, $context_kind = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
        $request = $this->getMauUsageRequest($from, $to, $project, $environment, $sdktype, $sdk, $anonymous, $groupby, $aggregation_type, $context_kind);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMauUsage'
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $project A project key to filter results to. Can be specified multiple times, one query parameter per project key, to view data for multiple projects. (optional)
     * @param  string $environment An environment key to filter results to. When using this parameter, exactly one project key must also be set. Can be specified multiple times as separate query parameters to view data for multiple environments within a single project. (optional)
     * @param  string $sdktype An SDK type to filter results to. Can be specified multiple times, one query parameter per SDK type. Valid values: client, server (optional)
     * @param  string $sdk An SDK name to filter results to. Can be specified multiple times, one query parameter per SDK. (optional)
     * @param  string $anonymous If specified, filters results to either anonymous or nonanonymous users. (optional)
     * @param  string $groupby If specified, returns data for each distinct value of the given field. Can be specified multiple times to group data by multiple dimensions (for example, to group by both project and SDK). Valid values: project, environment, sdktype, sdk, anonymous, contextKind, sdkAppId (optional)
     * @param  string $aggregation_type If specified, queries for rolling 30-day, month-to-date, or daily incremental counts. Default is rolling 30-day. Valid values: rolling_30d, month_to_date, daily_incremental (optional)
     * @param  string $context_kind Filters results to the specified context kinds. Can be specified multiple times, one query parameter per context kind. If not set, queries for the user context kind. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getMauUsageRequest($from = null, $to = null, $project = null, $environment = null, $sdktype = null, $sdk = null, $anonymous = null, $groupby = null, $aggregation_type = null, $context_kind = null)
    {

        $resourcePath = '/api/v2/usage/mau';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $project,
            'project', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $environment,
            'environment', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sdktype,
            'sdktype', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sdk,
            'sdk', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $anonymous,
            'anonymous', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $groupby,
            'groupby', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $aggregation_type,
            'aggregationType', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $context_kind,
            'contextKind', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMauUsageByCategory
     *
     * Get MAU usage by category
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getMauUsageByCategory($from = null, $to = null)
    {
        list($response) = $this->getMauUsageByCategoryWithHttpInfo($from, $to);
        return $response;
    }

    /**
     * Operation getMauUsageByCategoryWithHttpInfo
     *
     * Get MAU usage by category
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMauUsageByCategoryWithHttpInfo($from = null, $to = null)
    {
        $request = $this->getMauUsageByCategoryRequest($from, $to);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\LaunchDarklyApi\Model\NotFoundErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\NotFoundErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\NotFoundErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMauUsageByCategoryAsync
     *
     * Get MAU usage by category
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMauUsageByCategoryAsync($from = null, $to = null)
    {
        return $this->getMauUsageByCategoryAsyncWithHttpInfo($from, $to)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMauUsageByCategoryAsyncWithHttpInfo
     *
     * Get MAU usage by category
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMauUsageByCategoryAsyncWithHttpInfo($from = null, $to = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
        $request = $this->getMauUsageByCategoryRequest($from, $to);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getMauUsageByCategory'
     *
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getMauUsageByCategoryRequest($from = null, $to = null)
    {

        $resourcePath = '/api/v2/usage/mau/bycategory';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getServiceConnectionUsage
     *
     * Get service connection usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable
     */
    public function getServiceConnectionUsage($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        list($response) = $this->getServiceConnectionUsageWithHttpInfo($from, $to, $project_key, $environment_key);
        return $response;
    }

    /**
     * Operation getServiceConnectionUsageWithHttpInfo
     *
     * Get service connection usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesIntervalsRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep|\LaunchDarklyApi\Model\StatusServiceUnavailable, HTTP status code, HTTP response headers (array of strings)
     */
    public function getServiceConnectionUsageWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $request = $this->getServiceConnectionUsageRequest($from, $to, $project_key, $environment_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesIntervalsRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesIntervalsRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 503:
                    if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\StatusServiceUnavailable' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatusServiceUnavailable', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesIntervalsRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 503:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusServiceUnavailable',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getServiceConnectionUsageAsync
     *
     * Get service connection usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getServiceConnectionUsageAsync($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        return $this->getServiceConnectionUsageAsyncWithHttpInfo($from, $to, $project_key, $environment_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getServiceConnectionUsageAsyncWithHttpInfo
     *
     * Get service connection usage
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getServiceConnectionUsageAsyncWithHttpInfo($from = null, $to = null, $project_key = null, $environment_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesIntervalsRep';
        $request = $this->getServiceConnectionUsageRequest($from, $to, $project_key, $environment_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getServiceConnectionUsage'
     *
     * @param  string $from The series of data returned starts from this timestamp (Unix seconds). Defaults to the beginning of the current month. (optional)
     * @param  string $to The series of data returned ends at this timestamp (Unix seconds). Defaults to the current time. (optional)
     * @param  string $project_key A project key. If specified, &#x60;environmentKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     * @param  string $environment_key An environment key. If specified, &#x60;projectKey&#x60; is required and results apply to the corresponding environment in this project. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getServiceConnectionUsageRequest($from = null, $to = null, $project_key = null, $environment_key = null)
    {

        $resourcePath = '/api/v2/usage/service-connections';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $project_key,
            'projectKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $environment_key,
            'environmentKey', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getStreamUsage
     *
     * Get stream usage
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getStreamUsage($source, $from = null, $to = null, $tz = null)
    {
        list($response) = $this->getStreamUsageWithHttpInfo($source, $from, $to, $tz);
        return $response;
    }

    /**
     * Operation getStreamUsageWithHttpInfo
     *
     * Get stream usage
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStreamUsageWithHttpInfo($source, $from = null, $to = null, $tz = null)
    {
        $request = $this->getStreamUsageRequest($source, $from, $to, $tz);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\LaunchDarklyApi\Model\NotFoundErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\NotFoundErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\NotFoundErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getStreamUsageAsync
     *
     * Get stream usage
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStreamUsageAsync($source, $from = null, $to = null, $tz = null)
    {
        return $this->getStreamUsageAsyncWithHttpInfo($source, $from, $to, $tz)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getStreamUsageAsyncWithHttpInfo
     *
     * Get stream usage
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStreamUsageAsyncWithHttpInfo($source, $from = null, $to = null, $tz = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
        $request = $this->getStreamUsageRequest($source, $from, $to, $tz);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getStreamUsage'
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 30 days ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getStreamUsageRequest($source, $from = null, $to = null, $tz = null)
    {
        // verify the required parameter 'source' is set
        if ($source === null || (is_array($source) && count($source) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source when calling getStreamUsage'
            );
        }

        $resourcePath = '/api/v2/usage/streams/{source}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $tz,
            'tz', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($source !== null) {
            $resourcePath = str_replace(
                '{' . 'source' . '}',
                ObjectSerializer::toPathValue($source),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getStreamUsageBySdkVersion
     *
     * Get stream usage by SDK version
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     * @param  string $sdk If included, this filters the returned series to only those that match this SDK name. (optional)
     * @param  string $version If included, this filters the returned series to only those that match this SDK version. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getStreamUsageBySdkVersion($source, $from = null, $to = null, $tz = null, $sdk = null, $version = null)
    {
        list($response) = $this->getStreamUsageBySdkVersionWithHttpInfo($source, $from, $to, $tz, $sdk, $version);
        return $response;
    }

    /**
     * Operation getStreamUsageBySdkVersionWithHttpInfo
     *
     * Get stream usage by SDK version
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     * @param  string $sdk If included, this filters the returned series to only those that match this SDK name. (optional)
     * @param  string $version If included, this filters the returned series to only those that match this SDK version. (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SeriesListRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStreamUsageBySdkVersionWithHttpInfo($source, $from = null, $to = null, $tz = null, $sdk = null, $version = null)
    {
        $request = $this->getStreamUsageBySdkVersionRequest($source, $from, $to, $tz, $sdk, $version);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SeriesListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SeriesListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SeriesListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\InvalidRequestErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\LaunchDarklyApi\Model\NotFoundErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\NotFoundErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\NotFoundErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SeriesListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getStreamUsageBySdkVersionAsync
     *
     * Get stream usage by SDK version
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     * @param  string $sdk If included, this filters the returned series to only those that match this SDK name. (optional)
     * @param  string $version If included, this filters the returned series to only those that match this SDK version. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStreamUsageBySdkVersionAsync($source, $from = null, $to = null, $tz = null, $sdk = null, $version = null)
    {
        return $this->getStreamUsageBySdkVersionAsyncWithHttpInfo($source, $from, $to, $tz, $sdk, $version)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getStreamUsageBySdkVersionAsyncWithHttpInfo
     *
     * Get stream usage by SDK version
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     * @param  string $sdk If included, this filters the returned series to only those that match this SDK name. (optional)
     * @param  string $version If included, this filters the returned series to only those that match this SDK version. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStreamUsageBySdkVersionAsyncWithHttpInfo($source, $from = null, $to = null, $tz = null, $sdk = null, $version = null)
    {
        $returnType = '\LaunchDarklyApi\Model\SeriesListRep';
        $request = $this->getStreamUsageBySdkVersionRequest($source, $from, $to, $tz, $sdk, $version);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getStreamUsageBySdkVersion'
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     * @param  string $from The series of data returned starts from this timestamp. Defaults to 24 hours ago. (optional)
     * @param  string $to The series of data returned ends at this timestamp. Defaults to the current time. (optional)
     * @param  string $tz The timezone to use for breaks between days when returning daily data. (optional)
     * @param  string $sdk If included, this filters the returned series to only those that match this SDK name. (optional)
     * @param  string $version If included, this filters the returned series to only those that match this SDK version. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getStreamUsageBySdkVersionRequest($source, $from = null, $to = null, $tz = null, $sdk = null, $version = null)
    {
        // verify the required parameter 'source' is set
        if ($source === null || (is_array($source) && count($source) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source when calling getStreamUsageBySdkVersion'
            );
        }

        $resourcePath = '/api/v2/usage/streams/{source}/bysdkversion';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $from,
            'from', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $to,
            'to', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $tz,
            'tz', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $sdk,
            'sdk', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $version,
            'version', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


        // path params
        if ($source !== null) {
            $resourcePath = str_replace(
                '{' . 'source' . '}',
                ObjectSerializer::toPathValue($source),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getStreamUsageSdkversion
     *
     * Get stream usage SDK versions
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\SdkVersionListRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getStreamUsageSdkversion($source)
    {
        list($response) = $this->getStreamUsageSdkversionWithHttpInfo($source);
        return $response;
    }

    /**
     * Operation getStreamUsageSdkversionWithHttpInfo
     *
     * Get stream usage SDK versions
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\SdkVersionListRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStreamUsageSdkversionWithHttpInfo($source)
    {
        $request = $this->getStreamUsageSdkversionRequest($source);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\LaunchDarklyApi\Model\SdkVersionListRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\SdkVersionListRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\SdkVersionListRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ForbiddenErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\SdkVersionListRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\SdkVersionListRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getStreamUsageSdkversionAsync
     *
     * Get stream usage SDK versions
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStreamUsageSdkversionAsync($source)
    {
        return $this->getStreamUsageSdkversionAsyncWithHttpInfo($source)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getStreamUsageSdkversionAsyncWithHttpInfo
     *
     * Get stream usage SDK versions
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStreamUsageSdkversionAsyncWithHttpInfo($source)
    {
        $returnType = '\LaunchDarklyApi\Model\SdkVersionListRep';
        $request = $this->getStreamUsageSdkversionRequest($source);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getStreamUsageSdkversion'
     *
     * @param  string $source The source of streaming connections to describe. Must be either &#x60;client&#x60; or &#x60;server&#x60;. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getStreamUsageSdkversionRequest($source)
    {
        // verify the required parameter 'source' is set
        if ($source === null || (is_array($source) && count($source) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source when calling getStreamUsageSdkversion'
            );
        }

        $resourcePath = '/api/v2/usage/streams/{source}/sdkversions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($source !== null) {
            $resourcePath = str_replace(
                '{' . 'source' . '}',
                ObjectSerializer::toPathValue($source),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
