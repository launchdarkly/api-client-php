<?php
/**
 * ApprovalsApi
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
 * This documentation describes LaunchDarkly's REST API. To access the complete OpenAPI spec directly, use [Get OpenAPI spec](https://launchdarkly.com/docs/api/other/get-openapi-spec).  To learn how to use LaunchDarkly using the user interface (UI) instead, read our [product documentation](https://launchdarkly.com/docs/home).  ## Authentication  LaunchDarkly's REST API uses the HTTPS protocol with a minimum TLS version of 1.2.  All REST API resources are authenticated with either [personal or service access tokens](https://launchdarkly.com/docs/home/account/api), or session cookies. Other authentication mechanisms are not supported. You can manage personal access tokens on your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page in the LaunchDarkly UI.  LaunchDarkly also has SDK keys, mobile keys, and client-side IDs that are used by our server-side SDKs, mobile SDKs, and JavaScript-based SDKs, respectively. **These keys cannot be used to access our REST API**. These keys are environment-specific, and can only perform read-only operations such as fetching feature flag settings.  | Auth mechanism                                                                                  | Allowed resources                                                                                     | Use cases                                          | | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------- | | [Personal or service access tokens](https://launchdarkly.com/docs/home/account/api) | Can be customized on a per-token basis                                                                | Building scripts, custom integrations, data export. | | SDK keys                                                                                        | Can only access read-only resources specific to server-side SDKs. Restricted to a single environment. | Server-side SDKs                     | | Mobile keys                                                                                     | Can only access read-only resources specific to mobile SDKs, and only for flags marked available to mobile keys. Restricted to a single environment.           | Mobile SDKs                                        | | Client-side ID                                                                                  | Can only access read-only resources specific to JavaScript-based client-side SDKs, and only for flags marked available to client-side. Restricted to a single environment.           | Client-side JavaScript                             |  > #### Keep your access tokens and SDK keys private > > Access tokens should _never_ be exposed in untrusted contexts. Never put an access token in client-side JavaScript, or embed it in a mobile application. LaunchDarkly has special mobile keys that you can embed in mobile apps. If you accidentally expose an access token or SDK key, you can reset it from your [**Authorization**](https://app.launchdarkly.com/settings/authorization) page. > > The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.  ### Authentication using request header  The preferred way to authenticate with the API is by adding an `Authorization` header containing your access token to your requests. The value of the `Authorization` header must be your access token.  Manage personal access tokens from the [**Authorization**](https://app.launchdarkly.com/settings/authorization) page.  ### Authentication using session cookie  For testing purposes, you can make API calls directly from your web browser. If you are logged in to the LaunchDarkly application, the API will use your existing session to authenticate calls.  Depending on the permissions granted as part of your [role](https://launchdarkly.com/docs/home/account/roles), you may not have permission to perform some API calls. You will receive a `401` response code in that case.  > ### Modifying the Origin header causes an error > > LaunchDarkly validates that the Origin header for any API request authenticated by a session cookie matches the expected Origin header. The expected Origin header is `https://app.launchdarkly.com`. > > If the Origin header does not match what's expected, LaunchDarkly returns an error. This error can prevent the LaunchDarkly app from working correctly. > > Any browser extension that intentionally changes the Origin header can cause this problem. For example, the `Allow-Control-Allow-Origin: *` Chrome extension changes the Origin header to `http://evil.com` and causes the app to fail. > > To prevent this error, do not modify your Origin header. > > LaunchDarkly does not require origin matching when authenticating with an access token, so this issue does not affect normal API usage.  ## Representations  All resources expect and return JSON response bodies. Error responses also send a JSON body. To learn more about the error format of the API, read [Errors](https://launchdarkly.com/docs/api#errors).  In practice this means that you always get a response with a `Content-Type` header set to `application/json`.  In addition, request bodies for `PATCH`, `POST`, and `PUT` requests must be encoded as JSON with a `Content-Type` header set to `application/json`.  ### Summary and detailed representations  When you fetch a list of resources, the response includes only the most important attributes of each resource. This is a _summary representation_ of the resource. When you fetch an individual resource, such as a single feature flag, you receive a _detailed representation_ of the resource.  The best way to find a detailed representation is to follow links. Every summary representation includes a link to its detailed representation.  ### Expanding responses  Sometimes the detailed representation of a resource does not include all of the attributes of the resource by default. If this is the case, the request method will clearly document this and describe which attributes you can include in an expanded response.  To include the additional attributes, append the `expand` request parameter to your request and add a comma-separated list of the attributes to include. For example, when you append `?expand=members,maintainers` to the [Get team](https://launchdarkly.com/docs/api/teams/get-team) endpoint, the expanded response includes both of these attributes.  ### Links and addressability  The best way to navigate the API is by following links. These are attributes in representations that link to other resources. The API always uses the same format for links:  - Links to other resources within the API are encapsulated in a `_links` object - If the resource has a corresponding link to HTML content on the site, it is stored in a special `_site` link  Each link has two attributes:  - An `href`, which contains the URL - A `type`, which describes the content type  For example, a feature resource might return the following:  ```json {   \"_links\": {     \"parent\": {       \"href\": \"/api/features\",       \"type\": \"application/json\"     },     \"self\": {       \"href\": \"/api/features/sort.order\",       \"type\": \"application/json\"     }   },   \"_site\": {     \"href\": \"/features/sort.order\",     \"type\": \"text/html\"   } } ```  From this, you can navigate to the parent collection of features by following the `parent` link, or navigate to the site page for the feature by following the `_site` link.  Collections are always represented as a JSON object with an `items` attribute containing an array of representations. Like all other representations, collections have `_links` defined at the top level.  Paginated collections include `first`, `last`, `next`, and `prev` links containing a URL with the respective set of elements in the collection.  ## Updates  Resources that accept partial updates use the `PATCH` verb. Most resources support the [JSON patch](https://launchdarkly.com/docs/api#updates-using-json-patch) format. Some resources also support the [JSON merge patch](https://launchdarkly.com/docs/api#updates-using-json-merge-patch) format, and some resources support the [semantic patch](https://launchdarkly.com/docs/api#updates-using-semantic-patch) format, which is a way to specify the modifications to perform as a set of executable instructions. Each resource supports optional [comments](https://launchdarkly.com/docs/api#updates-with-comments) that you can submit with updates. Comments appear in outgoing webhooks, the audit log, and other integrations.  When a resource supports both JSON patch and semantic patch, we document both in the request method. However, the specific request body fields and descriptions included in our documentation only match one type of patch or the other.  ### Updates using JSON patch  [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) is a way to specify the modifications to perform on a resource. JSON patch uses paths and a limited set of operations to describe how to transform the current state of the resource into a new state. JSON patch documents are always arrays, where each element contains an operation, a path to the field to update, and the new value.  For example, in this feature flag representation:  ```json {     \"name\": \"New recommendations engine\",     \"key\": \"engine.enable\",     \"description\": \"This is the description\",     ... } ``` You can change the feature flag's description with the following patch document:  ```json [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"This is the new description\" }] ```  You can specify multiple modifications to perform in a single request. You can also test that certain preconditions are met before applying the patch:  ```json [   { \"op\": \"test\", \"path\": \"/version\", \"value\": 10 },   { \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" } ] ```  The above patch request tests whether the feature flag's `version` is `10`, and if so, changes the feature flag's description.  Attributes that are not editable, such as a resource's `_links`, have names that start with an underscore.  ### Updates using JSON merge patch  [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) is another format for specifying the modifications to perform on a resource. JSON merge patch is less expressive than JSON patch. However, in many cases it is simpler to construct a merge patch document. For example, you can change a feature flag's description with the following merge patch document:  ```json {   \"description\": \"New flag description\" } ```  ### Updates using semantic patch  Some resources support the semantic patch format. A semantic patch is a way to specify the modifications to perform on a resource as a set of executable instructions.  Semantic patch allows you to be explicit about intent using precise, custom instructions. In many cases, you can define semantic patch instructions independently of the current state of the resource. This can be useful when defining a change that may be applied at a future date.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header.  Here's how:  ``` Content-Type: application/json; domain-model=launchdarkly.semanticpatch ```  If you call a semantic patch resource without this header, you will receive a `400` response because your semantic patch will be interpreted as a JSON patch.  The body of a semantic patch request takes the following properties:  * `comment` (string): (Optional) A description of the update. * `environmentKey` (string): (Required for some resources only) The environment key. * `instructions` (array): (Required) A list of actions the update should perform. Each action in the list must be an object with a `kind` property that indicates the instruction. If the instruction requires parameters, you must include those parameters as additional fields in the object. The documentation for each resource that supports semantic patch includes the available instructions and any additional parameters.  For example:  ```json {   \"comment\": \"optional comment\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  Semantic patches are not applied partially; either all of the instructions are applied or none of them are. If **any** instruction is invalid, the endpoint returns an error and will not change the resource. If all instructions are valid, the request succeeds and the resources are updated if necessary, or left unchanged if they are already in the state you request.  ### Updates with comments  You can submit optional comments with `PATCH` changes.  To submit a comment along with a JSON patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"patch\": [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" }] } ```  To submit a comment along with a JSON merge patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"merge\": { \"description\": \"New flag description\" } } ```  To submit a comment along with a semantic patch, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  ## Errors  The API always returns errors in a common format. Here's an example:  ```json {   \"code\": \"invalid_request\",   \"message\": \"A feature with that key already exists\",   \"id\": \"30ce6058-87da-11e4-b116-123b93f75cba\" } ```  The `code` indicates the general class of error. The `message` is a human-readable explanation of what went wrong. The `id` is a unique identifier. Use it when you're working with LaunchDarkly Support to debug a problem with a specific API call.  ### HTTP status error response codes  | Code | Definition        | Description                                                                                       | Possible Solution                                                | | ---- | ----------------- | ------------------------------------------------------------------------------------------- | ---------------------------------------------------------------- | | 400  | Invalid request       | The request cannot be understood.                                    | Ensure JSON syntax in request body is correct.                   | | 401  | Invalid access token      | Requestor is unauthorized or does not have permission for this API call.                                                | Ensure your API access token is valid and has the appropriate permissions.                                     | | 403  | Forbidden         | Requestor does not have access to this resource.                                                | Ensure that the account member or access token has proper permissions set. | | 404  | Invalid resource identifier | The requested resource is not valid. | Ensure that the resource is correctly identified by ID or key. | | 405  | Method not allowed | The request method is not allowed on this resource. | Ensure that the HTTP verb is correct. | | 409  | Conflict          | The API request can not be completed because it conflicts with a concurrent API request. | Retry your request.                                              | | 422  | Unprocessable entity | The API request can not be completed because the update description can not be understood. | Ensure that the request body is correct for the type of patch you are using, either JSON patch or semantic patch. | 429  | Too many requests | Read [Rate limiting](https://launchdarkly.com/docs/api#rate-limiting).                                               | Wait and try again later.                                        |  ## CORS  The LaunchDarkly API supports Cross Origin Resource Sharing (CORS) for AJAX requests from any origin. If an `Origin` header is given in a request, it will be echoed as an explicitly allowed origin. Otherwise the request returns a wildcard, `Access-Control-Allow-Origin: *`. For more information on CORS, read the [CORS W3C Recommendation](http://www.w3.org/TR/cors). Example CORS headers might look like:  ```http Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, Authorization Access-Control-Allow-Methods: OPTIONS, GET, DELETE, PATCH Access-Control-Allow-Origin: * Access-Control-Max-Age: 300 ```  You can make authenticated CORS calls just as you would make same-origin calls, using either [token or session-based authentication](https://launchdarkly.com/docs/api#authentication). If you are using session authentication, you should set the `withCredentials` property for your `xhr` request to `true`. You should never expose your access tokens to untrusted entities.  ## Rate limiting  We use several rate limiting strategies to ensure the availability of our APIs. Rate-limited calls to our APIs return a `429` status code. Calls to our APIs include headers indicating the current rate limit status. The specific headers returned depend on the API route being called. The limits differ based on the route, authentication mechanism, and other factors. Routes that are not rate limited may not contain any of the headers described below.  > ### Rate limiting and SDKs > > LaunchDarkly SDKs are never rate limited and do not use the API endpoints defined here. LaunchDarkly uses a different set of approaches, including streaming/server-sent events and a global CDN, to ensure availability to the routes used by LaunchDarkly SDKs.  ### Global rate limits  Authenticated requests are subject to a global limit. This is the maximum number of calls that your account can make to the API per ten seconds. All service and personal access tokens on the account share this limit, so exceeding the limit with one access token will impact other tokens. Calls that are subject to global rate limits may return the headers below:  | Header name                    | Description                                                                      | | ------------------------------ | -------------------------------------------------------------------------------- | | `X-Ratelimit-Global-Remaining` | The maximum number of requests the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`            | The time at which the current rate limit window resets in epoch milliseconds.    |  We do not publicly document the specific number of calls that can be made globally. This limit may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limit.  ### Route-level rate limits  Some authenticated routes have custom rate limits. These also reset every ten seconds. Any service or personal access tokens hitting the same route share this limit, so exceeding the limit with one access token may impact other tokens. Calls that are subject to route-level rate limits return the headers below:  | Header name                   | Description                                                                                           | | ----------------------------- | ----------------------------------------------------------------------------------------------------- | | `X-Ratelimit-Route-Remaining` | The maximum number of requests to the current route the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`           | The time at which the current rate limit window resets in epoch milliseconds.                         |  A _route_ represents a specific URL pattern and verb. For example, the [Delete environment](https://launchdarkly.com/docs/api/environments/delete-environment) endpoint is considered a single route, and each call to delete an environment counts against your route-level rate limit for that route.  We do not publicly document the specific number of calls that an account can make to each endpoint per ten seconds. These limits may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limits.  ### IP-based rate limiting  We also employ IP-based rate limiting on some API routes. If you hit an IP-based rate limit, your API response will include a `Retry-After` header indicating how long to wait before re-trying the call. Clients must wait at least `Retry-After` seconds before making additional calls to our API, and should employ jitter and backoff strategies to avoid triggering rate limits again.  ## OpenAPI (Swagger) and client libraries  We have a [complete OpenAPI (Swagger) specification](https://app.launchdarkly.com/api/v2/openapi.json) for our API.  We auto-generate multiple client libraries based on our OpenAPI specification. To learn more, visit the [collection of client libraries on GitHub](https://github.com/search?q=topic%3Alaunchdarkly-api+org%3Alaunchdarkly&type=Repositories). You can also use this specification to generate client libraries to interact with our REST API in your language of choice.  Our OpenAPI specification is supported by several API-based tools such as Postman and Insomnia. In many cases, you can directly import our specification to explore our APIs.  ## Method overriding  Some firewalls and HTTP clients restrict the use of verbs other than `GET` and `POST`. In those environments, our API endpoints that use `DELETE`, `PATCH`, and `PUT` verbs are inaccessible.  To avoid this issue, our API supports the `X-HTTP-Method-Override` header, allowing clients to \"tunnel\" `DELETE`, `PATCH`, and `PUT` requests using a `POST` request.  For example, to call a `PATCH` endpoint using a `POST` request, you can include `X-HTTP-Method-Override:PATCH` as a header.  ## Beta resources  We sometimes release new API resources in **beta** status before we release them with general availability.  Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  We try to promote resources into general availability as quickly as possible. This happens after sufficient testing and when we're satisfied that we no longer need to make backwards-incompatible changes.  We mark beta resources with a \"Beta\" callout in our documentation, pictured below:  > ### This feature is in beta > > To use this feature, pass in a header including the `LD-API-Version` key with value set to `beta`. Use this header with each call. To learn more, read [Beta resources](https://launchdarkly.com/docs/api#beta-resources). > > Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  ### Using beta resources  To use a beta resource, you must include a header in the request. If you call a beta resource without this header, you receive a `403` response.  Use this header:  ``` LD-API-Version: beta ```  ## Federal and EU environments  In addition to the commercial versions, LaunchDarkly offers instances for federal agencies and those based in the European Union (EU).  ### Federal environments  The version of LaunchDarkly that is available on domains controlled by the United States government is different from the version of LaunchDarkly available to the general public. If you are an employee or contractor for a United States federal agency and use LaunchDarkly in your work, you likely use the federal instance of LaunchDarkly.  If you are working in the federal instance of LaunchDarkly, the base URI for each request is `https://app.launchdarkly.us`.  To learn more, read [LaunchDarkly in federal environments](https://launchdarkly.com/docs/home/infrastructure/federal).  ### EU environments  The version of LaunchDarkly that is available in the EU is different from the version of LaunchDarkly available to other regions. If you are based in the EU, you likely use the EU instance of LaunchDarkly. The LaunchDarkly EU instance complies with EU data residency principles, including the protection and confidentiality of EU customer information.  If you are working in the EU instance of LaunchDarkly, the base URI for each request is `https://app.eu.launchdarkly.com`.  To learn more, read [LaunchDarkly in the European Union (EU)](https://launchdarkly.com/docs/home/infrastructure/eu).  ## Versioning  We try hard to keep our REST API backwards compatible, but we occasionally have to make backwards-incompatible changes in the process of shipping new features. These breaking changes can cause unexpected behavior if you don't prepare for them accordingly.  Updates to our REST API include support for the latest features in LaunchDarkly. We also release a new version of our REST API every time we make a breaking change. We provide simultaneous support for multiple API versions so you can migrate from your current API version to a new version at your own pace.  ### Setting the API version per request  You can set the API version on a specific request by sending an `LD-API-Version` header, as shown in the example below:  ``` LD-API-Version: 20240415 ```  The header value is the version number of the API version you would like to request. The number for each version corresponds to the date the version was released in `yyyymmdd` format. In the example above the version `20240415` corresponds to April 15, 2024.  ### Setting the API version per access token  When you create an access token, you must specify a specific version of the API to use. This ensures that integrations using this token cannot be broken by version changes.  Tokens created before versioning was released have their version set to `20160426`, which is the version of the API that existed before the current versioning scheme, so that they continue working the same way they did before versioning.  If you would like to upgrade your integration to use a new API version, you can explicitly set the header described above.  > ### Best practice: Set the header for every client or integration > > We recommend that you set the API version header explicitly in any client or integration you build. > > Only rely on the access token API version during manual testing.  ### API version changelog  <table>   <tr>     <th>Version</th>     <th>Changes</th>     <th>End of life (EOL)</th>   </tr>   <tr>     <td>`20240415`</td>     <td>       <ul><li>Changed several endpoints from unpaginated to paginated. Use the `limit` and `offset` query parameters to page through the results.</li> <li>Changed the [list access tokens](https://launchdarkly.com/docs/api/access-tokens/get-tokens) endpoint: <ul><li>Response is now paginated with a default limit of `25`</li></ul></li> <li>Changed the [list account members](https://launchdarkly.com/docs/api/account-members/get-members) endpoint: <ul><li>The `accessCheck` filter is no longer available</li></ul></li> <li>Changed the [list custom roles](https://launchdarkly.com/docs/api/custom-roles/get-custom-roles) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `environments` field is now only returned if the request is filtered by environment, using the `filterEnv` query parameter</li><li>The `followerId`, `hasDataExport`, `status`, `contextKindTargeted`, and `segmentTargeted` filters are no longer available</li><li>The `compare` query parameter is no longer available</li></ul></li> <li>Changed the [list segments](https://launchdarkly.com/docs/api/segments/get-segments) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list teams](https://launchdarkly.com/docs/api/teams/get-teams) endpoint: <ul><li>The `expand` parameter no longer supports including `projects` or `roles`</li><li>In paginated results, the maximum page size is now 100</li></ul></li> <li>Changed the [get workflows](https://launchdarkly.com/docs/api/workflows/get-workflows) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `_conflicts` field in the response is no longer available</li></ul></li> </ul>     </td>     <td>Current</td>   </tr>   <tr>     <td>`20220603`</td>     <td>       <ul><li>Changed the [list projects](https://launchdarkly.com/docs/api/projects/get-projects) return value:<ul><li>Response is now paginated with a default limit of `20`.</li><li>Added support for filter and sort.</li><li>The project `environments` field is now expandable. This field is omitted by default.</li></ul></li><li>Changed the [get project](https://launchdarkly.com/docs/api/projects/get-project) return value:<ul><li>The `environments` field is now expandable. This field is omitted by default.</li></ul></li></ul>     </td>     <td>2025-04-15</td>   </tr>   <tr>     <td>`20210729`</td>     <td>       <ul><li>Changed the [create approval request](https://launchdarkly.com/docs/api/approvals/post-approval-request) return value. It now returns HTTP Status Code `201` instead of `200`.</li><li> Changed the [get user](https://launchdarkly.com/docs/api/users/get-user) return value. It now returns a user record, not a user. </li><li>Added additional optional fields to environment, segments, flags, members, and segments, including the ability to create big segments. </li><li> Added default values for flag variations when new environments are created. </li><li>Added filtering and pagination for getting flags and members, including `limit`, `number`, `filter`, and `sort` query parameters. </li><li>Added endpoints for expiring user targets for flags and segments, scheduled changes, access tokens, Relay Proxy configuration, integrations and subscriptions, and approvals. </li></ul>     </td>     <td>2023-06-03</td>   </tr>   <tr>     <td>`20191212`</td>     <td>       <ul><li>[List feature flags](https://launchdarkly.com/docs/api/feature-flags/get-feature-flags) now defaults to sending summaries of feature flag configurations, equivalent to setting the query parameter `summary=true`. Summaries omit flag targeting rules and individual user targets from the payload. </li><li> Added endpoints for flags, flag status, projects, environments, audit logs, members, users, custom roles, segments, usage, streams, events, and data export. </li></ul>     </td>     <td>2022-07-29</td>   </tr>   <tr>     <td>`20160426`</td>     <td>       <ul><li>Initial versioning of API. Tokens created before versioning have their version set to this.</li></ul>     </td>     <td>2020-12-12</td>   </tr> </table>  To learn more about how EOL is determined, read LaunchDarkly's [End of Life (EOL) Policy](https://launchdarkly.com/policies/end-of-life-policy/).
 *
 * The version of the OpenAPI document: 2.0
 * Contact: support@launchdarkly.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.5.0
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
 * ApprovalsApi Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ApprovalsApi
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
        'deleteApprovalRequest' => [
            'application/json',
        ],
        'deleteApprovalRequestForFlag' => [
            'application/json',
        ],
        'getApprovalForFlag' => [
            'application/json',
        ],
        'getApprovalRequest' => [
            'application/json',
        ],
        'getApprovalRequests' => [
            'application/json',
        ],
        'getApprovalsForFlag' => [
            'application/json',
        ],
        'postApprovalRequest' => [
            'application/json',
        ],
        'postApprovalRequestApply' => [
            'application/json',
        ],
        'postApprovalRequestApplyForFlag' => [
            'application/json',
        ],
        'postApprovalRequestForFlag' => [
            'application/json',
        ],
        'postApprovalRequestReview' => [
            'application/json',
        ],
        'postApprovalRequestReviewForFlag' => [
            'application/json',
        ],
        'postFlagCopyConfigApprovalRequest' => [
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
     * Operation deleteApprovalRequest
     *
     * Delete approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteApprovalRequest($id, string $contentType = self::contentTypes['deleteApprovalRequest'][0])
    {
        $this->deleteApprovalRequestWithHttpInfo($id, $contentType);
    }

    /**
     * Operation deleteApprovalRequestWithHttpInfo
     *
     * Delete approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteApprovalRequestWithHttpInfo($id, string $contentType = self::contentTypes['deleteApprovalRequest'][0])
    {
        $request = $this->deleteApprovalRequestRequest($id, $contentType);

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
     * Operation deleteApprovalRequestAsync
     *
     * Delete approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteApprovalRequestAsync($id, string $contentType = self::contentTypes['deleteApprovalRequest'][0])
    {
        return $this->deleteApprovalRequestAsyncWithHttpInfo($id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteApprovalRequestAsyncWithHttpInfo
     *
     * Delete approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteApprovalRequestAsyncWithHttpInfo($id, string $contentType = self::contentTypes['deleteApprovalRequest'][0])
    {
        $returnType = '';
        $request = $this->deleteApprovalRequestRequest($id, $contentType);

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
     * Create request for operation 'deleteApprovalRequest'
     *
     * @param  string $id The approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteApprovalRequestRequest($id, string $contentType = self::contentTypes['deleteApprovalRequest'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteApprovalRequest'
            );
        }


        $resourcePath = '/api/v2/approval-requests/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
     * Operation deleteApprovalRequestForFlag
     *
     * Delete approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteApprovalRequestForFlag($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['deleteApprovalRequestForFlag'][0])
    {
        $this->deleteApprovalRequestForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $contentType);
    }

    /**
     * Operation deleteApprovalRequestForFlagWithHttpInfo
     *
     * Delete approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteApprovalRequestForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['deleteApprovalRequestForFlag'][0])
    {
        $request = $this->deleteApprovalRequestForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $contentType);

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
     * Operation deleteApprovalRequestForFlagAsync
     *
     * Delete approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteApprovalRequestForFlagAsync($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['deleteApprovalRequestForFlag'][0])
    {
        return $this->deleteApprovalRequestForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteApprovalRequestForFlagAsyncWithHttpInfo
     *
     * Delete approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteApprovalRequestForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['deleteApprovalRequestForFlag'][0])
    {
        $returnType = '';
        $request = $this->deleteApprovalRequestForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $contentType);

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
     * Create request for operation 'deleteApprovalRequestForFlag'
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteApprovalRequestForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['deleteApprovalRequestForFlag'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling deleteApprovalRequestForFlag'
            );
        }

        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling deleteApprovalRequestForFlag'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling deleteApprovalRequestForFlag'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteApprovalRequestForFlag'
            );
        }


        $resourcePath = '/api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}';
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
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
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
     * Operation getApprovalForFlag
     *
     * Get approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getApprovalForFlag($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['getApprovalForFlag'][0])
    {
        list($response) = $this->getApprovalForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $contentType);
        return $response;
    }

    /**
     * Operation getApprovalForFlagWithHttpInfo
     *
     * Get approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getApprovalForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['getApprovalForFlag'][0])
    {
        $request = $this->getApprovalForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $contentType);

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
                    if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse',
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
     * Operation getApprovalForFlagAsync
     *
     * Get approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalForFlagAsync($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['getApprovalForFlag'][0])
    {
        return $this->getApprovalForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getApprovalForFlagAsyncWithHttpInfo
     *
     * Get approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['getApprovalForFlag'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
        $request = $this->getApprovalForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $contentType);

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
     * Create request for operation 'getApprovalForFlag'
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getApprovalForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, string $contentType = self::contentTypes['getApprovalForFlag'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling getApprovalForFlag'
            );
        }

        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling getApprovalForFlag'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling getApprovalForFlag'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getApprovalForFlag'
            );
        }


        $resourcePath = '/api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}';
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
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
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
     * Operation getApprovalRequest
     *
     * Get approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\ExpandableApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getApprovalRequest($id, $expand = null, string $contentType = self::contentTypes['getApprovalRequest'][0])
    {
        list($response) = $this->getApprovalRequestWithHttpInfo($id, $expand, $contentType);
        return $response;
    }

    /**
     * Operation getApprovalRequestWithHttpInfo
     *
     * Get approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\ExpandableApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getApprovalRequestWithHttpInfo($id, $expand = null, string $contentType = self::contentTypes['getApprovalRequest'][0])
    {
        $request = $this->getApprovalRequestRequest($id, $expand, $contentType);

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
                    if ('\LaunchDarklyApi\Model\ExpandableApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ExpandableApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ExpandableApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\ExpandableApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\ExpandableApprovalRequestResponse',
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
     * Operation getApprovalRequestAsync
     *
     * Get approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalRequestAsync($id, $expand = null, string $contentType = self::contentTypes['getApprovalRequest'][0])
    {
        return $this->getApprovalRequestAsyncWithHttpInfo($id, $expand, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getApprovalRequestAsyncWithHttpInfo
     *
     * Get approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalRequestAsyncWithHttpInfo($id, $expand = null, string $contentType = self::contentTypes['getApprovalRequest'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\ExpandableApprovalRequestResponse';
        $request = $this->getApprovalRequestRequest($id, $expand, $contentType);

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
     * Create request for operation 'getApprovalRequest'
     *
     * @param  string $id The approval request ID (required)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getApprovalRequestRequest($id, $expand = null, string $contentType = self::contentTypes['getApprovalRequest'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getApprovalRequest'
            );
        }



        $resourcePath = '/api/v2/approval-requests/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $expand,
            'expand', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);


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
     * Operation getApprovalRequests
     *
     * List approval requests
     *
     * @param  string $filter A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. (optional)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  int $limit The number of approvals to return. Defaults to 20. Maximum limit is 200. (optional)
     * @param  int $offset Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequests'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getApprovalRequests($filter = null, $expand = null, $limit = null, $offset = null, string $contentType = self::contentTypes['getApprovalRequests'][0])
    {
        list($response) = $this->getApprovalRequestsWithHttpInfo($filter, $expand, $limit, $offset, $contentType);
        return $response;
    }

    /**
     * Operation getApprovalRequestsWithHttpInfo
     *
     * List approval requests
     *
     * @param  string $filter A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. (optional)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  int $limit The number of approvals to return. Defaults to 20. Maximum limit is 200. (optional)
     * @param  int $offset Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequests'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getApprovalRequestsWithHttpInfo($filter = null, $expand = null, $limit = null, $offset = null, string $contentType = self::contentTypes['getApprovalRequests'][0])
    {
        $request = $this->getApprovalRequestsRequest($filter, $expand, $limit, $offset, $contentType);

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
                    if ('\LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse',
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
     * Operation getApprovalRequestsAsync
     *
     * List approval requests
     *
     * @param  string $filter A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. (optional)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  int $limit The number of approvals to return. Defaults to 20. Maximum limit is 200. (optional)
     * @param  int $offset Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequests'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalRequestsAsync($filter = null, $expand = null, $limit = null, $offset = null, string $contentType = self::contentTypes['getApprovalRequests'][0])
    {
        return $this->getApprovalRequestsAsyncWithHttpInfo($filter, $expand, $limit, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getApprovalRequestsAsyncWithHttpInfo
     *
     * List approval requests
     *
     * @param  string $filter A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. (optional)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  int $limit The number of approvals to return. Defaults to 20. Maximum limit is 200. (optional)
     * @param  int $offset Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequests'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalRequestsAsyncWithHttpInfo($filter = null, $expand = null, $limit = null, $offset = null, string $contentType = self::contentTypes['getApprovalRequests'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\ExpandableApprovalRequestsResponse';
        $request = $this->getApprovalRequestsRequest($filter, $expand, $limit, $offset, $contentType);

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
     * Create request for operation 'getApprovalRequests'
     *
     * @param  string $filter A comma-separated list of filters. Each filter is of the form &#x60;field operator value&#x60;. Supported fields are explained above. (optional)
     * @param  string $expand A comma-separated list of fields to expand in the response. Supported fields are explained above. (optional)
     * @param  int $limit The number of approvals to return. Defaults to 20. Maximum limit is 200. (optional)
     * @param  int $offset Where to start in the list. Use this with pagination. For example, an offset of 10 skips the first ten items and then returns the next items in the list, up to the query &#x60;limit&#x60;. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalRequests'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getApprovalRequestsRequest($filter = null, $expand = null, $limit = null, $offset = null, string $contentType = self::contentTypes['getApprovalRequests'][0])
    {






        $resourcePath = '/api/v2/approval-requests';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $filter,
            'filter', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $expand,
            'expand', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




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
     * Operation getApprovalsForFlag
     *
     * List approval requests for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalsForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function getApprovalsForFlag($project_key, $feature_flag_key, $environment_key, string $contentType = self::contentTypes['getApprovalsForFlag'][0])
    {
        list($response) = $this->getApprovalsForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $contentType);
        return $response;
    }

    /**
     * Operation getApprovalsForFlagWithHttpInfo
     *
     * List approval requests for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalsForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getApprovalsForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, string $contentType = self::contentTypes['getApprovalsForFlag'][0])
    {
        $request = $this->getApprovalsForFlagRequest($project_key, $feature_flag_key, $environment_key, $contentType);

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
                    if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\UnauthorizedErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse',
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
     * Operation getApprovalsForFlagAsync
     *
     * List approval requests for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalsForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalsForFlagAsync($project_key, $feature_flag_key, $environment_key, string $contentType = self::contentTypes['getApprovalsForFlag'][0])
    {
        return $this->getApprovalsForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getApprovalsForFlagAsyncWithHttpInfo
     *
     * List approval requests for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalsForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApprovalsForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, string $contentType = self::contentTypes['getApprovalsForFlag'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestsResponse';
        $request = $this->getApprovalsForFlagRequest($project_key, $feature_flag_key, $environment_key, $contentType);

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
     * Create request for operation 'getApprovalsForFlag'
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApprovalsForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getApprovalsForFlagRequest($project_key, $feature_flag_key, $environment_key, string $contentType = self::contentTypes['getApprovalsForFlag'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling getApprovalsForFlag'
            );
        }

        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling getApprovalsForFlag'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling getApprovalsForFlag'
            );
        }


        $resourcePath = '/api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests';
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
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
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
     * Operation postApprovalRequest
     *
     * Create approval request
     *
     * @param  \LaunchDarklyApi\Model\CreateApprovalRequestRequest $create_approval_request_request create_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\ApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postApprovalRequest($create_approval_request_request, string $contentType = self::contentTypes['postApprovalRequest'][0])
    {
        list($response) = $this->postApprovalRequestWithHttpInfo($create_approval_request_request, $contentType);
        return $response;
    }

    /**
     * Operation postApprovalRequestWithHttpInfo
     *
     * Create approval request
     *
     * @param  \LaunchDarklyApi\Model\CreateApprovalRequestRequest $create_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\ApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postApprovalRequestWithHttpInfo($create_approval_request_request, string $contentType = self::contentTypes['postApprovalRequest'][0])
    {
        $request = $this->postApprovalRequestRequest($create_approval_request_request, $contentType);

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
                case 201:
                    if ('\LaunchDarklyApi\Model\ApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\ApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\ApprovalRequestResponse',
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
     * Operation postApprovalRequestAsync
     *
     * Create approval request
     *
     * @param  \LaunchDarklyApi\Model\CreateApprovalRequestRequest $create_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestAsync($create_approval_request_request, string $contentType = self::contentTypes['postApprovalRequest'][0])
    {
        return $this->postApprovalRequestAsyncWithHttpInfo($create_approval_request_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postApprovalRequestAsyncWithHttpInfo
     *
     * Create approval request
     *
     * @param  \LaunchDarklyApi\Model\CreateApprovalRequestRequest $create_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestAsyncWithHttpInfo($create_approval_request_request, string $contentType = self::contentTypes['postApprovalRequest'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\ApprovalRequestResponse';
        $request = $this->postApprovalRequestRequest($create_approval_request_request, $contentType);

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
     * Create request for operation 'postApprovalRequest'
     *
     * @param  \LaunchDarklyApi\Model\CreateApprovalRequestRequest $create_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postApprovalRequestRequest($create_approval_request_request, string $contentType = self::contentTypes['postApprovalRequest'][0])
    {

        // verify the required parameter 'create_approval_request_request' is set
        if ($create_approval_request_request === null || (is_array($create_approval_request_request) && count($create_approval_request_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_approval_request_request when calling postApprovalRequest'
            );
        }


        $resourcePath = '/api/v2/approval-requests';
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
        if (isset($create_approval_request_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_approval_request_request));
            } else {
                $httpBody = $create_approval_request_request;
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
     * Operation postApprovalRequestApply
     *
     * Apply approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApply'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\ApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postApprovalRequestApply($id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApply'][0])
    {
        list($response) = $this->postApprovalRequestApplyWithHttpInfo($id, $post_approval_request_apply_request, $contentType);
        return $response;
    }

    /**
     * Operation postApprovalRequestApplyWithHttpInfo
     *
     * Apply approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApply'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\ApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postApprovalRequestApplyWithHttpInfo($id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApply'][0])
    {
        $request = $this->postApprovalRequestApplyRequest($id, $post_approval_request_apply_request, $contentType);

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
                    if ('\LaunchDarklyApi\Model\ApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\ApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\ApprovalRequestResponse',
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
     * Operation postApprovalRequestApplyAsync
     *
     * Apply approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApply'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestApplyAsync($id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApply'][0])
    {
        return $this->postApprovalRequestApplyAsyncWithHttpInfo($id, $post_approval_request_apply_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postApprovalRequestApplyAsyncWithHttpInfo
     *
     * Apply approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApply'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestApplyAsyncWithHttpInfo($id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApply'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\ApprovalRequestResponse';
        $request = $this->postApprovalRequestApplyRequest($id, $post_approval_request_apply_request, $contentType);

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
     * Create request for operation 'postApprovalRequestApply'
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApply'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postApprovalRequestApplyRequest($id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApply'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling postApprovalRequestApply'
            );
        }

        // verify the required parameter 'post_approval_request_apply_request' is set
        if ($post_approval_request_apply_request === null || (is_array($post_approval_request_apply_request) && count($post_approval_request_apply_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $post_approval_request_apply_request when calling postApprovalRequestApply'
            );
        }


        $resourcePath = '/api/v2/approval-requests/{id}/apply';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if (isset($post_approval_request_apply_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($post_approval_request_apply_request));
            } else {
                $httpBody = $post_approval_request_apply_request;
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
     * Operation postApprovalRequestApplyForFlag
     *
     * Apply approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApplyForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postApprovalRequestApplyForFlag($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApplyForFlag'][0])
    {
        list($response) = $this->postApprovalRequestApplyForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, $contentType);
        return $response;
    }

    /**
     * Operation postApprovalRequestApplyForFlagWithHttpInfo
     *
     * Apply approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApplyForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postApprovalRequestApplyForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApplyForFlag'][0])
    {
        $request = $this->postApprovalRequestApplyForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, $contentType);

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
                    if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse',
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
     * Operation postApprovalRequestApplyForFlagAsync
     *
     * Apply approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApplyForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestApplyForFlagAsync($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApplyForFlag'][0])
    {
        return $this->postApprovalRequestApplyForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postApprovalRequestApplyForFlagAsyncWithHttpInfo
     *
     * Apply approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApplyForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestApplyForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApplyForFlag'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
        $request = $this->postApprovalRequestApplyForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, $contentType);

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
     * Create request for operation 'postApprovalRequestApplyForFlag'
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestApplyRequest $post_approval_request_apply_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestApplyForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postApprovalRequestApplyForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_apply_request, string $contentType = self::contentTypes['postApprovalRequestApplyForFlag'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling postApprovalRequestApplyForFlag'
            );
        }

        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling postApprovalRequestApplyForFlag'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling postApprovalRequestApplyForFlag'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling postApprovalRequestApplyForFlag'
            );
        }

        // verify the required parameter 'post_approval_request_apply_request' is set
        if ($post_approval_request_apply_request === null || (is_array($post_approval_request_apply_request) && count($post_approval_request_apply_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $post_approval_request_apply_request when calling postApprovalRequestApplyForFlag'
            );
        }


        $resourcePath = '/api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/apply';
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
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
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
        if (isset($post_approval_request_apply_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($post_approval_request_apply_request));
            } else {
                $httpBody = $post_approval_request_apply_request;
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
     * Operation postApprovalRequestForFlag
     *
     * Create approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest $create_flag_config_approval_request_request create_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postApprovalRequestForFlag($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, string $contentType = self::contentTypes['postApprovalRequestForFlag'][0])
    {
        list($response) = $this->postApprovalRequestForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, $contentType);
        return $response;
    }

    /**
     * Operation postApprovalRequestForFlagWithHttpInfo
     *
     * Create approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest $create_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postApprovalRequestForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, string $contentType = self::contentTypes['postApprovalRequestForFlag'][0])
    {
        $request = $this->postApprovalRequestForFlagRequest($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, $contentType);

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
                case 201:
                    if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse',
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
     * Operation postApprovalRequestForFlagAsync
     *
     * Create approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest $create_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestForFlagAsync($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, string $contentType = self::contentTypes['postApprovalRequestForFlag'][0])
    {
        return $this->postApprovalRequestForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postApprovalRequestForFlagAsyncWithHttpInfo
     *
     * Create approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest $create_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, string $contentType = self::contentTypes['postApprovalRequestForFlag'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
        $request = $this->postApprovalRequestForFlagRequest($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, $contentType);

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
     * Create request for operation 'postApprovalRequestForFlag'
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  \LaunchDarklyApi\Model\CreateFlagConfigApprovalRequestRequest $create_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postApprovalRequestForFlagRequest($project_key, $feature_flag_key, $environment_key, $create_flag_config_approval_request_request, string $contentType = self::contentTypes['postApprovalRequestForFlag'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling postApprovalRequestForFlag'
            );
        }

        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling postApprovalRequestForFlag'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling postApprovalRequestForFlag'
            );
        }

        // verify the required parameter 'create_flag_config_approval_request_request' is set
        if ($create_flag_config_approval_request_request === null || (is_array($create_flag_config_approval_request_request) && count($create_flag_config_approval_request_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_flag_config_approval_request_request when calling postApprovalRequestForFlag'
            );
        }


        $resourcePath = '/api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests';
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
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
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
        if (isset($create_flag_config_approval_request_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_flag_config_approval_request_request));
            } else {
                $httpBody = $create_flag_config_approval_request_request;
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
     * Operation postApprovalRequestReview
     *
     * Review approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReview'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\ApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\MethodNotAllowedErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postApprovalRequestReview($id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReview'][0])
    {
        list($response) = $this->postApprovalRequestReviewWithHttpInfo($id, $post_approval_request_review_request, $contentType);
        return $response;
    }

    /**
     * Operation postApprovalRequestReviewWithHttpInfo
     *
     * Review approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReview'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\ApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\MethodNotAllowedErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postApprovalRequestReviewWithHttpInfo($id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReview'][0])
    {
        $request = $this->postApprovalRequestReviewRequest($id, $post_approval_request_review_request, $contentType);

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
                    if ('\LaunchDarklyApi\Model\ApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\ApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\UnauthorizedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\LaunchDarklyApi\Model\NotFoundErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\NotFoundErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\NotFoundErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\LaunchDarklyApi\Model\MethodNotAllowedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\MethodNotAllowedErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\MethodNotAllowedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\LaunchDarklyApi\Model\StatusConflictErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\StatusConflictErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatusConflictErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\ApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\ApprovalRequestResponse',
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
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\NotFoundErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 405:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\MethodNotAllowedErrorRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
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
     * Operation postApprovalRequestReviewAsync
     *
     * Review approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReview'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestReviewAsync($id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReview'][0])
    {
        return $this->postApprovalRequestReviewAsyncWithHttpInfo($id, $post_approval_request_review_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postApprovalRequestReviewAsyncWithHttpInfo
     *
     * Review approval request
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReview'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestReviewAsyncWithHttpInfo($id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReview'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\ApprovalRequestResponse';
        $request = $this->postApprovalRequestReviewRequest($id, $post_approval_request_review_request, $contentType);

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
     * Create request for operation 'postApprovalRequestReview'
     *
     * @param  string $id The approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReview'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postApprovalRequestReviewRequest($id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReview'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling postApprovalRequestReview'
            );
        }

        // verify the required parameter 'post_approval_request_review_request' is set
        if ($post_approval_request_review_request === null || (is_array($post_approval_request_review_request) && count($post_approval_request_review_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $post_approval_request_review_request when calling postApprovalRequestReview'
            );
        }


        $resourcePath = '/api/v2/approval-requests/{id}/reviews';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
        if (isset($post_approval_request_review_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($post_approval_request_review_request));
            } else {
                $httpBody = $post_approval_request_review_request;
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
     * Operation postApprovalRequestReviewForFlag
     *
     * Review approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReviewForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postApprovalRequestReviewForFlag($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReviewForFlag'][0])
    {
        list($response) = $this->postApprovalRequestReviewForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, $contentType);
        return $response;
    }

    /**
     * Operation postApprovalRequestReviewForFlagWithHttpInfo
     *
     * Review approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReviewForFlag'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\NotFoundErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postApprovalRequestReviewForFlagWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReviewForFlag'][0])
    {
        $request = $this->postApprovalRequestReviewForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, $contentType);

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
                    if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
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
                        '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse',
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
     * Operation postApprovalRequestReviewForFlagAsync
     *
     * Review approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReviewForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestReviewForFlagAsync($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReviewForFlag'][0])
    {
        return $this->postApprovalRequestReviewForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postApprovalRequestReviewForFlagAsyncWithHttpInfo
     *
     * Review approval request for a flag
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReviewForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postApprovalRequestReviewForFlagAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReviewForFlag'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
        $request = $this->postApprovalRequestReviewForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, $contentType);

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
     * Create request for operation 'postApprovalRequestReviewForFlag'
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key (required)
     * @param  string $id The feature flag approval request ID (required)
     * @param  \LaunchDarklyApi\Model\PostApprovalRequestReviewRequest $post_approval_request_review_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postApprovalRequestReviewForFlag'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postApprovalRequestReviewForFlagRequest($project_key, $feature_flag_key, $environment_key, $id, $post_approval_request_review_request, string $contentType = self::contentTypes['postApprovalRequestReviewForFlag'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling postApprovalRequestReviewForFlag'
            );
        }

        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling postApprovalRequestReviewForFlag'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling postApprovalRequestReviewForFlag'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling postApprovalRequestReviewForFlag'
            );
        }

        // verify the required parameter 'post_approval_request_review_request' is set
        if ($post_approval_request_review_request === null || (is_array($post_approval_request_review_request) && count($post_approval_request_review_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $post_approval_request_review_request when calling postApprovalRequestReviewForFlag'
            );
        }


        $resourcePath = '/api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests/{id}/reviews';
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
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
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
        if (isset($post_approval_request_review_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($post_approval_request_review_request));
            } else {
                $httpBody = $post_approval_request_review_request;
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
     * Operation postFlagCopyConfigApprovalRequest
     *
     * Create approval request to copy flag configurations across environments
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key for the target environment (required)
     * @param  \LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest $create_copy_flag_config_approval_request_request create_copy_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postFlagCopyConfigApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep
     */
    public function postFlagCopyConfigApprovalRequest($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, string $contentType = self::contentTypes['postFlagCopyConfigApprovalRequest'][0])
    {
        list($response) = $this->postFlagCopyConfigApprovalRequestWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, $contentType);
        return $response;
    }

    /**
     * Operation postFlagCopyConfigApprovalRequestWithHttpInfo
     *
     * Create approval request to copy flag configurations across environments
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key for the target environment (required)
     * @param  \LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest $create_copy_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postFlagCopyConfigApprovalRequest'] to see the possible values for this operation
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse|\LaunchDarklyApi\Model\InvalidRequestErrorRep|\LaunchDarklyApi\Model\UnauthorizedErrorRep|\LaunchDarklyApi\Model\ForbiddenErrorRep|\LaunchDarklyApi\Model\StatusConflictErrorRep|\LaunchDarklyApi\Model\RateLimitedErrorRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function postFlagCopyConfigApprovalRequestWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, string $contentType = self::contentTypes['postFlagCopyConfigApprovalRequest'][0])
    {
        $request = $this->postFlagCopyConfigApprovalRequestRequest($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, $contentType);

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
                case 201:
                    if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\InvalidRequestErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
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
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ForbiddenErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 409:
                    if ('\LaunchDarklyApi\Model\StatusConflictErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\StatusConflictErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatusConflictErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\LaunchDarklyApi\Model\RateLimitedErrorRep' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RateLimitedErrorRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse',
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
                case 409:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\LaunchDarklyApi\Model\StatusConflictErrorRep',
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
     * Operation postFlagCopyConfigApprovalRequestAsync
     *
     * Create approval request to copy flag configurations across environments
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key for the target environment (required)
     * @param  \LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest $create_copy_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postFlagCopyConfigApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postFlagCopyConfigApprovalRequestAsync($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, string $contentType = self::contentTypes['postFlagCopyConfigApprovalRequest'][0])
    {
        return $this->postFlagCopyConfigApprovalRequestAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postFlagCopyConfigApprovalRequestAsyncWithHttpInfo
     *
     * Create approval request to copy flag configurations across environments
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key for the target environment (required)
     * @param  \LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest $create_copy_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postFlagCopyConfigApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postFlagCopyConfigApprovalRequestAsyncWithHttpInfo($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, string $contentType = self::contentTypes['postFlagCopyConfigApprovalRequest'][0])
    {
        $returnType = '\LaunchDarklyApi\Model\FlagConfigApprovalRequestResponse';
        $request = $this->postFlagCopyConfigApprovalRequestRequest($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, $contentType);

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
     * Create request for operation 'postFlagCopyConfigApprovalRequest'
     *
     * @param  string $project_key The project key (required)
     * @param  string $feature_flag_key The feature flag key (required)
     * @param  string $environment_key The environment key for the target environment (required)
     * @param  \LaunchDarklyApi\Model\CreateCopyFlagConfigApprovalRequestRequest $create_copy_flag_config_approval_request_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postFlagCopyConfigApprovalRequest'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postFlagCopyConfigApprovalRequestRequest($project_key, $feature_flag_key, $environment_key, $create_copy_flag_config_approval_request_request, string $contentType = self::contentTypes['postFlagCopyConfigApprovalRequest'][0])
    {

        // verify the required parameter 'project_key' is set
        if ($project_key === null || (is_array($project_key) && count($project_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_key when calling postFlagCopyConfigApprovalRequest'
            );
        }

        // verify the required parameter 'feature_flag_key' is set
        if ($feature_flag_key === null || (is_array($feature_flag_key) && count($feature_flag_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $feature_flag_key when calling postFlagCopyConfigApprovalRequest'
            );
        }

        // verify the required parameter 'environment_key' is set
        if ($environment_key === null || (is_array($environment_key) && count($environment_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $environment_key when calling postFlagCopyConfigApprovalRequest'
            );
        }

        // verify the required parameter 'create_copy_flag_config_approval_request_request' is set
        if ($create_copy_flag_config_approval_request_request === null || (is_array($create_copy_flag_config_approval_request_request) && count($create_copy_flag_config_approval_request_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_copy_flag_config_approval_request_request when calling postFlagCopyConfigApprovalRequest'
            );
        }


        $resourcePath = '/api/v2/projects/{projectKey}/flags/{featureFlagKey}/environments/{environmentKey}/approval-requests-flag-copy';
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
        if ($feature_flag_key !== null) {
            $resourcePath = str_replace(
                '{' . 'featureFlagKey' . '}',
                ObjectSerializer::toPathValue($feature_flag_key),
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
        if (isset($create_copy_flag_config_approval_request_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_copy_flag_config_approval_request_request));
            } else {
                $httpBody = $create_copy_flag_config_approval_request_request;
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
