# # ExpiringTarget

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The ID of this expiring target |
**_version** | **int** | The version of this expiring target |
**expiration_date** | **int** |  |
**context_kind** | **string** | The context kind of the context to be removed |
**context_key** | **string** | A unique key used to represent the context to be removed |
**target_type** | **string** | A segment&#39;s target type, &lt;code&gt;included&lt;/code&gt; or &lt;code&gt;excluded&lt;/code&gt;. Included when expiring targets are updated on a segment. | [optional]
**variation_id** | **string** | A unique ID used to represent the flag variation. Included when expiring targets are updated on a feature flag. | [optional]
**_resource_id** | [**\LaunchDarklyApi\Model\ResourceId**](ResourceId.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
