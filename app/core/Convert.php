<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 17/02/2015
 */

class Convert
{

    /**
     * Takes in the assessment array and converts the traffic lights into numeric values
     * @param array $assessmentArray
     * @param array $studentList
     * @return array
     */
    public function toNumericValue(Array $assessmentArray, Array $studentList)
    {
        // Remap the student array for easier access
        $studentArray = [];
        foreach ($studentList as $student) {
            $studentArray[] = $student['student_name'];
        }

        //echo '<pre>', print_r($assessmentArray), '</pre>';

        /*
         * The below code converts all student traffic lights into numeric values.
         */
        $count = 0;
        $tempArray = [];
        // Loop through each student
        foreach($studentArray as $student) {
            // Loops for each Identifier Selected
            foreach ($assessmentArray as $identifier) {
                // Loop through each detail in the identifier
                foreach ($identifier as $identifierDetails) {

                    if ($student == $identifierDetails['student_name']) {

                        switch ($identifierDetails['trafficlight']) {
                            case 'Red':
                                $tempArray[$student][$count] = 1;
                                break;
                            case 'Amber':
                                $tempArray[$student][$count] = 2;
                                break;
                            case 'Green':
                                $tempArray[$student][$count] = 3;
                                break;
                            default:
                                $tempArray[$student][$count] = 0;
                                break;

                        }

                        $count++;
                    }

                }
            }

            // Reset the counter each time the array enters a new student loop
            $count = 0;
        }

        // Transform the temporary array into a neater formatted scores array
        $count = 0;
        $scoresArray = [];
        foreach ($studentArray as $student) {
            $scoresArray[$count] = ['student_name' => $student, 'score' => array_sum($tempArray[$student])];
            $count++;
        }

        return $scoresArray;
    }

    // Return assessment group scores
    public function toAssessmentGroupScoresByStrand($assessmentDetails)
    {
        // Loop for each identifier
        // Check what Unit ID it is
        // If it is a unique Unit ID
        // Work out the Maximum score, and the score achieved
        // Work out the percentage.

        $scoresArray = [];
        $count = 0;

        // Loop for each identifier
        foreach($assessmentDetails as $identifier) {
            // Loop for each assessment within the identifier
            foreach($identifier as $content) {

                switch($content['trafficlight']) {
                    case 'Red':
                        if (empty($scoresArray[$content['identifier']][$count][$content['strand_id']])) {
                            $scoresArray[$content['identifier']][$count][$content['strand_id']] = 0;
                        }

                        $scoresArray[$content['identifier']][$count][$content['strand_id']] = ($scoresArray[$content['identifier']][$count][$content['strand_id']] + 1);
                        break;
                    case 'Amber':
                        if (empty($scoresArray[$content['identifier']][$count][$content['strand_id']])) {
                            $scoresArray[$content['identifier']][$count][$content['strand_id']] = 0;
                        }

                        $scoresArray[$content['identifier']][$count][$content['strand_id']] = ($scoresArray[$content['identifier']][$count][$content['strand_id']] + 2);
                        break;
                    case 'Green':
                        if (empty($scoresArray[$content['identifier']][$count][$content['strand_id']])) {
                            $scoresArray[$content['identifier']][$count][$content['strand_id']] = 0;
                        }
                        $scoresArray[$content['identifier']][$count][$content['strand_id']] = ($scoresArray[$content['identifier']][$count][$content['strand_id']] + 3);
                        break;
                    default:
                        break;

                    $count++;
                }

            }
        }

        return $scoresArray;

    }


    /**
     * Method to return the total score
     * @param $assessmentDetails
     * @return array
     */
    public function toAssessmentGroupScoresTotal($assessmentDetails)
    {

        $scoresArray = $this->toAssessmentGroupScoresByStrand($assessmentDetails);
        $count = 0;
        $arrayTemp = [];


        $arrayKeys = array_keys($scoresArray);


        $count = 0;
        foreach($scoresArray as $identifier) {

            foreach($identifier as $array) {

                $arrayTemp[$arrayKeys[$count]] = array_sum($array);

            }
            $count++;
        }

        // Return the scores array.
        return $arrayTemp;

    }


    /**
     * Method to return the maximum possible score from all strands
     * @param $assessmentDetails
     * @return array
     */
    public function getMaximumAssessmentGroupScores($assessmentDetails)
    {
        $maxScores = [];
        $score = 0;
        foreach($assessmentDetails as $identifier) {
            foreach($identifier as $content) {
                $score += 3;
                $maxScores[$content['identifier']] = $score;
            }
            $score = 0;
        }

        return $maxScores;
    }


    /**
     * Take in the distinct criteria in each unit and calculate the max possible score
     * @param $criteria
     * @return int
     */
    public function toMaximumScore($criteria)
    {
        $count = 0;

        // Loop for each identifier
        foreach($criteria as $identifier) {
            // Loop for each strand within an identifier
            foreach ($identifier as $strand) {
                // Count each loop
                $count++;
            }
        }

        // Maximum score for each criteria is Green which equates to 3.
        $maxScore = ($count * 3);

        return $maxScore;

    }

