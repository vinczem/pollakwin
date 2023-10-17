document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Add a click event on each of them
    $navbarBurgers.forEach(el => {
        el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

        });
    });

});


/* Random Id generator for giving confetti elements unique IDs */
/*
const randomId = function(length) {
    var result = [];
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result.push(characters.charAt(Math.floor(Math.random() *
            charactersLength)));
    }
    return result.join('');
}
*/
/* Short function to create confetti at x, y with confettiItems number of items *//*
const createConfetti = function(x, y, confettiItems) {
    let createElement = document.createElement('div');
    createElement.classList.add('confetti');
    let makeId = randomId(10);
    createElement.setAttribute('data-id', makeId);
    let confettiHTML = '';
    let colors = [ '#2162ff', '#9e21ff', '#21a9ff', '#a9ff21', '#ff2184' ]

    for(var i = 0; i < confettiItems; ++i) {
        let color = Math.floor(Math.random() * (colors.length));
        confettiHTML += `<div class="confetti-item" style="background-color: ${colors[color]};" data-angle="${Math.random()}" data-speed="${Math.random()}"></div>`;
        confettiHTML += `<div class="confetti-item reverse" style="background-color: ${colors[color]};" data-angle="${Math.random()}" data-speed="${Math.random()}"></div>`;
    }

    createElement.style.position = `fixed`;
    createElement.style.top = `${y}px`;
    createElement.style.left = `${x}px`;
    createElement.innerHTML = confettiHTML;
    document.body.appendChild(createElement);

    let gravity =  50; // Fjolt is a high gravity planet
    let maxSpeed = 105000; // Pixels * 1000
    let minSpeed = 65000; // Pixels * 1000
    let t = 0; // Time starts at 0
    let maxAngle = 1500; // Radians * 1000
    let minAngle = 400; // Radians * 1000
    let opacity = 1;
    let rotateAngle = 0;

    let interval = setInterval(function() {
        document.querySelectorAll(`[data-id="${makeId}"] .confetti-item`).forEach(function(item) {
            let modifierX = 1;
            let modifierY = 1;
            if(item.classList.contains('reverse')) {
                modifierX = -1;
            }
            item.style.opacity = opacity;
            let randomNumber = parseFloat(item.getAttribute('data-angle'));
            let otherRandom = parseFloat(item.getAttribute('data-speed'));
            let newRotateAngle = randomNumber * rotateAngle;
            let angle = (randomNumber * (maxAngle - minAngle) + minAngle) / 1000;
            let speed = (randomNumber * (maxSpeed - minSpeed) + minSpeed) / 1000;
            let realT = t * (parseFloat(item.getAttribute('data-angle')));
            let x = speed * t * Math.cos(angle) + (50 * otherRandom * t);
            let y = speed * t * Math.sin(angle) - (0.5 * gravity * Math.pow(t, 2))  + (50 * otherRandom * t);
            item.style.transform = `translateX(${x * modifierX}px) translateY(${y * -1 * modifierY}px) rotateY(${newRotateAngle}deg) scale(${1})`;
        })
        t += 0.1;
        rotateAngle += 3;
        opacity -= 0.02;
        if(t >= 6) {
            t = 0.1;
            if(document.querySelector(`[data-id="${makeId}"]`) !== null) {
                document.querySelector(`[data-id="${makeId}"]`).remove();
            }
            clearInterval(interval);
        }
    }, 33.33);
}
*/
var maxParticleCount = 150; //set max confetti count
var particleSpeed = 2; //set the particle animation speed
var startConfetti; //call to start confetti animation
var stopConfetti; //call to stop adding confetti
var toggleConfetti; //call to start or stop the confetti animation depending on whether it's already running
var removeConfetti; //call to stop the confetti animation and remove all confetti immediately

