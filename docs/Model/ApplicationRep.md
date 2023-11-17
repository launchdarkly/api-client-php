# # ApplicationRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**flags** | [**\LaunchDarklyApi\Model\ApplicationFlagCollectionRep**](ApplicationFlagCollectionRep.md) |  | [optional]
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources | [optional]
**_version** | **int** | Version of the application | [optional]
**auto_added** | **bool** | Whether the application was automatically created because it was included in a context when a LaunchDarkly SDK evaluated a feature flag, or was created through the LaunchDarkly UI or REST API. |
**creation_date** | **int** |  | [optional]
**description** | **string** | The application description | [optional]
**key** | **string** | The unique identifier of this application |
**kind** | **string** | To distinguish the kind of application |
**_maintainer** | [**\LaunchDarklyApi\Model\MaintainerRep**](MaintainerRep.md) |  | [optional]
**name** | **string** | The name of the application |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
