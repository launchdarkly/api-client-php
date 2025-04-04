# # CustomRole

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The ID of the custom role |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**description** | **string** | The description of the custom role | [optional]
**key** | **string** | The key of the custom role |
**name** | **string** | The name of the custom role |
**policy** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) | An array of the policies that comprise this custom role |
**base_permissions** | **string** |  | [optional]
**resource_category** | **string** |  | [optional]
**assigned_to** | [**\LaunchDarklyApi\Model\AssignedToRep**](AssignedToRep.md) |  | [optional]
**_preset_bundle_version** | **int** | If created from a preset, the preset bundle version | [optional]
**_preset_statements** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) | If created from a preset, the read-only statements copied from the preset | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