    public function scoresToPercentage($totalScore, $maxScore)
    {
        $keys = array_keys($totalScore);
        $newArray = [];

        $count = 0;
        foreach ($keys as $key) {
            $newArray[$count] = ['identifier' => $key, 'percentage' => round(($totalScore[$key] / $maxScore[$key]) * 100)];
            $count++;
        }

        // Return the percentage array.
        return $newArray;

    }

    /**
     * Method to return the strongest unit
     * @param $percentageArray
     * @return array
     */
    public function getStrongestUnit($percentageArray)
    {
        // Find the highest score in the array
        $maxScore = 0;
        foreach($percentageArray as $percentage) {
            if ($percentage['percentage'] >= $maxScore) {
                $maxScore = $percentage['percentage'];
                $array = ['identifier' => $percentage['identifier'], 'percentage' => $percentage['percentage']];
            }
        }

        // return the strongest unit(s)
        return $array;
    }

    public function getWeakestUnit($percentageArray)
    {
        // Find the weakest score in the array
        $minScore = 1000;
        foreach($percentageArray as $percentage) {
            if ($percentage['percentage'] <= $minScore) {
                $minScore = $percentage['percentage'];
                $array = ['identifier' => $percentage['identifier'], 'percentage' => $percentage['percentage']];
            }
        }

        // return the weakest unit(s)
        return $array;
    }



    /**
     * Method converts the numeric array scores to a percentage value of the maximum score
     * @param $numericArray
     * @param $maximumScore
     * @return array
     */
    public function numericToPercentage($numericArray, $maximumScore)
    {
        // Joe -> 14 -> 53%
        // Alice -> 23 -> 96%

        $percentageArray = [];
        $count = 0;
        foreach($numericArray as $detail) {
            $percentage = round(($detail['score'] / $maximumScore) * 100);
            $percentageArray[$count]['student_name'] = $detail['student_name'];
            $percentageArray[$count]['percentage'] = $percentage;
            $count++;
        }

        return $percentageArray;
    }


    /**
     * Method to convert Percentages into National Levels
     * @param array $percentageArray
     * @return mixed
     */
    public function toLevel(Array $percentageArray)
    {

        //print_r($percentageArray);
        // Loop through each percentage

        $count = 0;
        foreach($percentageArray as $detail) {

            switch($detail['percentage']) {
                // Level: A
                case $detail['percentage'] > 91:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '8', 'percentage' => $detail['percentage']];
                    break;
                // Level: B
                case $detail['percentage'] > 81:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '7a', 'percentage' => $detail['percentage']];
                    break;
                // Level: C
                case $detail['percentage'] > 75:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '7b', 'percentage' => $detail['percentage']];
                    break;
                // Level: D
                case $detail['percentage'] > 70:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '7c', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 65:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '6a', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 59:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '6b', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 54:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '6c', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 48:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '5a', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 43:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '5b', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 38:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '5c', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 32:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '4a', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 27:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '4b', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 22:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '4c', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 17:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '3a', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 11:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '3b', 'percentage' => $detail['percentage']];
                    break;
                case $detail['percentage'] > 5:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => '3c', 'percentage' => $detail['percentage']];
                    break;
                // Level: Fail
                default:
                    $levelArray[$count] = ['student_name' => $detail['student_name'],'level' => 'U', 'percentage' => $detail['percentage']];
                    break;
            }
            $count++;

        }

        return $levelArray;
    }

    /**
     * Method to return the strongest score within an array
     * @param array $scores
     * @return array
     */
    public function returnStrongest(Array $scores)
    {
        $maxValues = [];
        $tempMaxScore = 0;
        foreach($scores as $score) {
            if ($tempMaxScore <= $score['score']) {
                $tempMaxScore = $score['score'];
            }
        }

        $count = 0;
        foreach($scores as $score) {
            if ($score['score'] == $tempMaxScore) {
                $maxValues[$count] = $score;
                $count++;
            }
        }

        return $maxValues;

    }

    /**
     * Method to return the weakest score from the scores array
     * @param array $scores
     * @return array
     */
    public function returnWeakest(Array $scores)
    {
        $minValues = [];
        $tempMinScore = 999999999999999999999;
        foreach($scores as $score) {
            if ($tempMinScore >= $score['score']) {
                $tempMinScore = $score['score'];
            }
        }

        $count = 0;
        foreach($scores as $score) {
            if ($score['score'] == $tempMinScore) {
                $minValues[$count] = $score;
                $count++;
            }
        }

        return $minValues;

    }

    /**
     * Method to return post data as an array.
     * @param $postData
     * @return array
     */
    public function reportPostToArray($postData)
    {
        $tempArray = [];

        unset($postData['options']);
        foreach($postData as $data) {
            $tempArray[] = htmlentities($data);
        }

        return $tempArray;
    }
}