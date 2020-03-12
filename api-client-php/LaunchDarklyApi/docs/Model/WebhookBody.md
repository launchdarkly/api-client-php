# WebhookBody

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**url** | **string** | The URL of the remote webhook. | 
**secret** | **string** | If sign is true, and the secret attribute is omitted, LaunchDarkly will automatically generate a secret for you. | [optional] 
**sign** | **bool** | If sign is false, the webhook will not include a signature header, and the secret can be omitted. | 
**on** | **bool** | Whether this webhook is enabled or not. | 
**name** | **string** | The name of the webhook. | [optional] 
**statements** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) |  | [optional] 
**tags** | **string[]** | Tags for the webhook. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


