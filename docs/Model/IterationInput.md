# # IterationInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**hypothesis** | **string** | The expected outcome of this experiment |
**can_reshuffle_traffic** | **bool** | Whether to allow the experiment to reassign users to different variations (true) or keep users assigned to their initial variation (false). Defaults to true. | [optional]
**metrics** | [**\LaunchDarklyApi\Model\MetricInput[]**](MetricInput.md) |  |
**treatments** | [**\LaunchDarklyApi\Model\TreatmentInput[]**](TreatmentInput.md) |  |
**flags** | [**array<string,\LaunchDarklyApi\Model\FlagInput>**](FlagInput.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
