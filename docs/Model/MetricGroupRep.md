# # MetricGroupRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The ID of this metric group |
**key** | **string** | A unique key to reference the metric group |
**name** | **string** | A human-friendly name for the metric group |
**kind** | **string** | The type of the metric group |
**description** | **string** | Description of the metric group | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**tags** | **string[]** | Tags for the metric group |
**_creation_date** | **int** |  |
**_last_modified** | **int** |  |
**maintainer** | [**\LaunchDarklyApi\Model\MaintainerRep**](MaintainerRep.md) |  |
**metrics** | [**\LaunchDarklyApi\Model\MetricInGroupRep[]**](MetricInGroupRep.md) | An ordered list of the metrics in this metric group |
**_version** | **int** | The version of this metric group |
**experiments** | [**\LaunchDarklyApi\Model\DependentExperimentRep[]**](DependentExperimentRep.md) |  | [optional]
**experiment_count** | **int** | The number of experiments using this metric group | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
