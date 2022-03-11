# # RepositoryRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The repository name |
**source_link** | **string** | A URL to access the repository | [optional]
**commit_url_template** | **string** | A template for constructing a valid URL to view the commit | [optional]
**hunk_url_template** | **string** | A template for constructing a valid URL to view the hunk | [optional]
**type** | **string** | The type of repository |
**default_branch** | **string** | The repository&#39;s default branch |
**enabled** | **bool** | Whether or not a repository is enabled for code reference scanning |
**version** | **int** | The version of the repository&#39;s saved information |
**branches** | [**\LaunchDarklyApi\Model\BranchRep[]**](BranchRep.md) | An array of the repository&#39;s branches that have been scanned for code references | [optional]
**_links** | **array<string,mixed>** |  |
**_access** | [**\LaunchDarklyApi\Model\Access**](Access.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
