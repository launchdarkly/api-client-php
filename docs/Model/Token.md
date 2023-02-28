# # Token

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** |  |
**owner_id** | **string** |  |
**member_id** | **string** |  |
**_member** | [**\LaunchDarklyApi\Model\MemberSummary**](MemberSummary.md) |  | [optional]
**name** | **string** | A human-friendly name for the access token | [optional]
**description** | **string** | A description for the access token | [optional]
**creation_date** | **int** |  |
**last_modified** | **int** |  |
**custom_role_ids** | **string[]** | A list of custom role IDs to use as access limits for the access token | [optional]
**inline_role** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) | An array of policy statements, with three attributes: effect, resources, actions. May be used in place of a built-in or custom role. | [optional]
**role** | **string** | Built-in role for the token | [optional]
**token** | **string** | The token value. When creating or resetting, contains the entire token value. Otherwise, contains the last four characters. | [optional]
**service_token** | **bool** | Whether this is a service token or a personal token | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**default_api_version** | **int** | The default API version for this token | [optional]
**last_used** | **int** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
