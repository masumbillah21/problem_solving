function strStr(haystack, needle) {
    let hLen = haystack.length;
    let nLen = needle.length;

    if (nLen > hLen) {
        return -1;
    }
    let haySubStr = haystack.substring(0, nLen);
    let hayHash = hash(haySubStr);
    let needleHash = hash(needle);

    if(dataMatching(hayHash, needleHash, haystack, needle, 0)){
        return 0;
    }


    for (let i = 0, j = nLen; i < hLen && j < hLen; i++, j++) {
        let newHash = rollingHash(hayHash, haystack[j], haystack[i]);

        if(dataMatching(newHash, needleHash, haystack, needle, i+1)){
            return i+1;
        }
    }

    return -1;
}


function dataMatching(hash1, hash2, haystack, needle, k){
    
    if(hash1 !== hash2){
        return false;
    }

    for(let i = k, j = 0; j < needle.length; i++, j++){
        if(haystack[i] !== needle[j]){
            console.log(haystack[i], needle[j]);
            return false;
        }
    }
    return true;
}

function hash(str) {
    let hash = 0;
    for (let i = 0; i < str.length; i++) {
        hash += str.charCodeAt(i);
    }
    return hash;
}

function rollingHash(oldHash, addCh, subCh) {
    return (oldHash - hash(subCh)) + hash(addCh);
}
    
let haystack1 = "sadbutsad";
let needle1 = "sad";
console.log(strStr(haystack1, needle1));


let haystack2 = "codemama";
let needle2 = "ostad";
console.log(strStr(haystack2, needle2));

// Time Complexity: O(n * m) where n is the length of haystack and m is the length of needle (Including hashing)
// Space Complexity: O(1)
