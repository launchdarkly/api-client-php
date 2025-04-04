# # AnnouncementResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | **string** | The ID of the announcement |
**is_dismissible** | **bool** | true if the announcement is dismissible |
**title** | **string** | The title of the announcement |
**message** | **string** | The message of the announcement |
**start_time** | **int** | The start time of the announcement. This is a Unix timestamp in milliseconds. |
**end_time** | **int** | The end time of the announcement. This is a Unix timestamp in milliseconds. | [optional]
**severity** | **string** | The severity of the announcement |
**_status** | **string** | The status of the announcement |
**_access** | [**\LaunchDarklyApi\Model\AnnouncementAccessRep**](AnnouncementAccessRep.md) |  | [optional]
**_links** | [**\LaunchDarklyApi\Model\AnnouncementResponseLinks**](AnnouncementResponseLinks.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
