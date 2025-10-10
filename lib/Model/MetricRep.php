<?php
/**
 * MetricRep
 *
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

namespace LaunchDarklyApi\Model;

use \ArrayAccess;
use \LaunchDarklyApi\ObjectSerializer;

/**
 * MetricRep Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class MetricRep implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'MetricRep';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'experiment_count' => 'int',
        'metric_group_count' => 'int',
        'active_experiment_count' => 'int',
        'active_guarded_rollout_count' => 'int',
        '_id' => 'string',
        '_version_id' => 'string',
        '_version' => 'int',
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
        'filters' => '\LaunchDarklyApi\Model\Filter',
        'unit_aggregation_type' => 'string',
        'analysis_type' => 'string',
        'percentile_value' => 'int',
        'event_default' => '\LaunchDarklyApi\Model\MetricEventDefaultRep',
        'data_source' => '\LaunchDarklyApi\Model\MetricDataSourceRefRep',
        'archived' => 'bool',
        'archived_at' => 'int',
        'selector' => 'string',
        'urls' => 'array[]',
        'experiments' => '\LaunchDarklyApi\Model\DependentExperimentRep[]',
        'metric_groups' => '\LaunchDarklyApi\Model\DependentMetricGroupRep[]',
        'last_used_in_experiment' => '\LaunchDarklyApi\Model\DependentExperimentRep',
        'last_used_in_guarded_rollout' => '\LaunchDarklyApi\Model\DependentMeasuredRolloutRep',
        'is_active' => 'bool',
        '_attached_features' => '\LaunchDarklyApi\Model\FlagListingRep[]'
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
        'active_experiment_count' => null,
        'active_guarded_rollout_count' => null,
        '_id' => null,
        '_version_id' => null,
        '_version' => null,
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
        'filters' => null,
        'unit_aggregation_type' => null,
        'analysis_type' => null,
        'percentile_value' => null,
        'event_default' => null,
        'data_source' => null,
        'archived' => null,
        'archived_at' => 'int64',
        'selector' => null,
        'urls' => null,
        'experiments' => null,
        'metric_groups' => null,
        'last_used_in_experiment' => null,
        'last_used_in_guarded_rollout' => null,
        'is_active' => null,
        '_attached_features' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'experiment_count' => false,
        'metric_group_count' => false,
        'active_experiment_count' => false,
        'active_guarded_rollout_count' => false,
        '_id' => false,
        '_version_id' => false,
        '_version' => false,
        'key' => false,
        'name' => false,
        'kind' => false,
        '_attached_flag_count' => false,
        '_links' => false,
        '_site' => false,
        '_access' => false,
        'tags' => false,
        '_creation_date' => false,
        'last_modified' => false,
        'maintainer_id' => false,
        '_maintainer' => false,
        'description' => false,
        'category' => false,
        'is_numeric' => false,
        'success_criteria' => false,
        'unit' => false,
        'event_key' => false,
        'randomization_units' => false,
        'filters' => false,
        'unit_aggregation_type' => false,
        'analysis_type' => false,
        'percentile_value' => false,
        'event_default' => false,
        'data_source' => false,
        'archived' => false,
        'archived_at' => false,
        'selector' => false,
        'urls' => false,
        'experiments' => false,
        'metric_groups' => false,
        'last_used_in_experiment' => false,
        'last_used_in_guarded_rollout' => false,
        'is_active' => false,
        '_attached_features' => false
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
        'experiment_count' => 'experimentCount',
        'metric_group_count' => 'metricGroupCount',
        'active_experiment_count' => 'activeExperimentCount',
        'active_guarded_rollout_count' => 'activeGuardedRolloutCount',
        '_id' => '_id',
        '_version_id' => '_versionId',
        '_version' => '_version',
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
        'filters' => 'filters',
        'unit_aggregation_type' => 'unitAggregationType',
        'analysis_type' => 'analysisType',
        'percentile_value' => 'percentileValue',
        'event_default' => 'eventDefault',
        'data_source' => 'dataSource',
        'archived' => 'archived',
        'archived_at' => 'archivedAt',
        'selector' => 'selector',
        'urls' => 'urls',
        'experiments' => 'experiments',
        'metric_groups' => 'metricGroups',
        'last_used_in_experiment' => 'lastUsedInExperiment',
        'last_used_in_guarded_rollout' => 'lastUsedInGuardedRollout',
        'is_active' => 'isActive',
        '_attached_features' => '_attachedFeatures'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'experiment_count' => 'setExperimentCount',
        'metric_group_count' => 'setMetricGroupCount',
        'active_experiment_count' => 'setActiveExperimentCount',
        'active_guarded_rollout_count' => 'setActiveGuardedRolloutCount',
        '_id' => 'setId',
        '_version_id' => 'setVersionId',
        '_version' => 'setVersion',
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
        'filters' => 'setFilters',
        'unit_aggregation_type' => 'setUnitAggregationType',
        'analysis_type' => 'setAnalysisType',
        'percentile_value' => 'setPercentileValue',
        'event_default' => 'setEventDefault',
        'data_source' => 'setDataSource',
        'archived' => 'setArchived',
        'archived_at' => 'setArchivedAt',
        'selector' => 'setSelector',
        'urls' => 'setUrls',
        'experiments' => 'setExperiments',
        'metric_groups' => 'setMetricGroups',
        'last_used_in_experiment' => 'setLastUsedInExperiment',
        'last_used_in_guarded_rollout' => 'setLastUsedInGuardedRollout',
        'is_active' => 'setIsActive',
        '_attached_features' => 'setAttachedFeatures'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'experiment_count' => 'getExperimentCount',
        'metric_group_count' => 'getMetricGroupCount',
        'active_experiment_count' => 'getActiveExperimentCount',
        'active_guarded_rollout_count' => 'getActiveGuardedRolloutCount',
        '_id' => 'getId',
        '_version_id' => 'getVersionId',
        '_version' => 'getVersion',
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
        'filters' => 'getFilters',
        'unit_aggregation_type' => 'getUnitAggregationType',
        'analysis_type' => 'getAnalysisType',
        'percentile_value' => 'getPercentileValue',
        'event_default' => 'getEventDefault',
        'data_source' => 'getDataSource',
        'archived' => 'getArchived',
        'archived_at' => 'getArchivedAt',
        'selector' => 'getSelector',
        'urls' => 'getUrls',
        'experiments' => 'getExperiments',
        'metric_groups' => 'getMetricGroups',
        'last_used_in_experiment' => 'getLastUsedInExperiment',
        'last_used_in_guarded_rollout' => 'getLastUsedInGuardedRollout',
        'is_active' => 'getIsActive',
        '_attached_features' => 'getAttachedFeatures'
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
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('experiment_count', $data ?? [], null);
        $this->setIfExists('metric_group_count', $data ?? [], null);
        $this->setIfExists('active_experiment_count', $data ?? [], null);
        $this->setIfExists('active_guarded_rollout_count', $data ?? [], null);
        $this->setIfExists('_id', $data ?? [], null);
        $this->setIfExists('_version_id', $data ?? [], null);
        $this->setIfExists('_version', $data ?? [], null);
        $this->setIfExists('key', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('kind', $data ?? [], null);
        $this->setIfExists('_attached_flag_count', $data ?? [], null);
        $this->setIfExists('_links', $data ?? [], null);
        $this->setIfExists('_site', $data ?? [], null);
        $this->setIfExists('_access', $data ?? [], null);
        $this->setIfExists('tags', $data ?? [], null);
        $this->setIfExists('_creation_date', $data ?? [], null);
        $this->setIfExists('last_modified', $data ?? [], null);
        $this->setIfExists('maintainer_id', $data ?? [], null);
        $this->setIfExists('_maintainer', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('category', $data ?? [], null);
        $this->setIfExists('is_numeric', $data ?? [], null);
        $this->setIfExists('success_criteria', $data ?? [], null);
        $this->setIfExists('unit', $data ?? [], null);
        $this->setIfExists('event_key', $data ?? [], null);
        $this->setIfExists('randomization_units', $data ?? [], null);
        $this->setIfExists('filters', $data ?? [], null);
        $this->setIfExists('unit_aggregation_type', $data ?? [], null);
        $this->setIfExists('analysis_type', $data ?? [], null);
        $this->setIfExists('percentile_value', $data ?? [], null);
        $this->setIfExists('event_default', $data ?? [], null);
        $this->setIfExists('data_source', $data ?? [], null);
        $this->setIfExists('archived', $data ?? [], null);
        $this->setIfExists('archived_at', $data ?? [], null);
        $this->setIfExists('selector', $data ?? [], null);
        $this->setIfExists('urls', $data ?? [], null);
        $this->setIfExists('experiments', $data ?? [], null);
        $this->setIfExists('metric_groups', $data ?? [], null);
        $this->setIfExists('last_used_in_experiment', $data ?? [], null);
        $this->setIfExists('last_used_in_guarded_rollout', $data ?? [], null);
        $this->setIfExists('is_active', $data ?? [], null);
        $this->setIfExists('_attached_features', $data ?? [], null);
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
        if (is_null($experiment_count)) {
            throw new \InvalidArgumentException('non-nullable experiment_count cannot be null');
        }
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
        if (is_null($metric_group_count)) {
            throw new \InvalidArgumentException('non-nullable metric_group_count cannot be null');
        }
        $this->container['metric_group_count'] = $metric_group_count;

        return $this;
    }

    /**
     * Gets active_experiment_count
     *
     * @return int|null
     */
    public function getActiveExperimentCount()
    {
        return $this->container['active_experiment_count'];
    }

    /**
     * Sets active_experiment_count
     *
     * @param int|null $active_experiment_count The number of active experiments using this metric
     *
     * @return self
     */
    public function setActiveExperimentCount($active_experiment_count)
    {
        if (is_null($active_experiment_count)) {
            throw new \InvalidArgumentException('non-nullable active_experiment_count cannot be null');
        }
        $this->container['active_experiment_count'] = $active_experiment_count;

        return $this;
    }

    /**
     * Gets active_guarded_rollout_count
     *
     * @return int|null
     */
    public function getActiveGuardedRolloutCount()
    {
        return $this->container['active_guarded_rollout_count'];
    }

    /**
     * Sets active_guarded_rollout_count
     *
     * @param int|null $active_guarded_rollout_count The number of active guarded rollouts using this metric
     *
     * @return self
     */
    public function setActiveGuardedRolloutCount($active_guarded_rollout_count)
    {
        if (is_null($active_guarded_rollout_count)) {
            throw new \InvalidArgumentException('non-nullable active_guarded_rollout_count cannot be null');
        }
        $this->container['active_guarded_rollout_count'] = $active_guarded_rollout_count;

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
        if (is_null($_id)) {
            throw new \InvalidArgumentException('non-nullable _id cannot be null');
        }
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
        if (is_null($_version_id)) {
            throw new \InvalidArgumentException('non-nullable _version_id cannot be null');
        }
        $this->container['_version_id'] = $_version_id;

        return $this;
    }

    /**
     * Gets _version
     *
     * @return int|null
     */
    public function getVersion()
    {
        return $this->container['_version'];
    }

    /**
     * Sets _version
     *
     * @param int|null $_version Version of the metric
     *
     * @return self
     */
    public function setVersion($_version)
    {
        if (is_null($_version)) {
            throw new \InvalidArgumentException('non-nullable _version cannot be null');
        }
        $this->container['_version'] = $_version;

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
     * @param string $name A human-friendly name for the metric
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
        if (is_null($kind)) {
            throw new \InvalidArgumentException('non-nullable kind cannot be null');
        }
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
        if (is_null($_attached_flag_count)) {
            throw new \InvalidArgumentException('non-nullable _attached_flag_count cannot be null');
        }
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
        if (is_null($_links)) {
            throw new \InvalidArgumentException('non-nullable _links cannot be null');
        }
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
        if (is_null($_site)) {
            throw new \InvalidArgumentException('non-nullable _site cannot be null');
        }
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
        if (is_null($_access)) {
            throw new \InvalidArgumentException('non-nullable _access cannot be null');
        }
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
        if (is_null($tags)) {
            throw new \InvalidArgumentException('non-nullable tags cannot be null');
        }
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
        if (is_null($_creation_date)) {
            throw new \InvalidArgumentException('non-nullable _creation_date cannot be null');
        }
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
        if (is_null($last_modified)) {
            throw new \InvalidArgumentException('non-nullable last_modified cannot be null');
        }
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
        if (is_null($maintainer_id)) {
            throw new \InvalidArgumentException('non-nullable maintainer_id cannot be null');
        }
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
        if (is_null($_maintainer)) {
            throw new \InvalidArgumentException('non-nullable _maintainer cannot be null');
        }
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
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
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
        if (is_null($category)) {
            throw new \InvalidArgumentException('non-nullable category cannot be null');
        }
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
        if (is_null($is_numeric)) {
            throw new \InvalidArgumentException('non-nullable is_numeric cannot be null');
        }
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
        if (is_null($success_criteria)) {
            throw new \InvalidArgumentException('non-nullable success_criteria cannot be null');
        }
        $allowedValues = $this->getSuccessCriteriaAllowableValues();
        if (!in_array($success_criteria, $allowedValues, true)) {
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
        if (is_null($unit)) {
            throw new \InvalidArgumentException('non-nullable unit cannot be null');
        }
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
        if (is_null($event_key)) {
            throw new \InvalidArgumentException('non-nullable event_key cannot be null');
        }
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
        if (is_null($randomization_units)) {
            throw new \InvalidArgumentException('non-nullable randomization_units cannot be null');
        }
        $this->container['randomization_units'] = $randomization_units;

        return $this;
    }

    /**
     * Gets filters
     *
     * @return \LaunchDarklyApi\Model\Filter|null
     */
    public function getFilters()
    {
        return $this->container['filters'];
    }

    /**
     * Sets filters
     *
     * @param \LaunchDarklyApi\Model\Filter|null $filters filters
     *
     * @return self
     */
    public function setFilters($filters)
    {
        if (is_null($filters)) {
            throw new \InvalidArgumentException('non-nullable filters cannot be null');
        }
        $this->container['filters'] = $filters;

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
        if (is_null($unit_aggregation_type)) {
            throw new \InvalidArgumentException('non-nullable unit_aggregation_type cannot be null');
        }
        $allowedValues = $this->getUnitAggregationTypeAllowableValues();
        if (!in_array($unit_aggregation_type, $allowedValues, true)) {
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
        if (is_null($analysis_type)) {
            throw new \InvalidArgumentException('non-nullable analysis_type cannot be null');
        }
        $allowedValues = $this->getAnalysisTypeAllowableValues();
        if (!in_array($analysis_type, $allowedValues, true)) {
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
        if (is_null($percentile_value)) {
            throw new \InvalidArgumentException('non-nullable percentile_value cannot be null');
        }
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
        if (is_null($event_default)) {
            throw new \InvalidArgumentException('non-nullable event_default cannot be null');
        }
        $this->container['event_default'] = $event_default;

        return $this;
    }

    /**
     * Gets data_source
     *
     * @return \LaunchDarklyApi\Model\MetricDataSourceRefRep|null
     */
    public function getDataSource()
    {
        return $this->container['data_source'];
    }

    /**
     * Sets data_source
     *
     * @param \LaunchDarklyApi\Model\MetricDataSourceRefRep|null $data_source data_source
     *
     * @return self
     */
    public function setDataSource($data_source)
    {
        if (is_null($data_source)) {
            throw new \InvalidArgumentException('non-nullable data_source cannot be null');
        }
        $this->container['data_source'] = $data_source;

        return $this;
    }

    /**
     * Gets archived
     *
     * @return bool|null
     */
    public function getArchived()
    {
        return $this->container['archived'];
    }

    /**
     * Sets archived
     *
     * @param bool|null $archived Whether the metric version is archived
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
     * Gets selector
     *
     * @return string|null
     */
    public function getSelector()
    {
        return $this->container['selector'];
    }

    /**
     * Sets selector
     *
     * @param string|null $selector For click metrics, the CSS selectors
     *
     * @return self
     */
    public function setSelector($selector)
    {
        if (is_null($selector)) {
            throw new \InvalidArgumentException('non-nullable selector cannot be null');
        }
        $this->container['selector'] = $selector;

        return $this;
    }

    /**
     * Gets urls
     *
     * @return array[]|null
     */
    public function getUrls()
    {
        return $this->container['urls'];
    }

    /**
     * Sets urls
     *
     * @param array[]|null $urls urls
     *
     * @return self
     */
    public function setUrls($urls)
    {
        if (is_null($urls)) {
            throw new \InvalidArgumentException('non-nullable urls cannot be null');
        }
        $this->container['urls'] = $urls;

        return $this;
    }

    /**
     * Gets experiments
     *
     * @return \LaunchDarklyApi\Model\DependentExperimentRep[]|null
     */
    public function getExperiments()
    {
        return $this->container['experiments'];
    }

    /**
     * Sets experiments
     *
     * @param \LaunchDarklyApi\Model\DependentExperimentRep[]|null $experiments experiments
     *
     * @return self
     */
    public function setExperiments($experiments)
    {
        if (is_null($experiments)) {
            throw new \InvalidArgumentException('non-nullable experiments cannot be null');
        }
        $this->container['experiments'] = $experiments;

        return $this;
    }

    /**
     * Gets metric_groups
     *
     * @return \LaunchDarklyApi\Model\DependentMetricGroupRep[]|null
     */
    public function getMetricGroups()
    {
        return $this->container['metric_groups'];
    }

    /**
     * Sets metric_groups
     *
     * @param \LaunchDarklyApi\Model\DependentMetricGroupRep[]|null $metric_groups Metric groups that use this metric
     *
     * @return self
     */
    public function setMetricGroups($metric_groups)
    {
        if (is_null($metric_groups)) {
            throw new \InvalidArgumentException('non-nullable metric_groups cannot be null');
        }
        $this->container['metric_groups'] = $metric_groups;

        return $this;
    }

    /**
     * Gets last_used_in_experiment
     *
     * @return \LaunchDarklyApi\Model\DependentExperimentRep|null
     */
    public function getLastUsedInExperiment()
    {
        return $this->container['last_used_in_experiment'];
    }

    /**
     * Sets last_used_in_experiment
     *
     * @param \LaunchDarklyApi\Model\DependentExperimentRep|null $last_used_in_experiment last_used_in_experiment
     *
     * @return self
     */
    public function setLastUsedInExperiment($last_used_in_experiment)
    {
        if (is_null($last_used_in_experiment)) {
            throw new \InvalidArgumentException('non-nullable last_used_in_experiment cannot be null');
        }
        $this->container['last_used_in_experiment'] = $last_used_in_experiment;

        return $this;
    }

    /**
     * Gets last_used_in_guarded_rollout
     *
     * @return \LaunchDarklyApi\Model\DependentMeasuredRolloutRep|null
     */
    public function getLastUsedInGuardedRollout()
    {
        return $this->container['last_used_in_guarded_rollout'];
    }

    /**
     * Sets last_used_in_guarded_rollout
     *
     * @param \LaunchDarklyApi\Model\DependentMeasuredRolloutRep|null $last_used_in_guarded_rollout last_used_in_guarded_rollout
     *
     * @return self
     */
    public function setLastUsedInGuardedRollout($last_used_in_guarded_rollout)
    {
        if (is_null($last_used_in_guarded_rollout)) {
            throw new \InvalidArgumentException('non-nullable last_used_in_guarded_rollout cannot be null');
        }
        $this->container['last_used_in_guarded_rollout'] = $last_used_in_guarded_rollout;

        return $this;
    }

    /**
     * Gets is_active
     *
     * @return bool|null
     */
    public function getIsActive()
    {
        return $this->container['is_active'];
    }

    /**
     * Sets is_active
     *
     * @param bool|null $is_active Whether the metric is active
     *
     * @return self
     */
    public function setIsActive($is_active)
    {
        if (is_null($is_active)) {
            throw new \InvalidArgumentException('non-nullable is_active cannot be null');
        }
        $this->container['is_active'] = $is_active;

        return $this;
    }

    /**
     * Gets _attached_features
     *
     * @return \LaunchDarklyApi\Model\FlagListingRep[]|null
     */
    public function getAttachedFeatures()
    {
        return $this->container['_attached_features'];
    }

    /**
     * Sets _attached_features
     *
     * @param \LaunchDarklyApi\Model\FlagListingRep[]|null $_attached_features Details on the flags attached to this metric
     *
     * @return self
     */
    public function setAttachedFeatures($_attached_features)
    {
        if (is_null($_attached_features)) {
            throw new \InvalidArgumentException('non-nullable _attached_features cannot be null');
        }
        $this->container['_attached_features'] = $_attached_features;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer|string $offset Offset
     *
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer|string $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset)
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
     * @param integer|string $offset Offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
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


