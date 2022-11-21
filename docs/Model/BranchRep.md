# # BranchRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The branch name |
**head** | **string** | An ID representing the branch HEAD. For example, a commit SHA. |
**update_sequence_id** | **int** | An optional ID used to prevent older data from overwriting newer data | [optional]
**sync_time** | **int** |  |
**references** | [**\LaunchDarklyApi\Model\ReferenceRep[]**](ReferenceRep.md) | An array of flag references found on the branch | [optional]
**_links** | **array<string,mixed>** | The location and content type of related resources |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