(function () {
    startConfetti = startConfettiInner;
    stopConfetti = stopConfettiInner;
    toggleConfetti = toggleConfettiInner;
    removeConfetti = removeConfettiInner;
    var colors = ["DodgerBlue", "OliveDrab", "Gold", "Pink", "SlateBlue", "LightBlue", "Violet", "PaleGreen", "SteelBlue", "SandyBrown", "Chocolate", "Crimson"]
    var streamingConfetti = false;
    var animationTimer = null;
    var particles = [];
    var waveAngle = 0;

    function resetParticle(particle, width, height) {
        particle.color = colors[(Math.random() * colors.length) | 0];
        particle.x = Math.random() * width;
        particle.y = Math.random() * height - height;
        particle.diameter = Math.random() * 10 + 5;
        particle.tilt = Math.random() * 10 - 10;
        particle.tiltAngleIncrement = Math.random() * 0.07 + 0.05;
        particle.tiltAngle = 0;
        return particle;
    }

    function startConfettiInner() {
        var width = window.innerWidth;
        var height = window.innerHeight;
        window.requestAnimFrame = (function () {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function (callback) {
                    return window.setTimeout(callback, 16.6666667);
                };
        })();
        var canvas = document.getElementById("confetti-canvas");
        if (canvas === null) {
            canvas = document.createElement("canvas");
            canvas.setAttribute("id", "confetti-canvas");
            canvas.setAttribute("style", "display:block;z-index:999999;pointer-events:none;position:relative");
            document.body.appendChild(canvas);
            canvas.width = width;
            canvas.height = height;
            window.addEventListener("resize", function() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }, true);
        }
        else {
            canvas = document.getElementById("confetti-canvas");
            canvas.width = width;
            canvas.height = height;
            window.addEventListener("resize", function() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }, true);
        }
        var context = canvas.getContext("2d");
        while (particles.length < maxParticleCount)
            particles.push(resetParticle({}, width, height));
        streamingConfetti = true;
        if (animationTimer === null) {
            (function runAnimation() {
                context.clearRect(0, 0, window.innerWidth, window.innerHeight);
                if (particles.length === 0)
                    animationTimer = null;
                else {
                    updateParticles();
                    drawParticles(context);
                    animationTimer = requestAnimFrame(runAnimation);
                }
            })();
        }
    }

    function stopConfettiInner() {
        streamingConfetti = false;
    }

    function removeConfettiInner() {
        stopConfetti();
        particles = [];
    }

    function toggleConfettiInner() {
        if (streamingConfetti)
            stopConfettiInner();
        else
            startConfettiInner();
    }

    function drawParticles(context) {
        var particle;
        var x;
        for (var i = 0; i < particles.length; i++) {
            particle = particles[i];
            context.beginPath();
            context.lineWidth = particle.diameter;
            context.strokeStyle = particle.color;
            x = particle.x + particle.tilt;
            context.moveTo(x + particle.diameter / 2, particle.y);
            context.lineTo(x, particle.y + particle.tilt + particle.diameter / 2);
            context.stroke();
        }
    }

    function updateParticles() {
        var width = window.innerWidth;
        var height = window.innerHeight;
        var particle;
        waveAngle += 0.01;
        for (var i = 0; i < particles.length; i++) {
            particle = particles[i];
            if (!streamingConfetti && particle.y < -15)
                particle.y = height + 100;
            else {
                particle.tiltAngle += particle.tiltAngleIncrement;
                particle.x += Math.sin(waveAngle);
                particle.y += (Math.cos(waveAngle) + particle.diameter + particleSpeed) * 0.5;
                particle.tilt = Math.sin(particle.tiltAngle) * 15;
            }
            if (particle.x > width + 20 || particle.x < -20 || particle.y > height) {
                if (streamingConfetti && particles.length <= maxParticleCount)
                    resetParticle(particle, width, height);
                else {
                    particles.splice(i, 1);
                    i--;
                }
            }
        }
    }
})();

function rollwinner() {
    $.ajax({
        type: "POST",
        url: "../admin/roll.inc.php",
        data: {
            roll: "roll"
        },
        success: function (data) {
            $("#winnerh1").html(data);
            startConfetti();
            setTimeout(function () {
                stopConfetti();
            }
                , 3000);
            /* document.addEventListener('DOMContentLoaded', function(e) {
                 document.getElementById('confetti-box').addEventListener('pointerdown', function(e) {
                     createConfetti(e.pageX, e.pageY, 30);
                 });
             });*/
        }
    });
}

