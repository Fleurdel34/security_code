
function displayText(){
        const text = document.getElementById("userText").value;
        const sanitizedText= DOMPurify.sanitize(text);
        document.getElementById("outpout").innerHTML= sanitizedText;
}