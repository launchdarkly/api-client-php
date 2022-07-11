# # CreateCopyFlagConfigApprovalRequestRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**comment** | **string** | Optional comment describing the approval request | [optional]
**description** | **string** | A brief description of your changes |
**notify_member_ids** | **string[]** | An array of member IDs. These members are notified to review the approval request. | [optional]
**notify_team_keys** | **string[]** | An array of team keys. The members of these teams are notified to review the approval request. | [optional]
**source** | [**\LaunchDarklyApi\Model\SourceFlag**](SourceFlag.md) |  |
**included_actions** | **string[]** | Optional list of the flag changes to copy from the source environment to the target environment. You may include either &lt;code&gt;includedActions&lt;/code&gt; or &lt;code&gt;excludedActions&lt;/code&gt;, but not both. If neither are included, then all flag changes will be copied. | [optional]
**excluded_actions** | **string[]** | Optional list of the flag changes NOT to copy from the source environment to the target environment. You may include either &lt;code&gt;includedActions&lt;/code&gt; or &lt;code&gt;excludedActions&lt;/code&gt;, but not both. If neither are included, then all flag changes will be copied. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
