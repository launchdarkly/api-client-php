# # User

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | The user key. This is the only mandatory user attribute. | [optional]
**secondary** | **string** | If provided, used with the user key to generate a variation in percentage rollouts | [optional]
**ip** | **string** | The user&#39;s IP address | [optional]
**country** | **string** | The user&#39;s country | [optional]
**email** | **string** | The user&#39;s email | [optional]
**first_name** | **string** | The user&#39;s first name | [optional]
**last_name** | **string** | The user&#39;s last name | [optional]
**avatar** | **string** | An absolute URL to an avatar image. | [optional]
**name** | **string** | The user&#39;s full name | [optional]
**anonymous** | **bool** | Whether the user is anonymous. If true, this user does not appear on the Contexts list in the LaunchDarkly user interface. | [optional]
**custom** | **array<string,mixed>** | Any other custom attributes for this user. Custom attributes contain any other user data that you would like to use to conditionally target your users. | [optional]
**private_attrs** | **string[]** | A list of attribute names that are marked as private. You can use these attributes in targeting rules and segments. If you are using a server-side SDK, the SDK will not send the private attribute back to LaunchDarkly. If you are using a client-side SDK, the SDK will send the private attribute back to LaunchDarkly for evaluation. However, the SDK won&#39;t send the attribute to LaunchDarkly in events data, LaunchDarkly won&#39;t store the private attribute, and the private attribute will not appear on the Contexts list. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
