# # MigrationSafetyIssueRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**causing_rule_id** | **string** | The ID of the rule which caused this issue | [optional]
**affected_rule_ids** | **string[]** | A list of the IDs of the rules which are affected by this issue. &lt;code&gt;fallthrough&lt;/code&gt; is a sentinel value for the default rule. | [optional]
**issue** | **string** | A description of the issue that &lt;code&gt;causingRuleId&lt;/code&gt; has caused for &lt;code&gt;affectedRuleIds&lt;/code&gt;. | [optional]
**old_system_affected** | **bool** | Whether the changes caused by &lt;code&gt;causingRuleId&lt;/code&gt; bring inconsistency to the old system | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
