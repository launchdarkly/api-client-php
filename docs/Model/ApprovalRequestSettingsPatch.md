# # ApprovalRequestSettingsPatch

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**auto_apply_approved_changes** | **bool** | Automatically apply changes that have been approved by all reviewers. This field is only applicable for approval services other than LaunchDarkly. | [optional]
**bypass_approvals_for_pending_changes** | **bool** | Whether to skip approvals for pending changes | [optional]
**can_apply_declined_changes** | **bool** | Allow applying the change as long as at least one person has approved | [optional]
**can_review_own_request** | **bool** | Allow someone who makes an approval request to apply their own change | [optional]
**environment_key** | **string** |  |
**min_num_approvals** | **int** | Sets the amount of approvals required before a member can apply a change. The minimum is one and the maximum is five. | [optional]
**required** | **bool** | If approvals are required for this environment | [optional]
**required_approval_tags** | **string[]** | Require approval only on flags with the provided tags. Otherwise all flags will require approval. | [optional]
**resource_kind** | **string** |  |
**service_config** | **array<string,mixed>** | Arbitrary service-specific configuration | [optional]
**service_kind** | **string** | Which service to use for managing approvals | [optional]
**service_kind_configuration_id** | **string** | Optional integration configuration ID of a custom approval integration. This is an Enterprise-only feature. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
