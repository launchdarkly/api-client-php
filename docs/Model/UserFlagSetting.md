# # UserFlagSetting

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources. |
**_value** | **mixed** | The value of the flag variation that the user receives. If there is no defined default rule, this is null. |
**setting** | **mixed** | Whether the user is explicitly targeted to receive a particular variation. The setting is false if you have turned off a feature flag for a user. It is null if you haven&#39;t assigned that user to a specific variation. |
**reason** | [**\LaunchDarklyApi\Model\EvaluationReason**](EvaluationReason.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
