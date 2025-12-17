# # AgentGraphPatch

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-readable name for the agent graph | [optional]
**description** | **string** | A description of the agent graph | [optional]
**root_config_key** | **string** | The AI Config key of the root node. If present, edges must also be present. | [optional]
**edges** | [**\LaunchDarklyApi\Model\AgentGraphEdge[]**](AgentGraphEdge.md) | The edges in the graph. If present, rootConfigKey must also be present. Replaces all existing edges. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
