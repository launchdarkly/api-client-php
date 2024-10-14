# # ReleasePipeline

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**created_at** | **\DateTime** | Timestamp of when the release pipeline was created |
**description** | **string** | The release pipeline description | [optional]
**key** | **string** | The release pipeline key |
**name** | **string** | The release pipeline name |
**phases** | [**\LaunchDarklyApi\Model\Phase[]**](Phase.md) | An ordered list of the release pipeline phases. Each phase is a logical grouping of one or more environments that share attributes for rolling out changes. |
**tags** | **string[]** | A list of the release pipeline&#39;s tags | [optional]
**_version** | **int** | The release pipeline version | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**is_project_default** | **bool** | Whether this release pipeline is the default pipeline for the project | [optional]
**_is_legacy** | **bool** | Whether this release pipeline is a legacy pipeline | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
