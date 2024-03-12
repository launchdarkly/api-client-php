# # UserSegment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the segment. |
**description** | **string** | A description of the segment&#39;s purpose. Defaults to &lt;code&gt;null&lt;/code&gt; and is omitted in the response if not provided. | [optional]
**tags** | **string[]** | Tags for the segment. Defaults to an empty array. |
**creation_date** | **int** |  |
**last_modified_date** | **int** |  |
**key** | **string** | A unique key used to reference the segment |
**included** | **string[]** | An array of keys for included targets. Included individual targets are always segment members, regardless of segment rules. For list-based segments over 15,000 entries, also called big segments, this array is either empty or omitted. | [optional]
**excluded** | **string[]** | An array of keys for excluded targets. Segment rules bypass individual excluded targets, so they will never be included based on rules. Excluded targets may still be included explicitly. This value is omitted for list-based segments over 15,000 entries, also called big segments. | [optional]
**included_contexts** | [**\LaunchDarklyApi\Model\SegmentTarget[]**](SegmentTarget.md) |  | [optional]
**excluded_contexts** | [**\LaunchDarklyApi\Model\SegmentTarget[]**](SegmentTarget.md) |  | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**rules** | [**\LaunchDarklyApi\Model\UserSegmentRule[]**](UserSegmentRule.md) | An array of the targeting rules for this segment. |
**version** | **int** | Version of the segment |
**deleted** | **bool** | Whether the segment has been deleted |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**_flags** | [**\LaunchDarklyApi\Model\FlagListingRep[]**](FlagListingRep.md) | A list of flags targeting this segment. Only included when getting a single segment, using the &lt;code&gt;getSegment&lt;/code&gt; endpoint. | [optional]
**unbounded** | **bool** | Whether this is a standard segment (&lt;code&gt;false&lt;/code&gt;) or a big segment (&lt;code&gt;true&lt;/code&gt;). Standard segments include rule-based segments and smaller list-based segments. Big segments include larger list-based segments and synced segments. If omitted, the segment is a standard segment. | [optional]
**unbounded_context_kind** | **string** | For big segments, the targeted context kind. | [optional]
**generation** | **int** | For big segments, how many times this segment has been created. |
**_unbounded_metadata** | [**\LaunchDarklyApi\Model\SegmentMetadata**](SegmentMetadata.md) |  | [optional]
**_external** | **string** | The external data store backing this segment. Only applies to synced segments. | [optional]
**_external_link** | **string** | The URL for the external data store backing this segment. Only applies to synced segments. | [optional]
**_import_in_progress** | **bool** | Whether an import is currently in progress for the specified segment. Only applies to big segments. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
