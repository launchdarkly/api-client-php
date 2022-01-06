# # SubscriptionPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | A human-friendly name for your audit log subscription. |
**statements** | [**\LaunchDarklyApi\Model\StatementPost[]**](StatementPost.md) |  | [optional]
**on** | **bool** | Whether or not you want your subscription to actively send events. | [optional]
**tags** | **string[]** |  | [optional]
**config** | **array<string,mixed>** | The unique set of fields required to configure an audit log subscription integration of this type. Refer to the \&quot;formVariables\&quot; field in the corresponding manifest.json  at https://github.com/launchdarkly/integration-framework/tree/master/integrations for a full list of fields for the integration you wish to configure. |
**url** | **string** | Slack webhook receiver URL. Only necessary for legacy Slack webhook integrations. | [optional]
**api_key** | **string** | Datadog API key. Only necessary for legacy Datadog webhook subscriptions. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
