# # CreateFlagConfigApprovalRequestRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**comment** | **string** | Optional comment describing the approval request | [optional]
**description** | **string** | A brief description of the changes you&#39;re requesting |
**instructions** | **array[]** |  |
**notify_member_ids** | **string[]** | An array of member IDs. These members are notified to review the approval request. | [optional]
**notify_team_keys** | **string[]** | An array of team keys. The members of these teams are notified to review the approval request. | [optional]
**execution_date** | **int** |  | [optional]
**operating_on_id** | **string** | The ID of a scheduled change. Include this if your &lt;code&gt;instructions&lt;/code&gt; include editing or deleting a scheduled change. | [optional]
**integration_config** | **array<string,mixed>** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
