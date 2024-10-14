# # CreateReleasePipelineInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**description** | **string** | The release pipeline description | [optional]
**key** | **string** | The unique identifier of this release pipeline |
**name** | **string** | The name of the release pipeline |
**phases** | [**\LaunchDarklyApi\Model\CreatePhaseInput[]**](CreatePhaseInput.md) | A logical grouping of one or more environments that share attributes for rolling out changes |
**tags** | **string[]** | A list of tags for this release pipeline | [optional]
**is_project_default** | **bool** | Whether or not the newly created pipeline should be set as the default pipeline for this project | [optional]
**is_legacy** | **bool** | Whether or not the pipeline is enabled for Release Automation. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
