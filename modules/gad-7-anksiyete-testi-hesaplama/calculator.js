function hcGAD7Hesapla() {
    const qs = document.querySelectorAll('.hc-ga-q');
    let total = 0;
    qs.forEach(q => total += parseInt(q.value));

    document.getElementById('hc-ga-val').innerText = total + ' / 21';
    
    let desc = "";
    if (total <= 4) desc = "Minimal Anksiyete";
    else if (total <= 9) desc = "Hafif Anksiyete";
    else if (total <= 14) desc = "Orta Şiddette Anksiyete";
    else desc = "⚠️ Ağır Şiddette Anksiyete (Uzman Yardımı Önerilir)";

    document.getElementById('hc-ga-desc').innerText = desc;
    document.getElementById('hc-ga-result').classList.add('visible');
}
