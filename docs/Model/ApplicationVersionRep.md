# # ApplicationVersionRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**_version** | **int** | Version of the application version | [optional]
**auto_added** | **bool** | Whether the application version was automatically created, because it was included in a context when a LaunchDarkly SDK evaluated a feature flag, or if the application version was created through the LaunchDarkly UI or REST API. |
**creation_date** | **int** |  | [optional]
**key** | **string** | The unique identifier of this application version |
**name** | **string** | The name of this version |
**supported** | **bool** | Whether this version is supported. Only applicable if the application &lt;code&gt;kind&lt;/code&gt; is &lt;code&gt;mobile&lt;/code&gt;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
