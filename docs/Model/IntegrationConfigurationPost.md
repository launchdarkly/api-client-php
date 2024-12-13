# # IntegrationConfigurationPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The name of the integration configuration |
**enabled** | **bool** | Whether the integration configuration is enabled. If omitted, defaults to true | [optional]
**tags** | **string[]** | Tags for the integration | [optional]
**config_values** | **array<string,mixed>** | The unique set of fields required to configure the integration. Refer to the &lt;code&gt;formVariables&lt;/code&gt; field in the corresponding &lt;code&gt;manifest.json&lt;/code&gt; at https://github.com/launchdarkly/integration-framework/tree/main/integrations for a full list of fields for the integration you wish to configure. |
**capability_config** | [**\LaunchDarklyApi\Model\CapabilityConfigPost**](CapabilityConfigPost.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
