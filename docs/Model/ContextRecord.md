# # ContextRecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**last_seen** | **\DateTime** | Timestamp of the last time an evaluation occurred for this context | [optional]
**application_id** | **string** | An identifier representing the application where the LaunchDarkly SDK is running | [optional]
**context** | **mixed** | The context, including its kind and attributes |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**associated_contexts** | **int** | The total number of associated contexts. Associated contexts are contexts that have appeared in the same context instance, that is, they were part of the same flag evaluation. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
