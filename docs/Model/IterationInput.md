# # IterationInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**hypothesis** | **string** | The expected outcome of this experiment |
**can_reshuffle_traffic** | **bool** | Whether to allow the experiment to reassign traffic to different variations when you increase or decrease the traffic in your experiment audience (true) or keep all traffic assigned to its initial variation (false). Defaults to true. | [optional]
**metrics** | [**\LaunchDarklyApi\Model\MetricInput[]**](MetricInput.md) |  |
**primary_single_metric_key** | **string** | The key of the primary metric for this experiment. Either &lt;code&gt;primarySingleMetricKey&lt;/code&gt; or &lt;code&gt;primaryFunnelKey&lt;/code&gt; must be present. | [optional]
**primary_funnel_key** | **string** | The key of the primary funnel group for this experiment. Either &lt;code&gt;primarySingleMetricKey&lt;/code&gt; or &lt;code&gt;primaryFunnelKey&lt;/code&gt; must be present. | [optional]
**treatments** | [**\LaunchDarklyApi\Model\TreatmentInput[]**](TreatmentInput.md) |  |
**flags** | [**array<string,\LaunchDarklyApi\Model\FlagInput>**](FlagInput.md) |  |
**randomization_unit** | **string** | The unit of randomization for this iteration. Defaults to user. | [optional]
**attributes** | **string[]** | The attributes that this iteration&#39;s results can be sliced by | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
