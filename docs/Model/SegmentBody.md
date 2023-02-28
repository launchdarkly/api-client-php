# # SegmentBody

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the segment |
**key** | **string** | A unique key used to reference the segment |
**description** | **string** | A description of the segment&#39;s purpose | [optional]
**tags** | **string[]** | Tags for the segment | [optional]
**unbounded** | **bool** | Whether to create a standard segment (false) or a Big Segment (true). Only use a Big Segment if you need to add more than 15,000 individual targets. | [optional]
**unbounded_context_kind** | **string** | If unbounded is true, you can use this field to set the Big Segment&#39;s context kind | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
