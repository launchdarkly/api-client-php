# # Integration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**_id** | **string** | The ID for this integration audit log subscription | [optional]
**kind** | **string** | The type of integration | [optional]
**name** | **string** | A human-friendly name for the integration | [optional]
**config** | **array<string,mixed>** | Details on configuration for an integration of this type. Refer to the &lt;code&gt;formVariables&lt;/code&gt; field in the corresponding &lt;code&gt;manifest.json&lt;/code&gt; for a full list of fields for each integration. | [optional]
**statements** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) | Represents a Custom role policy, defining a resource kinds filter the integration audit log subscription responds to. | [optional]
**on** | **bool** | Whether the integration is currently active | [optional]
**tags** | **string[]** | An array of tags for this integration | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**_status** | [**\LaunchDarklyApi\Model\IntegrationSubscriptionStatusRep**](IntegrationSubscriptionStatusRep.md) |  | [optional]
**url** | **string** | Slack webhook receiver URL. Only used for legacy Slack webhook integrations. | [optional]
**api_key** | **string** | Datadog API key. Only used for legacy Datadog webhook integrations. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
