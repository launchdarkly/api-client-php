# # FlagConfigApprovalRequestResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The ID of this approval request |
**_version** | **int** | Version of the approval request |
**creation_date** | **int** |  |
**service_kind** | **string** |  |
**requestor_id** | **string** | The ID of the member who requested the approval | [optional]
**description** | **string** | A human-friendly name for the approval request | [optional]
**review_status** | **string** | Current status of the review of this approval request |
**all_reviews** | [**\LaunchDarklyApi\Model\ReviewResponse[]**](ReviewResponse.md) | An array of individual reviews of this approval request |
**notify_member_ids** | **string[]** | An array of member IDs. These members are notified to review the approval request. |
**applied_date** | **int** |  | [optional]
**applied_by_member_id** | **string** | The member ID of the member who applied the approval request | [optional]
**applied_by_service_token_id** | **string** | The service token ID of the service token which applied the approval request | [optional]
**status** | **string** | Current status of the approval request |
**instructions** | **array[]** |  |
**conflicts** | [**\LaunchDarklyApi\Model\Conflict[]**](Conflict.md) | Details on any conflicting approval requests |
**_links** | **array<string,mixed>** | The location and content type of related resources |
**execution_date** | **int** |  | [optional]
**operating_on_id** | **string** | ID of scheduled change to edit or delete | [optional]
**integration_metadata** | [**\LaunchDarklyApi\Model\IntegrationMetadata**](IntegrationMetadata.md) |  | [optional]
**source** | [**\LaunchDarklyApi\Model\CopiedFromEnv**](CopiedFromEnv.md) |  | [optional]
**custom_workflow_metadata** | [**\LaunchDarklyApi\Model\CustomWorkflowMeta**](CustomWorkflowMeta.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
