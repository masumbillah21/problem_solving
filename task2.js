function multiply(a, b) {

    if (a < b) {
        return recursionHelper(b, a);
    } else {
        return recursionHelper(a, b);
    }
}

function recursionHelper(a, b) {
    if (b === 0) {
        return 0;
    }
    return a + recursionHelper(a, b - 1);
}

console.log(multiply(4, 5)); // Output: 20
console.log(multiply(3, 3)); // Output: 9
console.log(multiply(0, 2)); // Output: 0

// Time Complexity: O(b)
// Space Complexity: O(b)