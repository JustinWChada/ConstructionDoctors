//ORIGINAL OR FIRST CODE
// const textToCopyElement = document.getElementById("quoteEmail");
// const copyButton = document.getElementById("copyEmail");
const messageElement = document.getElementById("messageElement");

// copyButton.addEventListener("click", () => {
//     const textToCopy = textToCopyElement.textContent;

//     // Use the Clipboard API
//     navigator.clipboard
//       .writeText(textToCopy)
//       .then(() => {
//         messageElement.textContent = "Text copied to clipboard!";
//         messageElement.style.color = "green";
//       })
//       .catch((err) => {
//         messageElement.textContent = "Failed to copy text: " + err;
//         messageElement.style.color = "red";
//       });
//   });

//USING A FUNCTION INSTEAD: ITS SIMPLER AND UNCOMPLEX
function copyToClipboard(email) {
  // Use the Clipboard API
  navigator.clipboard
    .writeText(email)
    .then(() => {
      messageElement.textContent = "Text copied to clipboard!";
      messageElement.style.color = "green";
    })
    .catch((err) => {
      messageElement.textContent = "Failed to copy text: " + err;
      messageElement.style.color = "red";
    });
}
