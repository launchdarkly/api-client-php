# RelayProxyConfig

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | [**\LaunchDarklyApi\Model\Id**](Id.md) |  | 
**_creator** | [**\LaunchDarklyApi\Model\Member**](Member.md) |  | 
**name** | **string** | A human-friendly name for the relay proxy configuration | 
**policy** | [**\LaunchDarklyApi\Model\Policy[]**](Policy.md) |  | 
**full_key** | **string** | Full secret key. Only included if creating or resetting the relay proxy configuration | [optional] 
**display_key** | **string** | The last 4 digits of the unique secret key for this relay proxy configuration | 
**creation_date** | **int** | A unix epoch time in milliseconds specifying the creation time of this relay proxy configuration | 
**last_modified** | **int** | A unix epoch time in milliseconds specifying the last time this relay proxy configuration was modified | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


