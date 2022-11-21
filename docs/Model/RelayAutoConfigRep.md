# # RelayAutoConfigRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** |  |
**_creator** | [**\LaunchDarklyApi\Model\MemberSummary**](MemberSummary.md) |  | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**name** | **string** | A human-friendly name for the Relay Proxy configuration |
**policy** | [**\LaunchDarklyApi\Model\Statement[]**](Statement.md) | A description of what environments and projects the Relay Proxy should include or exclude |
**full_key** | **string** | The Relay Proxy configuration key |
**display_key** | **string** | The last few characters of the Relay Proxy configuration key, displayed in the LaunchDarkly UI |
**creation_date** | **int** |  |
**last_modified** | **int** |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
