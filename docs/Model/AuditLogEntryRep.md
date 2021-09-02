# # AuditLogEntryRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) |  |
**_id** | **string** |  |
**_account_id** | **string** |  |
**date** | **int** |  |
**accesses** | [**\LaunchDarklyApi\Model\ResourceAccess[]**](ResourceAccess.md) |  |
**kind** | **string** |  |
**name** | **string** |  |
**description** | **string** |  |
**short_description** | **string** |  |
**comment** | **string** |  | [optional]
**subject** | [**\LaunchDarklyApi\Model\SubjectDataRep**](SubjectDataRep.md) |  | [optional]
**member** | [**\LaunchDarklyApi\Model\MemberDataRep**](MemberDataRep.md) |  | [optional]
**token** | [**\LaunchDarklyApi\Model\TokenDataRep**](TokenDataRep.md) |  | [optional]
**app** | [**\LaunchDarklyApi\Model\AuthorizedAppDataRep**](AuthorizedAppDataRep.md) |  | [optional]
**title_verb** | **string** |  | [optional]
**title** | **string** |  | [optional]
**target** | [**\LaunchDarklyApi\Model\TargetResourceRep**](TargetResourceRep.md) |  | [optional]
**parent** | [**\LaunchDarklyApi\Model\ParentResourceRep**](ParentResourceRep.md) |  | [optional]
**delta** | **mixed** |  | [optional]
**trigger_body** | **mixed** |  | [optional]
**merge** | **mixed** |  | [optional]
**previous_version** | **mixed** |  | [optional]
**current_version** | **mixed** |  | [optional]
**subentries** | [**\LaunchDarklyApi\Model\AuditLogEntryListingRep[]**](AuditLogEntryListingRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
