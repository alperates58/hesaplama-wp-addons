function hcMerdivenHesapla() {
    const h_total = parseFloat(document.getElementById('hc-st-height').value);
    const steps = parseInt(document.getElementById('hc-st-steps').value);

    if (isNaN(h_total) || isNaN(steps) || steps <= 0) {
        alert('Lütfen geçerli yükseklik ve basamak sayısı girin.');
        return;
    }

    // Riser height (h)
    const h = h_total / steps;
    
    // Blondel rule: 2h + b = 63 (average)
    // b = 63 - 2h
    const b = 63 - (2 * h);

    document.getElementById('hc-st-res-riser').innerText = h.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-st-res-tread').innerText = b.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    const blondel = document.getElementById('hc-st-blondel');
    const check = 2 * h + b;
    blondel.innerText = `Blondel Değeri: ${check.toFixed(1)} cm (İdeal: 62-64 cm)`;
    
    if (h > 18.5) {
        blondel.innerText += " - Dik merdiven!";
        blondel.style.color = "#e74c3c";
    } else if (h < 15) {
        blondel.innerText += " - Çok yayvan!";
        blondel.style.color = "#f39c12";
    } else {
        blondel.innerText += " - Ergonomik ölçü.";
        blondel.style.color = "#2ecc71";
    }

    document.getElementById('hc-st-result').classList.add('visible');
}
