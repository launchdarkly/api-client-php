# Webhook

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**\LaunchDarklyApi\Model\Links**](Links.md) |  | [optional] 
**_id** | [**\LaunchDarklyApi\Model\Id**](Id.md) |  | [optional] 
**url** | **string** | The URL of the remote webhook. | [optional] 
**secret** | **string** | If defined, the webhooks post request will include a X-LD-Signature header whose value will contain an HMAC SHA256 hex digest of the webhook payload, using the secret as the key. | [optional] 
**on** | **bool** | Whether this webhook is enabled or not. | [optional] 
**name** | **string** | The name of the webhook. | [optional] 
**statements** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) |  | [optional] 
**tags** | **string[]** | Tags assigned to this webhook. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


