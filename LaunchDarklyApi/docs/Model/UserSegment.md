# UserSegment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | Unique identifier for the user segment. | 
**name** | **string** | Name of the user segment. | 
**description** | **string** | Description of the user segment. | [optional] 
**tags** | **string[]** | An array of tags for this user segment. | [optional] 
**creation_date** | **int** | A unix epoch time in milliseconds specifying the creation time of this flag. | 
**included** | **string[]** | An array of user keys that are included in this segment. | [optional] 
**excluded** | **string[]** | An array of user keys that should not be included in this segment, unless they are also listed in \&quot;included\&quot;. | [optional] 
**rules** | [**\LaunchDarklyApi\Model\UserSegmentRule[]**](UserSegmentRule.md) | An array of rules that can cause a user to be included in this segment. | [optional] 
**unbounded** | **bool** | Controls whether this segment can support unlimited numbers of users. Requires the beta API and additional setup. Include/exclude lists in this payload are not used in unbounded segments. | [optional] 
**version** | **int** |  | [optional] 
**_links** | [**\LaunchDarklyApi\Model\Links**](Links.md) |  | [optional] 
**_flags** | [**\LaunchDarklyApi\Model\FlagListItem[]**](FlagListItem.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


