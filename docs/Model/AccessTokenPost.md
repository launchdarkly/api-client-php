# # AccessTokenPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the access token | [optional]
**description** | **string** | A description for the access token | [optional]
**role** | **string** | Built-in role for the token | [optional]
**custom_role_ids** | **string[]** | A list of custom role IDs to use as access limits for the access token | [optional]
**inline_role** | [**\LaunchDarklyApi\Model\StatementPost[]**](StatementPost.md) | A JSON array of statements represented as JSON objects with three attributes: effect, resources, actions. May be used in place of a built-in or custom role. | [optional]
**service_token** | **bool** | Whether the token is a service token | [optional]
**default_api_version** | **int** | The default API version for this token | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
