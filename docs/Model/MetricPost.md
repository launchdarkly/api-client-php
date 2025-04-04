# # MetricPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | A unique key to reference the metric |
**name** | **string** | A human-friendly name for the metric | [optional]
**description** | **string** | Description of the metric | [optional]
**kind** | **string** | The kind of event your metric will track |
**selector** | **string** | One or more CSS selectors. Required for click metrics only. | [optional]
**urls** | [**\LaunchDarklyApi\Model\UrlPost[]**](UrlPost.md) | One or more target URLs. Required for click and pageview metrics only. | [optional]
**is_numeric** | **bool** | Whether to track numeric changes in value against a baseline (&lt;code&gt;true&lt;/code&gt;) or to track a conversion when an end user takes an action (&lt;code&gt;false&lt;/code&gt;). Required for custom metrics only. | [optional]
**unit** | **string** | The unit of measure. Applicable for numeric custom metrics only. | [optional]
**event_key** | **string** | The event key to use in your code. Required for custom conversion/binary and custom numeric metrics only. | [optional]
**success_criteria** | **string** | Success criteria. Required for custom numeric metrics, optional for custom conversion metrics. | [optional]
**tags** | **string[]** | Tags for the metric | [optional]
**randomization_units** | **string[]** | An array of randomization units allowed for this metric | [optional]
**maintainer_id** | **string** | The ID of the member who maintains this metric | [optional]
**unit_aggregation_type** | **string** | The method by which multiple unit event values are aggregated | [optional]
**analysis_type** | **string** | The method for analyzing metric events | [optional]
**percentile_value** | **int** | The percentile for the analysis method. An integer denoting the target percentile between 0 and 100. Required when &lt;code&gt;analysisType&lt;/code&gt; is &lt;code&gt;percentile&lt;/code&gt;. | [optional]
**event_default** | [**\LaunchDarklyApi\Model\MetricEventDefaultRep**](MetricEventDefaultRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
