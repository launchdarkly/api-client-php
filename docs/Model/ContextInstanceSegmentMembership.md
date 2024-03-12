# # ContextInstanceSegmentMembership

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the segment |
**key** | **string** | A unique key used to reference the segment |
**description** | **string** | A description of the segment&#39;s purpose |
**unbounded** | **bool** | Whether this is an unbounded segment. Unbounded segments, also called big segments, may be list-based segments with more than 15,000 entries, or synced segments. |
**external** | **string** | If the segment is a synced segment, the name of the external source |
**is_member** | **bool** | Whether the context is a member of this segment, either by explicit inclusion or by rule matching |
**is_individually_targeted** | **bool** | Whether the context is explicitly included in this segment |
**is_rule_targeted** | **bool** | Whether the context is captured by this segment&#39;s rules. The value of this field is undefined if the context is also explicitly included (&lt;code&gt;isIndividuallyTargeted&lt;/code&gt; is &lt;code&gt;true&lt;/code&gt;). |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
