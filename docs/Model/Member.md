# # Member

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) |  |
**_id** | **string** | The member&#39;s ID |
**first_name** | **string** | The member&#39;s first name | [optional]
**last_name** | **string** | The member&#39;s last name | [optional]
**role** | **string** | The member&#39;s built-in role. If the member has no custom roles, this role will be in effect. |
**email** | **string** | The member&#39;s email address |
**_pending_invite** | **bool** | Whether or not the member has a pending invitation |
**_verified** | **bool** | Whether or not the member&#39;s email address has been verified |
**_pending_email** | **string** |  | [optional]
**custom_roles** | **string[]** | The set of custom roles (as keys) assigned to the member |
**mfa** | **string** | Whether or not multi-factor authentication is enabled for this member |
**excluded_dashboards** | **string[]** | Default dashboards that the member has chosen to ignore |
**_last_seen** | **int** |  |
**_last_seen_metadata** | [**\LaunchDarklyApi\Model\LastSeenMetadata**](LastSeenMetadata.md) |  | [optional]
**_integration_metadata** | [**\LaunchDarklyApi\Model\IntegrationMetadata**](IntegrationMetadata.md) |  | [optional]
**teams** | [**\LaunchDarklyApi\Model\MemberTeamSummaryRep[]**](MemberTeamSummaryRep.md) |  | [optional]
**permission_grants** | [**\LaunchDarklyApi\Model\MemberPermissionGrantSummaryRep[]**](MemberPermissionGrantSummaryRep.md) |  | [optional]
**creation_date** | **int** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
