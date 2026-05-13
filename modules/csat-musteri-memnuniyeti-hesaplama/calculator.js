function hcCSATHesapla() {
    const c5 = parseFloat(document.getElementById('hc-csat-5').value) || 0;
    const c4 = parseFloat(document.getElementById('hc-csat-4').value) || 0;
    const c3 = parseFloat(document.getElementById('hc-csat-3').value) || 0;
    const c2 = parseFloat(document.getElementById('hc-csat-2').value) || 0;
    const c1 = parseFloat(document.getElementById('hc-csat-1').value) || 0;

    const positive = c5 + c4;
    const total = c5 + c4 + c3 + c2 + c1;

    if (total === 0) {
        alert('Lütfen en az bir yanıt sayısı girin.');
        return;
    }

    const csat = (positive / total) * 100;
    
    document.getElementById('hc-res-csat-val').innerText = '%' + csat.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    
    let desc = "";
    if (csat >= 80) desc = "Mükemmel müşteri memnuniyeti.";
    else if (csat >= 60) desc = "İyi düzeyde müşteri memnuniyeti.";
    else if (csat >= 40) desc = "Orta düzeyde müşteri memnuniyeti. İyileştirme alanları olabilir.";
    else desc = "Düşük müşteri memnuniyeti. Acil aksiyon gerekebilir.";

    document.getElementById('hc-csat-desc').innerText = desc;
    document.getElementById('hc-csat-musteri-memnuniyeti-hesaplama-result').classList.add('visible');
}
