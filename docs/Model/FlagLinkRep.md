# # FlagLinkRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_key** | **string** | The flag link key | [optional]
**_integration_key** | **string** | The integration key for an integration whose &lt;code&gt;manifest.json&lt;/code&gt; includes the &lt;code&gt;flagLink&lt;/code&gt; capability, if this is a flag link for an existing integration | [optional]
**_id** | **string** | The ID of this flag link |
**_deep_link** | **string** | The URL for the external resource the flag is linked to |
**_timestamp** | [**\LaunchDarklyApi\Model\TimestampRep**](TimestampRep.md) |  |
**title** | **string** | The title of the flag link | [optional]
**description** | **string** | The description of the flag link | [optional]
**_metadata** | **array<string,string>** | The metadata required by this integration in order to create a flag link, if this is a flag link for an existing integration. Defined in the integration&#39;s &lt;code&gt;manifest.json&lt;/code&gt; file under &lt;code&gt;flagLink&lt;/code&gt;. | [optional]
**_created_at** | **int** |  |
**_member** | [**\LaunchDarklyApi\Model\FlagLinkMember**](FlagLinkMember.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
