function hcNarinlikHesapla() {
    const l = parseFloat(document.getElementById('hc-no-length').value);
    const k = parseFloat(document.getElementById('hc-no-k').value);
    const r = parseFloat(document.getElementById('hc-no-radius').value);

    if (isNaN(l) || isNaN(r) || r <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // λ = (K * L) / r
    const lambda = (k * l) / r;

    document.getElementById('hc-no-res-total').innerText = lambda.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    const status = document.getElementById('hc-no-status');
    if (lambda < 50) {
        status.innerText = "Kısa (Gövde) Kolon";
        status.style.color = "#2ecc71";
    } else if (lambda < 120) {
        status.innerText = "Ara Kolon";
        status.style.color = "#f39c12";
    } else {
        status.innerText = "Narin (Uzun) Kolon - Burkulma Riski Yüksek";
        status.style.color = "#e74c3c";
    }

    document.getElementById('hc-no-result').classList.add('visible');
}
