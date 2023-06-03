// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get the current date
    const currentDate = new Date();

    // Get the day, month, and year as strings
    const day = currentDate.getDate().toString();
    const month = (currentDate.getMonth() + 1).toString(); // add 1 because months start at 0
    const year = currentDate.getFullYear().toString();

    // Format the date as yyyy-mm-dd
    const formattedDate = year + '-' + month.padStart(2, '0') + '-' + day.padStart(2, '0');

    // Insert the formatted date into the span element
    const dateSpan = document.getElementById('date');
    if (dateSpan !== null) {
        dateSpan.textContent = formattedDate;
    } else {
        console.error("Unable to find element with ID 'date'");
    }
});
