function hc0100Hesapla() {
    const weight = parseFloat(document.getElementById('hc-weight').value);
    const hp = parseFloat(document.getElementById('hc-hp-val').value);
    const driveFactor = parseFloat(document.getElementById('hc-drivetrain').value);

    if (isNaN(weight) || isNaN(hp) || weight <= 0 || hp <= 0) {
        alert('Lütfen geçerli ağırlık ve güç değerleri giriniz.');
        return;
    }

    // Güç-Ağırlık Oranı (hp / ton)
    const pwrRatio = (hp / (weight / 1000));
    document.getElementById('hc-res-pwr-ratio').innerText = pwrRatio.toFixed(1);

    // Tahmini Süre Formülü
    let targetTime = (weight / hp) * driveFactor * 0.75;
    if (targetTime < 2.0) targetTime = 2.0 + ((weight / hp) * 0.1);

    // Animasyonlu Sayaç
    const timeDisplay = document.getElementById('hc-res-time');
    let currentTime = 0;
    const duration = 1500; // ms
    const startTime = performance.now();

    function updateCounter(now) {
        const elapsed = now - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function (outQuart)
        const easeProgress = 1 - Math.pow(1 - progress, 4);
        const displayVal = (targetTime * easeProgress).toFixed(1);
        
        timeDisplay.innerText = displayVal;

        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        }
    }
    requestAnimationFrame(updateCounter);

    // Rank Belirleme
    const rankEl = document.getElementById('hc-res-rank');
    if (targetTime < 4.0) {
        rankEl.innerText = "HYPERCAR";
        rankEl.style.color = "#ff3e3e";
    } else if (targetTime < 5.5) {
        rankEl.innerText = "SUPERSPORT";
        rankEl.style.color = "#ff8a3e";
    } else if (targetTime < 8.5) {
        rankEl.innerText = "SPORT";
        rankEl.style.color = "#3e8aff";
    } else {
        rankEl.innerText = "DAILY";
        rankEl.style.color = "#94a3b8";
    }

    const resultDiv = document.getElementById('hc-0-100-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
