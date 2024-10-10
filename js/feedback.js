function valtozas() {
    const name = document.getElementById("name").value;
    const holhallott = document.getElementById("holhallott").value;
    const szakirany = document.getElementById("szakirany").value;
    const email = document.getElementById("email").value;
console.log("adsas");
    const gomb = document.getElementById("addfeedbackBtn");

    if (name != "" && holhallott != 0 && szakirany != 0 && email != 0 ) {
        gomb.disabled = false;
    }
    else {
        gomb.disabled = true;
    }
}