# # TreatmentResultRep

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**treatment_id** | **string** | The ID of the treatment | [optional]
**treatment_name** | **string** | The name of the treatment | [optional]
**mean** | **float** | The average value of the variation in this sample. It doesn’t capture the uncertainty in the measurement, so it should not be the only measurement you use to make decisions. | [optional]
**data_mean** | **float** | The mean of the data, with no priors effecting the result. | [optional]
**data_std_dev** | **float** | The standard deviation of the data, with no priors effecting the result. | [optional]
**credible_interval** | [**\LaunchDarklyApi\Model\CredibleIntervalRep**](CredibleIntervalRep.md) |  | [optional]
**p_best** | **float** | The likelihood that this variation has the biggest effect on the primary metric. The variation with the highest probability is likely the best of the variations you&#39;re testing | [optional]
**relative_differences** | [**\LaunchDarklyApi\Model\RelativeDifferenceRep[]**](RelativeDifferenceRep.md) | Estimates of the relative difference between this treatment&#39;s mean and the mean of each other treatment | [optional]
**units** | **int** | The number of units exposed to this treatment that have event values, including those that are configured to default to 0 | [optional]
**traffic** | **int** | The number of units exposed to this treatment. | [optional]
**event_values_sum** | **float** | The sum of the event values for the units exposed to this treatment. | [optional]
**distribution** | [**\LaunchDarklyApi\Model\Distribution**](Distribution.md) |  | [optional]
**correlation** | **float** | The outcome-covariate correlation | [optional]
**standard_deviation_ratio** | **float** | The ratio of the outcome SD to covariate SD | [optional]
**covariate_imbalance** | **float** | The imbalance between the covariate mean for the arm and the covariate mean for the experiment | [optional]
**variance_reduction** | **float** | The reduction in variance resulting from CUPED | [optional]
**model** | **string** | The model used to calculate the results. Parameters specific to this model will be defined under the field under the same name | [optional]
**bayesian_normal** | [**\LaunchDarklyApi\Model\BayesianNormalStatsRep**](BayesianNormalStatsRep.md) |  | [optional]
**bayesian_beta** | [**\LaunchDarklyApi\Model\BayesianBetaBinomialStatsRep**](BayesianBetaBinomialStatsRep.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
