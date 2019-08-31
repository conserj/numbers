<?php

/*
 * A non-empty array A consisting of N integers is given. The array contains an odd number of elements, and each element of the array can be paired with another element that has the same value, except for one element that is left unpaired.
 * For example, in array A such that:
 *
 * - A[0] = 9  A[1] = 3  A[2] = 9
 * - A[3] = 3  A[4] = 9  A[5] = 7
 * - A[6] = 9
 * the elements at indexes 0 and 2 have value 9,
 * the elements at indexes 1 and 3 have value 3,
 * the elements at indexes 4 and 6 have value 9,
 * the element at index 5 has value 7 and is unpaired.
 * Write a function:
 * function solution($A);
 * that, given an array A consisting of N integers fulfilling the above conditions, returns the value of the unpaired element.
 * For example, given array A such that:
 * - A[0] = 9  A[1] = 3  A[2] = 9
 * - A[3] = 3  A[4] = 9  A[5] = 7
 * - A[6] = 9
 * the function should return 7, as explained in the example above.
 * Write an efficient algorithm for the following assumptions:
 * N is an odd integer within the range [1..1,000,000];
 * each element of array A is an integer within the range [1..1,000,000,000];
 * all but one of the values in A occur an even number of times.
 */
function solution($A) {
    $sizeOf = count($A);
    if ($sizeOf < 1 || $sizeOf > 1000000) {
        throw new \Exception("invalid size of input parameter");
    }
    $min = min($A);
    $max = max($A);
    if ($min < 1 || $max > 1000000000) {
        throw new \Exception("input arg contains invalid elements");
    }
    $arrCopy = array_merge([], $A);
    sort($arrCopy);
    if ($sizeOf === 1) {
        return $arrCopy[0];
    }
    for ($i = 0; $i < count($arrCopy); $i+= 2) {
        if ($i + 1 === count($arrCopy) || ($arrCopy[$i] !== $arrCopy[$i + 1])) {
            return $arrCopy[$i];
        }
    }
    return 0;
}
