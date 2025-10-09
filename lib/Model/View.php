<?php
/**
 * View
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

namespace LaunchDarklyApi\Model;

use \ArrayAccess;
use \LaunchDarklyApi\ObjectSerializer;

/**
 * View Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class View implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'View';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        '_access' => '\LaunchDarklyApi\Model\ViewsAccessRep',
        '_links' => '\LaunchDarklyApi\Model\ParentAndSelfLinks',
        'id' => 'string',
        'account_id' => 'string',
        'project_id' => 'string',
        'project_key' => 'string',
        'key' => 'string',
        'name' => 'string',
        'description' => 'string',
        'generate_sdk_keys' => 'bool',
        'version' => 'int',
        'tags' => 'string[]',
        'created_at' => 'int',
        'updated_at' => 'int',
        'archived' => 'bool',
        'archived_at' => 'int',
        'deleted_at' => 'int',
        'deleted' => 'bool',
        'maintainer' => '\LaunchDarklyApi\Model\Maintainer',
        'flags_summary' => '\LaunchDarklyApi\Model\FlagsSummary',
        'segments_summary' => '\LaunchDarklyApi\Model\SegmentsSummary',
        'metrics_summary' => '\LaunchDarklyApi\Model\MetricsSummary',
        'ai_configs_summary' => '\LaunchDarklyApi\Model\AIConfigsSummary',
        'resource_summary' => '\LaunchDarklyApi\Model\ResourceSummary',
        'flags_expanded' => '\LaunchDarklyApi\Model\ExpandedLinkedFlags',
        'segments_expanded' => '\LaunchDarklyApi\Model\ExpandedLinkedSegments',
        'metrics_expanded' => '\LaunchDarklyApi\Model\ExpandedLinkedMetrics',
        'ai_configs_expanded' => '\LaunchDarklyApi\Model\ExpandedLinkedAIConfigs',
        'resources_expanded' => '\LaunchDarklyApi\Model\ExpandedLinkedResources'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        '_access' => null,
        '_links' => null,
        'id' => 'string',
        'account_id' => null,
        'project_id' => null,
        'project_key' => null,
        'key' => null,
        'name' => null,
        'description' => null,
        'generate_sdk_keys' => null,
        'version' => null,
        'tags' => null,
        'created_at' => 'int64',
        'updated_at' => 'int64',
        'archived' => null,
        'archived_at' => 'int64',
        'deleted_at' => 'int64',
        'deleted' => null,
        'maintainer' => null,
        'flags_summary' => null,
        'segments_summary' => null,
        'metrics_summary' => null,
        'ai_configs_summary' => null,
        'resource_summary' => null,
        'flags_expanded' => null,
        'segments_expanded' => null,
        'metrics_expanded' => null,
        'ai_configs_expanded' => null,
        'resources_expanded' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        '_access' => false,
        '_links' => false,
        'id' => false,
        'account_id' => false,
        'project_id' => false,
        'project_key' => false,
        'key' => false,
        'name' => false,
        'description' => false,
        'generate_sdk_keys' => false,
        'version' => false,
        'tags' => false,
        'created_at' => false,
        'updated_at' => false,
        'archived' => false,
        'archived_at' => false,
        'deleted_at' => false,
        'deleted' => false,
        'maintainer' => false,
        'flags_summary' => false,
        'segments_summary' => false,
        'metrics_summary' => false,
        'ai_configs_summary' => false,
        'resource_summary' => false,
        'flags_expanded' => false,
        'segments_expanded' => false,
        'metrics_expanded' => false,
        'ai_configs_expanded' => false,
        'resources_expanded' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

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
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        '_access' => '_access',
        '_links' => '_links',
        'id' => 'id',
        'account_id' => 'accountId',
        'project_id' => 'projectId',
        'project_key' => 'projectKey',
        'key' => 'key',
        'name' => 'name',
        'description' => 'description',
        'generate_sdk_keys' => 'generateSdkKeys',
        'version' => 'version',
        'tags' => 'tags',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'archived' => 'archived',
        'archived_at' => 'archivedAt',
        'deleted_at' => 'deletedAt',
        'deleted' => 'deleted',
        'maintainer' => 'maintainer',
        'flags_summary' => 'flagsSummary',
        'segments_summary' => 'segmentsSummary',
        'metrics_summary' => 'metricsSummary',
        'ai_configs_summary' => 'aiConfigsSummary',
        'resource_summary' => 'resourceSummary',
        'flags_expanded' => 'flagsExpanded',
        'segments_expanded' => 'segmentsExpanded',
        'metrics_expanded' => 'metricsExpanded',
        'ai_configs_expanded' => 'aiConfigsExpanded',
        'resources_expanded' => 'resourcesExpanded'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        '_access' => 'setAccess',
        '_links' => 'setLinks',
        'id' => 'setId',
        'account_id' => 'setAccountId',
        'project_id' => 'setProjectId',
        'project_key' => 'setProjectKey',
        'key' => 'setKey',
        'name' => 'setName',
        'description' => 'setDescription',
        'generate_sdk_keys' => 'setGenerateSdkKeys',
        'version' => 'setVersion',
        'tags' => 'setTags',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'archived' => 'setArchived',
        'archived_at' => 'setArchivedAt',
        'deleted_at' => 'setDeletedAt',
        'deleted' => 'setDeleted',
        'maintainer' => 'setMaintainer',
        'flags_summary' => 'setFlagsSummary',
        'segments_summary' => 'setSegmentsSummary',
        'metrics_summary' => 'setMetricsSummary',
        'ai_configs_summary' => 'setAiConfigsSummary',
        'resource_summary' => 'setResourceSummary',
        'flags_expanded' => 'setFlagsExpanded',
        'segments_expanded' => 'setSegmentsExpanded',
        'metrics_expanded' => 'setMetricsExpanded',
        'ai_configs_expanded' => 'setAiConfigsExpanded',
        'resources_expanded' => 'setResourcesExpanded'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        '_access' => 'getAccess',
        '_links' => 'getLinks',
        'id' => 'getId',
        'account_id' => 'getAccountId',
        'project_id' => 'getProjectId',
        'project_key' => 'getProjectKey',
        'key' => 'getKey',
        'name' => 'getName',
        'description' => 'getDescription',
        'generate_sdk_keys' => 'getGenerateSdkKeys',
        'version' => 'getVersion',
        'tags' => 'getTags',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'archived' => 'getArchived',
        'archived_at' => 'getArchivedAt',
        'deleted_at' => 'getDeletedAt',
        'deleted' => 'getDeleted',
        'maintainer' => 'getMaintainer',
        'flags_summary' => 'getFlagsSummary',
        'segments_summary' => 'getSegmentsSummary',
        'metrics_summary' => 'getMetricsSummary',
        'ai_configs_summary' => 'getAiConfigsSummary',
        'resource_summary' => 'getResourceSummary',
        'flags_expanded' => 'getFlagsExpanded',
        'segments_expanded' => 'getSegmentsExpanded',
        'metrics_expanded' => 'getMetricsExpanded',
        'ai_configs_expanded' => 'getAiConfigsExpanded',
        'resources_expanded' => 'getResourcesExpanded'
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
        $this->setIfExists('_access', $data ?? [], null);
        $this->setIfExists('_links', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('account_id', $data ?? [], null);
        $this->setIfExists('project_id', $data ?? [], null);
        $this->setIfExists('project_key', $data ?? [], null);
        $this->setIfExists('key', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('generate_sdk_keys', $data ?? [], null);
        $this->setIfExists('version', $data ?? [], null);
        $this->setIfExists('tags', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('archived', $data ?? [], false);
        $this->setIfExists('archived_at', $data ?? [], null);
        $this->setIfExists('deleted_at', $data ?? [], null);
        $this->setIfExists('deleted', $data ?? [], false);
        $this->setIfExists('maintainer', $data ?? [], null);
        $this->setIfExists('flags_summary', $data ?? [], null);
        $this->setIfExists('segments_summary', $data ?? [], null);
        $this->setIfExists('metrics_summary', $data ?? [], null);
        $this->setIfExists('ai_configs_summary', $data ?? [], null);
        $this->setIfExists('resource_summary', $data ?? [], null);
        $this->setIfExists('flags_expanded', $data ?? [], null);
        $this->setIfExists('segments_expanded', $data ?? [], null);
        $this->setIfExists('metrics_expanded', $data ?? [], null);
        $this->setIfExists('ai_configs_expanded', $data ?? [], null);
        $this->setIfExists('resources_expanded', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['account_id'] === null) {
            $invalidProperties[] = "'account_id' can't be null";
        }
        if ($this->container['project_id'] === null) {
            $invalidProperties[] = "'project_id' can't be null";
        }
        if ($this->container['project_key'] === null) {
            $invalidProperties[] = "'project_key' can't be null";
        }
        if ($this->container['key'] === null) {
            $invalidProperties[] = "'key' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['generate_sdk_keys'] === null) {
            $invalidProperties[] = "'generate_sdk_keys' can't be null";
        }
        if ($this->container['version'] === null) {
            $invalidProperties[] = "'version' can't be null";
        }
        if ($this->container['tags'] === null) {
            $invalidProperties[] = "'tags' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        if ($this->container['archived'] === null) {
            $invalidProperties[] = "'archived' can't be null";
        }
        if ($this->container['deleted'] === null) {
            $invalidProperties[] = "'deleted' can't be null";
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
     * Gets _access
     *
     * @return \LaunchDarklyApi\Model\ViewsAccessRep|null
     */
    public function getAccess()
    {
        return $this->container['_access'];
    }

    /**
     * Sets _access
     *
     * @param \LaunchDarklyApi\Model\ViewsAccessRep|null $_access _access
     *
     * @return self
     */
    public function setAccess($_access)
    {
        if (is_null($_access)) {
            throw new \InvalidArgumentException('non-nullable _access cannot be null');
        }
        $this->container['_access'] = $_access;

        return $this;
    }

    /**
     * Gets _links
     *
     * @return \LaunchDarklyApi\Model\ParentAndSelfLinks|null
     */
    public function getLinks()
    {
        return $this->container['_links'];
    }

    /**
     * Sets _links
     *
     * @param \LaunchDarklyApi\Model\ParentAndSelfLinks|null $_links _links
     *
     * @return self
     */
    public function setLinks($_links)
    {
        if (is_null($_links)) {
            throw new \InvalidArgumentException('non-nullable _links cannot be null');
        }
        $this->container['_links'] = $_links;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id Unique ID of this view
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets account_id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param string $account_id ID of the account that owns this view
     *
     * @return self
     */
    public function setAccountId($account_id)
    {
        if (is_null($account_id)) {
            throw new \InvalidArgumentException('non-nullable account_id cannot be null');
        }
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets project_id
     *
     * @return string
     */
    public function getProjectId()
    {
        return $this->container['project_id'];
    }

    /**
     * Sets project_id
     *
     * @param string $project_id ID of the project this view belongs to
     *
     * @return self
     */
    public function setProjectId($project_id)
    {
        if (is_null($project_id)) {
            throw new \InvalidArgumentException('non-nullable project_id cannot be null');
        }
        $this->container['project_id'] = $project_id;

        return $this;
    }

    /**
     * Gets project_key
     *
     * @return string
     */
    public function getProjectKey()
    {
        return $this->container['project_key'];
    }

    /**
     * Sets project_key
     *
     * @param string $project_key Key of the project this view belongs to
     *
     * @return self
     */
    public function setProjectKey($project_key)
    {
        if (is_null($project_key)) {
            throw new \InvalidArgumentException('non-nullable project_key cannot be null');
        }
        $this->container['project_key'] = $project_key;

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
     * @param string $key Unique key for the view within the account/project
     *
     * @return self
     */
    public function setKey($key)
    {
        if (is_null($key)) {
            throw new \InvalidArgumentException('non-nullable key cannot be null');
        }
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
     * @param string $name Human-readable name for the view
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Optional detailed description of the view
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets generate_sdk_keys
     *
     * @return bool
     */
    public function getGenerateSdkKeys()
    {
        return $this->container['generate_sdk_keys'];
    }

    /**
     * Sets generate_sdk_keys
     *
     * @param bool $generate_sdk_keys Whether to generate SDK keys for this view. Defaults to false.
     *
     * @return self
     */
    public function setGenerateSdkKeys($generate_sdk_keys)
    {
        if (is_null($generate_sdk_keys)) {
            throw new \InvalidArgumentException('non-nullable generate_sdk_keys cannot be null');
        }
        $this->container['generate_sdk_keys'] = $generate_sdk_keys;

        return $this;
    }

    /**
     * Gets version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param int $version Version number for tracking changes
     *
     * @return self
     */
    public function setVersion($version)
    {
        if (is_null($version)) {
            throw new \InvalidArgumentException('non-nullable version cannot be null');
        }
        $this->container['version'] = $version;

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
     * @param string[] $tags Tags associated with this view
     *
     * @return self
     */
    public function setTags($tags)
    {
        if (is_null($tags)) {
            throw new \InvalidArgumentException('non-nullable tags cannot be null');
        }
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param int $created_at created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return int
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param int $updated_at updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            throw new \InvalidArgumentException('non-nullable updated_at cannot be null');
        }
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets archived
     *
     * @return bool
     */
    public function getArchived()
    {
        return $this->container['archived'];
    }

    /**
     * Sets archived
     *
     * @param bool $archived Whether this view is archived
     *
     * @return self
     */
    public function setArchived($archived)
    {
        if (is_null($archived)) {
            throw new \InvalidArgumentException('non-nullable archived cannot be null');
        }
        $this->container['archived'] = $archived;

        return $this;
    }

    /**
     * Gets archived_at
     *
     * @return int|null
     */
    public function getArchivedAt()
    {
        return $this->container['archived_at'];
    }

    /**
     * Sets archived_at
     *
     * @param int|null $archived_at archived_at
     *
     * @return self
     */
    public function setArchivedAt($archived_at)
    {
        if (is_null($archived_at)) {
            throw new \InvalidArgumentException('non-nullable archived_at cannot be null');
        }
        $this->container['archived_at'] = $archived_at;

        return $this;
    }

    /**
     * Gets deleted_at
     *
     * @return int|null
     */
    public function getDeletedAt()
    {
        return $this->container['deleted_at'];
    }

    /**
     * Sets deleted_at
     *
     * @param int|null $deleted_at deleted_at
     *
     * @return self
     */
    public function setDeletedAt($deleted_at)
    {
        if (is_null($deleted_at)) {
            throw new \InvalidArgumentException('non-nullable deleted_at cannot be null');
        }
        $this->container['deleted_at'] = $deleted_at;

        return $this;
    }

    /**
     * Gets deleted
     *
     * @return bool
     */
    public function getDeleted()
    {
        return $this->container['deleted'];
    }

    /**
     * Sets deleted
     *
     * @param bool $deleted Whether this view is deleted
     *
     * @return self
     */
    public function setDeleted($deleted)
    {
        if (is_null($deleted)) {
            throw new \InvalidArgumentException('non-nullable deleted cannot be null');
        }
        $this->container['deleted'] = $deleted;

        return $this;
    }

    /**
     * Gets maintainer
     *
     * @return \LaunchDarklyApi\Model\Maintainer|null
     */
    public function getMaintainer()
    {
        return $this->container['maintainer'];
    }

    /**
     * Sets maintainer
     *
     * @param \LaunchDarklyApi\Model\Maintainer|null $maintainer maintainer
     *
     * @return self
     */
    public function setMaintainer($maintainer)
    {
        if (is_null($maintainer)) {
            throw new \InvalidArgumentException('non-nullable maintainer cannot be null');
        }
        $this->container['maintainer'] = $maintainer;

        return $this;
    }

    /**
     * Gets flags_summary
     *
     * @return \LaunchDarklyApi\Model\FlagsSummary|null
     */
    public function getFlagsSummary()
    {
        return $this->container['flags_summary'];
    }

    /**
     * Sets flags_summary
     *
     * @param \LaunchDarklyApi\Model\FlagsSummary|null $flags_summary flags_summary
     *
     * @return self
     */
    public function setFlagsSummary($flags_summary)
    {
        if (is_null($flags_summary)) {
            throw new \InvalidArgumentException('non-nullable flags_summary cannot be null');
        }
        $this->container['flags_summary'] = $flags_summary;

        return $this;
    }

    /**
     * Gets segments_summary
     *
     * @return \LaunchDarklyApi\Model\SegmentsSummary|null
     */
    public function getSegmentsSummary()
    {
        return $this->container['segments_summary'];
    }

    /**
     * Sets segments_summary
     *
     * @param \LaunchDarklyApi\Model\SegmentsSummary|null $segments_summary segments_summary
     *
     * @return self
     */
    public function setSegmentsSummary($segments_summary)
    {
        if (is_null($segments_summary)) {
            throw new \InvalidArgumentException('non-nullable segments_summary cannot be null');
        }
        $this->container['segments_summary'] = $segments_summary;

        return $this;
    }

    /**
     * Gets metrics_summary
     *
     * @return \LaunchDarklyApi\Model\MetricsSummary|null
     */
    public function getMetricsSummary()
    {
        return $this->container['metrics_summary'];
    }

    /**
     * Sets metrics_summary
     *
     * @param \LaunchDarklyApi\Model\MetricsSummary|null $metrics_summary metrics_summary
     *
     * @return self
     */
    public function setMetricsSummary($metrics_summary)
    {
        if (is_null($metrics_summary)) {
            throw new \InvalidArgumentException('non-nullable metrics_summary cannot be null');
        }
        $this->container['metrics_summary'] = $metrics_summary;

        return $this;
    }

    /**
     * Gets ai_configs_summary
     *
     * @return \LaunchDarklyApi\Model\AIConfigsSummary|null
     */
    public function getAiConfigsSummary()
    {
        return $this->container['ai_configs_summary'];
    }

    /**
     * Sets ai_configs_summary
     *
     * @param \LaunchDarklyApi\Model\AIConfigsSummary|null $ai_configs_summary ai_configs_summary
     *
     * @return self
     */
    public function setAiConfigsSummary($ai_configs_summary)
    {
        if (is_null($ai_configs_summary)) {
            throw new \InvalidArgumentException('non-nullable ai_configs_summary cannot be null');
        }
        $this->container['ai_configs_summary'] = $ai_configs_summary;

        return $this;
    }

    /**
     * Gets resource_summary
     *
     * @return \LaunchDarklyApi\Model\ResourceSummary|null
     */
    public function getResourceSummary()
    {
        return $this->container['resource_summary'];
    }

    /**
     * Sets resource_summary
     *
     * @param \LaunchDarklyApi\Model\ResourceSummary|null $resource_summary resource_summary
     *
     * @return self
     */
    public function setResourceSummary($resource_summary)
    {
        if (is_null($resource_summary)) {
            throw new \InvalidArgumentException('non-nullable resource_summary cannot be null');
        }
        $this->container['resource_summary'] = $resource_summary;

        return $this;
    }

    /**
     * Gets flags_expanded
     *
     * @return \LaunchDarklyApi\Model\ExpandedLinkedFlags|null
     */
    public function getFlagsExpanded()
    {
        return $this->container['flags_expanded'];
    }

    /**
     * Sets flags_expanded
     *
     * @param \LaunchDarklyApi\Model\ExpandedLinkedFlags|null $flags_expanded flags_expanded
     *
     * @return self
     */
    public function setFlagsExpanded($flags_expanded)
    {
        if (is_null($flags_expanded)) {
            throw new \InvalidArgumentException('non-nullable flags_expanded cannot be null');
        }
        $this->container['flags_expanded'] = $flags_expanded;

        return $this;
    }

    /**
     * Gets segments_expanded
     *
     * @return \LaunchDarklyApi\Model\ExpandedLinkedSegments|null
     */
    public function getSegmentsExpanded()
    {
        return $this->container['segments_expanded'];
    }

    /**
     * Sets segments_expanded
     *
     * @param \LaunchDarklyApi\Model\ExpandedLinkedSegments|null $segments_expanded segments_expanded
     *
     * @return self
     */
    public function setSegmentsExpanded($segments_expanded)
    {
        if (is_null($segments_expanded)) {
            throw new \InvalidArgumentException('non-nullable segments_expanded cannot be null');
        }
        $this->container['segments_expanded'] = $segments_expanded;

        return $this;
    }

    /**
     * Gets metrics_expanded
     *
     * @return \LaunchDarklyApi\Model\ExpandedLinkedMetrics|null
     */
    public function getMetricsExpanded()
    {
        return $this->container['metrics_expanded'];
    }

    /**
     * Sets metrics_expanded
     *
     * @param \LaunchDarklyApi\Model\ExpandedLinkedMetrics|null $metrics_expanded metrics_expanded
     *
     * @return self
     */
    public function setMetricsExpanded($metrics_expanded)
    {
        if (is_null($metrics_expanded)) {
            throw new \InvalidArgumentException('non-nullable metrics_expanded cannot be null');
        }
        $this->container['metrics_expanded'] = $metrics_expanded;

        return $this;
    }

    /**
     * Gets ai_configs_expanded
     *
     * @return \LaunchDarklyApi\Model\ExpandedLinkedAIConfigs|null
     */
    public function getAiConfigsExpanded()
    {
        return $this->container['ai_configs_expanded'];
    }

    /**
     * Sets ai_configs_expanded
     *
     * @param \LaunchDarklyApi\Model\ExpandedLinkedAIConfigs|null $ai_configs_expanded ai_configs_expanded
     *
     * @return self
     */
    public function setAiConfigsExpanded($ai_configs_expanded)
    {
        if (is_null($ai_configs_expanded)) {
            throw new \InvalidArgumentException('non-nullable ai_configs_expanded cannot be null');
        }
        $this->container['ai_configs_expanded'] = $ai_configs_expanded;

        return $this;
    }

    /**
     * Gets resources_expanded
     *
     * @return \LaunchDarklyApi\Model\ExpandedLinkedResources|null
     */
    public function getResourcesExpanded()
    {
        return $this->container['resources_expanded'];
    }

    /**
     * Sets resources_expanded
     *
     * @param \LaunchDarklyApi\Model\ExpandedLinkedResources|null $resources_expanded resources_expanded
     *
     * @return self
     */
    public function setResourcesExpanded($resources_expanded)
    {
        if (is_null($resources_expanded)) {
            throw new \InvalidArgumentException('non-nullable resources_expanded cannot be null');
        }
        $this->container['resources_expanded'] = $resources_expanded;

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


