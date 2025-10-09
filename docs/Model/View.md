# # View

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_access** | [**\LaunchDarklyApi\Model\ViewsAccessRep**](ViewsAccessRep.md) |  | [optional]
**_links** | [**\LaunchDarklyApi\Model\ParentAndSelfLinks**](ParentAndSelfLinks.md) |  | [optional]
**id** | **string** | Unique ID of this view |
**account_id** | **string** | ID of the account that owns this view |
**project_id** | **string** | ID of the project this view belongs to |
**project_key** | **string** | Key of the project this view belongs to |
**key** | **string** | Unique key for the view within the account/project |
**name** | **string** | Human-readable name for the view |
**description** | **string** | Optional detailed description of the view |
**generate_sdk_keys** | **bool** | Whether to generate SDK keys for this view. Defaults to false. |
**version** | **int** | Version number for tracking changes |
**tags** | **string[]** | Tags associated with this view |
**created_at** | **int** |  |
**updated_at** | **int** |  |
**archived** | **bool** | Whether this view is archived | [default to false]
**archived_at** | **int** |  | [optional]
**deleted_at** | **int** |  | [optional]
**deleted** | **bool** | Whether this view is deleted | [default to false]
**maintainer** | [**\LaunchDarklyApi\Model\Maintainer**](Maintainer.md) |  | [optional]
**flags_summary** | [**\LaunchDarklyApi\Model\FlagsSummary**](FlagsSummary.md) |  | [optional]
**segments_summary** | [**\LaunchDarklyApi\Model\SegmentsSummary**](SegmentsSummary.md) |  | [optional]
**metrics_summary** | [**\LaunchDarklyApi\Model\MetricsSummary**](MetricsSummary.md) |  | [optional]
**ai_configs_summary** | [**\LaunchDarklyApi\Model\AIConfigsSummary**](AIConfigsSummary.md) |  | [optional]
**resource_summary** | [**\LaunchDarklyApi\Model\ResourceSummary**](ResourceSummary.md) |  | [optional]
**flags_expanded** | [**\LaunchDarklyApi\Model\ExpandedLinkedFlags**](ExpandedLinkedFlags.md) |  | [optional]
**segments_expanded** | [**\LaunchDarklyApi\Model\ExpandedLinkedSegments**](ExpandedLinkedSegments.md) |  | [optional]
**metrics_expanded** | [**\LaunchDarklyApi\Model\ExpandedLinkedMetrics**](ExpandedLinkedMetrics.md) |  | [optional]
**ai_configs_expanded** | [**\LaunchDarklyApi\Model\ExpandedLinkedAIConfigs**](ExpandedLinkedAIConfigs.md) |  | [optional]
**resources_expanded** | [**\LaunchDarklyApi\Model\ExpandedLinkedResources**](ExpandedLinkedResources.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
