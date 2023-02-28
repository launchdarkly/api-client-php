# # ExpandedFlagRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for the feature flag |
**kind** | **string** | Kind of feature flag |
**description** | **string** | Description of the feature flag | [optional]
**key** | **string** | A unique key used to reference the flag in your code |
**_version** | **int** | Version of the feature flag |
**creation_date** | **int** |  |
**include_in_snippet** | **bool** | Deprecated, use &lt;code&gt;clientSideAvailability&lt;/code&gt;. Whether this flag should be made available to the client-side JavaScript SDK | [optional]
**client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailability**](ClientSideAvailability.md) |  | [optional]
**variations** | [**\LaunchDarklyApi\Model\Variation[]**](Variation.md) | An array of possible variations for the flag |
**temporary** | **bool** | Whether the flag is a temporary flag |
**tags** | **string[]** | Tags for the feature flag |
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**maintainer_id** | **string** | The ID of the member who maintains the flag | [optional]
**_maintainer** | [**\LaunchDarklyApi\Model\MemberSummary**](MemberSummary.md) |  | [optional]
**custom_properties** | [**array<string,\LaunchDarklyApi\Model\CustomProperty>**](CustomProperty.md) |  |
**archived** | **bool** | Boolean indicating if the feature flag is archived |
**archived_date** | **int** |  | [optional]
**defaults** | [**\LaunchDarklyApi\Model\Defaults**](Defaults.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
