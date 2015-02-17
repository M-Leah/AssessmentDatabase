<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 17/02/2015
 */

class Convert
{

    /**
     * Method which takes in assessment details and converts the traffic lights to a numeric value
     * @param array $assessmentArray
     * @param array $studentList
     * @return array
     */
    public function toNumericValue(Array $assessmentArray, Array $studentList)
    {
        // Loop through the Array.
        // For each student, add their traffic light to them.

        // Student List.
        // Create a new array, where the student has all occurences of their traffic lights.

        // Loop through AssessmentArray
        // Everytime a student name occurs, I add that onto a new array

        $studentArray = [];
        foreach ($studentList as $student) {
            $studentArray[] = $student['student_name'];
        }

        $tempArray = [];

        // Array of Student Names
        // Loop through the names
        // -- On each name hit, loop through assessmentNames
        // ---- On each match, add assessment details to the studentName array / create new array

        $count = 0;
        foreach($studentArray as $student) {
            foreach ($assessmentArray as $assessment) {
                if ($student == $assessment['student_name']) {
                    switch ($assessment['trafficlight']) {
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
            // Reset the counter when names stop matching
            $count = 0;
        }

        // Transform the temporary array into a neater formatted scores array
        $count = 0;
        $scoresArray = [];
        foreach ($studentArray as $student) {
            $scoresArray[$count] = ['student_name' => $student, 'score' => array_sum($tempArray[$student])];
            $count++;
        }

        // Return the scores array
        return $scoresArray;
    }

    /**
     * Method which converts a scores array into their associated levels
     * @param array $scoresArray
     * @return array
     */
    public function toLevel(Array $scoresArray)
    {
        /*
         * Score to Level Reference
         * 40-50 = A
         * 30-39 = B
         * 20-29 = C
         * 10-19 = D
         * 0 - 9 = F
         */

        $count = 0;
        $levelArray = [];
        foreach($scoresArray as $score) {
            switch($score['score']) {
                // Level: A
                case $score['score'] > 40:
                    $levelArray[$count] = ['student_name' => $score['student_name'],'level' => 'A'];
                    break;
                // Level: B
                case $score['score'] > 30:
                    $levelArray[$count] = ['student_name' => $score['student_name'],'level' => 'B'];
                    break;
                // Level: C
                case $score['score'] > 20:
                    $levelArray[$count] = ['student_name' => $score['student_name'],'level' => 'C'];
                    break;
                // Level: D
                case $score['score'] > 10:
                    $levelArray[$count] = ['student_name' => $score['student_name'],'level' => 'D'];
                    break;
                // Level: Fail
                default:
                    $levelArray[$count] = ['student_name' => $score['student_name'],'level' => 'F'];
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
}