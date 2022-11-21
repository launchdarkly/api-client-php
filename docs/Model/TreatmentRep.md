# # TreatmentRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The treatment ID. This is the variation ID from the flag. | [optional]
**name** | **string** | The treatment name. This is the variation name from the flag. |
**allocation_percent** | **string** | The percentage of traffic allocated to this treatment during the iteration |
**baseline** | **bool** | Whether this treatment is the baseline to compare other treatments against | [optional]
**parameters** | [**\LaunchDarklyApi\Model\ParameterRep[]**](ParameterRep.md) | Details on the flag and variation used for this treatment | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
