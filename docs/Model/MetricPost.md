# # MetricPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | A unique key to reference the metric |
**name** | **string** | A human-friendly name for the metric | [optional]
**description** | **string** | Description of the metric | [optional]
**kind** | **string** | The kind of event your metric will track |
**selector** | **string** | One or more CSS selectors. Required for click metrics. | [optional]
**urls** | [**\LaunchDarklyApi\Model\UrlPost[]**](UrlPost.md) | One or more target URLs. Required for click and pageview metrics. | [optional]
**is_active** | **bool** | Whether the metric is active | [optional]
**is_numeric** | **bool** | Whether to track numeric changes in value against a baseline (&lt;code&gt;true&lt;/code&gt;) or to track a conversion when an end user takes an action (&lt;code&gt;false&lt;/code&gt;). Required for custom metrics. | [optional]
**unit** | **string** | The unit of measure. Only for numeric custom metrics. | [optional]
**event_key** | **string** | The event name to use in your code. Required for custom metrics. | [optional]
**success_criteria** | **string** | Success criteria. Required for numeric custom metrics. | [optional]
**tags** | **string[]** | Tags for the metric | [optional]
**randomization_units** | **string[]** | An array of randomization units allowed for this metric | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
