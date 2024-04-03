# # Project

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**array<string,\LaunchDarklyApi\Model\Link>**](Link.md) | The location and content type of related resources |
**_id** | **string** | The ID of this project |
**key** | **string** | The key of this project |
**include_in_snippet_by_default** | **bool** | Whether or not flags created in this project are made available to the client-side JavaScript SDK by default |
**default_client_side_availability** | [**\LaunchDarklyApi\Model\ClientSideAvailability**](ClientSideAvailability.md) |  | [optional]
**name** | **string** | A human-friendly name for the project |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]
**tags** | **string[]** | A list of tags for the project |
**default_release_pipeline_key** | **string** | The key of the default release pipeline for this project | [optional]
**environments** | [**\LaunchDarklyApi\Model\Environments**](Environments.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
