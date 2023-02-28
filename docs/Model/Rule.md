# # Rule

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The flag rule ID | [optional]
**variation** | **int** | The index of the variation, from the array of variations for this flag | [optional]
**rollout** | [**\LaunchDarklyApi\Model\Rollout**](Rollout.md) |  | [optional]
**clauses** | [**\LaunchDarklyApi\Model\Clause[]**](Clause.md) | An array of clauses used for individual targeting based on attributes |
**track_events** | **bool** | Whether LaunchDarkly tracks events for this rule |
**description** | **string** | The rule description | [optional]
**ref** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
