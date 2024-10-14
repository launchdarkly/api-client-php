# # Experiment

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The experiment ID | [optional]
**key** | **string** | The experiment key |
**name** | **string** | The experiment name |
**description** | **string** | The experiment description | [optional]
**_maintainer_id** | **string** | The ID of the member who maintains this experiment. |
**_creation_date** | **int** |  |
**environment_key** | **string** |  |
**archived_date** | **int** |  | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**holdout_id** | **string** | The holdout ID | [optional]
**current_iteration** | [**\LaunchDarklyApi\Model\IterationRep**](IterationRep.md) |  | [optional]
**draft_iteration** | [**\LaunchDarklyApi\Model\IterationRep**](IterationRep.md) |  | [optional]
**previous_iterations** | [**\LaunchDarklyApi\Model\IterationRep[]**](IterationRep.md) | Details on the previous iterations for this experiment. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
