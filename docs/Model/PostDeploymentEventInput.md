# # PostDeploymentEventInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**project_key** | **string** | The project key |
**environment_key** | **string** | The environment key |
**application_key** | **string** | The application key. This defines the granularity at which you want to view your insights metrics. Typically it is the name of one of the GitHub repositories that you use in this project.&lt;br/&gt;&lt;br/&gt;LaunchDarkly automatically creates a new application each time you send a unique application key. |
**application_name** | **string** | The application name. This defines how the application is displayed | [optional]
**application_kind** | **string** | The kind of application. Default: &lt;code&gt;server&lt;/code&gt; | [optional]
**version** | **string** | The application version. You can set the application version to any string that includes only letters, numbers, periods (&lt;code&gt;.&lt;/code&gt;), hyphens (&lt;code&gt;-&lt;/code&gt;), or underscores (&lt;code&gt;_&lt;/code&gt;).&lt;br/&gt;&lt;br/&gt;We recommend setting the application version to at least the first seven characters of the SHA or to the tag of the GitHub commit for this deployment. |
**version_name** | **string** | The version name. This defines how the version is displayed | [optional]
**event_type** | **string** | The event type |
**event_time** | **int** |  | [optional]
**event_metadata** | **array<string,mixed>** | A JSON object containing metadata about the event | [optional]
**deployment_metadata** | **array<string,mixed>** | A JSON object containing metadata about the deployment | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
