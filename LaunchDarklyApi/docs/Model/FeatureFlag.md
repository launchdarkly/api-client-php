# FeatureFlag

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** |  | [optional] 
**name** | **string** | Name of the feature flag. | [optional] 
**description** | **string** | Description of the feature flag. | [optional] 
**kind** | **string** | Whether the feature flag is a boolean flag or multivariate. | [optional] 
**creation_date** | **float** | A unix epoch time in milliseconds specifying the creation time of this flag. | [optional] 
**include_in_snippet** | **bool** |  | [optional] 
**temporary** | **bool** | Whether or not this flag is temporary. | [optional] 
**maintainer_id** | **string** | The ID of the member that should maintain this flag. | [optional] 
**tags** | **string[]** | An array of tags for this feature flag. | [optional] 
**variations** | [**\LaunchDarklyApi\Model\Variation[]**](Variation.md) | The variations for this feature flag. | [optional] 
**custom_properties** | [**\LaunchDarklyApi\Model\CustomProperties**](CustomProperties.md) |  | [optional] 
**_links** | [**\LaunchDarklyApi\Model\Links**](Links.md) |  | [optional] 
**_maintainer** | [**\LaunchDarklyApi\Model\Member**](Member.md) |  | [optional] 
**environments** | [**map[string,\LaunchDarklyApi\Model\FeatureFlagConfig]**](FeatureFlagConfig.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

