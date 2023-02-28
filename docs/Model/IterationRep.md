# # IterationRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The iteration ID | [optional]
**hypothesis** | **string** | The expected outcome of this experiment |
**status** | **string** | The status of the iteration: &lt;code&gt;not_started&lt;/code&gt;, &lt;code&gt;running&lt;/code&gt;, &lt;code&gt;stopped&lt;/code&gt; |
**created_at** | **int** |  |
**started_at** | **int** |  | [optional]
**ended_at** | **int** |  | [optional]
**winning_treatment_id** | **string** | The ID of the treatment chosen when the experiment stopped | [optional]
**winning_reason** | **string** | The reason you stopped the experiment | [optional]
**can_reshuffle_traffic** | **bool** | Whether the experiment may reassign traffic to different variations when the experiment audience changes (true) or must keep all traffic assigned to its initial variation (false). | [optional]
**flags** | [**array<string,\LaunchDarklyApi\Model\FlagRep>**](FlagRep.md) | Details on the flag used in this experiment | [optional]
**primary_metric** | [**\LaunchDarklyApi\Model\MetricV2Rep**](MetricV2Rep.md) |  | [optional]
**randomization_unit** | **string** | The unit of randomization for this iteration | [optional]
**treatments** | [**\LaunchDarklyApi\Model\TreatmentRep[]**](TreatmentRep.md) | Details on the variations you are testing in the experiment | [optional]
**secondary_metrics** | [**\LaunchDarklyApi\Model\MetricV2Rep[]**](MetricV2Rep.md) | Details on the secondary metrics for this experiment | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
