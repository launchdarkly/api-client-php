# # HoldoutPostRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the holdout | [optional]
**key** | **string** | A key that identifies the holdout | [optional]
**description** | **string** | Description of the holdout | [optional]
**randomizationunit** | **string** | The chosen randomization unit for the holdout base experiment | [optional]
**attributes** | **string[]** | The attributes that the holdout iteration&#39;s results can be sliced by | [optional]
**holdoutamount** | **string** | Audience allocation for the holdout | [optional]
**primarymetrickey** | **string** | The key of the primary metric for this holdout | [optional]
**metrics** | [**\LaunchDarklyApi\Model\MetricInput[]**](MetricInput.md) | Details on the metrics for this experiment | [optional]
**prerequisiteflagkey** | **string** | The key of the flag that the holdout is dependent on | [optional]
**maintainer_id** | **string** | Maintainer id | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
