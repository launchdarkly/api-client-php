# # SegmentBody

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the segment |
**key** | **string** | A unique key used to reference the segment |
**description** | **string** | A description of the segment&#39;s purpose | [optional]
**tags** | **string[]** | Tags for the segment | [optional]
**unbounded** | **bool** | Whether to create a standard segment (&lt;code&gt;false&lt;/code&gt;) or a big segment (&lt;code&gt;true&lt;/code&gt;). Standard segments include rule-based and smaller list-based segments. Big segments include larger list-based segments and synced segments. Only use a big segment if you need to add more than 15,000 individual targets. | [optional]
**unbounded_context_kind** | **string** | For big segments, the targeted context kind. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
