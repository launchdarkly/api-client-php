# # Filter

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Filter type. One of [contextAttribute, eventProperty, group] |
**attribute** | **string** | If not a group node, the context attribute name or event property name to filter on | [optional]
**op** | **string** |  |
**values** | **mixed[]** | The context attribute / event property values or group member nodes |
**context_kind** | **string** | For context attribute filters, the context kind. | [optional]
**negate** | **bool** | If set, then take the inverse of the operator. &#39;in&#39; becomes &#39;not in&#39;. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
