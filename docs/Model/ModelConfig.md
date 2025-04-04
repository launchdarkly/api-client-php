# # ModelConfig

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_access** | [**\LaunchDarklyApi\Model\AiConfigsAccess**](AiConfigsAccess.md) |  | [optional]
**name** | **string** | Human readable name of the model |
**key** | **string** | Unique key for the model |
**id** | **string** | Identifier for the model, for use with third party providers |
**icon** | **string** | Icon for the model | [optional]
**provider** | **string** | Provider for the model | [optional]
**global** | **bool** | Whether the model is global |
**params** | **object** |  | [optional]
**custom_params** | **object** |  | [optional]
**tags** | **string[]** |  |
**version** | **int** |  |
**cost_per_input_token** | **double** | Cost per input token in USD | [optional]
**cost_per_output_token** | **double** | Cost per output token in USD | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
