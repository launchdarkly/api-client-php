# # PutBranch

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The branch name |
**head** | **string** | An ID representing the branch HEAD. For example, a commit SHA. |
**update_sequence_id** | **int** | An optional ID used to prevent older data from overwriting newer data. If no sequence ID is included, the newly submitted data will always be saved. | [optional]
**sync_time** | **int** |  |
**references** | [**\LaunchDarklyApi\Model\ReferenceRep[]**](ReferenceRep.md) | An array of flag references found on the branch | [optional]
**commit_time** | **int** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
