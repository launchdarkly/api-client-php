# # ProjectPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the project. |
**key** | **string** | A unique key used to reference the project in your code. |
**include_in_snippet_by_default** | **bool** | Whether or not flags created in this project are made available to the client-side JavaScript SDK by default. | [optional]
**default_client_side_availability** | [**\LaunchDarklyApi\Model\DefaultClientSideAvailabilityPost**](DefaultClientSideAvailabilityPost.md) |  | [optional]
**tags** | **string[]** |  | [optional]
**environments** | **object[]** | Creates the provided environments for this project. If omitted default environments will be created instead. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
