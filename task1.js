function isPalindrome(s) {
    return recursionHelper(s, 0, s.length - 1);
}
function recursionHelper(s, start, end) {
       
    if (start >= end) {
        return true;
    }

    if (s[start] !== s[end]) {
        return false;
    }
    return recursionHelper(s, start + 1, end - 1);
}
// Example usage
console.log(isPalindrome("madam")); // Output: true
console.log(isPalindrome("adam"));  // Output: false
console.log(isPalindrome("tenet")); // Output: true

// Time Complexity: O(n) where n is the length of s
// Space Complexity: O(n) where n is the length of s
