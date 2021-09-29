<?php
/**
 * CodeReferencesApi
 * PHP version 7.3
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * LaunchDarkly REST API
 *
 * # Overview  ## Authentication  All REST API resources are authenticated with either [personal or service access tokens](https://docs.launchdarkly.com/home/account-security/api-access-tokens), or session cookies. Other authentication mechanisms are not supported. You can manage personal access tokens on your [Account settings](https://app.launchdarkly.com/settings/tokens) page.  LaunchDarkly also has SDK keys, mobile keys, and client-side IDs that are used by our server-side SDKs, mobile SDKs, and client-side SDKs, respectively. **These keys cannot be used to access our REST API**. These keys are environment-specific, and can only perform read-only operations (fetching feature flag settings).  | Auth mechanism                                                                                  | Allowed resources                                                                                     | Use cases                                          | | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | -------------------------------------------------- | | [Personal access tokens](https://docs.launchdarkly.com/home/account-security/api-access-tokens) | Can be customized on a per-token basis                                                                | Building scripts, custom integrations, data export | | SDK keys                                                                                        | Can only access read-only SDK-specific resources and the firehose, restricted to a single environment | Server-side SDKs, Firehose API                     | | Mobile keys                                                                                     | Can only access read-only mobile SDK-specific resources, restricted to a single environment           | Mobile SDKs                                        | | Client-side ID                                                                                  | Single environment, only flags marked available to client-side                                        | Client-side JavaScript                             |  > #### Keep your access tokens and SDK keys private > > Access tokens should _never_ be exposed in untrusted contexts. Never put an access token in client-side JavaScript, or embed it in a mobile application. LaunchDarkly has special mobile keys that you can embed in mobile apps. If you accidentally expose an access token or SDK key, you can reset it from your [Account Settings](https://app.launchdarkly.com/settings#/tokens) page. > > The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.  ### Via request header  The preferred way to authenticate with the API is by adding an `Authorization` header containing your access token to your requests. The value of the `Authorization` header must be your access token.  Manage personal access tokens from the [Account Settings](https://app.launchdarkly.com/settings/tokens) page.  ### Via session cookie  For testing purposes, you can make API calls directly from your web browser. If you're logged in to the application, the API will use your existing session to authenticate calls.  If you have a [role](https://docs.launchdarkly.com/home/team/built-in-roles) other than Admin, or have a [custom role](https://docs.launchdarkly.com/home/team/custom-roles) defined, you may not have permission to perform some API calls. You will receive a `401` response code in that case.  > ### Modifying the Origin header causes an error > > LaunchDarkly validates that the Origin header for any API request authenticated by a session cookie matches the expected Origin header. The expected Origin header is `https://app.launchdarkly.com`. > > If the Origin header does not match what's expected, LaunchDarkly returns an error. This error can prevent the LaunchDarkly app from working correctly. > > Any browser extension that intentionally changes the Origin header can cause this problem. For example, the `Allow-Control-Allow-Origin: *` Chrome extension changes the Origin header to `http://evil.com` and causes the app to fail. > > To prevent this error, do not modify your Origin header. > > LaunchDarkly does not require origin matching when authenticating with an access token, so this issue does not affect normal API usage.  ## Representations  All resources expect and return JSON response bodies. Error responses will also send a JSON body. Read [Errors](#section/Errors) for a more detailed description of the error format used by the API.  In practice this means that you always get a response with a `Content-Type` header set to `application/json`.  In addition, request bodies for `PUT`, `POST`, `REPORT` and `PATCH` requests must be encoded as JSON with a `Content-Type` header set to `application/json`.  ### Summary and detailed representations  When you fetch a list of resources, the response includes only the most important attributes of each resource. This is a _summary representation_ of the resource. When you fetch an individual resource (for example, a single feature flag), you receive a _detailed representation_ containing all of the attributes of the resource.  The best way to find a detailed representation is to follow links. Every summary representation includes a link to its detailed representation.  ### Links and addressability  The best way to navigate the API is by following links. These are attributes in representations that link to other resources. The API always uses the same format for links:  - Links to other resources within the API are encapsulated in a `_links` object. - If the resource has a corresponding link to HTML content on the site, it is stored in a special `_site` link.  Each link has two attributes: an href (the URL) and a type (the content type). For example, a feature resource might return the following:  ```json {   \"_links\": {     \"parent\": {       \"href\": \"/api/features\",       \"type\": \"application/json\"     },     \"self\": {       \"href\": \"/api/features/sort.order\",       \"type\": \"application/json\"     }   },   \"_site\": {     \"href\": \"/features/sort.order\",     \"type\": \"text/html\"   } } ```  From this, you can navigate to the parent collection of features by following the `parent` link, or navigate to the site page for the feature by following the `_site` link.  Collections are always represented as a JSON object with an `items` attribute containing an array of representations. Like all other representations, collections have `_links` defined at the top level.  Paginated collections include `first`, `last`, `next`, and `prev` links containing a URL with the respective set of elements in the collection.  ## Updates  Resources that accept partial updates use the `PATCH` verb, and support the [JSON Patch](http://tools.ietf.org/html/rfc6902) format. Some resources also support the [JSON Merge Patch](https://tools.ietf.org/html/rfc7386) format. In addition, some resources support optional comments that can be submitted with updates. Comments appear in outgoing webhooks, the audit log, and other integrations.  ### Updates via JSON Patch  [JSON Patch](http://tools.ietf.org/html/rfc6902) is a way to specify the modifications to perform on a resource. For example, in this feature flag representation:  ```json {     \"name\": \"New recommendations engine\",     \"key\": \"engine.enable\",     \"description\": \"This is the description\",     ... } ```  You can change the feature flag's description with the following patch document:  ```json [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"This is the new description\" }] ```  JSON Patch documents are always arrays. You can specify multiple modifications to perform in a single request. You can also test that certain preconditions are met before applying the patch:  ```json [   { \"op\": \"test\", \"path\": \"/version\", \"value\": 10 },   { \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" } ] ```  The above patch request tests whether the feature flag's `version` is `10`, and if so, changes the feature flag's description.  Attributes that aren't editable, like a resource's `_links`, have names that start with an underscore.  ### Updates via JSON Merge Patch  The API also supports the [JSON Merge Patch](https://tools.ietf.org/html/rfc7386) format, as well as the [Update feature flag](/tag/Feature-flags#operation/patchFeatureFlag) resource.  JSON Merge Patch is less expressive than JSON Patch but in many cases, it is simpler to construct a merge patch document. For example, you can change a feature flag's description with the following merge patch document:  ```json {   \"description\": \"New flag description\" } ```  ### Updates with comments  You can submit optional comments with `PATCH` changes. The [Update feature flag](/tag/Feature-flags#operation/patchFeatureFlag) resource supports comments.  To submit a comment along with a JSON Patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"patch\": [{ \"op\": \"replace\", \"path\": \"/description\", \"value\": \"The new description\" }] } ```  To submit a comment along with a JSON Merge Patch document, use the following format:  ```json {   \"comment\": \"This is a comment string\",   \"merge\": { \"description\": \"New flag description\" } } ```  ### Updates via semantic patches  The API also supports the Semantic patch format. A semantic `PATCH` is a way to specify the modifications to perform on a resource as a set of executable instructions.  JSON Patch uses paths and a limited set of operations to describe how to transform the current state of the resource into a new state. Semantic patch allows you to be explicit about intent using precise, custom instructions. In many cases, semantic patch instructions can also be defined independently of the current state of the resource. This can be useful when defining a change that may be applied at a future date.  For example, in this feature flag configuration in environment Production:  ```json {     \"name\": \"Alternate sort order\",     \"kind\": \"boolean\",     \"key\": \"sort.order\",    ...     \"environments\": {         \"production\": {             \"on\": true,             \"archived\": false,             \"salt\": \"c29ydC5vcmRlcg==\",             \"sel\": \"8de1085cb7354b0ab41c0e778376dfd3\",             \"lastModified\": 1469131558260,             \"version\": 81,             \"targets\": [                 {                     \"values\": [                         \"Gerhard.Little@yahoo.com\"                     ],                     \"variation\": 0                 },                 {                     \"values\": [                         \"1461797806429-33-861961230\",                         \"438580d8-02ee-418d-9eec-0085cab2bdf0\"                     ],                     \"variation\": 1                 }             ],             \"rules\": [],             \"fallthrough\": {                 \"variation\": 0             },             \"offVariation\": 1,             \"prerequisites\": [],             \"_site\": {                 \"href\": \"/default/production/features/sort.order\",                 \"type\": \"text/html\"             }        }     } } ```  You can add a date you want a user to be removed from the feature flag's user targets. For example, “remove user 1461797806429-33-861961230 from the user target for variation 0 on the Alternate sort order flag in the production environment on Wed Jul 08 2020 at 15:27:41 pm”. This is done using the following:  ```json {   \"comment\": \"update expiring user targets\",   \"instructions\": [     {       \"kind\": \"removeExpireUserTargetDate\",       \"userKey\": \"userKey\",       \"variationId\": \"978d53f9-7fe3-4a63-992d-97bcb4535dc8\"     },     {       \"kind\": \"updateExpireUserTargetDate\",       \"userKey\": \"userKey2\",       \"variationId\": \"978d53f9-7fe3-4a63-992d-97bcb4535dc8\",       \"value\": 1587582000000     },     {       \"kind\": \"addExpireUserTargetDate\",       \"userKey\": \"userKey3\",       \"variationId\": \"978d53f9-7fe3-4a63-992d-97bcb4535dc8\",       \"value\": 1594247266386     }   ] } ```  Here is another example. In this feature flag configuration:  ```json {   \"name\": \"New recommendations engine\",   \"key\": \"engine.enable\",   \"environments\": {     \"test\": {       \"on\": true     }   } } ```  You can change the feature flag's description with the following patch document as a set of executable instructions. For example, “add user X to targets for variation Y and remove user A from targets for variation B for test flag”:  ```json {   \"comment\": \"\",   \"instructions\": [     {       \"kind\": \"removeUserTargets\",       \"values\": [\"438580d8-02ee-418d-9eec-0085cab2bdf0\"],       \"variationId\": \"852cb784-54ff-46b9-8c35-5498d2e4f270\"     },     {       \"kind\": \"addUserTargets\",       \"values\": [\"438580d8-02ee-418d-9eec-0085cab2bdf0\"],       \"variationId\": \"1bb18465-33b6-49aa-a3bd-eeb6650b33ad\"     }   ] } ```  > ### Supported semantic patch API endpoints > > - [Update feature flag](/tag/Feature-flags#operation/patchFeatureFlag) > - [Update expiring user targets on feature flag](/tag/Feature-flags#operation/patchExpiringUserTargets) > - [Update expiring user target for flags](/tag/User-settings#operation/patchExpiringFlagsForUser) > - [Update expiring user targets on segment](/tag/Segments#operation/patchExpiringUserTargetsForSegment)  ## Errors  The API always returns errors in a common format. Here's an example:  ```json {   \"code\": \"invalid_request\",   \"message\": \"A feature with that key already exists\",   \"id\": \"30ce6058-87da-11e4-b116-123b93f75cba\" } ```  The general class of error is indicated by the `code`. The `message` is a human-readable explanation of what went wrong. The `id` is a unique identifier. Use it when you're working with LaunchDarkly support to debug a problem with a specific API call.  ### HTTP Status - Error Response Codes  | Code | Definition        | Desc.                                                                                       | Possible Solution                                                | | ---- | ----------------- | ------------------------------------------------------------------------------------------- | ---------------------------------------------------------------- | | 400  | Bad Request       | A request that fails may return this HTTP response code.                                    | Ensure JSON syntax in request body is correct.                   | | 401  | Unauthorized      | User doesn't have permission to an API call.                                                | Ensure your SDK key is good.                                     | | 403  | Forbidden         | User does not have permission for operation.                                                | Ensure that the user or access token has proper permissions set. | | 409  | Conflict          | The API request could not be completed because it conflicted with a concurrent API request. | Retry your request.                                              | | 429  | Too many requests | See [Rate limiting](/#section/Rate-limiting).                                               | Wait and try again later.                                        |  ## CORS  The LaunchDarkly API supports Cross Origin Resource Sharing (CORS) for AJAX requests from any origin. If an `Origin` header is given in a request, it will be echoed as an explicitly allowed origin. Otherwise, a wildcard is returned: `Access-Control-Allow-Origin: *`. For more information on CORS, see the [CORS W3C Recommendation](http://www.w3.org/TR/cors). Example CORS headers might look like:  ```http Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, Authorization Access-Control-Allow-Methods: OPTIONS, GET, DELETE, PATCH Access-Control-Allow-Origin: * Access-Control-Max-Age: 300 ```  You can make authenticated CORS calls just as you would make same-origin calls, using either [token or session-based authentication](#section/Authentication). If you’re using session auth, you should set the `withCredentials` property for your `xhr` request to `true`. You should never expose your access tokens to untrusted users.  ## Rate limiting  We use several rate limiting strategies to ensure the availability of our APIs. Rate-limited calls to our APIs will return a `429` status code. Calls to our APIs will include headers indicating the current rate limit status. The specific headers returned depend on the API route being called. The limits differ based on the route, authentication mechanism, and other factors. Routes that are not rate limited may not contain any of the headers described below.  > ### Rate limiting and SDKs > > LaunchDarkly SDKs are never rate limited and do not use the API endpoints defined here. LaunchDarkly uses a different set of approaches, including streaming/server-sent events and a global CDN, to ensure availability to the routes used by LaunchDarkly SDKs. > > The client-side ID is safe to embed in untrusted contexts. It's designed for use in client-side JavaScript.  ### Global rate limits  Authenticated requests are subject to a global limit. This is the maximum number of calls that can be made to the API per ten seconds. All personal access tokens on the account share this limit, so exceeding the limit with one access token will impact other tokens. Calls that are subject to global rate limits will return the headers below:  | Header name                    | Description                                                                      | | ------------------------------ | -------------------------------------------------------------------------------- | | `X-Ratelimit-Global-Remaining` | The maximum number of requests the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`            | The time at which the current rate limit window resets in epoch milliseconds.    |  We do not publicly document the specific number of calls that can be made globally. This limit may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limit.  ### Route-level rate limits  Some authenticated routes have custom rate limits. These also reset every ten seconds. Any access tokens hitting the same route share this limit, so exceeding the limit with one access token may impact other tokens. Calls that are subject to route-level rate limits will return the headers below:  | Header name                   | Description                                                                                           | | ----------------------------- | ----------------------------------------------------------------------------------------------------- | | `X-Ratelimit-Route-Remaining` | The maximum number of requests to the current route the account is permitted to make per ten seconds. | | `X-Ratelimit-Reset`           | The time at which the current rate limit window resets in epoch milliseconds.                         |  A _route_ represents a specific URL pattern and verb. For example, the [Delete environment](/tag/Environments#operation/deleteEnvironment) endpoint is considered a single route, and each call to delete an environment counts against your route-level rate limit for that route.  We do not publicly document the specific number of calls that can be made to each endpoint per ten seconds. These limits may change, and we encourage clients to program against the specification, relying on the two headers defined above, rather than hardcoding to the current limits.  ### IP-based rate limiting  We also employ IP-based rate limiting on some API routes. If you hit an IP-based rate limit, your API response will include a `Retry-After` header indicating how long to wait before re-trying the call. Clients must wait at least `Retry-After` seconds before making additional calls to our API, and should employ jitter and backoff strategies to avoid triggering rate limits again.  ## OpenAPI (Swagger)  We have a [complete OpenAPI (Swagger) specification](https://app.launchdarkly.com/api/v2/openapi.json) for our API.  You can use this specification to generate client libraries to interact with our REST API in your language of choice.  This specification is supported by several API-based tools such as Postman and Insomnia. In many cases, you can directly import our specification to ease use in navigating the APIs in the tooling.  ## Client libraries  We auto-generate multiple client libraries based on our OpenAPI specification. To learn more, visit [GitHub](https://github.com/search?q=topic%3Alaunchdarkly-api+org%3Alaunchdarkly&type=Repositories).  ## Method Overriding  Some firewalls and HTTP clients restrict the use of verbs other than `GET` and `POST`. In those environments, our API endpoints that use `PUT`, `PATCH`, and `DELETE` verbs will be inaccessible.  To avoid this issue, our API supports the `X-HTTP-Method-Override` header, allowing clients to \"tunnel\" `PUT`, `PATCH`, and `DELETE` requests via a `POST` request.  For example, if you wish to call one of our `PATCH` resources via a `POST` request, you can include `X-HTTP-Method-Override:PATCH` as a header.  ## Beta resources  We sometimes release new API resources in **beta** status before we release them with general availability.  Resources that are in beta are still undergoing testing and development. They may change without notice, including becoming backwards incompatible.  We try to promote resources into general availability as quickly as possible. This happens after sufficient testing and when we're satisfied that we no longer need to make backwards-incompatible changes.  We mark beta resources with a \"Beta\" callout in our documentation, pictured below:  > ### This feature is in beta > > To use this feature, pass in a header including the `LD-API-Version` key with value set to `beta`. Use this header with each call. To learn more, read [Beta resources](/#section/Beta-resources).  ### Using beta resources  To use a beta resource, you must include a header in the request. If you call a beta resource without this header, you'll receive a `403` response.  Use this header:  ``` LD-API-Version: beta ```  ## Versioning  We try hard to keep our REST API backwards compatible, but we occasionally have to make backwards-incompatible changes in the process of shipping new features. These breaking changes can cause unexpected behavior if you don't prepare for them accordingly.  Updates to our REST API include support for the latest features in LaunchDarkly. We also release a new version of our REST API every time we make a breaking change. We provide simultaneous support for multiple API versions so you can migrate from your current API version to a new version at your own pace.  ### Setting the API version per request  You can set the API version on a specific request by sending an `LD-API-Version` header, as shown in the example below:  ``` LD-API-Version: 20191212 ```  The header value is the version number of the API version you'd like to request. The number for each version corresponds to the date the version was released. In the example above the version `20191212` corresponds to December 12, 2019.  ### Setting the API version per access token  When creating an access token, you must specify a specific version of the API to use. This ensures that integrations using this token cannot be broken by version changes.  Tokens created before versioning was released have their version set to `20160426` (the version of the API that existed before versioning) so that they continue working the same way they did before versioning.  If you would like to upgrade your integration to use a new API version, you can explicitly set the header described above.  > ### Best practice: Set the header for every client or integration > > We recommend that you set the API version header explicitly in any client or integration you build. > > Only rely on the access token API version during manual testing.
 *
 * The version of the OpenAPI document: 2.0
 * Contact: support@launchdarkly.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.3.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace LaunchDarklyApi\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use LaunchDarklyApi\ApiException;
use LaunchDarklyApi\Configuration;
use LaunchDarklyApi\HeaderSelector;
use LaunchDarklyApi\ObjectSerializer;

/**
 * CodeReferencesApi Class Doc Comment
 *
 * @category Class
 * @package  LaunchDarklyApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class CodeReferencesApi
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
     * Operation deleteBranches
     *
     * Delete branches
     *
     * @param  string $repo The repository name to delete branches for. (required)
     * @param  string[] $request_body request_body (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteBranches($repo, $request_body)
    {
        $this->deleteBranchesWithHttpInfo($repo, $request_body);
    }

    /**
     * Operation deleteBranchesWithHttpInfo
     *
     * Delete branches
     *
     * @param  string $repo The repository name to delete branches for. (required)
     * @param  string[] $request_body (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteBranchesWithHttpInfo($repo, $request_body)
    {
        $request = $this->deleteBranchesRequest($repo, $request_body);

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
            }
            throw $e;
        }
    }

    /**
     * Operation deleteBranchesAsync
     *
     * Delete branches
     *
     * @param  string $repo The repository name to delete branches for. (required)
     * @param  string[] $request_body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteBranchesAsync($repo, $request_body)
    {
        return $this->deleteBranchesAsyncWithHttpInfo($repo, $request_body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteBranchesAsyncWithHttpInfo
     *
     * Delete branches
     *
     * @param  string $repo The repository name to delete branches for. (required)
     * @param  string[] $request_body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteBranchesAsyncWithHttpInfo($repo, $request_body)
    {
        $returnType = '';
        $request = $this->deleteBranchesRequest($repo, $request_body);

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
     * Create request for operation 'deleteBranches'
     *
     * @param  string $repo The repository name to delete branches for. (required)
     * @param  string[] $request_body (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteBranchesRequest($repo, $request_body)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling deleteBranches'
            );
        }
        // verify the required parameter 'request_body' is set
        if ($request_body === null || (is_array($request_body) && count($request_body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_body when calling deleteBranches'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}/branch-delete-tasks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($request_body)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($request_body));
            } else {
                $httpBody = $request_body;
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteRepository
     *
     * Delete repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteRepository($repo)
    {
        $this->deleteRepositoryWithHttpInfo($repo);
    }

    /**
     * Operation deleteRepositoryWithHttpInfo
     *
     * Delete repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteRepositoryWithHttpInfo($repo)
    {
        $request = $this->deleteRepositoryRequest($repo);

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
            }
            throw $e;
        }
    }

    /**
     * Operation deleteRepositoryAsync
     *
     * Delete repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteRepositoryAsync($repo)
    {
        return $this->deleteRepositoryAsyncWithHttpInfo($repo)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteRepositoryAsyncWithHttpInfo
     *
     * Delete repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteRepositoryAsyncWithHttpInfo($repo)
    {
        $returnType = '';
        $request = $this->deleteRepositoryRequest($repo);

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
     * Create request for operation 'deleteRepository'
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteRepositoryRequest($repo)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling deleteRepository'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBranch
     *
     * Get branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\BranchRep
     */
    public function getBranch($repo, $branch, $proj_key = null, $flag_key = null)
    {
        list($response) = $this->getBranchWithHttpInfo($repo, $branch, $proj_key, $flag_key);
        return $response;
    }

    /**
     * Operation getBranchWithHttpInfo
     *
     * Get branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\BranchRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBranchWithHttpInfo($repo, $branch, $proj_key = null, $flag_key = null)
    {
        $request = $this->getBranchRequest($repo, $branch, $proj_key, $flag_key);

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
                    if ('\LaunchDarklyApi\Model\BranchRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\BranchRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\BranchRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\BranchRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBranchAsync
     *
     * Get branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBranchAsync($repo, $branch, $proj_key = null, $flag_key = null)
    {
        return $this->getBranchAsyncWithHttpInfo($repo, $branch, $proj_key, $flag_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBranchAsyncWithHttpInfo
     *
     * Get branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBranchAsyncWithHttpInfo($repo, $branch, $proj_key = null, $flag_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\BranchRep';
        $request = $this->getBranchRequest($repo, $branch, $proj_key, $flag_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'getBranch'
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getBranchRequest($repo, $branch, $proj_key = null, $flag_key = null)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling getBranch'
            );
        }
        // verify the required parameter 'branch' is set
        if ($branch === null || (is_array($branch) && count($branch) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $branch when calling getBranch'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}/branches/{branch}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($proj_key !== null) {
            if('form' === 'form' && is_array($proj_key)) {
                foreach($proj_key as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['projKey'] = $proj_key;
            }
        }
        // query params
        if ($flag_key !== null) {
            if('form' === 'form' && is_array($flag_key)) {
                foreach($flag_key as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['flagKey'] = $flag_key;
            }
        }


        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
                $resourcePath
            );
        }
        // path params
        if ($branch !== null) {
            $resourcePath = str_replace(
                '{' . 'branch' . '}',
                ObjectSerializer::toPathValue($branch),
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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBranches
     *
     * List branches
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\BranchCollectionRep
     */
    public function getBranches($repo)
    {
        list($response) = $this->getBranchesWithHttpInfo($repo);
        return $response;
    }

    /**
     * Operation getBranchesWithHttpInfo
     *
     * List branches
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\BranchCollectionRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBranchesWithHttpInfo($repo)
    {
        $request = $this->getBranchesRequest($repo);

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
                    if ('\LaunchDarklyApi\Model\BranchCollectionRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\BranchCollectionRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\BranchCollectionRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\BranchCollectionRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBranchesAsync
     *
     * List branches
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBranchesAsync($repo)
    {
        return $this->getBranchesAsyncWithHttpInfo($repo)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBranchesAsyncWithHttpInfo
     *
     * List branches
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBranchesAsyncWithHttpInfo($repo)
    {
        $returnType = '\LaunchDarklyApi\Model\BranchCollectionRep';
        $request = $this->getBranchesRequest($repo);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'getBranches'
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getBranchesRequest($repo)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling getBranches'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}/branches';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getExtinctions
     *
     * List extinctions
     *
     * @param  string $repo_name Filter results to a specific repository (optional)
     * @param  string $branch_name Filter results to a specific branch (optional)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\ExtinctionCollectionRep
     */
    public function getExtinctions($repo_name = null, $branch_name = null, $proj_key = null, $flag_key = null)
    {
        list($response) = $this->getExtinctionsWithHttpInfo($repo_name, $branch_name, $proj_key, $flag_key);
        return $response;
    }

    /**
     * Operation getExtinctionsWithHttpInfo
     *
     * List extinctions
     *
     * @param  string $repo_name Filter results to a specific repository (optional)
     * @param  string $branch_name Filter results to a specific branch (optional)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\ExtinctionCollectionRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getExtinctionsWithHttpInfo($repo_name = null, $branch_name = null, $proj_key = null, $flag_key = null)
    {
        $request = $this->getExtinctionsRequest($repo_name, $branch_name, $proj_key, $flag_key);

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
                    if ('\LaunchDarklyApi\Model\ExtinctionCollectionRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\ExtinctionCollectionRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\ExtinctionCollectionRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\ExtinctionCollectionRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getExtinctionsAsync
     *
     * List extinctions
     *
     * @param  string $repo_name Filter results to a specific repository (optional)
     * @param  string $branch_name Filter results to a specific branch (optional)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExtinctionsAsync($repo_name = null, $branch_name = null, $proj_key = null, $flag_key = null)
    {
        return $this->getExtinctionsAsyncWithHttpInfo($repo_name, $branch_name, $proj_key, $flag_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getExtinctionsAsyncWithHttpInfo
     *
     * List extinctions
     *
     * @param  string $repo_name Filter results to a specific repository (optional)
     * @param  string $branch_name Filter results to a specific branch (optional)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExtinctionsAsyncWithHttpInfo($repo_name = null, $branch_name = null, $proj_key = null, $flag_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\ExtinctionCollectionRep';
        $request = $this->getExtinctionsRequest($repo_name, $branch_name, $proj_key, $flag_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'getExtinctions'
     *
     * @param  string $repo_name Filter results to a specific repository (optional)
     * @param  string $branch_name Filter results to a specific branch (optional)
     * @param  string $proj_key Filter results to a specific project (optional)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getExtinctionsRequest($repo_name = null, $branch_name = null, $proj_key = null, $flag_key = null)
    {

        $resourcePath = '/api/v2/code-refs/extinctions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($repo_name !== null) {
            if('form' === 'form' && is_array($repo_name)) {
                foreach($repo_name as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['repoName'] = $repo_name;
            }
        }
        // query params
        if ($branch_name !== null) {
            if('form' === 'form' && is_array($branch_name)) {
                foreach($branch_name as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['branchName'] = $branch_name;
            }
        }
        // query params
        if ($proj_key !== null) {
            if('form' === 'form' && is_array($proj_key)) {
                foreach($proj_key as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['projKey'] = $proj_key;
            }
        }
        // query params
        if ($flag_key !== null) {
            if('form' === 'form' && is_array($flag_key)) {
                foreach($flag_key as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['flagKey'] = $flag_key;
            }
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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getRepositories
     *
     * List repositories
     *
     * @param  string $with_branches If set to any value, the endpoint returns repositories with associated branch data (optional)
     * @param  string $with_references_for_default_branch If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     * @param  string $proj_key A LaunchDarkly project key. If provided, this filters code reference results to the specified project. (optional)
     * @param  string $flag_key If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\RepositoryCollectionRep
     */
    public function getRepositories($with_branches = null, $with_references_for_default_branch = null, $proj_key = null, $flag_key = null)
    {
        list($response) = $this->getRepositoriesWithHttpInfo($with_branches, $with_references_for_default_branch, $proj_key, $flag_key);
        return $response;
    }

    /**
     * Operation getRepositoriesWithHttpInfo
     *
     * List repositories
     *
     * @param  string $with_branches If set to any value, the endpoint returns repositories with associated branch data (optional)
     * @param  string $with_references_for_default_branch If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     * @param  string $proj_key A LaunchDarkly project key. If provided, this filters code reference results to the specified project. (optional)
     * @param  string $flag_key If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\RepositoryCollectionRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRepositoriesWithHttpInfo($with_branches = null, $with_references_for_default_branch = null, $proj_key = null, $flag_key = null)
    {
        $request = $this->getRepositoriesRequest($with_branches, $with_references_for_default_branch, $proj_key, $flag_key);

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
                    if ('\LaunchDarklyApi\Model\RepositoryCollectionRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RepositoryCollectionRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\RepositoryCollectionRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\RepositoryCollectionRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRepositoriesAsync
     *
     * List repositories
     *
     * @param  string $with_branches If set to any value, the endpoint returns repositories with associated branch data (optional)
     * @param  string $with_references_for_default_branch If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     * @param  string $proj_key A LaunchDarkly project key. If provided, this filters code reference results to the specified project. (optional)
     * @param  string $flag_key If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRepositoriesAsync($with_branches = null, $with_references_for_default_branch = null, $proj_key = null, $flag_key = null)
    {
        return $this->getRepositoriesAsyncWithHttpInfo($with_branches, $with_references_for_default_branch, $proj_key, $flag_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getRepositoriesAsyncWithHttpInfo
     *
     * List repositories
     *
     * @param  string $with_branches If set to any value, the endpoint returns repositories with associated branch data (optional)
     * @param  string $with_references_for_default_branch If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     * @param  string $proj_key A LaunchDarkly project key. If provided, this filters code reference results to the specified project. (optional)
     * @param  string $flag_key If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRepositoriesAsyncWithHttpInfo($with_branches = null, $with_references_for_default_branch = null, $proj_key = null, $flag_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\RepositoryCollectionRep';
        $request = $this->getRepositoriesRequest($with_branches, $with_references_for_default_branch, $proj_key, $flag_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'getRepositories'
     *
     * @param  string $with_branches If set to any value, the endpoint returns repositories with associated branch data (optional)
     * @param  string $with_references_for_default_branch If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     * @param  string $proj_key A LaunchDarkly project key. If provided, this filters code reference results to the specified project. (optional)
     * @param  string $flag_key If set to any value, the endpoint returns repositories with associated branch data, as well as code references for the default git branch (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getRepositoriesRequest($with_branches = null, $with_references_for_default_branch = null, $proj_key = null, $flag_key = null)
    {

        $resourcePath = '/api/v2/code-refs/repositories';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($with_branches !== null) {
            if('form' === 'form' && is_array($with_branches)) {
                foreach($with_branches as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['withBranches'] = $with_branches;
            }
        }
        // query params
        if ($with_references_for_default_branch !== null) {
            if('form' === 'form' && is_array($with_references_for_default_branch)) {
                foreach($with_references_for_default_branch as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['withReferencesForDefaultBranch'] = $with_references_for_default_branch;
            }
        }
        // query params
        if ($proj_key !== null) {
            if('form' === 'form' && is_array($proj_key)) {
                foreach($proj_key as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['projKey'] = $proj_key;
            }
        }
        // query params
        if ($flag_key !== null) {
            if('form' === 'form' && is_array($flag_key)) {
                foreach($flag_key as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['flagKey'] = $flag_key;
            }
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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getRepository
     *
     * Get repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\RepositoryRep
     */
    public function getRepository($repo)
    {
        list($response) = $this->getRepositoryWithHttpInfo($repo);
        return $response;
    }

    /**
     * Operation getRepositoryWithHttpInfo
     *
     * Get repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\RepositoryRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRepositoryWithHttpInfo($repo)
    {
        $request = $this->getRepositoryRequest($repo);

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
                    if ('\LaunchDarklyApi\Model\RepositoryRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RepositoryRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\RepositoryRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\RepositoryRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRepositoryAsync
     *
     * Get repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRepositoryAsync($repo)
    {
        return $this->getRepositoryAsyncWithHttpInfo($repo)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getRepositoryAsyncWithHttpInfo
     *
     * Get repository
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRepositoryAsyncWithHttpInfo($repo)
    {
        $returnType = '\LaunchDarklyApi\Model\RepositoryRep';
        $request = $this->getRepositoryRequest($repo);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'getRepository'
     *
     * @param  string $repo The repository name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getRepositoryRequest($repo)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling getRepository'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getRootStatistic
     *
     * Get links to code reference repositories for each project
     *
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\StatisticsRoot
     */
    public function getRootStatistic()
    {
        list($response) = $this->getRootStatisticWithHttpInfo();
        return $response;
    }

    /**
     * Operation getRootStatisticWithHttpInfo
     *
     * Get links to code reference repositories for each project
     *
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\StatisticsRoot, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRootStatisticWithHttpInfo()
    {
        $request = $this->getRootStatisticRequest();

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
                    if ('\LaunchDarklyApi\Model\StatisticsRoot' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatisticsRoot', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\StatisticsRoot';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\StatisticsRoot',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRootStatisticAsync
     *
     * Get links to code reference repositories for each project
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRootStatisticAsync()
    {
        return $this->getRootStatisticAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getRootStatisticAsyncWithHttpInfo
     *
     * Get links to code reference repositories for each project
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRootStatisticAsyncWithHttpInfo()
    {
        $returnType = '\LaunchDarklyApi\Model\StatisticsRoot';
        $request = $this->getRootStatisticRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'getRootStatistic'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getRootStatisticRequest()
    {

        $resourcePath = '/api/v2/code-refs/statistics';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getStatistics
     *
     * Get number of code references for flags
     *
     * @param  string $proj_key The project key (required)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\StatisticCollectionRep
     */
    public function getStatistics($proj_key, $flag_key = null)
    {
        list($response) = $this->getStatisticsWithHttpInfo($proj_key, $flag_key);
        return $response;
    }

    /**
     * Operation getStatisticsWithHttpInfo
     *
     * Get number of code references for flags
     *
     * @param  string $proj_key The project key (required)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\StatisticCollectionRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStatisticsWithHttpInfo($proj_key, $flag_key = null)
    {
        $request = $this->getStatisticsRequest($proj_key, $flag_key);

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
                    if ('\LaunchDarklyApi\Model\StatisticCollectionRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\StatisticCollectionRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\StatisticCollectionRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\StatisticCollectionRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getStatisticsAsync
     *
     * Get number of code references for flags
     *
     * @param  string $proj_key The project key (required)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStatisticsAsync($proj_key, $flag_key = null)
    {
        return $this->getStatisticsAsyncWithHttpInfo($proj_key, $flag_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getStatisticsAsyncWithHttpInfo
     *
     * Get number of code references for flags
     *
     * @param  string $proj_key The project key (required)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStatisticsAsyncWithHttpInfo($proj_key, $flag_key = null)
    {
        $returnType = '\LaunchDarklyApi\Model\StatisticCollectionRep';
        $request = $this->getStatisticsRequest($proj_key, $flag_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'getStatistics'
     *
     * @param  string $proj_key The project key (required)
     * @param  string $flag_key Filter results to a specific flag key (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getStatisticsRequest($proj_key, $flag_key = null)
    {
        // verify the required parameter 'proj_key' is set
        if ($proj_key === null || (is_array($proj_key) && count($proj_key) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $proj_key when calling getStatistics'
            );
        }

        $resourcePath = '/api/v2/code-refs/statistics/{projKey}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($flag_key !== null) {
            if('form' === 'form' && is_array($flag_key)) {
                foreach($flag_key as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['flagKey'] = $flag_key;
            }
        }


        // path params
        if ($proj_key !== null) {
            $resourcePath = str_replace(
                '{' . 'projKey' . '}',
                ObjectSerializer::toPathValue($proj_key),
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
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchRepository
     *
     * Update repository
     *
     * @param  string $repo The repository name (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation patch_operation (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \LaunchDarklyApi\Model\RepositoryRep
     */
    public function patchRepository($repo, $patch_operation)
    {
        list($response) = $this->patchRepositoryWithHttpInfo($repo, $patch_operation);
        return $response;
    }

    /**
     * Operation patchRepositoryWithHttpInfo
     *
     * Update repository
     *
     * @param  string $repo The repository name (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \LaunchDarklyApi\Model\RepositoryRep, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchRepositoryWithHttpInfo($repo, $patch_operation)
    {
        $request = $this->patchRepositoryRequest($repo, $patch_operation);

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
                    if ('\LaunchDarklyApi\Model\RepositoryRep' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\LaunchDarklyApi\Model\RepositoryRep', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\LaunchDarklyApi\Model\RepositoryRep';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\LaunchDarklyApi\Model\RepositoryRep',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchRepositoryAsync
     *
     * Update repository
     *
     * @param  string $repo The repository name (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchRepositoryAsync($repo, $patch_operation)
    {
        return $this->patchRepositoryAsyncWithHttpInfo($repo, $patch_operation)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchRepositoryAsyncWithHttpInfo
     *
     * Update repository
     *
     * @param  string $repo The repository name (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchRepositoryAsyncWithHttpInfo($repo, $patch_operation)
    {
        $returnType = '\LaunchDarklyApi\Model\RepositoryRep';
        $request = $this->patchRepositoryRequest($repo, $patch_operation);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'patchRepository'
     *
     * @param  string $repo The repository name (required)
     * @param  \LaunchDarklyApi\Model\PatchOperation[] $patch_operation (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchRepositoryRequest($repo, $patch_operation)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling patchRepository'
            );
        }
        // verify the required parameter 'patch_operation' is set
        if ($patch_operation === null || (is_array($patch_operation) && count($patch_operation) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $patch_operation when calling patchRepository'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
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
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($patch_operation)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($patch_operation));
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postExtinction
     *
     * Create extinction
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\InlineObject[] $inline_object inline_object (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function postExtinction($repo, $branch, $inline_object)
    {
        $this->postExtinctionWithHttpInfo($repo, $branch, $inline_object);
    }

    /**
     * Operation postExtinctionWithHttpInfo
     *
     * Create extinction
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\InlineObject[] $inline_object (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function postExtinctionWithHttpInfo($repo, $branch, $inline_object)
    {
        $request = $this->postExtinctionRequest($repo, $branch, $inline_object);

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
            }
            throw $e;
        }
    }

    /**
     * Operation postExtinctionAsync
     *
     * Create extinction
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\InlineObject[] $inline_object (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postExtinctionAsync($repo, $branch, $inline_object)
    {
        return $this->postExtinctionAsyncWithHttpInfo($repo, $branch, $inline_object)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postExtinctionAsyncWithHttpInfo
     *
     * Create extinction
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\InlineObject[] $inline_object (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postExtinctionAsyncWithHttpInfo($repo, $branch, $inline_object)
    {
        $returnType = '';
        $request = $this->postExtinctionRequest($repo, $branch, $inline_object);

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
     * Create request for operation 'postExtinction'
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\InlineObject[] $inline_object (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postExtinctionRequest($repo, $branch, $inline_object)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling postExtinction'
            );
        }
        // verify the required parameter 'branch' is set
        if ($branch === null || (is_array($branch) && count($branch) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $branch when calling postExtinction'
            );
        }
        // verify the required parameter 'inline_object' is set
        if ($inline_object === null || (is_array($inline_object) && count($inline_object) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $inline_object when calling postExtinction'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}/branches/{branch}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
                $resourcePath
            );
        }
        // path params
        if ($branch !== null) {
            $resourcePath = str_replace(
                '{' . 'branch' . '}',
                ObjectSerializer::toPathValue($branch),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($inline_object)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($inline_object));
            } else {
                $httpBody = $inline_object;
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postRepository
     *
     * Create repository
     *
     * @param  \LaunchDarklyApi\Model\RepositoryPost $repository_post repository_post (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function postRepository($repository_post)
    {
        $this->postRepositoryWithHttpInfo($repository_post);
    }

    /**
     * Operation postRepositoryWithHttpInfo
     *
     * Create repository
     *
     * @param  \LaunchDarklyApi\Model\RepositoryPost $repository_post (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function postRepositoryWithHttpInfo($repository_post)
    {
        $request = $this->postRepositoryRequest($repository_post);

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
            }
            throw $e;
        }
    }

    /**
     * Operation postRepositoryAsync
     *
     * Create repository
     *
     * @param  \LaunchDarklyApi\Model\RepositoryPost $repository_post (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postRepositoryAsync($repository_post)
    {
        return $this->postRepositoryAsyncWithHttpInfo($repository_post)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postRepositoryAsyncWithHttpInfo
     *
     * Create repository
     *
     * @param  \LaunchDarklyApi\Model\RepositoryPost $repository_post (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postRepositoryAsyncWithHttpInfo($repository_post)
    {
        $returnType = '';
        $request = $this->postRepositoryRequest($repository_post);

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
     * Create request for operation 'postRepository'
     *
     * @param  \LaunchDarklyApi\Model\RepositoryPost $repository_post (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postRepositoryRequest($repository_post)
    {
        // verify the required parameter 'repository_post' is set
        if ($repository_post === null || (is_array($repository_post) && count($repository_post) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repository_post when calling postRepository'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($repository_post)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($repository_post));
            } else {
                $httpBody = $repository_post;
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putBranch
     *
     * Upsert branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\BranchRep $branch_rep branch_rep (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function putBranch($repo, $branch, $branch_rep)
    {
        $this->putBranchWithHttpInfo($repo, $branch, $branch_rep);
    }

    /**
     * Operation putBranchWithHttpInfo
     *
     * Upsert branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\BranchRep $branch_rep (required)
     *
     * @throws \LaunchDarklyApi\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function putBranchWithHttpInfo($repo, $branch, $branch_rep)
    {
        $request = $this->putBranchRequest($repo, $branch, $branch_rep);

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
            }
            throw $e;
        }
    }

    /**
     * Operation putBranchAsync
     *
     * Upsert branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\BranchRep $branch_rep (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putBranchAsync($repo, $branch, $branch_rep)
    {
        return $this->putBranchAsyncWithHttpInfo($repo, $branch, $branch_rep)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation putBranchAsyncWithHttpInfo
     *
     * Upsert branch
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\BranchRep $branch_rep (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putBranchAsyncWithHttpInfo($repo, $branch, $branch_rep)
    {
        $returnType = '';
        $request = $this->putBranchRequest($repo, $branch, $branch_rep);

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
     * Create request for operation 'putBranch'
     *
     * @param  string $repo The repository name (required)
     * @param  string $branch The url-encoded branch name (required)
     * @param  \LaunchDarklyApi\Model\BranchRep $branch_rep (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function putBranchRequest($repo, $branch, $branch_rep)
    {
        // verify the required parameter 'repo' is set
        if ($repo === null || (is_array($repo) && count($repo) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $repo when calling putBranch'
            );
        }
        // verify the required parameter 'branch' is set
        if ($branch === null || (is_array($branch) && count($branch) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $branch when calling putBranch'
            );
        }
        // verify the required parameter 'branch_rep' is set
        if ($branch_rep === null || (is_array($branch_rep) && count($branch_rep) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $branch_rep when calling putBranch'
            );
        }

        $resourcePath = '/api/v2/code-refs/repositories/{repo}/branches/{branch}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($repo !== null) {
            $resourcePath = str_replace(
                '{' . 'repo' . '}',
                ObjectSerializer::toPathValue($repo),
                $resourcePath
            );
        }
        // path params
        if ($branch !== null) {
            $resourcePath = str_replace(
                '{' . 'branch' . '}',
                ObjectSerializer::toPathValue($branch),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($branch_rep)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($branch_rep));
            } else {
                $httpBody = $branch_rep;
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
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
