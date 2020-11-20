# FeatureFlagChangeRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_id** | [**\LaunchDarklyApi\Model\Id**](Id.md) |  | [optional] 
**_version** | **int** |  | [optional] 
**creation_date** | **int** | A unix epoch time in milliseconds specifying the date the change request was requested | [optional] 
**requestor_id** | **string** | The id of the member that requested the change | [optional] 
**review_status** | [**\LaunchDarklyApi\Model\FeatureFlagChangeRequestReviewStatus**](FeatureFlagChangeRequestReviewStatus.md) |  | [optional] 
**status** | **string** | | Name     | Description | | --------:| ----------- | | pending  | the feature flag change request has not been applied yet | | completed| the feature flag change request has been applied successfully | | failed   | the feature flag change request has been applied but the changes were not applied successfully | | [optional] 
**applied_by_member_id** | **string** | The id of the member that applied the change request | [optional] 
**applied_date** | **int** | A unix epoch time in milliseconds specifying the date the change request was applied | [optional] 
**current_reviews_by_member_id** | [**\LaunchDarklyApi\Model\FeatureFlagChangeRequestReview**](FeatureFlagChangeRequestReview.md) |  | [optional] 
**all_reviews** | [**\LaunchDarklyApi\Model\FeatureFlagChangeRequestReview[]**](FeatureFlagChangeRequestReview.md) |  | [optional] 
**notify_member_ids** | **string[]** |  | [optional] 
**instructions** | [**\LaunchDarklyApi\Model\SemanticPatchInstruction**](SemanticPatchInstruction.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


