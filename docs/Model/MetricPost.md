# # MetricPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** |  |
**name** | **string** |  | [optional]
**description** | **string** |  | [optional]
**kind** | **string** |  |
**selector** | **string** | Required for click metrics | [optional]
**urls** | [**\LaunchDarklyApi\Model\UrlPost[]**](UrlPost.md) | Required for click and pageview metrics | [optional]
**is_active** | **bool** |  | [optional]
**is_numeric** | **bool** |  | [optional]
**unit** | **string** |  | [optional]
**event_key** | **string** | Required for custom metrics | [optional]
**success_criteria** | **int** |  | [optional]
**tags** | **string[]** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
