# # BigSegmentStoreStatus

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**available** | **bool** | Whether the persistent store integration is fully synchronized with the LaunchDarkly environment, and the &lt;code&gt;lastSync&lt;/code&gt; occurred within a few minutes | [optional]
**potentially_stale** | **bool** | Whether the persistent store integration may not be fully synchronized with the LaunchDarkly environment. &lt;code&gt;true&lt;/code&gt; if the integration could be stale. | [optional]
**last_sync** | **int** |  | [optional]
**last_error** | **int** |  | [optional]
**errors** | [**\LaunchDarklyApi\Model\StoreIntegrationError[]**](StoreIntegrationError.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
