# # MetricRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**experiment_count** | **int** | The number of experiments using this metric | [optional]
**_id** | **string** | The ID of this metric |
**key** | **string** | A unique key to reference the metric |
**name** | **string** | A human-friendly name for the metric |
**kind** | **string** | The kind of event the metric tracks |
**_attached_flag_count** | **int** | The number of feature flags currently attached to this metric | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_site** | [**\LaunchDarklyApi\Model\Link**](Link.md) |  | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**tags** | **string[]** | Tags for the metric |
**_creation_date** | **int** |  |
**last_modified** | [**\LaunchDarklyApi\Model\Modification**](Modification.md) |  | [optional]
**maintainer_id** | **string** | The ID of the member who maintains this metric | [optional]
**_maintainer** | [**\LaunchDarklyApi\Model\MemberSummary**](MemberSummary.md) |  | [optional]
**description** | **string** | Description of the metric | [optional]
**is_numeric** | **bool** | For custom metrics, whether to track numeric changes in value against a baseline (&lt;code&gt;true&lt;/code&gt;) or to track a conversion when an end user takes an action (&lt;code&gt;false&lt;/code&gt;). | [optional]
**success_criteria** | **string** | For numeric custom metrics, the success criteria | [optional]
**unit** | **string** | For numeric custom metrics, the unit of measure | [optional]
**event_key** | **string** | For custom metrics, the event name to use in your code | [optional]
**randomization_units** | **string[]** | An array of randomization units allowed for this metric | [optional]
**experiments** | [**\LaunchDarklyApi\Model\DependentExperimentRep[]**](DependentExperimentRep.md) |  | [optional]
**is_active** | **bool** | Whether the metric is active | [optional]
**_attached_features** | [**\LaunchDarklyApi\Model\FlagListingRep[]**](FlagListingRep.md) | Details on the flags attached to this metric | [optional]
**_version** | **int** | Version of the metric | [optional]
**selector** | **string** | For click metrics, the CSS selectors | [optional]
**urls** | **array[]** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
