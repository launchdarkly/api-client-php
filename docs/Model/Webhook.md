# # Webhook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_id** | **string** | The ID of this webhook |
**name** | **string** | A human-readable name for this webhook | [optional]
**url** | **string** | The URL to which LaunchDarkly sends an HTTP POST payload for this webhook |
**secret** | **string** | The secret for this webhook | [optional]
**statements** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) | Represents a Custom role policy, defining a resource kinds filter the webhook responds to. | [optional]
**on** | **bool** | Whether or not this webhook is enabled |
**tags** | **string[]** | List of tags for this webhook |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
