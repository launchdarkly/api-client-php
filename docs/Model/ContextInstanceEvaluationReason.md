# # ContextInstanceEvaluationReason

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**kind** | **string** | Describes the general reason that LaunchDarkly selected this variation. |
**rule_index** | **int** | The positional index of the matching rule if the kind is &#39;RULE_MATCH&#39;. The index is 0-based. | [optional]
**rule_id** | **string** | The unique identifier of the matching rule if the kind is &#39;RULE_MATCH&#39;. | [optional]
**prerequisite_key** | **string** | The key of the flag that failed if the kind is &#39;PREREQUISITE_FAILED&#39;. | [optional]
**in_experiment** | **bool** | Indicates whether the context was evaluated as part of an experiment. | [optional]
**error_kind** | **string** | The specific error type if the kind is &#39;ERROR&#39;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
