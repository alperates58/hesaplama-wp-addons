function hcCurb65Hesapla() {
    let score = 0;
    if (document.getElementById('hc-c65-c').checked) score++;
    if (document.getElementById('hc-c65-u').checked) score++;
    if (document.getElementById('hc-c65-r').checked) score++;
    if (document.getElementById('hc-c65-b').checked) score++;
    if (document.getElementById('hc-c65-65').checked) score++;

    const resVal = document.getElementById('hc-c65-res-val');
    const resRisk = document.getElementById('hc-c65-res-risk');
    const resRec = document.getElementById('hc-c65-res-rec');

    resVal.innerText = score;

    if (score <= 1) {
        resRisk.innerText = 'Düşük Risk (Mortalite %1.5)';
        resRisk.style.color = '#27ae60';
        resRec.innerText = 'Evde tedavi değerlendirilebilir.';
    } else if (score === 2) {
        resRisk.innerText = 'Orta Risk (Mortalite %9.2)';
        resRisk.style.color = '#f39c12';
        resRec.innerText = 'Kısa süreli yatış veya yakından takip önerilir.';
    } else {
        resRisk.innerText = 'Yüksek Risk (Mortalite %22+)';
        resRisk.style.color = '#e74c3c';
        resRec.innerText = 'Hastanede yatış, ağır vakalarda (4-5 puan) yoğun bakım düşünülmelidir.';
    }

    document.getElementById('hc-curb65-result').classList.add('visible');
}
