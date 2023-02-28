# # ConditionInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**schedule_kind** | **string** |  | [optional]
**execution_date** | **int** |  | [optional]
**wait_duration** | **int** | For workflow stages whose scheduled execution is relative, how far in the future the stage should start. | [optional]
**wait_duration_unit** | **string** |  | [optional]
**execute_now** | **bool** | Whether the workflow stage should be executed immediately | [optional]
**description** | **string** | A description of the approval required for this stage | [optional]
**notify_member_ids** | **string[]** | A list of member IDs for the members to request approval from for this stage | [optional]
**notify_team_keys** | **string[]** | A list of team keys for the teams to request approval from for this stage | [optional]
**kind** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
