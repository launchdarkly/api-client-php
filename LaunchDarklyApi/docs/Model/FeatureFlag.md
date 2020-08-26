# FeatureFlag

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** |  | [optional] 
**name** | **string** | Name of the feature flag. | [optional] 
**description** | **string** | Description of the feature flag. | [optional] 
**kind** | **string** | Whether the feature flag is a boolean flag or multivariate. | [optional] 
**creation_date** | **int** | A unix epoch time in milliseconds specifying the creation time of this flag. | [optional] 
**include_in_snippet** | **bool** |  | [optional] 
**temporary** | **bool** | Whether or not this flag is temporary. | [optional] 
**maintainer_id** | **string** | The ID of the member that should maintain this flag. | [optional] 
**tags** | **string[]** | An array of tags for this feature flag. | [optional] 
**variations** | [**\LaunchDarklyApi\Model\Variation[]**](Variation.md) | The variations for this feature flag. | [optional] 
**goal_ids** | **string[]** | An array goals from all environments associated with this feature flag | [optional] 
**_version** | **int** |  | [optional] 
**custom_properties** | [**map[string,\LaunchDarklyApi\Model\CustomProperty]**](CustomProperty.md) | A mapping of keys to CustomProperty entries. | [optional] 
**_links** | [**\LaunchDarklyApi\Model\Links**](Links.md) |  | [optional] 
**_maintainer** | [**\LaunchDarklyApi\Model\Member**](Member.md) |  | [optional] 
**environments** | [**map[string,\LaunchDarklyApi\Model\FeatureFlagConfig]**](FeatureFlagConfig.md) |  | [optional] 
**archived_date** | **int** | A unix epoch time in milliseconds specifying the archived time of this flag. | [optional] 
**archived** | **bool** | Whether or not this flag is archived. | [optional] 
**client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailability**](ClientSideAvailability.md) |  | [optional] 
**defaults** | [**\LaunchDarklyApi\Model\Defaults**](Defaults.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


