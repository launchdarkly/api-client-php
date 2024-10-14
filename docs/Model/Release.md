# # Release

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**name** | **string** | The release pipeline name |
**release_pipeline_key** | **string** | The release pipeline key |
**release_pipeline_description** | **string** | The release pipeline description |
**phases** | [**\LaunchDarklyApi\Model\ReleasePhase[]**](ReleasePhase.md) | An ordered list of the release pipeline phases |
**_version** | **int** | The release version |
**_release_variation_id** | **string** | The chosen release variation ID to use across all phases of a release | [optional]
**_canceled_at** | **int** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
