# # ReleaseAudience

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The audience ID |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**environment** | [**\LaunchDarklyApi\Model\EnvironmentSummary**](EnvironmentSummary.md) |  | [optional]
**name** | **string** | The release phase name |
**configuration** | [**\LaunchDarklyApi\Model\AudienceConfiguration**](AudienceConfiguration.md) |  | [optional]
**segment_keys** | **string[]** | A list of segment keys | [optional]
**status** | **string** |  | [optional]
**_rule_ids** | **string[]** | The rules IDs added or updated by this audience | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
