<?php
/**
 * DataExportDestinationsApi
 * PHP version 8.1
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * LaunchDarkly REST API
 *
 * This documentation describes LaunchDarkly's REST API. To access the complete OpenAPI spec directly, use [Get OpenAPI spec](https://launchdarkly.com/docs/api/other/get-openapi-spec).  To learn how to use LaunchDarkly using the user interface (UI) instead, read our [product documentation](https://launchdarkly.com/docs/home).  ## Authentication  LaunchDarkly's REST API uses the HTTPS protocol with a minimum TLS version of 1.2.  All REST API resources are authenticated with either [personal or service access tokens](https://launchdarkly.com/docs/home/account/api), or session cookies. Other authentication mechanisms are not supported. You can manage personal access tokens on your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page in the LaunchDarkly UI.  LaunchDarkly also has SDK keys, mobile keys, and client-side IDs that are used by our server-side SDKs, mobile SDKs, and JavaScript-based SDKs, respectively. **These keys cannot be used to access our REST API**. These keys are environment-specific, and can only perform read-only operations such as fetching feature flag settings.  | Auth mechanism                                                                                  | Allowed resources                                                                                     | Use cases                                          | | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------- | | [Personal or service access tokens](https://launchdarkly.com/docs/home/account/api) | Can be customized on a per-token basis                                                                | Building scripts, custom integrations, data export. | | SDK keys                                                                                        | Can only access read-only resources specific to server-side SDKs. Restricted to a single environment. | Server-side SDKs                     | | Mobile keys                                                                                     | Can only access read-only resources specific to mobile SDKs, and only for flags marked available to mobile keys. Restricted to a single environment.           | Mobile SDKs                                        | | Client-side ID                                                                                  | Can only access read-only resources specific to JavaScript-based client-side SDKs, and only for flags marked available to client-side. Restricted to a single environment.           | Client-side JavaScript                             |  > #### Keep your access tokens and SDK keys private > > Access tokens should _never_ be exposed in untrusted contexts. Never put an access token in client-side JavaScript, or embed it in a mobile application. LaunchDarkly has special mobile keys that you can embed in mobile apps. If you accidentally expose an access token or SDK key, you can reset it from your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page. > > The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.  ### Authentication using request header  The preferred way to authenticate with the API is by adding an `Authorization` header containing your access token to your requests. The value of the `Authorization` header must be your access token.  Manage personal access tokens from the [**Authorization**](https://app.launchdarkly.com/settings/authorization) page.  ### Authentication using session cookie  For testing purposes, you can make API calls directly from your web browser. If you are logged in to the LaunchDarkly application, the API will use your existing session to authenticate calls.  Depending on the permissions granted as part of your [role](https://launchdarkly.com/docs/home/account/roles), you may not have permission to perform some API calls. You will receive a `401` response code in that case.  > ### Modifying the Origin header causes an error > > LaunchDarkly validates that the Origin header for any API request authenticated by a session cookie matches the expected Origin header. The expected Origin header is `https://app.launchdarkly.com`. > > If the Origin header does not match what's expected, LaunchDarkly returns an error. This error can prevent the LaunchDarkly app from working correctly. > > Any browser extension that intentionally changes the Origin header can cause this problem. For example, the `Allow-Control-Allow-Origin: *` Chrome extension changes the Origin header to `http://evil.com` and causes the app to fail. > > To prevent this error, do not modify your Origin header. > > LaunchDarkly does not require origin matching when authenticating with an access token, so this issue does not affect normal API usage.  ## Representations  All resources expect and return JSON response bodies. Error responses also send a JSON body. To learn more about the error format of the API, read [Errors](https://launchdarkly.com/docs/api#errors).  In practice this means that you always get a response with a `Content-Type` header set to `application/json`.  In addition, request bodies for `PATCH`, `POST`, and `PUT` requests must be encoded as JSON with a `Content-Type` header set to `application/json`.  ### Summary and detailed representations  When you fetch a list of resources, the response includes only the most important attributes of each resource. This is a _summary representation_ of the resource. When you fetch an individual resource, such as a single feature flag, you receive a _detailed representation_ of the resource.  The best way to find a detailed representation is to follow links. Every summary representation includes a link to its detailed representation.  ### Expanding responses  Sometimes the detailed representation of a resource does not include all of the attributes of the resource by default. If this is the case, the request method will clearly document this and describe which attributes you can include in an expanded response.  To include the additional attributes, append the `expand` request parameter to your request and add a comma-separated list of the attributes to include. For example, when you append `?expand=members,maintainers` to the [Get team](https://launchdarkly.com/docs/api/teams/get-team) endpoint, the expanded response includes both of these attributes.  ### Links and addressability  The best way to navigate the API is by following links. These are attributes in representations that link to other resources. The API always uses the same format for links:  - Links to other resources within the API are encapsulated in a `_links` object - If the resource has a corresponding link to HTML content on the site, it is stored in a special `_site` link  Each link has two attributes:  - An `href`, which contains the URL - A `type`, which describes the content type  For example, a feature resource might return the following:  ```json {   \"_links\": {     \"parent\": {       \"href\": \"/api/features\",       \"type\": \"application/json\"     },     \"self\": {       \"href\": \"/api/features/sort.order\",       \"type\": \"application/json\"     }   },   \"_site\": {     \"href\": \"/features/sort.order\",     \"type\": \"text/html\"   } } ```  From this, you can navigate to the parent collection of features by following the `parent` link, or navigate to the site page for the feature by following the `_site` link.  Collections are always represented as a JSON object with an `items` attribute containing an array of representations. Like all other representations, collections have `_links` defined at the top level.  Paginated collections include `first`, `last`, `next`, and `prev` links containing a URL with the respective set of elements in the collection.  ## Updates  Resources that accept partial updates use the `PATCH` verb. Most resources support the [JSON patch](https://launchdarkly.com/docs/api#updates-using-json-patch) format. Some resources also support the [JSON merge patch](https://launchdarkly.com/docs/api#updates-using-json-merge-patch) format, and some resources support the [semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch) format, which is a way to specify the modifications to perform as a set of executable instructions. Each resource supports optional [comments](https://launchdarkly.com/docs/api#updates-with-comments) that you can submit with updates. Comments appear in outgoing webhooks, the audit log, and other integrations.  When a resource supports both JSON patch and semantic patch, we document both in the request method. However, the specific request body fields and descriptions included in our documentation only match one type of patch or the other.  ### Updates using JSON patch  [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) is a way to specify the modifications to perform on a resource. JSON patch uses paths and a limited set of operations to describe how to transform the current state of the resource into a new state. JSON patch documents are always arrays, where each element contains an operation, a path to the field to update, and the new value.  For example, in this feature flag representation:  ```json {     \"name\": \"New recommendations engine\",     \"key\": \"engine.enable\",     \"description\": \"This is the description\",     ... } ``` You can change the feature flag's description with the following patch document:  ```json [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"This is the new description\" }] ```  You can specify multiple modifications to perform in a single request. You can also test that certain preconditions are met before applying the patch:  ```json [   { \"op\": \"test\", \"path\": \"/version\", \"value\": 10 },   { \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" } ] ```  The above patch request tests whether the feature flag's `version` is `10`, and if so, changes the feature flag's description.  Attributes that are not editable, such as a resource's `_links`, have names that start with an underscore.  ### Updates using JSON merge patch  [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) is another format for specifying the modifications to perform on a resource. JSON merge patch is less expressive than JSON patch. However, in many cases it is simpler to construct a merge patch document. For example, you can change a feature flag's description with the following merge patch document:  ```json {   \"description\": \"New flag description\" } ```  ### Updates using semantic patch  Some resources support the semantic patch format. A semantic patch is a way to specify the modifications to perform on a resource as a set of executable instructions.  Semantic patch allows you to be explicit about intent using precise, custom instructions. In many cases, you can define semantic patch instructions independently of the current state of the resource. This can be useful when defining a change that may be applied at a future date.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header.  Here's how:  ``` Content-Type: application/json; domain-model=launchdarkly.semanticpatch ```  If you call a semantic patch resource without this header, you will receive a `400` response because your semantic patch will be interpreted as a JSON patch.  The body of a semantic patch request takes the following properties:  * `comment` (string): (Optional) A description of the update. * `environmentKey` (string): (Required for some resources only) The environment key. * `instructions` (array): (Required) A list of actions the update should perform. Each action in the list must be an object with a `kind` property that indicates the instruction. If the instruction requires parameters, you must include those parameters as additional fields in the object. The documentation for each resource that supports semantic patch includes the available instructions and any additional parameters.  For example:  ```json {   \"comment\": \"optional comment\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  Semantic patches are not applied partially; either all of the instructions are applied or none of them are. If **any** instruction is invalid, the endpoint returns an error and will not change the resource. If all instructions are valid, the request succeeds and the resources are updated if necessary, or left unchanged if they are already in the state you request.  ### Updates with comments  You can submit optional comments with `PATCH` changes.  To submit a comment along with a JSON patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"patch\": [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" }] } ```  To submit a comment along with a JSON merge patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"merge\": { \"description\": \"New flag description\" } } ```  To submit a comment along with a semantic patch, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  ## Errors  The API always returns errors in a common format. Here's an example:  ```json {   \"code\": \"invalid_request\",   \"message\": \"A feature with that key already exists\",   \"id\": \"30ce6058-87da-11e4-b116-123b93f75cba\" } ```  The `code` indicates the general class of error. The `message` is a human-readable explanation of what went wrong. The `id` is a unique identifier. Use it when you're working with LaunchDarkly Support to debug a problem with a specific API call.  ### HTTP status error response codes  | Code | Definition        | Description                                                                                       | Possible Solution                                                | | ---- | ----------------- | ------------------------------------------------------------------------------------------- | ---------------------------------------------------------------- | | 400  | Invalid request       | The request cannot be understood.                                    | Ensure JSON syntax in request body is correct.                   | | 401  | Invalid access token      | Requestor is unauthorized or does not have permission for this API call.                                                | Ensure your API access token is valid and has the appropriate permissions.                                     | | 403  | Forbidden         | Requestor does not have access to this resource.                                                | Ensure that the account member or access token has proper permissions set. | | 404  | Invalid resource identifier | The requested resource is not valid. | Ensure that the resource is correctly identified by ID or key. | | 405  | Method not allowed | The request method is not allowed on this resource. | Ensure that the HTTP verb is correct. | | 409  | Conflict          | The API request can not be completed because it conflicts with a concurrent API request. | Retry your request.                                              | | 422  | Unprocessable entity | The API request can not be completed because the update description can not be understood. | Ensure that the request body is correct for the type of patch you are using, either JSON patch or semantic patch. | 429  | Too many requests | Read [Rate limiting](https://launchdarkly.com/docs/api#rate-limiting).                                               | Wait and try again later.                                        |  ## CORS  The LaunchDarkly API supports Cross Origin Resource Sharing (CORS) for AJAX requests from any origin. If an `Origin` header is given in a request, it will be echoed as an explicitly allowed origin. Otherwise the request returns a wildcard, `Access-Control-Allow-Origin: *`. For more information on CORS, read the [CORS W3C Recommendation](http://www.w3.org/TR/cors). Example CORS headers might look like:  ```http Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, Authorization Access-Control-Allow-Methods: OPTIONS, GET, DELETE, PATCH Access-Control-Allow-Origin: * Access-Control-Max-Age: 300 ```  You can make authenticated CORS calls just as you would make same-origin calls, using either [token or session-based authentication](https://launchdarkly.com/docs/api#authentication). If you are using session authentication, you should set the `withCredentials` property for your `xhr` request to `true`. You should never expose your access tokens to untrusted entities.  ## Rate limiting  We use several rate limiting strategies to ensure the availability of our APIs. Rate-limited calls to our APIs return a `429` status code. Calls to our APIs include headers indicating the current rate limit status. The specific headers returned depend on the API route being called. The limits differ based on the route, authentication mechanism, and other factors. Routes that are not rate limited may not contain any of the headers described below.  > ### Rate limiting and SDKs > > LaunchDarkly SDKs are never rate limited and do not use the API endpoints defined here. LaunchDarkly uses a different set of approaches, including streaming/server-sent events and a global CDN, to ensure availability to the routes used by LaunchDarkly SDKs.  ### Global rate limits  Authenticated requests are subject to a global limit. This is the maximum number of calls that your account can make to the API per ten seconds. All service and personal access tokens on the account share this limit, so exceeding the limit with one access token will impact other tokens. Calls that are subject to global rate limits may return the headers below:  | Header name                    | Description                                                                      | | ------------------------------ | -------------------------------------------------------------------------------- | | `X-Ratelimit-Global-Remaining` | The maximum number of requests the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`            | The time at which the current rate limit window resets in epoch milliseconds.    |  We do not publicly document the specific number of calls that can be made globally. This limit may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limit.  ### Route-level rate limits  Some authenticated routes have custom rate limits. These also reset every ten seconds. Any service or personal access tokens hitting the same route share this limit, so exceeding the limit with one access token may impact other tokens. Calls that are subject to route-level rate limits return the headers below:  | Header name                   | Description                                                                                           | | ----------------------------- | ----------------------------------------------------------------------------------------------------- | | `X-Ratelimit-Route-Remaining` | The maximum number of requests to the current route the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`           | The time at which the current rate limit window resets in epoch milliseconds.                         |  A _route_ represents a specific URL pattern and verb. For example, the [Delete environment](https://launchdarkly.com/docs/api/environments/delete-environment) endpoint is considered a single route, and each call to delete an environment counts against your route-level rate limit for that route.  We do not publicly document the specific number of calls that an account can make to each endpoint per ten seconds. These limits may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limits.  ### IP-based rate limiting  We also employ IP-based rate limiting on some API routes. If you hit an IP-based rate limit, your API response will include a `Retry-After` header indicating how long to wait before re-trying the call. Clients must wait at least `Retry-After` seconds before making additional calls to our API, and should employ jitter and backoff strategies to avoid triggering rate limits again.  ## OpenAPI (Swagger) and client libraries  We have a [complete OpenAPI (Swagger) specification](https://app.launchdarkly.com/api/v2/openapi.json) for our API.  We auto-generate multiple client libraries based on our OpenAPI specification. To learn more, visit the [collection of client libraries on GitHub](https://github.com/search?q=topic%3Alaunchdarkly-api+org%3Alaunchdarkly&type=Repositories). You can also use this specification to generate client libraries to interact with our REST API in your language of choice.  Our OpenAPI specification is supported by several API-based tools such as Postman and Insomnia. In many cases, you can directly import our specification to explore our APIs.  ## Method overriding  Some firewalls and HTTP clients restrict the use of verbs other than `GET` and `POST`. In those environments, our API endpoints that use `DELETE`, `PATCH`, and `PUT` verbs are inaccessible.  To avoid this issue, our API supports the `X-HTTP-Method-Override` header, allowing clients to \"tunnel\" `DELETE`, `PATCH`, and `PUT` requests using a `POST` request.  For example, to call a `PATCH` endpoint using a `POST` request, you can include `X-HTTP-Method-Override:PATCH` as a header.  ## Beta resources  We sometimes release new API resources in **beta** status before we release them with general availability.  Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  We try to promote resources into general availability as quickly as possible. This happens after sufficient testing and when we're satisfied that we no longer need to make backwards-incompatible changes.  We mark beta resources with a \"Beta\" callout in our documentation, pictured below:  > ### This feature is in beta > > To use this feature, pass in a header including the `LD-API-Version` key with value set to `beta`. Use this header with each call. To learn more, read [Beta resources](https://launchdarkly.com/docs/api#beta-resources). > > Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  ### Using beta resources  To use a beta resource, you must include a header in the request. If you call a beta resource without this header, you receive a `403` response.  Use this header:  ``` LD-API-Version: beta ```  ## Federal and EU environments  In addition to the commercial versions, LaunchDarkly offers instances for federal agencies and those based in the European Union (EU).  ### Federal environments  The version of LaunchDarkly that is available on domains controlled by the United States government is different from the version of LaunchDarkly available to the general public. If you are an employee or contractor for a United States federal agency and use LaunchDarkly in your work, you likely use the federal instance of LaunchDarkly.  If you are working in the federal instance of LaunchDarkly, the base URI for each request is `https://app.launchdarkly.us`.  To learn more, read [LaunchDarkly in federal environments](https://launchdarkly.com/docs/home/infrastructure/federal).  ### EU environments  The version of LaunchDarkly that is available in the EU is different from the version of LaunchDarkly available to other regions. If you are based in the EU, you likely use the EU instance of LaunchDarkly. The LaunchDarkly EU instance complies with EU data residency principles, including the protection and confidentiality of EU customer information.  If you are working in the EU instance of LaunchDarkly, the base URI for each request is `https://app.eu.launchdarkly.com`.  To learn more, read [LaunchDarkly in the European Union (EU)](https://launchdarkly.com/docs/home/infrastructure/eu).  ## Versioning  We try hard to keep our REST API backwards compatible, but we occasionally have to make backwards-incompatible changes in the process of shipping new features. These breaking changes can cause unexpected behavior if you don't prepare for them accordingly.  Updates to our REST API include support for the latest features in LaunchDarkly. We also release a new version of our REST API every time we make a breaking change. We provide simultaneous support for multiple API versions so you can migrate from your current API version to a new version at your own pace.  ### Setting the API version per request  You can set the API version on a specific request by sending an `LD-API-Version` header, as shown in the example below:  ``` LD-API-Version: 20240415 ```  The header value is the version number of the API version you would like to request. The number for each version corresponds to the date the version was released in `yyyymmdd` format. In the example above the version `20240415` corresponds to April 15, 2024.  ### Setting the API version per access token  When you create an access token, you must specify a specific version of the API to use. This ensures that integrations using this token cannot be broken by version changes.  Tokens created before versioning was released have their version set to `20160426`, which is the version of the API that existed before the current versioning scheme, so that they continue working the same way they did before versioning.  If you would like to upgrade your integration to use a new API version, you can explicitly set the header described above.  > ### Best practice: Set the header for every client or integration > > We recommend that you set the API version header explicitly in any client or integration you build. > > Only rely on the access token API version during manual testing.  ### API version changelog  <table>   <tr>     <th>Version</th>     <th>Changes</th>     <th>End of life (EOL)</th>   </tr>   <tr>     <td>`20240415`</td>     <td>       <ul><li>Changed several endpoints from unpaginated to paginated. Use the `limit` and `offset` query parameters to page through the results.</li> <li>Changed the [list access tokens](https://launchdarkly.com/docs/api/access-tokens/get-tokens) endpoint: <ul><li>Response is now paginated with a default limit of `25`</li></ul></li> <li>Changed the [list account members](https://launchdarkly.com/docs/api/account-members/get-members) endpoint: <ul><li>The `accessCheck` filter is no longer available</li></ul></li> <li>Changed the [list custom roles](https://launchdarkly.com/docs/api/custom-roles/get-custom-roles) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `environments` field is now only returned if the request is filtered by environment, using the `filterEnv` query parameter</li><li>The `followerId`, `hasDataExport`, `status`, `contextKindTargeted`, and `segmentTargeted` filters are no longer available</li><li>The `compare` query parameter is no longer available</li></ul></li> <li>Changed the [list segments](https://launchdarkly.com/docs/api/segments/get-segments) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list teams](https://launchdarkly.com/docs/api/teams/get-teams) endpoint: <ul><li>The `expand` parameter no longer supports including `projects` or `roles`</li><li>In paginated results, the maximum page size is now 100</li></ul></li> <li>Changed the [get workflows](https://launchdarkly.com/docs/api/workflows/get-workflows) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `_conflicts` field in the response is no longer available</li></ul></li> </ul>     </td>     <td>Current</td>   </tr>   <tr>     <td>`20220603`</td>     <td>       <ul><li>Changed the [list projects](https://launchdarkly.com/docs/api/projects/get-projects) return value:<ul><li>Response is now paginated with a default limit of `20`.</li><li>Added support for filter and sort.</li><li>The project `environments` field is now expandable. This field is omitted by default.</li></ul></li><li>Changed the [get project](https://launchdarkly.com/docs/api/projects/get-project) return value:<ul><li>The `environments` field is now expandable. This field is omitted by default.</li></ul></li></ul>     </td>     <td>2025-04-15</td>   </tr>   <tr>     <td>`20210729`</td>     <td>       <ul><li>Changed the [create approval request](https://launchdarkly.com/docs/api/approvals/post-approval-request) return value. It now returns HTTP Status Code `201` instead of `200`.</li><li> Changed the [get user](https://launchdarkly.com/docs/api/users/get-user) return value. It now returns a user record, not a user. </li><li>Added additional optional fields to environment, segments, flags, members, and segments, including the ability to create big segments. </li><li> Added default values for flag variations when new environments are created. </li><li>Added filtering and pagination for getting flags and members, including `limit`, `number`, `filter`, and `sort` query parameters. </li><li>Added endpoints for expiring user targets for flags and segments, scheduled changes, access tokens, Relay Proxy configuration, integrations and subscriptions, and approvals. </li></ul>     </td>     <td>2023-06-03</td>   </tr>   <tr>     <td>`20191212`</td>     <td>       <ul><li>[List feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) now defaults to sending summaries of feature flag configurations, equivalent to setting the query parameter `summary=true`. Summaries omit flag targeting rules and individual user targets from the payload. </li><li> Added endpoints for flags, flag status, projects, environments, audit logs, members, users, custom roles, segments, usage, streams, events, and data export. </li></ul>     </td>     <td>2022-07-29</td>   </tr>   <tr>     <td>`20160426`</td>     <td>       <ul><li>Initial versioning of API. Tokens created before versioning have their version set to this.</li></ul>     </td>     <td>2020-12-12</td>   </tr> </table>  To learn more about how EOL is determined, read LaunchDarkly's [End of Life (EOL) Policy](https://launchdarkly.com/policies/end-of-life-policy/).
 *
 * The version of the OpenAPI document: 2.0
 * Contact: support@launchdarkly.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.16.0
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
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use LaunchDarklyApi\ApiException;
use LaunchDarklyApi\Configuration;
use LaunchDarklyApi\FormDataProcessor;
use LaunchDarklyApi\HeaderSelector;
use LaunchDarklyApi\ObjectSerializer;

/**
 * DataExportDestinationsApi Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DataExportDestinationsApi
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

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'deleteDestination' => [
            'application/json',
        ],
        'getDestination' => [
            'application/json',
        ],
        'getDestinations' => [
            'application/json',
        ],
        'patchDestination' => [
            'application/json',
        ],
        'postDestination' => [
            'application/json',
        ],
        'postGenerateWarehouseDestinationKeyPair' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        int $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
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
     * Operation deleteDestination
     *
     * Delete Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteDestination($project_key, $environment_key, $id, string $contentType = self::contentTypes['deleteDestination'][0])
    {
        $this->deleteDestinationWithHttpInfo($project_key, $environment_key, $id, $contentType);
    }

    /**
     * Operation deleteDestinationWithHttpInfo
     *
     * Delete Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteDestinationWithHttpInfo($project_key, $environment_key, $id, string $contentType = self::contentTypes['deleteDestination'][0])
    {
        $request = $this->deleteDestinationRequest($project_key, $environment_key, $id, $contentType);

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


            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation deleteDestinationAsync
     *
     * Delete Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteDestinationAsync($project_key, $environment_key, $id, string $contentType = self::contentTypes['deleteDestination'][0])
    {
        return $this->deleteDestinationAsyncWithHttpInfo($project_key, $environment_key, $id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteDestinationAsyncWithHttpInfo
     *
     * Delete Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteDestinationAsyncWithHttpInfo($project_key, $environment_key, $id, string $contentType = self::contentTypes['deleteDestination'][0])
    {
        $returnType = '';
        $request = $this->deleteDestinationRequest($project_key, $environment_key, $id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'deleteDestination'
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteDestinationRequest($project_key, $environment_key, $id, string $contentType = self::contentTypes['deleteDestination'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling deleteDestination'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling deleteDestination'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteDestination'
            );
        }


        $resourcePath = '/api/v2/destinations/{projectKey}/{environmentKey}/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

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

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getDestination
     *
     * Get destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\Destination|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getDestination($project_key, $environment_key, $id, string $contentType = self::contentTypes['getDestination'][0])
    {
        list($response) = $this->getDestinationWithHttpInfo($project_key, $environment_key, $id, $contentType);
        return $response;
    }

    /**
     * Operation getDestinationWithHttpInfo
     *
     * Get destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\Destination|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDestinationWithHttpInfo($project_key, $environment_key, $id, string $contentType = self::contentTypes['getDestination'][0])
    {
        $request = $this->getDestinationRequest($project_key, $environment_key, $id, $contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\Destination',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $request,
                        $response,
                    );
                case 429:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $request,
                        $response,
                    );
            }

            

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

            return $this->handleResponseWithDataType(
                '\LaunchDarklyApi\Model\Destination',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\Destination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation getDestinationAsync
     *
     * Get destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationAsync($project_key, $environment_key, $id, string $contentType = self::contentTypes['getDestination'][0])
    {
        return $this->getDestinationAsyncWithHttpInfo($project_key, $environment_key, $id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDestinationAsyncWithHttpInfo
     *
     * Get destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationAsyncWithHttpInfo($project_key, $environment_key, $id, string $contentType = self::contentTypes['getDestination'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\Destination';
        $request = $this->getDestinationRequest($project_key, $environment_key, $id, $contentType);

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
     * Create request for operation 'getDestination'
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDestinationRequest($project_key, $environment_key, $id, string $contentType = self::contentTypes['getDestination'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling getDestination'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling getDestination'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getDestination'
            );
        }


        $resourcePath = '/api/v2/destinations/{projectKey}/{environmentKey}/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

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

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getDestinations
     *
     * List destinations
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestinations'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\Destinations|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getDestinations(string $contentType = self::contentTypes['getDestinations'][0])
    {
        list($response) = $this->getDestinationsWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation getDestinationsWithHttpInfo
     *
     * List destinations
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestinations'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\Destinations|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDestinationsWithHttpInfo(string $contentType = self::contentTypes['getDestinations'][0])
    {
        $request = $this->getDestinationsRequest($contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\Destinations',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $request,
                        $response,
                    );
                case 429:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $request,
                        $response,
                    );
            }

            

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

            return $this->handleResponseWithDataType(
                '\LaunchDarklyApi\Model\Destinations',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\Destinations',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation getDestinationsAsync
     *
     * List destinations
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestinations'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationsAsync(string $contentType = self::contentTypes['getDestinations'][0])
    {
        return $this->getDestinationsAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDestinationsAsyncWithHttpInfo
     *
     * List destinations
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestinations'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationsAsyncWithHttpInfo(string $contentType = self::contentTypes['getDestinations'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\Destinations';
        $request = $this->getDestinationsRequest($contentType);

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
     * Create request for operation 'getDestinations'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDestinations'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDestinationsRequest(string $contentType = self::contentTypes['getDestinations'][0])
    {


        $resourcePath = '/api/v2/destinations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

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

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchDestination
     *
     * Update Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation patch_operation (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\Destination|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function patchDestination($project_key, $environment_key, $id, $patch_operation, string $contentType = self::contentTypes['patchDestination'][0])
    {
        list($response) = $this->patchDestinationWithHttpInfo($project_key, $environment_key, $id, $patch_operation, $contentType);
        return $response;
    }

    /**
     * Operation patchDestinationWithHttpInfo
     *
     * Update Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\Destination|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchDestinationWithHttpInfo($project_key, $environment_key, $id, $patch_operation, string $contentType = self::contentTypes['patchDestination'][0])
    {
        $request = $this->patchDestinationRequest($project_key, $environment_key, $id, $patch_operation, $contentType);

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


            switch($statusCode) {
                case 200:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\Destination',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $request,
                        $response,
                    );
                case 404:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $request,
                        $response,
                    );
                case 409:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
                        $request,
                        $response,
                    );
                case 429:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $request,
                        $response,
                    );
            }

            

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

            return $this->handleResponseWithDataType(
                '\LaunchDarklyApi\Model\Destination',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\Destination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation patchDestinationAsync
     *
     * Update Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchDestinationAsync($project_key, $environment_key, $id, $patch_operation, string $contentType = self::contentTypes['patchDestination'][0])
    {
        return $this->patchDestinationAsyncWithHttpInfo($project_key, $environment_key, $id, $patch_operation, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchDestinationAsyncWithHttpInfo
     *
     * Update Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchDestinationAsyncWithHttpInfo($project_key, $environment_key, $id, $patch_operation, string $contentType = self::contentTypes['patchDestination'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\Destination';
        $request = $this->patchDestinationRequest($project_key, $environment_key, $id, $patch_operation, $contentType);

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
     * Create request for operation 'patchDestination'
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The Data Export destination ID (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchDestinationRequest($project_key, $environment_key, $id, $patch_operation, string $contentType = self::contentTypes['patchDestination'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling patchDestination'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling patchDestination'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling patchDestination'
            );
        }

        // verify the required parameter 'patch_operation' is set
        if ($patch_operation === null || (is_array($patch_operation) && count($patch_operation) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $patch_operation when calling patchDestination'
            );
        }


        $resourcePath = '/api/v2/destinations/{projectKey}/{environmentKey}/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($patch_operation)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($patch_operation));
            } else {
                $httpBody = $patch_operation;
            }
        } elseif (count($formParams) > 0) {
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

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postDestination
     *
     * Create Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\DestinationPost $destination_post destination_post (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\Destination|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postDestination($project_key, $environment_key, $destination_post, string $contentType = self::contentTypes['postDestination'][0])
    {
        list($response) = $this->postDestinationWithHttpInfo($project_key, $environment_key, $destination_post, $contentType);
        return $response;
    }

    /**
     * Operation postDestinationWithHttpInfo
     *
     * Create Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\DestinationPost $destination_post (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postDestination'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\Destination|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postDestinationWithHttpInfo($project_key, $environment_key, $destination_post, string $contentType = self::contentTypes['postDestination'][0])
    {
        $request = $this->postDestinationRequest($project_key, $environment_key, $destination_post, $contentType);

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


            switch($statusCode) {
                case 201:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\Destination',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $request,
                        $response,
                    );
                case 409:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
                        $request,
                        $response,
                    );
                case 429:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $request,
                        $response,
                    );
            }

            

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

            return $this->handleResponseWithDataType(
                '\LaunchDarklyApi\Model\Destination',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\Destination',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation postDestinationAsync
     *
     * Create Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\DestinationPost $destination_post (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postDestinationAsync($project_key, $environment_key, $destination_post, string $contentType = self::contentTypes['postDestination'][0])
    {
        return $this->postDestinationAsyncWithHttpInfo($project_key, $environment_key, $destination_post, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postDestinationAsyncWithHttpInfo
     *
     * Create Data Export destination
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\DestinationPost $destination_post (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postDestinationAsyncWithHttpInfo($project_key, $environment_key, $destination_post, string $contentType = self::contentTypes['postDestination'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\Destination';
        $request = $this->postDestinationRequest($project_key, $environment_key, $destination_post, $contentType);

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
     * Create request for operation 'postDestination'
     *
     * @param  string $project_key The project key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\DestinationPost $destination_post (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postDestination'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postDestinationRequest($project_key, $environment_key, $destination_post, string $contentType = self::contentTypes['postDestination'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling postDestination'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling postDestination'
            );
        }

        // verify the required parameter 'destination_post' is set
        if ($destination_post === null || (is_array($destination_post) && count($destination_post) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $destination_post when calling postDestination'
            );
        }


        $resourcePath = '/api/v2/destinations/{projectKey}/{environmentKey}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($destination_post)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($destination_post));
            } else {
                $httpBody = $destination_post;
            }
        } elseif (count($formParams) > 0) {
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

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postGenerateWarehouseDestinationKeyPair
     *
     * Generate Snowflake destination key pair
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postGenerateWarehouseDestinationKeyPair'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postGenerateWarehouseDestinationKeyPair(string $contentType = self::contentTypes['postGenerateWarehouseDestinationKeyPair'][0])
    {
        list($response) = $this->postGenerateWarehouseDestinationKeyPairWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation postGenerateWarehouseDestinationKeyPairWithHttpInfo
     *
     * Generate Snowflake destination key pair
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postGenerateWarehouseDestinationKeyPair'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postGenerateWarehouseDestinationKeyPairWithHttpInfo(string $contentType = self::contentTypes['postGenerateWarehouseDestinationKeyPair'][0])
    {
        $request = $this->postGenerateWarehouseDestinationKeyPairRequest($contentType);

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


            switch($statusCode) {
                case 201:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep',
                        $request,
                        $response,
                    );
                case 400:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $request,
                        $response,
                    );
                case 401:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $request,
                        $response,
                    );
                case 403:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $request,
                        $response,
                    );
                case 409:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
                        $request,
                        $response,
                    );
                case 429:
                    return $this->handleResponseWithDataType(
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $request,
                        $response,
                    );
            }

            

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

            return $this->handleResponseWithDataType(
                '\LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep',
                $request,
                $response,
            );
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\InvalidRequestErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\UnauthorizedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ForbiddenErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
                case 429:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\RateLimitedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    throw $e;
            }
        

            throw $e;
        }
    }

    /**
     * Operation postGenerateWarehouseDestinationKeyPairAsync
     *
     * Generate Snowflake destination key pair
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postGenerateWarehouseDestinationKeyPair'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postGenerateWarehouseDestinationKeyPairAsync(string $contentType = self::contentTypes['postGenerateWarehouseDestinationKeyPair'][0])
    {
        return $this->postGenerateWarehouseDestinationKeyPairAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postGenerateWarehouseDestinationKeyPairAsyncWithHttpInfo
     *
     * Generate Snowflake destination key pair
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postGenerateWarehouseDestinationKeyPair'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postGenerateWarehouseDestinationKeyPairAsyncWithHttpInfo(string $contentType = self::contentTypes['postGenerateWarehouseDestinationKeyPair'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\GenerateWarehouseDestinationKeyPairPostRep';
        $request = $this->postGenerateWarehouseDestinationKeyPairRequest($contentType);

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
     * Create request for operation 'postGenerateWarehouseDestinationKeyPair'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postGenerateWarehouseDestinationKeyPair'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postGenerateWarehouseDestinationKeyPairRequest(string $contentType = self::contentTypes['postGenerateWarehouseDestinationKeyPair'][0])
    {


        $resourcePath = '/api/v2/destinations/generate-warehouse-destination-key-pair';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

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

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
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

    private function handleResponseWithDataType(
        string $dataType,
        RequestInterface $request,
        ResponseInterface $response
    ): array {
        if ($dataType === '\SplFileObject') {
            $content = $response->getBody(); //stream goes to serializer
        } else {
            $content = (string) $response->getBody();
            if ($dataType !== 'string') {
                try {
                    $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                } catch (\JsonException $exception) {
                    throw new ApiException(
                        sprintf(
                            'Error JSON decoding server response (%s)',
                            $request->getUri()
                        ),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                        $content
                    );
                }
            }
        }

        return [
            ObjectSerializer::deserialize($content, $dataType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    private function responseWithinRangeCode(
        string $rangeCode,
        int $statusCode
    ): bool {
        $left = (int) ($rangeCode[0].'00');
        $right = (int) ($rangeCode[0].'99');

        return $statusCode >= $left && $statusCode <= $right;
    }
}
