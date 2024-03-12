# # PullRequestRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The pull request internal ID |
**external_id** | **string** | The pull request number |
**title** | **string** | The pull request title |
**status** | **string** | The pull request status |
**author** | **string** | The pull request author |
**create_time** | **int** |  |
**merge_time** | **int** |  | [optional]
**merge_commit_key** | **string** | The pull request merge commit key | [optional]
**base_commit_key** | **string** | The pull request base commit key |
**head_commit_key** | **string** | The pull request head commit key |
**files_changed** | **int** | The number of files changed |
**lines_added** | **int** | The number of lines added |
**lines_deleted** | **int** | The number of lines deleted |
**url** | **string** | The pull request URL |
**deployments** | [**\LaunchDarklyApi\Model\DeploymentCollectionRep**](DeploymentCollectionRep.md) |  | [optional]
**flag_references** | [**\LaunchDarklyApi\Model\FlagReferenceCollectionRep**](FlagReferenceCollectionRep.md) |  | [optional]
**lead_time** | [**\LaunchDarklyApi\Model\PullRequestLeadTimeRep**](PullRequestLeadTimeRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
