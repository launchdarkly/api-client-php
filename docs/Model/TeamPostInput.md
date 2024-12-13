# # TeamPostInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**custom_role_keys** | **string[]** | List of custom role keys the team will access | [optional]
**description** | **string** | A description of the team | [optional]
**key** | **string** | The team key |
**member_ids** | **string[]** | A list of member IDs who belong to the team | [optional]
**name** | **string** | A human-friendly name for the team |
**permission_grants** | [**\LaunchDarklyApi\Model\PermissionGrantInput[]**](PermissionGrantInput.md) | A list of permission grants. Permission grants allow access to a specific action, without having to create or update a custom role. | [optional]
**role_attributes** | **array<string,array>** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
