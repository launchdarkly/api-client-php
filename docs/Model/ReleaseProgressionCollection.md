# # ReleaseProgressionCollection

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**active_count** | **int** | The number of active releases |
**completed_count** | **int** | The number of completed releases |
**items** | [**\LaunchDarklyApi\Model\ReleaseProgression[]**](ReleaseProgression.md) | A list of details for each release, across all flags, for this release pipeline |
**phases** | [**\LaunchDarklyApi\Model\PhaseInfo[]**](PhaseInfo.md) | A list of details for each phase, across all releases, for this release pipeline |
**total_count** | **int** | The total number of releases for this release pipeline |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
