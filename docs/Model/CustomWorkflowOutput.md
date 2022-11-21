# # CustomWorkflowOutput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The ID of the workflow |
**_version** | **int** | The version of the workflow |
**_conflicts** | [**\LaunchDarklyApi\Model\ConflictOutput[]**](ConflictOutput.md) | Any conflicts that are present in the workflow stages |
**_creation_date** | **int** |  |
**_maintainer_id** | **string** | The member ID of the maintainer of the workflow. Defaults to the workflow creator. |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**name** | **string** | The name of the workflow |
**description** | **string** | A brief description of the workflow | [optional]
**kind** | **string** | The kind of workflow | [optional]
**stages** | [**\LaunchDarklyApi\Model\StageOutput[]**](StageOutput.md) | The stages that make up the workflow. Each stage contains conditions and actions. | [optional]
**_execution** | [**\LaunchDarklyApi\Model\ExecutionOutput**](ExecutionOutput.md) |  |
**meta** | [**\LaunchDarklyApi\Model\WorkflowTemplateMetadata**](WorkflowTemplateMetadata.md) |  | [optional]
**template_key** | **string** | For workflows being created from a workflow template, this value is the template&#39;s key | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
