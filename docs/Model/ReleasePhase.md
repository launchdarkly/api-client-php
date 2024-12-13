# # ReleasePhase

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The phase ID |
**_name** | **string** | The release phase name |
**complete** | **bool** | Whether this phase is complete |
**_creation_date** | **int** |  |
**_completion_date** | **int** |  | [optional]
**_completed_by** | [**\LaunchDarklyApi\Model\CompletedBy**](CompletedBy.md) |  | [optional]
**_audiences** | [**\LaunchDarklyApi\Model\ReleaseAudience[]**](ReleaseAudience.md) | A logical grouping of one or more environments that share attributes for rolling out changes |
**status** | **string** |  | [optional]
**started** | **bool** | Whether or not this phase has started | [optional]
**_started_date** | **int** |  | [optional]
**configuration** | **object** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
