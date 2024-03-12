# # DependentMetricOrMetricGroupRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | A unique key to reference the metric or metric group |
**_version_id** | **string** | The version ID of the metric or metric group |
**name** | **string** | A human-friendly name for the metric or metric group |
**kind** | **string** | If this is a metric, then it represents the kind of event the metric tracks. If this is a metric group, then it represents the group type |
**is_numeric** | **bool** | For custom metrics, whether to track numeric changes in value against a baseline (&lt;code&gt;true&lt;/code&gt;) or to track a conversion when an end user takes an action (&lt;code&gt;false&lt;/code&gt;). | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**is_group** | **bool** | Whether this is a metric group or a metric |
**metrics** | [**\LaunchDarklyApi\Model\MetricInGroupRep[]**](MetricInGroupRep.md) | An ordered list of the metrics in this metric group | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
