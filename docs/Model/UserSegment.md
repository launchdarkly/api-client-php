# # UserSegment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the segment |
**description** | **string** | A description of the segment&#39;s purpose | [optional]
**tags** | **string[]** | Tags for the segment |
**creation_date** | **int** |  |
**key** | **string** | A unique key used to reference the segment |
**included** | **string[]** | Included users are always segment members, regardless of segment rules. For Big Segments this array is either empty or omitted entirely. | [optional]
**excluded** | **string[]** | Segment rules bypass excluded users, so they will never be included based on rules. Excluded users may still be included explicitly. This value is omitted for Big Segments. | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) |  |
**rules** | [**\LaunchDarklyApi\Model\UserSegmentRule[]**](UserSegmentRule.md) |  |
**version** | **int** |  |
**deleted** | **bool** |  |
**_access** | [**\LaunchDarklyApi\Model\AccessRep**](AccessRep.md) |  | [optional]
**_flags** | [**\LaunchDarklyApi\Model\FlagListingRep[]**](FlagListingRep.md) |  | [optional]
**unbounded** | **bool** |  | [optional]
**generation** | **int** |  |
**_unbounded_metadata** | [**\LaunchDarklyApi\Model\SegmentMetadata**](SegmentMetadata.md) |  | [optional]
**_external** | **string** |  | [optional]
**_external_link** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
