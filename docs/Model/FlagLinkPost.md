# # FlagLinkPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | The flag link key | [optional]
**integration_key** | **string** | The integration key for an integration whose &lt;code&gt;manifest.json&lt;/code&gt; includes the &lt;code&gt;flagLink&lt;/code&gt; capability, if this is a flag link for an existing integration. Do not include for URL flag links. | [optional]
**timestamp** | **int** |  | [optional]
**deep_link** | **string** | The URL for the external resource you are linking the flag to | [optional]
**title** | **string** | The title of the flag link | [optional]
**description** | **string** | The description of the flag link | [optional]
**metadata** | **array<string,string>** | The metadata required by this integration in order to create a flag link, if this is a flag link for an existing integration. Defined in the integration&#39;s &lt;code&gt;manifest.json&lt;/code&gt; file under &lt;code&gt;flagLink&lt;/code&gt;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
