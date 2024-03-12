# # DeploymentRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The deployment ID |
**application_key** | **string** | The application key |
**application_version** | **string** | The application version |
**started_at** | **int** |  |
**ended_at** | **int** |  | [optional]
**duration_ms** | **int** | The duration of the deployment in milliseconds | [optional]
**status** | **string** |  |
**kind** | **string** |  |
**active** | **bool** | Whether the deployment is active |
**metadata** | **array<string,mixed>** | The metadata associated with the deployment | [optional]
**archived** | **bool** | Whether the deployment is archived |
**environment_key** | **string** | The environment key |
**number_of_contributors** | **int** | The number of contributors |
**number_of_pull_requests** | **int** | The number of pull requests |
**lines_added** | **int** | The number of lines added |
**lines_deleted** | **int** | The number of lines deleted |
**lead_time** | **int** | The total lead time from first commit to deployment end in milliseconds |
**pull_requests** | [**\LaunchDarklyApi\Model\PullRequestCollectionRep**](PullRequestCollectionRep.md) |  | [optional]
**flag_references** | [**\LaunchDarklyApi\Model\FlagReferenceCollectionRep**](FlagReferenceCollectionRep.md) |  | [optional]
**lead_time_stages** | [**\LaunchDarklyApi\Model\LeadTimeStagesRep**](LeadTimeStagesRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
