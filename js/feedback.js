function valtozas() {
    const name = document.getElementById("name").value;
    const holhallott = document.getElementById("holhallott").value;
    const szakirany = document.getElementById("szakirany").value;

    const gomb = document.getElementById("addfeedbackBtn");

    if (name != "" && holhallott != 0 && szakirany != 0) {
        gomb.disabled = false;
    }
    else {
        gomb.disabled = true;
    }
}