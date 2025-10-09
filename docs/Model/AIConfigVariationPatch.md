# # AIConfigVariationPatch

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**comment** | **string** | Human-readable description of what this patch changes | [optional]
**description** | **string** | Description for agent when AI Config is in agent mode. | [optional]
**instructions** | **string** | Instructions for agent when AI Config is in agent mode. | [optional]
**messages** | [**\LaunchDarklyApi\Model\Message[]**](Message.md) |  | [optional]
**model** | **object** |  | [optional]
**model_config_key** | **string** |  | [optional]
**name** | **string** |  | [optional]
**published** | **bool** |  | [optional]
**state** | **string** | One of &#39;archived&#39;, &#39;published&#39; | [optional]
**tools** | [**\LaunchDarklyApi\Model\VariationToolPost[]**](VariationToolPost.md) | List of tools to use for this variation. The latest version of the tool will be used. | [optional]
**tool_keys** | **string[]** | List of tool keys to use for this variation. The latest version of the tool will be used. | [optional]
**judge_configuration** | [**\LaunchDarklyApi\Model\JudgeConfiguration**](JudgeConfiguration.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
