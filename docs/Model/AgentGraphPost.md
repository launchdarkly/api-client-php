# # AgentGraphPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | A unique key for the agent graph |
**name** | **string** | A human-readable name for the agent graph |
**description** | **string** | A description of the agent graph | [optional]
**root_config_key** | **string** | The AI Config key of the root node. A missing root implies a newly created graph with metadata only. | [optional]
**edges** | [**\LaunchDarklyApi\Model\AgentGraphEdgePost[]**](AgentGraphEdgePost.md) | The edges in the graph. If edges or rootConfigKey is present, both must be present. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
