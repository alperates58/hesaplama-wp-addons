function hcPowerFactorHesapla() {
    const p = parseFloat(document.getElementById('hc-pf-p').value);
    const q = parseFloat(document.getElementById('hc-pf-q').value);

    if (isNaN(p) || isNaN(q) || (p === 0 && q === 0)) {
        alert('Lütfen geçerli güç değerleri girin.');
        return;
    }

    // S = sqrt(P^2 + Q^2)
    const s = Math.sqrt(Math.pow(p, 2) + Math.pow(q, 2));
    
    // PF = P / S
    const pf = p / s;

    document.getElementById('hc-pf-res-pf').innerText = pf.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-pf-res-s').innerText = s.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kVA';
    
    let desc = "";
    if (pf >= 0.95) desc = "İdeal Güç Faktörü.";
    else if (pf >= 0.90) desc = "Kabul edilebilir sınırda.";
    else desc = "Düşük Güç Faktörü! Kompanzasyon gerekebilir.";

    document.getElementById('hc-pf-res-desc').innerText = desc;
    document.getElementById('hc-pf-result').classList.add('visible');
}
