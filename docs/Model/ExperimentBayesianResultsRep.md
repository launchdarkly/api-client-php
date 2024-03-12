# # ExperimentBayesianResultsRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**treatment_results** | [**\LaunchDarklyApi\Model\TreatmentResultRep[]**](TreatmentResultRep.md) | Deprecated, use &lt;code&gt;results&lt;/code&gt; instead. Only populated when response does not contain results sliced by multiple attributes. | [optional]
**metric_seen** | [**\LaunchDarklyApi\Model\MetricSeen**](MetricSeen.md) |  | [optional]
**probability_of_mismatch** | **float** | The probability of a Sample Ratio Mismatch | [optional]
**results** | [**\LaunchDarklyApi\Model\SlicedResultsRep[]**](SlicedResultsRep.md) | A list of attribute values and their corresponding treatment results | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
