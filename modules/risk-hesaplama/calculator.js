function hcRiskHesapla() {
    const p = parseInt(document.getElementById('hc-ri-prob').value);
    const i = parseInt(document.getElementById('hc-ri-imp').value);
    
    const score = p * i;
    const valEl = document.getElementById('hc-res-ri-val');
    const levelEl = document.getElementById('hc-ri-level');
    
    valEl.innerText = score;
    
    if (score >= 15) {
        levelEl.innerText = "Yüksek Risk: Acil önlem alınmalı!";
        levelEl.style.color = "#c0392b";
    } else if (score >= 8) {
        levelEl.innerText = "Orta Risk: Takip edilmeli.";
        levelEl.style.color = "#d35400";
    } else {
        levelEl.innerText = "Düşük Risk: Kabul edilebilir.";
        levelEl.style.color = "#27ae60";
    }

    document.getElementById('hc-risk-calc-result').classList.add('visible');
}
