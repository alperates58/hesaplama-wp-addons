function hcİçMekanHavaKalitesiHesapla() {
    const risks = document.querySelectorAll('.hc-ia-risk:checked');
    let score = 100;

    risks.forEach(r => score -= parseFloat(r.value));

    document.getElementById('hc-ia-val').innerText = score + ' / 100';

    let status = "Çok İyi";
    let color = "#27ae60";

    if (score < 50) { status = "Yüksek Risk"; color = "#c0392b"; }
    else if (score < 75) { status = "Orta Risk"; color = "#e67e22"; }
    else if (score < 90) { status = "Düşük Risk"; color = "#f1c40f"; }

    const descEl = document.getElementById('hc-ia-desc');
    descEl.innerText = status;
    descEl.style.color = color;
    document.getElementById('hc-ia-result').classList.add('visible');
}
