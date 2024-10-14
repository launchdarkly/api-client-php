# # MetricV2Rep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | The metric key |
**_version_id** | **string** | The version ID of the metric | [optional]
**name** | **string** | The metric name |
**kind** | **string** | The kind of event the metric tracks |
**is_numeric** | **bool** | For custom metrics, whether to track numeric changes in value against a baseline (&lt;code&gt;true&lt;/code&gt;) or to track a conversion when an end user takes an action (&lt;code&gt;false&lt;/code&gt;). | [optional]
**unit_aggregation_type** | **string** | The type of unit aggregation to use for the metric | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
