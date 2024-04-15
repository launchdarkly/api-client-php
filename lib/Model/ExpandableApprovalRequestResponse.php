<?php
/**
 * ExpandableApprovalRequestResponse
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
 * # Overview  ## Authentication  LaunchDarkly's REST API uses the HTTPS protocol with a minimum TLS version of 1.2.  All REST API resources are authenticated with either [personal or service access tokens](https://docs.launchdarkly.com/home/account-security/api-access-tokens), or session cookies. Other authentication mechanisms are not supported. You can manage personal access tokens on your [**Account settings**](https://app.launchdarkly.com/settings/tokens) page.  LaunchDarkly also has SDK keys, mobile keys, and client-side IDs that are used by our server-side SDKs, mobile SDKs, and JavaScript-based SDKs, respectively. **These keys cannot be used to access our REST API**. These keys are environment-specific, and can only perform read-only operations such as fetching feature flag settings.  | Auth mechanism                                                                                  | Allowed resources                                                                                     | Use cases                                          | | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------- | | [Personal or service access tokens](https://docs.launchdarkly.com/home/account-security/api-access-tokens) | Can be customized on a per-token basis                                                                | Building scripts, custom integrations, data export. | | SDK keys                                                                                        | Can only access read-only resources specific to server-side SDKs. Restricted to a single environment. | Server-side SDKs                     | | Mobile keys                                                                                     | Can only access read-only resources specific to mobile SDKs, and only for flags marked available to mobile keys. Restricted to a single environment.           | Mobile SDKs                                        | | Client-side ID                                                                                  | Can only access read-only resources specific to JavaScript-based client-side SDKs, and only for flags marked available to client-side. Restricted to a single environment.           | Client-side JavaScript                             |  > #### Keep your access tokens and SDK keys private > > Access tokens should _never_ be exposed in untrusted contexts. Never put an access token in client-side JavaScript, or embed it in a mobile application. LaunchDarkly has special mobile keys that you can embed in mobile apps. If you accidentally expose an access token or SDK key, you can reset it from your [**Account settings**](https://app.launchdarkly.com/settings/tokens) page. > > The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.  ### Authentication using request header  The preferred way to authenticate with the API is by adding an `Authorization` header containing your access token to your requests. The value of the `Authorization` header must be your access token.  Manage personal access tokens from the [**Account settings**](https://app.launchdarkly.com/settings/tokens) page.  ### Authentication using session cookie  For testing purposes, you can make API calls directly from your web browser. If you are logged in to the LaunchDarkly application, the API will use your existing session to authenticate calls.  If you have a [role](https://docs.launchdarkly.com/home/team/built-in-roles) other than Admin, or have a [custom role](https://docs.launchdarkly.com/home/team/custom-roles) defined, you may not have permission to perform some API calls. You will receive a `401` response code in that case.  > ### Modifying the Origin header causes an error > > LaunchDarkly validates that the Origin header for any API request authenticated by a session cookie matches the expected Origin header. The expected Origin header is `https://app.launchdarkly.com`. > > If the Origin header does not match what's expected, LaunchDarkly returns an error. This error can prevent the LaunchDarkly app from working correctly. > > Any browser extension that intentionally changes the Origin header can cause this problem. For example, the `Allow-Control-Allow-Origin: *` Chrome extension changes the Origin header to `http://evil.com` and causes the app to fail. > > To prevent this error, do not modify your Origin header. > > LaunchDarkly does not require origin matching when authenticating with an access token, so this issue does not affect normal API usage.  ## Representations  All resources expect and return JSON response bodies. Error responses also send a JSON body. To learn more about the error format of the API, read [Errors](/#section/Overview/Errors).  In practice this means that you always get a response with a `Content-Type` header set to `application/json`.  In addition, request bodies for `PATCH`, `POST`, and `PUT` requests must be encoded as JSON with a `Content-Type` header set to `application/json`.  ### Summary and detailed representations  When you fetch a list of resources, the response includes only the most important attributes of each resource. This is a _summary representation_ of the resource. When you fetch an individual resource, such as a single feature flag, you receive a _detailed representation_ of the resource.  The best way to find a detailed representation is to follow links. Every summary representation includes a link to its detailed representation.  ### Expanding responses  Sometimes the detailed representation of a resource does not include all of the attributes of the resource by default. If this is the case, the request method will clearly document this and describe which attributes you can include in an expanded response.  To include the additional attributes, append the `expand` request parameter to your request and add a comma-separated list of the attributes to include. For example, when you append `?expand=members,roles` to the [Get team](/tag/Teams#operation/getTeam) endpoint, the expanded response includes both of these attributes.  ### Links and addressability  The best way to navigate the API is by following links. These are attributes in representations that link to other resources. The API always uses the same format for links:  - Links to other resources within the API are encapsulated in a `_links` object - If the resource has a corresponding link to HTML content on the site, it is stored in a special `_site` link  Each link has two attributes:  - An `href`, which contains the URL - A `type`, which describes the content type  For example, a feature resource might return the following:  ```json {   \"_links\": {     \"parent\": {       \"href\": \"/api/features\",       \"type\": \"application/json\"     },     \"self\": {       \"href\": \"/api/features/sort.order\",       \"type\": \"application/json\"     }   },   \"_site\": {     \"href\": \"/features/sort.order\",     \"type\": \"text/html\"   } } ```  From this, you can navigate to the parent collection of features by following the `parent` link, or navigate to the site page for the feature by following the `_site` link.  Collections are always represented as a JSON object with an `items` attribute containing an array of representations. Like all other representations, collections have `_links` defined at the top level.  Paginated collections include `first`, `last`, `next`, and `prev` links containing a URL with the respective set of elements in the collection.  ## Updates  Resources that accept partial updates use the `PATCH` verb. Most resources support the [JSON patch](/reference#updates-using-json-patch) format. Some resources also support the [JSON merge patch](/reference#updates-using-json-merge-patch) format, and some resources support the [semantic patch](/reference#updates-using-semantic-patch) format, which is a way to specify the modifications to perform as a set of executable instructions. Each resource supports optional [comments](/reference#updates-with-comments) that you can submit with updates. Comments appear in outgoing webhooks, the audit log, and other integrations.  When a resource supports both JSON patch and semantic patch, we document both in the request method. However, the specific request body fields and descriptions included in our documentation only match one type of patch or the other.  ### Updates using JSON patch  [JSON patch](https://datatracker.ietf.org/doc/html/rfc6902) is a way to specify the modifications to perform on a resource. JSON patch uses paths and a limited set of operations to describe how to transform the current state of the resource into a new state. JSON patch documents are always arrays, where each element contains an operation, a path to the field to update, and the new value.  For example, in this feature flag representation:  ```json {     \"name\": \"New recommendations engine\",     \"key\": \"engine.enable\",     \"description\": \"This is the description\",     ... } ``` You can change the feature flag's description with the following patch document:  ```json [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"This is the new description\" }] ```  You can specify multiple modifications to perform in a single request. You can also test that certain preconditions are met before applying the patch:  ```json [   { \"op\": \"test\", \"path\": \"/version\", \"value\": 10 },   { \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" } ] ```  The above patch request tests whether the feature flag's `version` is `10`, and if so, changes the feature flag's description.  Attributes that are not editable, such as a resource's `_links`, have names that start with an underscore.  ### Updates using JSON merge patch  [JSON merge patch](https://datatracker.ietf.org/doc/html/rfc7386) is another format for specifying the modifications to perform on a resource. JSON merge patch is less expressive than JSON patch. However, in many cases it is simpler to construct a merge patch document. For example, you can change a feature flag's description with the following merge patch document:  ```json {   \"description\": \"New flag description\" } ```  ### Updates using semantic patch  Some resources support the semantic patch format. A semantic patch is a way to specify the modifications to perform on a resource as a set of executable instructions.  Semantic patch allows you to be explicit about intent using precise, custom instructions. In many cases, you can define semantic patch instructions independently of the current state of the resource. This can be useful when defining a change that may be applied at a future date.  To make a semantic patch request, you must append `domain-model=launchdarkly.semanticpatch` to your `Content-Type` header.  Here's how:  ``` Content-Type: application/json; domain-model=launchdarkly.semanticpatch ```  If you call a semantic patch resource without this header, you will receive a `400` response because your semantic patch will be interpreted as a JSON patch.  The body of a semantic patch request takes the following properties:  * `comment` (string): (Optional) A description of the update. * `environmentKey` (string): (Required for some resources only) The environment key. * `instructions` (array): (Required) A list of actions the update should perform. Each action in the list must be an object with a `kind` property that indicates the instruction. If the instruction requires parameters, you must include those parameters as additional fields in the object. The documentation for each resource that supports semantic patch includes the available instructions and any additional parameters.  For example:  ```json {   \"comment\": \"optional comment\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  If any instruction in the patch encounters an error, the endpoint returns an error and will not change the resource. In general, each instruction silently does nothing if the resource is already in the state you request.  ### Updates with comments  You can submit optional comments with `PATCH` changes.  To submit a comment along with a JSON patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"patch\": [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" }] } ```  To submit a comment along with a JSON merge patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"merge\": { \"description\": \"New flag description\" } } ```  To submit a comment along with a semantic patch, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"instructions\": [ {\"kind\": \"turnFlagOn\"} ] } ```  ## Errors  The API always returns errors in a common format. Here's an example:  ```json {   \"code\": \"invalid_request\",   \"message\": \"A feature with that key already exists\",   \"id\": \"30ce6058-87da-11e4-b116-123b93f75cba\" } ```  The `code` indicates the general class of error. The `message` is a human-readable explanation of what went wrong. The `id` is a unique identifier. Use it when you're working with LaunchDarkly Support to debug a problem with a specific API call.  ### HTTP status error response codes  | Code | Definition        | Description                                                                                       | Possible Solution                                                | | ---- | ----------------- | ------------------------------------------------------------------------------------------- | ---------------------------------------------------------------- | | 400  | Invalid request       | The request cannot be understood.                                    | Ensure JSON syntax in request body is correct.                   | | 401  | Invalid access token      | Requestor is unauthorized or does not have permission for this API call.                                                | Ensure your API access token is valid and has the appropriate permissions.                                     | | 403  | Forbidden         | Requestor does not have access to this resource.                                                | Ensure that the account member or access token has proper permissions set. | | 404  | Invalid resource identifier | The requested resource is not valid. | Ensure that the resource is correctly identified by ID or key. | | 405  | Method not allowed | The request method is not allowed on this resource. | Ensure that the HTTP verb is correct. | | 409  | Conflict          | The API request can not be completed because it conflicts with a concurrent API request. | Retry your request.                                              | | 422  | Unprocessable entity | The API request can not be completed because the update description can not be understood. | Ensure that the request body is correct for the type of patch you are using, either JSON patch or semantic patch. | 429  | Too many requests | Read [Rate limiting](/#section/Overview/Rate-limiting).                                               | Wait and try again later.                                        |  ## CORS  The LaunchDarkly API supports Cross Origin Resource Sharing (CORS) for AJAX requests from any origin. If an `Origin` header is given in a request, it will be echoed as an explicitly allowed origin. Otherwise the request returns a wildcard, `Access-Control-Allow-Origin: *`. For more information on CORS, read the [CORS W3C Recommendation](http://www.w3.org/TR/cors). Example CORS headers might look like:  ```http Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, Authorization Access-Control-Allow-Methods: OPTIONS, GET, DELETE, PATCH Access-Control-Allow-Origin: * Access-Control-Max-Age: 300 ```  You can make authenticated CORS calls just as you would make same-origin calls, using either [token or session-based authentication](/#section/Overview/Authentication). If you are using session authentication, you should set the `withCredentials` property for your `xhr` request to `true`. You should never expose your access tokens to untrusted entities.  ## Rate limiting  We use several rate limiting strategies to ensure the availability of our APIs. Rate-limited calls to our APIs return a `429` status code. Calls to our APIs include headers indicating the current rate limit status. The specific headers returned depend on the API route being called. The limits differ based on the route, authentication mechanism, and other factors. Routes that are not rate limited may not contain any of the headers described below.  > ### Rate limiting and SDKs > > LaunchDarkly SDKs are never rate limited and do not use the API endpoints defined here. LaunchDarkly uses a different set of approaches, including streaming/server-sent events and a global CDN, to ensure availability to the routes used by LaunchDarkly SDKs.  ### Global rate limits  Authenticated requests are subject to a global limit. This is the maximum number of calls that your account can make to the API per ten seconds. All service and personal access tokens on the account share this limit, so exceeding the limit with one access token will impact other tokens. Calls that are subject to global rate limits may return the headers below:  | Header name                    | Description                                                                      | | ------------------------------ | -------------------------------------------------------------------------------- | | `X-Ratelimit-Global-Remaining` | The maximum number of requests the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`            | The time at which the current rate limit window resets in epoch milliseconds.    |  We do not publicly document the specific number of calls that can be made globally. This limit may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limit.  ### Route-level rate limits  Some authenticated routes have custom rate limits. These also reset every ten seconds. Any service or personal access tokens hitting the same route share this limit, so exceeding the limit with one access token may impact other tokens. Calls that are subject to route-level rate limits return the headers below:  | Header name                   | Description                                                                                           | | ----------------------------- | ----------------------------------------------------------------------------------------------------- | | `X-Ratelimit-Route-Remaining` | The maximum number of requests to the current route the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`           | The time at which the current rate limit window resets in epoch milliseconds.                         |  A _route_ represents a specific URL pattern and verb. For example, the [Delete environment](/tag/Environments#operation/deleteEnvironment) endpoint is considered a single route, and each call to delete an environment counts against your route-level rate limit for that route.  We do not publicly document the specific number of calls that an account can make to each endpoint per ten seconds. These limits may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limits.  ### IP-based rate limiting  We also employ IP-based rate limiting on some API routes. If you hit an IP-based rate limit, your API response will include a `Retry-After` header indicating how long to wait before re-trying the call. Clients must wait at least `Retry-After` seconds before making additional calls to our API, and should employ jitter and backoff strategies to avoid triggering rate limits again.  ## OpenAPI (Swagger) and client libraries  We have a [complete OpenAPI (Swagger) specification](https://app.launchdarkly.com/api/v2/openapi.json) for our API.  We auto-generate multiple client libraries based on our OpenAPI specification. To learn more, visit the [collection of client libraries on GitHub](https://github.com/search?q=topic%3Alaunchdarkly-api+org%3Alaunchdarkly&type=Repositories). You can also use this specification to generate client libraries to interact with our REST API in your language of choice.  Our OpenAPI specification is supported by several API-based tools such as Postman and Insomnia. In many cases, you can directly import our specification to explore our APIs.  ## Method overriding  Some firewalls and HTTP clients restrict the use of verbs other than `GET` and `POST`. In those environments, our API endpoints that use `DELETE`, `PATCH`, and `PUT` verbs are inaccessible.  To avoid this issue, our API supports the `X-HTTP-Method-Override` header, allowing clients to \"tunnel\" `DELETE`, `PATCH`, and `PUT` requests using a `POST` request.  For example, to call a `PATCH` endpoint using a `POST` request, you can include `X-HTTP-Method-Override:PATCH` as a header.  ## Beta resources  We sometimes release new API resources in **beta** status before we release them with general availability.  Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  We try to promote resources into general availability as quickly as possible. This happens after sufficient testing and when we're satisfied that we no longer need to make backwards-incompatible changes.  We mark beta resources with a \"Beta\" callout in our documentation, pictured below:  > ### This feature is in beta > > To use this feature, pass in a header including the `LD-API-Version` key with value set to `beta`. Use this header with each call. To learn more, read [Beta resources](/#section/Overview/Beta-resources). > > Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  ### Using beta resources  To use a beta resource, you must include a header in the request. If you call a beta resource without this header, you receive a `403` response.  Use this header:  ``` LD-API-Version: beta ```  ## Federal environments  The version of LaunchDarkly that is available on domains controlled by the United States government is different from the version of LaunchDarkly available to the general public. If you are an employee or contractor for a United States federal agency and use LaunchDarkly in your work, you likely use the federal instance of LaunchDarkly.  If you are working in the federal instance of LaunchDarkly, the base URI for each request is `https://app.launchdarkly.us`. In the \"Try it\" sandbox for each request, click the request path to view the complete resource path for the federal environment.  To learn more, read [LaunchDarkly in federal environments](https://docs.launchdarkly.com/home/advanced/federal).  ## Versioning  We try hard to keep our REST API backwards compatible, but we occasionally have to make backwards-incompatible changes in the process of shipping new features. These breaking changes can cause unexpected behavior if you don't prepare for them accordingly.  Updates to our REST API include support for the latest features in LaunchDarkly. We also release a new version of our REST API every time we make a breaking change. We provide simultaneous support for multiple API versions so you can migrate from your current API version to a new version at your own pace.  ### Setting the API version per request  You can set the API version on a specific request by sending an `LD-API-Version` header, as shown in the example below:  ``` LD-API-Version: 20240415 ```  The header value is the version number of the API version you would like to request. The number for each version corresponds to the date the version was released in `yyyymmdd` format. In the example above the version `20240415` corresponds to April 15, 2024.  ### Setting the API version per access token  When you create an access token, you must specify a specific version of the API to use. This ensures that integrations using this token cannot be broken by version changes.  Tokens created before versioning was released have their version set to `20160426`, which is the version of the API that existed before the current versioning scheme, so that they continue working the same way they did before versioning.  If you would like to upgrade your integration to use a new API version, you can explicitly set the header described above.  > ### Best practice: Set the header for every client or integration > > We recommend that you set the API version header explicitly in any client or integration you build. > > Only rely on the access token API version during manual testing.  ### API version changelog  |<div style=\"width:75px\">Version</div> | Changes | End of life (EOL) |---|---|---| | `20240415` | <ul><li>Changed several endpoints from unpaginated to paginated. Use the `limit` and `offset` query parameters to page through the results.</li> <li>Changed the [list access tokens](/tag/Access-tokens#operation/getTokens) endpoint: <ul><li>Response is now paginated with a default limit of `25`</li></ul></li> <li>Changed the [list account members](/tag/Account-members#operation/getMembers) endpoint: <ul><li>The `accessCheck` filter is no longer available</li></ul></li> <li>Changed the [list custom roles](/tag/Custom-roles#operation/getCustomRoles) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list feature flags](/tag/Feature-flags#operation/getFeatureFlags) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `environments` field is now only returned if the request is filtered by environment, using the `filterEnv` query parameter</li><li>The `filterEnv` query parameter supports a maximum of three environments</li><li>The `followerId`, `hasDataExport`, `status`, `contextKindTargeted`, and `segmentTargeted` filters are no longer available</li></ul></li> <li>Changed the [list segments](/tag/Segments#operation/getSegments) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li></ul></li> <li>Changed the [list teams](/tag/Teams#operation/getTeams) endpoint: <ul><li>The `expand` parameter no longer supports including `projects` or `roles`</li><li>In paginated results, the maximum page size is now 100</li></ul></li> <li>Changed the [get workflows](/tag/Workflows#operation/getWorkflows) endpoint: <ul><li>Response is now paginated with a default limit of `20`</li><li>The `_conflicts` field in the response is no longer available</li></ul></li> </ul>  | Current | | `20220603` | <ul><li>Changed the [list projects](/tag/Projects#operation/getProjects) return value:<ul><li>Response is now paginated with a default limit of `20`.</li><li>Added support for filter and sort.</li><li>The project `environments` field is now expandable. This field is omitted by default.</li></ul></li><li>Changed the [get project](/tag/Projects#operation/getProject) return value:<ul><li>The `environments` field is now expandable. This field is omitted by default.</li></ul></li></ul> | 2025-04-15 | | `20210729` | <ul><li>Changed the [create approval request](/tag/Approvals#operation/postApprovalRequest) return value. It now returns HTTP Status Code `201` instead of `200`.</li><li> Changed the [get users](/tag/Users#operation/getUser) return value. It now returns a user record, not a user. </li><li>Added additional optional fields to environment, segments, flags, members, and segments, including the ability to create big segments. </li><li> Added default values for flag variations when new environments are created. </li><li>Added filtering and pagination for getting flags and members, including `limit`, `number`, `filter`, and `sort` query parameters. </li><li>Added endpoints for expiring user targets for flags and segments, scheduled changes, access tokens, Relay Proxy configuration, integrations and subscriptions, and approvals. </li></ul> | 2023-06-03 | | `20191212` | <ul><li>[List feature flags](/tag/Feature-flags#operation/getFeatureFlags) now defaults to sending summaries of feature flag configurations, equivalent to setting the query parameter `summary=true`. Summaries omit flag targeting rules and individual user targets from the payload. </li><li> Added endpoints for flags, flag status, projects, environments, audit logs, members, users, custom roles, segments, usage, streams, events, and data export. </li></ul> | 2022-07-29 | | `20160426` | <ul><li>Initial versioning of API. Tokens created before versioning have their version set to this.</li></ul> | 2020-12-12 |  To learn more about how EOL is determined, read LaunchDarkly's [End of Life (EOL) Policy](https://launchdarkly.com/policies/end-of-life-policy/).
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
 * ExpandableApprovalRequestResponse Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class ExpandableApprovalRequestResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ExpandableApprovalRequestResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        '_id' => 'string',
        '_version' => 'int',
        'creation_date' => 'int',
        'service_kind' => 'string',
        'requestor_id' => 'string',
        'description' => 'string',
        'review_status' => 'string',
        'all_reviews' => '\LaunchDarklyApi\Model\ReviewResponse[]',
        'notify_member_ids' => 'string[]',
        'applied_date' => 'int',
        'applied_by_member_id' => 'string',
        'applied_by_service_token_id' => 'string',
        'status' => 'string',
        'instructions' => 'array[]',
        'conflicts' => '\LaunchDarklyApi\Model\Conflict[]',
        '_links' => 'array<string,mixed>',
        'execution_date' => 'int',
        'operating_on_id' => 'string',
        'integration_metadata' => '\LaunchDarklyApi\Model\IntegrationMetadata',
        'source' => '\LaunchDarklyApi\Model\CopiedFromEnv',
        'custom_workflow_metadata' => '\LaunchDarklyApi\Model\CustomWorkflowMeta',
        'resource_id' => 'string',
        'approval_settings' => '\LaunchDarklyApi\Model\ApprovalSettings',
        'project' => '\LaunchDarklyApi\Model\Project',
        'environments' => '\LaunchDarklyApi\Model\Environment[]',
        'flag' => '\LaunchDarklyApi\Model\ExpandedFlagRep'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        '_id' => null,
        '_version' => null,
        'creation_date' => 'int64',
        'service_kind' => null,
        'requestor_id' => null,
        'description' => null,
        'review_status' => null,
        'all_reviews' => null,
        'notify_member_ids' => null,
        'applied_date' => 'int64',
        'applied_by_member_id' => null,
        'applied_by_service_token_id' => null,
        'status' => null,
        'instructions' => null,
        'conflicts' => null,
        '_links' => null,
        'execution_date' => 'int64',
        'operating_on_id' => null,
        'integration_metadata' => null,
        'source' => null,
        'custom_workflow_metadata' => null,
        'resource_id' => null,
        'approval_settings' => null,
        'project' => null,
        'environments' => null,
        'flag' => null
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
        '_id' => '_id',
        '_version' => '_version',
        'creation_date' => 'creationDate',
        'service_kind' => 'serviceKind',
        'requestor_id' => 'requestorId',
        'description' => 'description',
        'review_status' => 'reviewStatus',
        'all_reviews' => 'allReviews',
        'notify_member_ids' => 'notifyMemberIds',
        'applied_date' => 'appliedDate',
        'applied_by_member_id' => 'appliedByMemberId',
        'applied_by_service_token_id' => 'appliedByServiceTokenId',
        'status' => 'status',
        'instructions' => 'instructions',
        'conflicts' => 'conflicts',
        '_links' => '_links',
        'execution_date' => 'executionDate',
        'operating_on_id' => 'operatingOnId',
        'integration_metadata' => 'integrationMetadata',
        'source' => 'source',
        'custom_workflow_metadata' => 'customWorkflowMetadata',
        'resource_id' => 'resourceId',
        'approval_settings' => 'approvalSettings',
        'project' => 'project',
        'environments' => 'environments',
        'flag' => 'flag'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        '_id' => 'setId',
        '_version' => 'setVersion',
        'creation_date' => 'setCreationDate',
        'service_kind' => 'setServiceKind',
        'requestor_id' => 'setRequestorId',
        'description' => 'setDescription',
        'review_status' => 'setReviewStatus',
        'all_reviews' => 'setAllReviews',
        'notify_member_ids' => 'setNotifyMemberIds',
        'applied_date' => 'setAppliedDate',
        'applied_by_member_id' => 'setAppliedByMemberId',
        'applied_by_service_token_id' => 'setAppliedByServiceTokenId',
        'status' => 'setStatus',
        'instructions' => 'setInstructions',
        'conflicts' => 'setConflicts',
        '_links' => 'setLinks',
        'execution_date' => 'setExecutionDate',
        'operating_on_id' => 'setOperatingOnId',
        'integration_metadata' => 'setIntegrationMetadata',
        'source' => 'setSource',
        'custom_workflow_metadata' => 'setCustomWorkflowMetadata',
        'resource_id' => 'setResourceId',
        'approval_settings' => 'setApprovalSettings',
        'project' => 'setProject',
        'environments' => 'setEnvironments',
        'flag' => 'setFlag'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        '_id' => 'getId',
        '_version' => 'getVersion',
        'creation_date' => 'getCreationDate',
        'service_kind' => 'getServiceKind',
        'requestor_id' => 'getRequestorId',
        'description' => 'getDescription',
        'review_status' => 'getReviewStatus',
        'all_reviews' => 'getAllReviews',
        'notify_member_ids' => 'getNotifyMemberIds',
        'applied_date' => 'getAppliedDate',
        'applied_by_member_id' => 'getAppliedByMemberId',
        'applied_by_service_token_id' => 'getAppliedByServiceTokenId',
        'status' => 'getStatus',
        'instructions' => 'getInstructions',
        'conflicts' => 'getConflicts',
        '_links' => 'getLinks',
        'execution_date' => 'getExecutionDate',
        'operating_on_id' => 'getOperatingOnId',
        'integration_metadata' => 'getIntegrationMetadata',
        'source' => 'getSource',
        'custom_workflow_metadata' => 'getCustomWorkflowMetadata',
        'resource_id' => 'getResourceId',
        'approval_settings' => 'getApprovalSettings',
        'project' => 'getProject',
        'environments' => 'getEnvironments',
        'flag' => 'getFlag'
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

    public const REVIEW_STATUS_APPROVED = 'approved';
    public const REVIEW_STATUS_DECLINED = 'declined';
    public const REVIEW_STATUS_PENDING = 'pending';
    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_FAILED = 'failed';
    public const STATUS_SCHEDULED = 'scheduled';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getReviewStatusAllowableValues()
    {
        return [
            self::REVIEW_STATUS_APPROVED,
            self::REVIEW_STATUS_DECLINED,
            self::REVIEW_STATUS_PENDING,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_COMPLETED,
            self::STATUS_FAILED,
            self::STATUS_SCHEDULED,
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
        $this->container['_id'] = $data['_id'] ?? null;
        $this->container['_version'] = $data['_version'] ?? null;
        $this->container['creation_date'] = $data['creation_date'] ?? null;
        $this->container['service_kind'] = $data['service_kind'] ?? null;
        $this->container['requestor_id'] = $data['requestor_id'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['review_status'] = $data['review_status'] ?? null;
        $this->container['all_reviews'] = $data['all_reviews'] ?? null;
        $this->container['notify_member_ids'] = $data['notify_member_ids'] ?? null;
        $this->container['applied_date'] = $data['applied_date'] ?? null;
        $this->container['applied_by_member_id'] = $data['applied_by_member_id'] ?? null;
        $this->container['applied_by_service_token_id'] = $data['applied_by_service_token_id'] ?? null;
        $this->container['status'] = $data['status'] ?? null;
        $this->container['instructions'] = $data['instructions'] ?? null;
        $this->container['conflicts'] = $data['conflicts'] ?? null;
        $this->container['_links'] = $data['_links'] ?? null;
        $this->container['execution_date'] = $data['execution_date'] ?? null;
        $this->container['operating_on_id'] = $data['operating_on_id'] ?? null;
        $this->container['integration_metadata'] = $data['integration_metadata'] ?? null;
        $this->container['source'] = $data['source'] ?? null;
        $this->container['custom_workflow_metadata'] = $data['custom_workflow_metadata'] ?? null;
        $this->container['resource_id'] = $data['resource_id'] ?? null;
        $this->container['approval_settings'] = $data['approval_settings'] ?? null;
        $this->container['project'] = $data['project'] ?? null;
        $this->container['environments'] = $data['environments'] ?? null;
        $this->container['flag'] = $data['flag'] ?? null;
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
        if ($this->container['_version'] === null) {
            $invalidProperties[] = "'_version' can't be null";
        }
        if ($this->container['creation_date'] === null) {
            $invalidProperties[] = "'creation_date' can't be null";
        }
        if ($this->container['service_kind'] === null) {
            $invalidProperties[] = "'service_kind' can't be null";
        }
        if ($this->container['review_status'] === null) {
            $invalidProperties[] = "'review_status' can't be null";
        }
        $allowedValues = $this->getReviewStatusAllowableValues();
        if (!is_null($this->container['review_status']) && !in_array($this->container['review_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'review_status', must be one of '%s'",
                $this->container['review_status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['all_reviews'] === null) {
            $invalidProperties[] = "'all_reviews' can't be null";
        }
        if ($this->container['notify_member_ids'] === null) {
            $invalidProperties[] = "'notify_member_ids' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['instructions'] === null) {
            $invalidProperties[] = "'instructions' can't be null";
        }
        if ($this->container['conflicts'] === null) {
            $invalidProperties[] = "'conflicts' can't be null";
        }
        if ($this->container['_links'] === null) {
            $invalidProperties[] = "'_links' can't be null";
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
     * @param string $_id The ID of this approval request
     *
     * @return self
     */
    public function setId($_id)
    {
        $this->container['_id'] = $_id;

        return $this;
    }

    /**
     * Gets _version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['_version'];
    }

    /**
     * Sets _version
     *
     * @param int $_version Version of the approval request
     *
     * @return self
     */
    public function setVersion($_version)
    {
        $this->container['_version'] = $_version;

        return $this;
    }

    /**
     * Gets creation_date
     *
     * @return int
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param int $creation_date creation_date
     *
     * @return self
     */
    public function setCreationDate($creation_date)
    {
        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets service_kind
     *
     * @return string
     */
    public function getServiceKind()
    {
        return $this->container['service_kind'];
    }

    /**
     * Sets service_kind
     *
     * @param string $service_kind service_kind
     *
     * @return self
     */
    public function setServiceKind($service_kind)
    {
        $this->container['service_kind'] = $service_kind;

        return $this;
    }

    /**
     * Gets requestor_id
     *
     * @return string|null
     */
    public function getRequestorId()
    {
        return $this->container['requestor_id'];
    }

    /**
     * Sets requestor_id
     *
     * @param string|null $requestor_id The ID of the member who requested the approval
     *
     * @return self
     */
    public function setRequestorId($requestor_id)
    {
        $this->container['requestor_id'] = $requestor_id;

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
     * @param string|null $description A human-friendly name for the approval request
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets review_status
     *
     * @return string
     */
    public function getReviewStatus()
    {
        return $this->container['review_status'];
    }

    /**
     * Sets review_status
     *
     * @param string $review_status Current status of the review of this approval request
     *
     * @return self
     */
    public function setReviewStatus($review_status)
    {
        $allowedValues = $this->getReviewStatusAllowableValues();
        if (!in_array($review_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'review_status', must be one of '%s'",
                    $review_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['review_status'] = $review_status;

        return $this;
    }

    /**
     * Gets all_reviews
     *
     * @return \LaunchDarklyApi\Model\ReviewResponse[]
     */
    public function getAllReviews()
    {
        return $this->container['all_reviews'];
    }

    /**
     * Sets all_reviews
     *
     * @param \LaunchDarklyApi\Model\ReviewResponse[] $all_reviews An array of individual reviews of this approval request
     *
     * @return self
     */
    public function setAllReviews($all_reviews)
    {
        $this->container['all_reviews'] = $all_reviews;

        return $this;
    }

    /**
     * Gets notify_member_ids
     *
     * @return string[]
     */
    public function getNotifyMemberIds()
    {
        return $this->container['notify_member_ids'];
    }

    /**
     * Sets notify_member_ids
     *
     * @param string[] $notify_member_ids An array of member IDs. These members are notified to review the approval request.
     *
     * @return self
     */
    public function setNotifyMemberIds($notify_member_ids)
    {
        $this->container['notify_member_ids'] = $notify_member_ids;

        return $this;
    }

    /**
     * Gets applied_date
     *
     * @return int|null
     */
    public function getAppliedDate()
    {
        return $this->container['applied_date'];
    }

    /**
     * Sets applied_date
     *
     * @param int|null $applied_date applied_date
     *
     * @return self
     */
    public function setAppliedDate($applied_date)
    {
        $this->container['applied_date'] = $applied_date;

        return $this;
    }

    /**
     * Gets applied_by_member_id
     *
     * @return string|null
     */
    public function getAppliedByMemberId()
    {
        return $this->container['applied_by_member_id'];
    }

    /**
     * Sets applied_by_member_id
     *
     * @param string|null $applied_by_member_id The member ID of the member who applied the approval request
     *
     * @return self
     */
    public function setAppliedByMemberId($applied_by_member_id)
    {
        $this->container['applied_by_member_id'] = $applied_by_member_id;

        return $this;
    }

    /**
     * Gets applied_by_service_token_id
     *
     * @return string|null
     */
    public function getAppliedByServiceTokenId()
    {
        return $this->container['applied_by_service_token_id'];
    }

    /**
     * Sets applied_by_service_token_id
     *
     * @param string|null $applied_by_service_token_id The service token ID of the service token which applied the approval request
     *
     * @return self
     */
    public function setAppliedByServiceTokenId($applied_by_service_token_id)
    {
        $this->container['applied_by_service_token_id'] = $applied_by_service_token_id;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Current status of the approval request
     *
     * @return self
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets instructions
     *
     * @return array[]
     */
    public function getInstructions()
    {
        return $this->container['instructions'];
    }

    /**
     * Sets instructions
     *
     * @param array[] $instructions instructions
     *
     * @return self
     */
    public function setInstructions($instructions)
    {
        $this->container['instructions'] = $instructions;

        return $this;
    }

    /**
     * Gets conflicts
     *
     * @return \LaunchDarklyApi\Model\Conflict[]
     */
    public function getConflicts()
    {
        return $this->container['conflicts'];
    }

    /**
     * Sets conflicts
     *
     * @param \LaunchDarklyApi\Model\Conflict[] $conflicts Details on any conflicting approval requests
     *
     * @return self
     */
    public function setConflicts($conflicts)
    {
        $this->container['conflicts'] = $conflicts;

        return $this;
    }

    /**
     * Gets _links
     *
     * @return array<string,mixed>
     */
    public function getLinks()
    {
        return $this->container['_links'];
    }

    /**
     * Sets _links
     *
     * @param array<string,mixed> $_links The location and content type of related resources
     *
     * @return self
     */
    public function setLinks($_links)
    {
        $this->container['_links'] = $_links;

        return $this;
    }

    /**
     * Gets execution_date
     *
     * @return int|null
     */
    public function getExecutionDate()
    {
        return $this->container['execution_date'];
    }

    /**
     * Sets execution_date
     *
     * @param int|null $execution_date execution_date
     *
     * @return self
     */
    public function setExecutionDate($execution_date)
    {
        $this->container['execution_date'] = $execution_date;

        return $this;
    }

    /**
     * Gets operating_on_id
     *
     * @return string|null
     */
    public function getOperatingOnId()
    {
        return $this->container['operating_on_id'];
    }

    /**
     * Sets operating_on_id
     *
     * @param string|null $operating_on_id ID of scheduled change to edit or delete
     *
     * @return self
     */
    public function setOperatingOnId($operating_on_id)
    {
        $this->container['operating_on_id'] = $operating_on_id;

        return $this;
    }

    /**
     * Gets integration_metadata
     *
     * @return \LaunchDarklyApi\Model\IntegrationMetadata|null
     */
    public function getIntegrationMetadata()
    {
        return $this->container['integration_metadata'];
    }

    /**
     * Sets integration_metadata
     *
     * @param \LaunchDarklyApi\Model\IntegrationMetadata|null $integration_metadata integration_metadata
     *
     * @return self
     */
    public function setIntegrationMetadata($integration_metadata)
    {
        $this->container['integration_metadata'] = $integration_metadata;

        return $this;
    }

    /**
     * Gets source
     *
     * @return \LaunchDarklyApi\Model\CopiedFromEnv|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param \LaunchDarklyApi\Model\CopiedFromEnv|null $source source
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets custom_workflow_metadata
     *
     * @return \LaunchDarklyApi\Model\CustomWorkflowMeta|null
     */
    public function getCustomWorkflowMetadata()
    {
        return $this->container['custom_workflow_metadata'];
    }

    /**
     * Sets custom_workflow_metadata
     *
     * @param \LaunchDarklyApi\Model\CustomWorkflowMeta|null $custom_workflow_metadata custom_workflow_metadata
     *
     * @return self
     */
    public function setCustomWorkflowMetadata($custom_workflow_metadata)
    {
        $this->container['custom_workflow_metadata'] = $custom_workflow_metadata;

        return $this;
    }

    /**
     * Gets resource_id
     *
     * @return string|null
     */
    public function getResourceId()
    {
        return $this->container['resource_id'];
    }

    /**
     * Sets resource_id
     *
     * @param string|null $resource_id String representation of a resource
     *
     * @return self
     */
    public function setResourceId($resource_id)
    {
        $this->container['resource_id'] = $resource_id;

        return $this;
    }

    /**
     * Gets approval_settings
     *
     * @return \LaunchDarklyApi\Model\ApprovalSettings|null
     */
    public function getApprovalSettings()
    {
        return $this->container['approval_settings'];
    }

    /**
     * Sets approval_settings
     *
     * @param \LaunchDarklyApi\Model\ApprovalSettings|null $approval_settings approval_settings
     *
     * @return self
     */
    public function setApprovalSettings($approval_settings)
    {
        $this->container['approval_settings'] = $approval_settings;

        return $this;
    }

    /**
     * Gets project
     *
     * @return \LaunchDarklyApi\Model\Project|null
     */
    public function getProject()
    {
        return $this->container['project'];
    }

    /**
     * Sets project
     *
     * @param \LaunchDarklyApi\Model\Project|null $project project
     *
     * @return self
     */
    public function setProject($project)
    {
        $this->container['project'] = $project;

        return $this;
    }

    /**
     * Gets environments
     *
     * @return \LaunchDarklyApi\Model\Environment[]|null
     */
    public function getEnvironments()
    {
        return $this->container['environments'];
    }

    /**
     * Sets environments
     *
     * @param \LaunchDarklyApi\Model\Environment[]|null $environments List of environments the approval impacts
     *
     * @return self
     */
    public function setEnvironments($environments)
    {
        $this->container['environments'] = $environments;

        return $this;
    }

    /**
     * Gets flag
     *
     * @return \LaunchDarklyApi\Model\ExpandedFlagRep|null
     */
    public function getFlag()
    {
        return $this->container['flag'];
    }

    /**
     * Sets flag
     *
     * @param \LaunchDarklyApi\Model\ExpandedFlagRep|null $flag flag
     *
     * @return self
     */
    public function setFlag($flag)
    {
        $this->container['flag'] = $flag;

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


