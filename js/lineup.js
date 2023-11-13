
$(document).ready(function() {
    $.ajax({
        method:"POST",
        url: "./admin/lineup.php",
        data: {
            'szin': szin
        },
        success: function(result) {
            var lineup = JSON.parse(result)

            setInterval(rajzol, 1000, lineup)
        },
        error: function(xhr, status, error) {
            console.log(error)
        }
    });
});

function rajzol(lineup) {
    // Write a badge with the selected color
    let badge = document.getElementById('valasztottKor')
    let txt = ""
    let cl = ""

    switch (szin) {
        case "piros":
            txt = "Piros jeggyel rendelkezel"
            cl += "bg-danger-subtle"
            break;
        case "zold":
            txt = "Zöld jeggyel rendelkezel"
            cl += "bg-success-subtle"
            break;
        case "kek":
            txt = "Kék jeggyel rendelkezel"
            cl += "bg-info-subtle"
            break;
        case "narancs":
            txt = "Narancssárga jeggyel rendelkezel"
            cl += "bg-warning"
            break;
        case "sarga":
            txt = "Sárga jeggyel rendelkezel"
            cl += "bg-warning-subtle"
            break;
        default:
            break;
    }

    badge.innerText = txt
    badge.classList.add(cl)


    // Get current time
    let currentTime = new Date()
    
    lineup.forEach(sor => {
        let oraKezdete = sor.kezdete.split(':')[0] + ':' + sor.kezdete.split(':')[1]
        let oraVege = sor.vege.split(':')[0] + ':' + sor.vege.split(':')[1]

        document.getElementById('ora-' + sor.ora).innerHTML = oraKezdete + " - " + oraVege + ": " + sor.tantargy

        lineup_begin = new Date()
        lineup_begin.setHours(sor.kezdete.split(':')[0])
        lineup_begin.setMinutes(sor.kezdete.split(':')[1])
        lineup_begin.setSeconds(0)

        lineup_end = new Date()
        lineup_end.setHours(sor.vege.split(':')[0])
        lineup_end.setMinutes(sor.vege.split(':')[1])
        lineup_end.setSeconds(0)

        // Check if the current time is in the lineup
        if (currentTime >= lineup_begin && currentTime <= lineup_end) {
            document.getElementById('ora-' + sor.ora).style.backgroundColor = "lightblue"
            document.getElementById('ora-' + sor.ora).style.borderRadius = "5px"
            document.getElementById('ora-' + sor.ora).style.color = "black"
            document.getElementById('ora-' + sor.ora).style.paddingLeft = "5px"
            document.getElementById('ora-' + sor.ora).style.paddingRight = "5px"
        }
        else {
            document.getElementById('ora-' + sor.ora).style.removeProperty('background-color')
            document.getElementById('ora-' + sor.ora).style.removeProperty('border-radius')
            document.getElementById('ora-' + sor.ora).style.removeProperty('color')
            document.getElementById('ora-' + sor.ora).style.removeProperty('padding-left')
            document.getElementById('ora-' + sor.ora).style.removeProperty('padding-right')
        }
    });

    // What is the next program?
    let utolsoOra = true;

    for (let i = 0; i < lineup.length; i++) {
        let next = lineup[i]

        oraKezdete = new Date()
        oraKezdete.setHours(next.kezdete.split(':')[0])
        oraKezdete.setMinutes(next.kezdete.split(':')[1])
        oraKezdete.setSeconds(0)

        if (currentTime < oraKezdete) {
            document.getElementById('ora-kovetkezo-kezdete').innerHTML = next.kezdete

            if (next.nev == "-") {
                document.getElementById('ora-kovetkezo-neve').innerHTML = next.tantargy    
            }
            else {
                document.getElementById('ora-kovetkezo-neve').innerHTML = next.tantargy + "<br>(oktató: " + next.nev + ")"
            }
            document.getElementById('ora-kovetkezo-terem').innerHTML = next.tanterem
            document.getElementById('ora-kovetkezo-holvan').innerHTML = next.holvan
    
            utolsoOra = false
            break
        }
    }    

    if (utolsoOra) {
        document.getElementById('ora-kovetkezo').innerHTML = ""
        document.getElementById('regisztracio').innerHTML = ""
    }

    // check if current time is after the last program
    let utolsoEsemeny = lineup[lineup.length - 1]
    let utolsoEsemenyVege = new Date()
    utolsoEsemenyVege.setHours(utolsoEsemeny.vege.split(':')[0])
    utolsoEsemenyVege.setMinutes(utolsoEsemeny.vege.split(':')[1])
    utolsoEsemenyVege.setSeconds(0)

    if (currentTime > utolsoEsemenyVege) {
        let byebye = document.createElement('h2')
        byebye.id = "h2-kovetkezo"
        byebye.innerHTML = "A program véget ért! Köszönjük, hogy velünk voltál!"

        document.getElementById('ora-kovetkezo').appendChild(byebye)
    }
}