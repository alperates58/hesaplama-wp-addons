function hcSigaraHesapla() {
    const qs = document.querySelectorAll('.hc-fa-q');
    let total = 0;
    qs.forEach(q => total += parseInt(q.value));

    document.getElementById('hc-fa-val').innerText = total + ' / 10';
    
    let desc = "";
    if (total <= 2) desc = "Çok Düşük Bağımlılık";
    else if (total <= 4) desc = "Düşük Bağımlılık";
    else if (total <= 5) desc = "Orta Düzey Bağımlılık";
    else if (total <= 7) desc = "Yüksek Bağımlılık";
    else desc = "⚠️ Çok Yüksek Bağımlılık (Uzman Yardımı Gerekebilir)";

    document.getElementById('hc-fa-desc').innerText = desc;
    document.getElementById('hc-fa-result').classList.add('visible');
}
