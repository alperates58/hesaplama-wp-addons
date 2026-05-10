function hcPHQ9Hesapla() {
    const qs = document.querySelectorAll('.hc-ph-q');
    let total = 0;
    qs.forEach(q => total += parseInt(q.value));

    document.getElementById('hc-ph-val').innerText = total + ' / 27';
    
    let desc = "";
    if (total <= 4) desc = "Minimal Depresyon";
    else if (total <= 9) desc = "Hafif Depresyon";
    else if (total <= 14) desc = "Orta Şiddette Depresyon";
    else if (total <= 19) desc = "Orta-Ağır Şiddette Depresyon";
    else desc = "⚠️ Ağır Depresyon (Uzman Yardımı Önerilir)";

    document.getElementById('hc-ph-desc').innerText = desc;
    document.getElementById('hc-ph-result').classList.add('visible');
}
