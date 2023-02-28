# # ContextInstanceRecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**last_seen** | **\DateTime** | Timestamp of the last time an evaluation occurred for this context instance | [optional]
**id** | **string** | The context instance ID |
**application_id** | **string** | An identifier representing the application where the LaunchDarkly SDK is running | [optional]
**anonymous_kinds** | **string[]** | A list of the context kinds this context was associated with that the SDK removed because they were marked as anonymous at flag evaluation | [optional]
**context** | **mixed** | The context, including its kind and attributes |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
