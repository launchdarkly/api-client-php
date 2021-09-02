# # PatchSegmentInstruction

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**kind** | **string** |  |
**user_key** | **string** | A unique key used to represent the user |
**target_type** | **string** | A segment&#39;s target type. Must be either &lt;code&gt;included&lt;/code&gt; or &lt;code&gt;excluded&lt;/code&gt; |
**value** | **int** | Schedule user target expiration on a segment by including a timestamp | [optional]
**version** | **int** | Required if &lt;code&gt;kind&lt;/code&gt; is &lt;code&gt;updateExpireUserTargetDate&lt;/code&gt; | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
