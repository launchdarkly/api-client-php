# # Statement

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**resources** | **string[]** | Resource specifier strings | [optional]
**not_resources** | **string[]** | Targeted resources are the resources NOT in this list. The &lt;code&gt;resources&lt;/code&gt; and &lt;code&gt;notActions&lt;/code&gt; fields must be empty to use this field. | [optional]
**actions** | **string[]** | Actions to perform on a resource | [optional]
**not_actions** | **string[]** | Targeted actions are the actions NOT in this list. The &lt;code&gt;actions&lt;/code&gt; and &lt;code&gt;notResources&lt;/code&gt; fields must be empty to use this field. | [optional]
**effect** | **string** | Whether this statement should allow or deny actions on the resources. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
