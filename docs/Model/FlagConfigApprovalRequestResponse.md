# # FlagConfigApprovalRequestResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** |  |
**_version** | **int** |  |
**creation_date** | **int** |  |
**service_kind** | **string** |  |
**requestor_id** | **string** |  | [optional]
**description** | **string** | A human-friendly name for the approval request | [optional]
**review_status** | **string** |  |
**all_reviews** | [**\LaunchDarklyApi\Model\ReviewResponse[]**](ReviewResponse.md) |  |
**notify_member_ids** | **string[]** | An array of member IDs. These members are notified to review the approval request. |
**applied_date** | **int** |  | [optional]
**applied_by_member_id** | **string** |  | [optional]
**status** | **string** |  |
**instructions** | **array[]** |  |
**conflicts** | [**\LaunchDarklyApi\Model\Conflict[]**](Conflict.md) |  |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) |  |
**execution_date** | **int** |  | [optional]
**operating_on_id** | **string** | ID of scheduled change to edit or delete | [optional]
**integration_metadata** | [**\LaunchDarklyApi\Model\IntegrationMetadata**](IntegrationMetadata.md) |  | [optional]
**source** | [**\LaunchDarklyApi\Model\CopiedFromEnv**](CopiedFromEnv.md) |  | [optional]
**custom_workflow_meta_data** | [**\LaunchDarklyApi\Model\CustomWorkflowMeta**](CustomWorkflowMeta.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
