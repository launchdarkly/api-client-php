# # UserRecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**last_ping** | **\DateTime** | Timestamp of the last time this user was seen | [optional]
**environment_id** | **string** |  | [optional]
**owner_id** | **string** |  | [optional]
**user** | [**\LaunchDarklyApi\Model\User**](User.md) |  | [optional]
**sort_value** | **mixed** | If this record is returned as part of a list, the value used to sort the list. This is only included when the &lt;code&gt;sort&lt;/code&gt; query parameter is specified. It is a time, in Unix milliseconds, if the sort is by &lt;code&gt;lastSeen&lt;/code&gt;. It is a user key if the sort is by &lt;code&gt;userKey&lt;/code&gt;. | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
