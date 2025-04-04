# # ApprovalSettings

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**required** | **bool** | If approvals are required for this environment |
**bypass_approvals_for_pending_changes** | **bool** | Whether to skip approvals for pending changes |
**min_num_approvals** | **int** | Sets the amount of approvals required before a member can apply a change. The minimum is one and the maximum is five. |
**can_review_own_request** | **bool** | Allow someone who makes an approval request to apply their own change |
**can_apply_declined_changes** | **bool** | Allow applying the change as long as at least one person has approved |
**auto_apply_approved_changes** | **bool** | Automatically apply changes that have been approved by all reviewers. This field is only applicable for approval services other than LaunchDarkly. | [optional]
**service_kind** | **string** | Which service to use for managing approvals |
**service_config** | **array<string,mixed>** |  |
**required_approval_tags** | **string[]** | Require approval only on flags with the provided tags. Otherwise all flags will require approval. |
**service_kind_configuration_id** | **string** | Optional field for integration configuration ID of a custom approval integration. This is an Enterprise-only feature. | [optional]
**resource_kind** | **string** | The kind of resource for which the approval settings apply, for example, flag or segment | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
