function hcAPGARHesapla() {
    const qs = document.querySelectorAll('.hc-ap-q');
    let total = 0;
    qs.forEach(q => total += parseInt(q.value));

    document.getElementById('hc-ap-val').innerText = total + ' / 10';
    
    let desc = "";
    if (total >= 7) desc = "Normal / Sağlıklı Yanıt";
    else if (total >= 4) desc = "Orta Derecede Deprese";
    else desc = "⚠️ Acil Müdahale Gerekebilir (Ağır Deprese)";

    document.getElementById('hc-ap-desc').innerText = desc;
    document.getElementById('hc-ap-result').classList.add('visible');
}
