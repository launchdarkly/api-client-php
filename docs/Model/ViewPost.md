# # ViewPost

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**key** | **string** | Unique key for the view within the account/project |
**name** | **string** | Human-readable name for the view |
**description** | **string** | Optional detailed description of the view | [optional] [default to '']
**generate_sdk_keys** | **bool** | Whether to generate SDK keys for this view | [optional] [default to false]
**maintainer_id** | **string** | Member ID of the maintainer for this view. Only one of &#x60;maintainerId&#x60; or &#x60;maintainerTeamKey&#x60; can be specified. | [optional]
**maintainer_team_key** | **string** | Key of the maintainer team for this view. Only one of &#x60;maintainerId&#x60; or &#x60;maintainerTeamKey&#x60; can be specified. | [optional]
**tags** | **string[]** | Tags associated with this view | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
