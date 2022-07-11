# # FlagCopyConfigPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**source** | [**\LaunchDarklyApi\Model\FlagCopyConfigEnvironment**](FlagCopyConfigEnvironment.md) |  |
**target** | [**\LaunchDarklyApi\Model\FlagCopyConfigEnvironment**](FlagCopyConfigEnvironment.md) |  |
**comment** | **string** | Optional comment | [optional]
**included_actions** | **string[]** | Optional list of the flag changes to copy from the source environment to the target environment. You may include either &lt;code&gt;includedActions&lt;/code&gt; or &lt;code&gt;excludedActions&lt;/code&gt;, but not both. If you include neither, then all flag changes will be copied. | [optional]
**excluded_actions** | **string[]** | Optional list of the flag changes NOT to copy from the source environment to the target environment. You may include either  &lt;code&gt;includedActions&lt;/code&gt; or &lt;code&gt;excludedActions&lt;/code&gt;, but not both. If you include neither, then all flag changes will be copied. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
