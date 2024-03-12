# # FlagEventRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The flag event ID |
**project_id** | **string** | The project ID |
**project_key** | **string** | The project key |
**environment_id** | **string** | The environment ID | [optional]
**environment_key** | **string** | The environment key | [optional]
**flag_key** | **string** | The flag key |
**event_type** | **string** |  |
**event_time** | **int** |  |
**description** | **string** | The event description |
**audit_log_entry_id** | **string** | The audit log entry ID | [optional]
**member** | [**\LaunchDarklyApi\Model\FlagEventMemberRep**](FlagEventMemberRep.md) |  | [optional]
**actions** | **string[]** | The resource actions | [optional]
**impact** | [**\LaunchDarklyApi\Model\FlagEventImpactRep**](FlagEventImpactRep.md) |  |
**experiments** | [**\LaunchDarklyApi\Model\FlagEventExperimentCollection**](FlagEventExperimentCollection.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
