# # ExpiringUserTargetPatchResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**items** | [**\LaunchDarklyApi\Model\ExpiringUserTargetItem[]**](ExpiringUserTargetItem.md) | An array of expiring user targets |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**total_instructions** | **int** | The total count of instructions sent in the PATCH request | [optional]
**successful_instructions** | **int** | The total count of successful instructions sent in the PATCH request | [optional]
**failed_instructions** | **int** | The total count of the failed instructions sent in the PATCH request | [optional]
**errors** | [**\LaunchDarklyApi\Model\ExpiringTargetError[]**](ExpiringTargetError.md) | An array of error messages for the failed instructions | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
