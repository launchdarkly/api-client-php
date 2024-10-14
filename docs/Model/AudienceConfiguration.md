# # AudienceConfiguration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**release_strategy** | **string** |  |
**require_approval** | **bool** | Whether or not the audience requires approval |
**notify_member_ids** | **string[]** | An array of member IDs. These members are notified to review the approval request. | [optional]
**notify_team_keys** | **string[]** | An array of team keys. The members of these teams are notified to review the approval request. | [optional]
**release_guardian_configuration** | [**\LaunchDarklyApi\Model\ReleaseGuardianConfiguration**](ReleaseGuardianConfiguration.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
