function shuffleString(s, indices) {
    let shuffled = new Array(s.length);

    for (let i = 0; i < s.length; i++) {
        shuffled[indices[i]] = s[i];
    }

    return shuffled.join('');
}


let s1 = "mamacode";
let indices1 = [4, 5, 6, 7, 0, 1, 2, 3];
console.log(shuffleString(s1, indices1)); 


let s2 = "dosta";
let indices2 = [4,0,1,2,3];
console.log(shuffleString(s2, indices2)); 

let s3 = "abc";
let indices3 = [1,0,2];
console.log(shuffleString(s3, indices3)); 

// Time Complexity: O(n) where n is the length of s
// Space Complexity: O(n) where n is the length of s
