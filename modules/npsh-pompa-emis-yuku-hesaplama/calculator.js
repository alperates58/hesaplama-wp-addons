function hcNpshHesapla() {
    const ha = parseFloat(document.getElementById('hc-npsh-ha').value);
    const hs = parseFloat(document.getElementById('hc-npsh-hs').value);
    const hvp = parseFloat(document.getElementById('hc-npsh-hvp').value);
    const hf = parseFloat(document.getElementById('hc-npsh-hf').value);

    if (isNaN(ha) || isNaN(hs) || isNaN(hvp) || isNaN(hf)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // NPSHa = Ha + Hs - Hvp - Hf
    const npsha = ha + hs - hvp - hf;

    document.getElementById('hc-npsh-res-total').innerText = npsha.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    const warning = document.getElementById('hc-npsh-warning');
    if (npsha < 0.5) { // Basit bir kavitasyon eşiği uyarısı
        warning.style.display = 'block';
    } else {
        warning.style.display = 'none';
    }

    document.getElementById('hc-npsh-result').classList.add('visible');
}
