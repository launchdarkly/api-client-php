# # WebhookPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-readable name for your webhook | [optional]
**url** | **string** | The URL of the remote webhook |
**secret** | **string** | If sign is true, and the secret attribute is omitted, LaunchDarkly automatically generates a secret for you. | [optional]
**statements** | [**\LaunchDarklyApi\Model\StatementPost[]**](StatementPost.md) |  | [optional]
**sign** | **bool** | If sign is false, the webhook does not include a signature header, and the secret can be omitted. |
**on** | **bool** | Whether or not this webhook is enabled. |
**tags** | **string[]** | List of tags for this webhook | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
