/**
 * Stores user details in Local Storage under a specific key.
 * @param {string} key - The key to store the data under (e.g., 'currentUser').
 * @param {Object} userDetails - An object containing the user's data.
 */
export function setLocalStorageUser(key, userDetails) {
    try {
        // Convert the JavaScript object into a JSON string
        const userJSON = JSON.stringify(userDetails);

        // Store the JSON string in Local Storage
        localStorage.setItem(key, userJSON);

        console.log(`User data successfully stored under key: ${key}`);
    } catch (error) {
        console.error("Error setting data to Local Storage:", error);
    }
}


/**
 * Retrieves user details from Local Storage and converts the JSON string back to an object.
 * @param {string} key - The key the data is stored under.
 * @returns {Object|null} The user details object, or null if not found or if parsing fails.
 */
export function getLocalStorageUser(key) {
    try {
        // Retrieve the JSON string from Local Storage
        const userJSON = localStorage.getItem(key);

        // If no data is found, return null
        if (userJSON === null) {
            console.log(`No user data found for key: ${key}`);
            return null;
        }

        // Convert the JSON string back into a JavaScript object
        const userDetails = JSON.parse(userJSON);

        console.log(`User data successfully retrieved for key: ${key}`);
        return userDetails;
    } catch (error) {
        console.error("Error retrieving or parsing data from Local Storage:", error);
        return null;
    }
}

export function clearLocalStorageUser(key) {
        localStorage.removeItem(key)
}
