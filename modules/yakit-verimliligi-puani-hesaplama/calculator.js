function hcFepHesapla() {
    const cons = parseFloat(document.getElementById('hc-fep-cons').value);

    if (isNaN(cons)) {
        alert('Lütfen tüketim değerini girin.');
        return;
    }

    let cls = "G";
    let color = "#e74c3c";
    let desc = "Çok Düşük Verimlilik";

    if (cons < 4.5) { cls = "A"; color = "#2ecc71"; desc = "Mükemmel Verimlilik"; }
    else if (cons < 5.5) { cls = "B"; color = "#27ae60"; desc = "Yüksek Verimlilik"; }
    else if (cons < 6.5) { cls = "C"; color = "#f1c40f"; desc = "İyi Verimlilik"; }
    else if (cons < 8.0) { cls = "D"; color = "#f39c12"; desc = "Ortalama Verimlilik"; }
    else if (cons < 10.0) { cls = "E"; color = "#e67e22"; desc = "Düşük Verimlilik"; }
    else if (cons < 12.0) { cls = "F"; color = "#d35400"; desc = "Zayıf Verimlilik"; }

    const clsEl = document.getElementById('hc-fep-class');
    clsEl.innerText = cls;
    clsEl.style.color = color;
    
    document.getElementById('hc-fep-desc').innerText = desc;
    document.getElementById('hc-fep-result').classList.add('visible');
}
