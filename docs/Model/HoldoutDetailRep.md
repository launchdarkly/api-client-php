# # HoldoutDetailRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** |  |
**status** | **string** |  |
**description** | **string** |  | [optional]
**holdout_amount** | **string** | The percentage of traffic allocated to this holdout. |
**is_dirty** | **bool** | Indicates if the holdout experiment is running and if any related experiments are running. | [optional]
**created_at** | **int** |  |
**updated_at** | **int** |  |
**base_experiment** | [**\LaunchDarklyApi\Model\Experiment**](Experiment.md) |  |
**related_experiments** | [**\LaunchDarklyApi\Model\Experiment[]**](Experiment.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
