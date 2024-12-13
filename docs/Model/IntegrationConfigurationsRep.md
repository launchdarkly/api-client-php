# # IntegrationConfigurationsRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_id** | **string** | The unique identifier for this integration configuration |
**name** | **string** | A human-friendly name for the integration |
**_created_at** | **int** |  | [optional]
**_integration_key** | **string** | The type of integration | [optional]
**tags** | **string[]** | An array of tags for this integration | [optional]
**enabled** | **bool** | Whether the integration is currently active | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**config_values** | **array<string,mixed>** | Details on configuration for an integration of this type. Refer to the &lt;code&gt;formVariables&lt;/code&gt; field in the corresponding &lt;code&gt;manifest.json&lt;/code&gt; for a full list of fields for each integration. | [optional]
**capability_config** | [**\LaunchDarklyApi\Model\CapabilityConfigRep**](CapabilityConfigRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
