# # Team

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**description** | **string** | A description of the team | [optional]
**key** | **string** | The team key | [optional]
**name** | **string** | A human-friendly name for the team | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**_creation_date** | **int** |  | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**_last_modified** | **int** |  | [optional]
**_version** | **int** | The team version | [optional]
**_idp_synced** | **bool** | Whether the team has been synced with an external identity provider (IdP). Team sync is available to customers on an Enterprise plan. | [optional]
**role_attributes** | **array<string,array>** |  | [optional]
**roles** | [**\LaunchDarklyApi\Model\TeamCustomRoles**](TeamCustomRoles.md) |  | [optional]
**members** | [**\LaunchDarklyApi\Model\TeamMembers**](TeamMembers.md) |  | [optional]
**projects** | [**\LaunchDarklyApi\Model\TeamProjects**](TeamProjects.md) |  | [optional]
**maintainers** | [**\LaunchDarklyApi\Model\TeamMaintainers**](TeamMaintainers.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
