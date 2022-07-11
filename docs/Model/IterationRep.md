# # IterationRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** |  | [optional]
**hypothesis** | **string** |  |
**status** | **string** |  |
**created_at** | **int** |  |
**started_at** | **int** |  | [optional]
**ended_at** | **int** |  | [optional]
**winning_treatment_id** | **string** |  | [optional]
**winning_reason** | **string** |  | [optional]
**can_reshuffle_traffic** | **bool** |  | [optional]
**flags** | [**array<string,\LaunchDarklyApi\Model\FlagRep>**](FlagRep.md) |  | [optional]
**primary_metric** | [**\LaunchDarklyApi\Model\MetricV2Rep**](MetricV2Rep.md) |  | [optional]
**treatments** | [**\LaunchDarklyApi\Model\TreatmentRep[]**](TreatmentRep.md) |  | [optional]
**secondary_metrics** | [**\LaunchDarklyApi\Model\MetricV2Rep[]**](MetricV2Rep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
