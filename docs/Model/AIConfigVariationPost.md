# # AIConfigVariationPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**comment** | **string** | Human-readable description of this variation | [optional]
**description** | **string** | Returns the description for the agent. This is only returned for agent variations. | [optional]
**instructions** | **string** | Returns the instructions for the agent. This is only returned for agent variations. | [optional]
**key** | **string** |  |
**messages** | [**\LaunchDarklyApi\Model\Message[]**](Message.md) |  | [optional]
**model** | **object** |  | [optional]
**name** | **string** |  |
**model_config_key** | **string** |  | [optional]
**tools** | [**\LaunchDarklyApi\Model\VariationToolPost[]**](VariationToolPost.md) | List of tools to use for this variation. The latest version of the tool will be used. | [optional]
**tool_keys** | **string[]** | List of tool keys to use for this variation. The latest version of the tool will be used. | [optional]
**judge_configuration** | [**\LaunchDarklyApi\Model\JudgeConfiguration**](JudgeConfiguration.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
