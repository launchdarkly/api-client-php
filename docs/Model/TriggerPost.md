# # TriggerPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**comment** | **string** | Optional comment describing the trigger | [optional]
**instructions** | **array[]** | The action to perform when triggering. This should be an array with a single object that looks like &lt;code&gt;{\&quot;kind\&quot;: \&quot;flag_action\&quot;}&lt;/code&gt;. Supported flag actions are &lt;code&gt;turnFlagOn&lt;/code&gt; and &lt;code&gt;turnFlagOff&lt;/code&gt;. | [optional]
**integration_key** | **string** | The unique identifier of the integration for your trigger. Use &lt;code&gt;generic-trigger&lt;/code&gt; for integrations not explicitly supported. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
