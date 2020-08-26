# FeatureFlagBody

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the feature flag. Remember to note if this flag is intended to be temporary or permanent. | 
**key** | **string** | A unique key that will be used to reference the flag in your code. | 
**description** | **string** | A description of the feature flag. | [optional] 
**variations** | [**\LaunchDarklyApi\Model\Variation[]**](Variation.md) | An array of possible variations for the flag. | 
**temporary** | **bool** | Whether or not the flag is a temporary flag. | [optional] 
**tags** | **string[]** | Tags for the feature flag. | [optional] 
**include_in_snippet** | **bool** | Whether or not this flag should be made available to the client-side JavaScript SDK. | [optional] 
**client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailability**](ClientSideAvailability.md) |  | [optional] 
**defaults** | [**\LaunchDarklyApi\Model\Defaults**](Defaults.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


