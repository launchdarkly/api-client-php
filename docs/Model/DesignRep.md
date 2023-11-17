# # DesignRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**hypothesis** | **string** | The expected outcome of this experiment |
**can_reshuffle_traffic** | **bool** | Whether the experiment can reassign traffic to different variations when you increase or decrease the traffic in your experiment audience (true) or keep all traffic assigned to its initial variation (false). | [optional]
**flags** | [**array<string,\LaunchDarklyApi\Model\FlagRep>**](FlagRep.md) | Details on the flag used in this experiment | [optional]
**primary_metric** | [**\LaunchDarklyApi\Model\DependentMetricOrMetricGroupRep**](DependentMetricOrMetricGroupRep.md) |  | [optional]
**randomization_unit** | **string** | The unit of randomization for this iteration | [optional]
**treatments** | [**\LaunchDarklyApi\Model\TreatmentRep[]**](TreatmentRep.md) | Details on the variations you are testing in the experiment | [optional]
**secondary_metrics** | [**\LaunchDarklyApi\Model\MetricV2Rep[]**](MetricV2Rep.md) | Details on the secondary metrics for this experiment | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
