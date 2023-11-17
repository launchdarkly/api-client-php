# # AuditLogEntryListingRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_id** | **string** | The ID of the audit log entry |
**_account_id** | **string** | The ID of the account to which this audit log entry belongs |
**date** | **int** |  |
**accesses** | [**\LaunchDarklyApi\Model\ResourceAccess[]**](ResourceAccess.md) | Details on the actions performed and resources acted on in this audit log entry |
**kind** | **string** |  |
**name** | **string** | The name of the resource this audit log entry refers to |
**description** | **string** | Description of the change recorded in the audit log entry |
**short_description** | **string** | Shorter version of the change recorded in the audit log entry |
**comment** | **string** | Optional comment for the audit log entry | [optional]
**subject** | [**\LaunchDarklyApi\Model\SubjectDataRep**](SubjectDataRep.md) |  | [optional]
**member** | [**\LaunchDarklyApi\Model\MemberDataRep**](MemberDataRep.md) |  | [optional]
**token** | [**\LaunchDarklyApi\Model\TokenSummary**](TokenSummary.md) |  | [optional]
**app** | [**\LaunchDarklyApi\Model\AuthorizedAppDataRep**](AuthorizedAppDataRep.md) |  | [optional]
**title_verb** | **string** | The action and resource recorded in this audit log entry | [optional]
**title** | **string** | A description of what occurred, in the format &lt;code&gt;member&lt;/code&gt; &lt;code&gt;titleVerb&lt;/code&gt; &lt;code&gt;target&lt;/code&gt; | [optional]
**target** | [**\LaunchDarklyApi\Model\TargetResourceRep**](TargetResourceRep.md) |  | [optional]
**parent** | [**\LaunchDarklyApi\Model\ParentResourceRep**](ParentResourceRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
